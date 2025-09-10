#!/bin/bash

# Trinity Health - Database Export Script
# Exports database with proper sanitization for deployment

set -e  # Exit on any error

# Configuration
PROJECT_NAME="trinity-health"
BACKUP_DIR="./backups/database"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Function to print colored output
print_status() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

print_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Function to show usage
show_usage() {
    echo "Usage: $0 [OPTIONS]"
    echo ""
    echo "Options:"
    echo "  --content-only    Export only content tables (posts, pages, media)"
    echo "  --full           Export complete database (default)"
    echo "  --sanitize       Remove sensitive data (default: enabled)"
    echo "  --no-sanitize    Keep all data including sensitive information"
    echo "  --for-staging    Prepare export specifically for staging environment"
    echo "  --for-production Prepare export specifically for production environment"
    echo "  --help           Show this help message"
    echo ""
    echo "Examples:"
    echo "  $0                          # Full export with sanitization (placeholders)"
    echo "  $0 --for-staging            # Full export ready for staging import"
    echo "  $0 --for-production         # Full export ready for production import"
    echo "  $0 --content-only           # Export only content"
    echo "  $0 --full --no-sanitize     # Full export without sanitization"
}

# Default options
EXPORT_TYPE="full"
SANITIZE=true
TARGET_ENV=""

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        --content-only)
            EXPORT_TYPE="content"
            shift
            ;;
        --full)
            EXPORT_TYPE="full"
            shift
            ;;
        --sanitize)
            SANITIZE=true
            shift
            ;;
        --no-sanitize)
            SANITIZE=false
            shift
            ;;
        --for-staging)
            TARGET_ENV="staging"
            SANITIZE=true
            shift
            ;;
        --for-production)
            TARGET_ENV="production"
            SANITIZE=true
            shift
            ;;
        --help)
            show_usage
            exit 0
            ;;
        *)
            print_error "Unknown option: $1"
            show_usage
            exit 1
            ;;
    esac
done

# Check if we're in a DDEV environment
if command -v ddev &> /dev/null && [ -f .ddev/config.yaml ]; then
    print_status "DDEV environment detected"
    USE_DDEV=true
    DB_HOST="db"
    DB_NAME="db"
    DB_USER="db"
    DB_PASS="db"
else
    USE_DDEV=false
    print_status "Standard environment detected"
    
    # Load environment variables
    if [ -f .env ]; then
        source .env
    fi
    
    # Set default database connection details
    DB_HOST=${DB_HOST:-localhost}
    DB_NAME=${DB_NAME:-trinity_health}
    DB_USER=${DB_USER:-root}
    DB_PASS=${DB_PASS:-}
fi

# Create backup directory
mkdir -p "$BACKUP_DIR"

# Set filename based on export type and target environment
if [ "$EXPORT_TYPE" = "content" ]; then
    if [ -n "$TARGET_ENV" ]; then
        FILENAME="${PROJECT_NAME}-content-${TARGET_ENV}-${TIMESTAMP}.sql"
        print_status "Exporting content-only database for ${TARGET_ENV} environment..."
    else
        FILENAME="${PROJECT_NAME}-content-${TIMESTAMP}.sql"
        print_status "Exporting content-only database..."
    fi
else
    if [ -n "$TARGET_ENV" ]; then
        FILENAME="${PROJECT_NAME}-full-${TARGET_ENV}-${TIMESTAMP}.sql"
        print_status "Exporting full database for ${TARGET_ENV} environment..."
    else
        FILENAME="${PROJECT_NAME}-full-${TIMESTAMP}.sql"
        print_status "Exporting full database..."
    fi
fi

BACKUP_PATH="$BACKUP_DIR/$FILENAME"

# Function to export database using DDEV
export_with_ddev() {
    if [ "$EXPORT_TYPE" = "content" ]; then
        # Content-only export (specific tables) - export directly to backup path
        ddev exec wp db export "$BACKUP_PATH" \
            --skip-lock-tables \
            --single-transaction \
            --add-drop-table \
            --tables="wp_posts,wp_postmeta,wp_terms,wp_termmeta,wp_term_relationships,wp_term_taxonomy,wp_comments,wp_commentmeta"
    else
        # Full export using ddev export-db which is more reliable
        ddev export-db --gzip=false > "$BACKUP_PATH"
    fi
}

# Function to export database using standard MySQL
export_with_mysql() {
    local mysql_cmd="mysql -h$DB_HOST -u$DB_USER"
    if [ -n "$DB_PASS" ]; then
        mysql_cmd="$mysql_cmd -p$DB_PASS"
    fi
    
    local mysqldump_cmd="mysqldump -h$DB_HOST -u$DB_USER"
    if [ -n "$DB_PASS" ]; then
        mysqldump_cmd="$mysqldump_cmd -p$DB_PASS"
    fi
    
    if [ "$EXPORT_TYPE" = "content" ]; then
        # Content-only export
        $mysqldump_cmd $DB_NAME \
            wp_posts wp_postmeta \
            wp_terms wp_termmeta wp_term_relationships wp_term_taxonomy \
            wp_comments wp_commentmeta \
            --single-transaction --routines --triggers > "$BACKUP_PATH"
    else
        # Full export
        $mysqldump_cmd $DB_NAME \
            --single-transaction --routines --triggers > "$BACKUP_PATH"
    fi
}

# Export the database
print_status "Starting database export..."

if [ "$USE_DDEV" = true ]; then
    export_with_ddev
else
    export_with_mysql
fi

# Check if export was successful - find the most recent SQL file (excluding .gz files)
sleep 1  # Brief wait for file system sync
LATEST_SQL=$(ls -t "$BACKUP_DIR"/*.sql 2>/dev/null | grep -v "\.gz$" | head -1)
if [ -n "$LATEST_SQL" ] && [ -f "$LATEST_SQL" ] && [ -s "$LATEST_SQL" ]; then
    BACKUP_PATH="$LATEST_SQL"
    print_success "Database exported to: $BACKUP_PATH"
else
    print_error "Database export failed - file not found or empty"
    exit 1
fi

# Clean MySQL-specific syntax for staging compatibility
print_status "Cleaning MySQL syntax for staging compatibility..."
if [ -f "$BACKUP_PATH" ]; then
    # Remove MySQL version-specific comments that cause issues on shared hosting
    sed -i.mysql_clean 's/\/\*![0-9]* \(.*\) \*\//\1/g' "$BACKUP_PATH"
    # Clean up backup file
    rm "${BACKUP_PATH}.mysql_clean" 2>/dev/null || true
    print_success "MySQL syntax cleaned for staging compatibility"
fi

# Sanitize the export if requested
if [ "$SANITIZE" = true ]; then
    print_status "Sanitizing database export..."
    
    # Create sanitized version
    SANITIZED_PATH="${BACKUP_PATH%.*}-sanitized.sql"
    cp "$BACKUP_PATH" "$SANITIZED_PATH"
    
    # Determine current and target URLs
    if [ "$USE_DDEV" = true ]; then
        CURRENT_URL="https://trinity-health-website.ddev.site"
    else
        CURRENT_URL="http://localhost"
    fi
    
    # Load environment variables for target URL
    if [ -f .env ]; then
        source .env
    fi
    
    # Replace URLs based on target environment
    if [ "$TARGET_ENV" = "staging" ]; then
        TARGET_URL="$STAGING_SITE_URL"
        print_status "Replacing URLs for staging environment: $TARGET_URL"
        # Handle ALL DDEV URL variations - order matters!
        sed -i.bak "s|https://trinity-health-website.ddev.site:33001/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|https://trinity-health-website.ddev.site:33001|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|https://trinity-health-website.ddev.site/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|https://trinity-health-website.ddev.site|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site:33001/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site:33001|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site|$TARGET_URL|g" "$SANITIZED_PATH"
        # Handle email addresses and escaped URLs
        sed -i.bak "s|@trinity-health-website.ddev.site|@staging.object91.co.za|g" "$SANITIZED_PATH"
        sed -i.bak "s|\\\\/trinity-health-website.ddev.site|\\\\/staging.object91.co.za|g" "$SANITIZED_PATH"
        # Handle any remaining domain references (like in email subjects, plugin data, etc.)
        sed -i.bak "s|trinity-health-website.ddev.site|staging.object91.co.za|g" "$SANITIZED_PATH"
    elif [ "$TARGET_ENV" = "production" ]; then
        TARGET_URL="$PRODUCTION_SITE_URL"
        PRODUCTION_DOMAIN=$(echo "$PRODUCTION_SITE_URL" | sed 's|https\?://||')
        print_status "Replacing URLs for production environment: $TARGET_URL"
        # Handle ALL DDEV URL variations - order matters!
        sed -i.bak "s|https://trinity-health-website.ddev.site:33001/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|https://trinity-health-website.ddev.site:33001|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|https://trinity-health-website.ddev.site/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|https://trinity-health-website.ddev.site|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site:33001/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site:33001|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site/wp|$TARGET_URL|g" "$SANITIZED_PATH"
        sed -i.bak "s|http://trinity-health-website.ddev.site|$TARGET_URL|g" "$SANITIZED_PATH"
        # Handle email addresses and escaped URLs
        sed -i.bak "s|@trinity-health-website.ddev.site|@$PRODUCTION_DOMAIN|g" "$SANITIZED_PATH"
        sed -i.bak "s|\\\\/trinity-health-website.ddev.site|\\\\/$(echo "$PRODUCTION_DOMAIN" | sed 's/\./\\./g')|g" "$SANITIZED_PATH"
        # Handle any remaining domain references (like in email subjects, plugin data, etc.)
        sed -i.bak "s|trinity-health-website.ddev.site|$PRODUCTION_DOMAIN|g" "$SANITIZED_PATH"
    else
        # Default behavior - use placeholders for manual replacement later
        print_status "Using placeholder URLs for manual replacement"
        sed -i.bak "s|$CURRENT_URL|{{SITE_URL}}|g" "$SANITIZED_PATH"
        # Also handle any port variations from DDEV
        sed -i.bak "s|https://trinity-health-website.ddev.site:33001/wp|{{SITE_URL}}|g" "$SANITIZED_PATH"
        sed -i.bak "s|https://trinity-health-website.ddev.site:33001|{{SITE_URL}}|g" "$SANITIZED_PATH"
    fi
    
    # Clear user passwords (set to empty)
    sed -i.bak "s|'user_pass','[^']*'|'user_pass',''|g" "$SANITIZED_PATH"
    
    # Clear session tokens
    sed -i.bak "/session_tokens/d" "$SANITIZED_PATH"
    
    # Clear transients
    sed -i.bak "/DELETE FROM.*_transient/d" "$SANITIZED_PATH"
    sed -i.bak "/INSERT INTO.*_transient/d" "$SANITIZED_PATH"
    
    # Remove backup file
    rm "${SANITIZED_PATH}.bak" 2>/dev/null || true
    
    if [ -n "$TARGET_ENV" ]; then
        print_success "Database export prepared for $TARGET_ENV: $SANITIZED_PATH"
    else
        print_success "Sanitized database export created: $SANITIZED_PATH"
    fi
    
    # Remove original non-sanitized version for security
    rm "$BACKUP_PATH"
    mv "$SANITIZED_PATH" "$BACKUP_PATH"
fi

# Display file info
FILE_SIZE=$(ls -lh "$BACKUP_PATH" | awk '{print $5}')
print_success "Export completed successfully!"
echo ""
print_status "Export Details:"
echo "  File: $BACKUP_PATH"
echo "  Size: $FILE_SIZE"
echo "  Type: $EXPORT_TYPE"
echo "  Sanitized: $SANITIZE"
echo ""

# Compress the file
print_status "Compressing database export..."
gzip "$BACKUP_PATH"
COMPRESSED_PATH="${BACKUP_PATH}.gz"
COMPRESSED_SIZE=$(ls -lh "$COMPRESSED_PATH" | awk '{print $5}')

print_success "Database export compressed: $COMPRESSED_PATH ($COMPRESSED_SIZE)"

# Cleanup old backups (keep last 10)
print_status "Cleaning up old backups (keeping last 10)..."
cd "$BACKUP_DIR"
ls -t *.sql.gz 2>/dev/null | tail -n +11 | xargs rm -f
cd - > /dev/null

print_success "Database export process completed!"
echo ""
print_status "Next steps:"
if [ -n "$TARGET_ENV" ]; then
    if [ "$EXPORT_TYPE" = "content" ]; then
        echo "  Database ready for $TARGET_ENV import via phpMyAdmin"
        echo "  File: $COMPRESSED_PATH"
        echo "  URLs already replaced with: $TARGET_URL"
    else
        echo "  Database ready for $TARGET_ENV import via phpMyAdmin"
        echo "  File: $COMPRESSED_PATH"
        echo "  URLs already replaced with: $TARGET_URL"
        echo "  No additional URL replacement needed!"
    fi
else
    if [ "$EXPORT_TYPE" = "content" ]; then
        echo "  To import content: ./scripts/db-import.sh staging --content-only --source=$COMPRESSED_PATH"
    else
        echo "  To import to staging: ./scripts/db-import.sh staging --source=$COMPRESSED_PATH"
        echo "  To import to production: ./scripts/db-import.sh production --source=$COMPRESSED_PATH"
        echo "  Or use --for-staging/--for-production flags for direct environment export"
    fi
fi
echo ""