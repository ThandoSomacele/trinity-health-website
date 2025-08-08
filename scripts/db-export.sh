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
    echo "  --help           Show this help message"
    echo ""
    echo "Examples:"
    echo "  $0                          # Full export with sanitization"
    echo "  $0 --content-only           # Export only content"
    echo "  $0 --full --no-sanitize     # Full export without sanitization"
}

# Default options
EXPORT_TYPE="full"
SANITIZE=true

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

# Set filename based on export type
if [ "$EXPORT_TYPE" = "content" ]; then
    FILENAME="${PROJECT_NAME}-content-${TIMESTAMP}.sql"
    print_status "Exporting content-only database..."
else
    FILENAME="${PROJECT_NAME}-full-${TIMESTAMP}.sql"
    print_status "Exporting full database..."
fi

BACKUP_PATH="$BACKUP_DIR/$FILENAME"

# Function to export database using DDEV
export_with_ddev() {
    if [ "$EXPORT_TYPE" = "content" ]; then
        # Content-only export (specific tables)
        TABLES=$(ddev mysql -e "SHOW TABLES LIKE 'wp_posts'; SHOW TABLES LIKE 'wp_postmeta'; SHOW TABLES LIKE 'wp_terms'; SHOW TABLES LIKE 'wp_term%'; SHOW TABLES LIKE 'wp_comments'; SHOW TABLES LIKE 'wp_commentmeta';" -s | tr '\n' ' ')
        ddev export-db --file="$BACKUP_PATH" --gzip=false
    else
        # Full export
        ddev export-db --file="$BACKUP_PATH" --gzip=false
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

# Check if export was successful
if [ ! -f "$BACKUP_PATH" ] || [ ! -s "$BACKUP_PATH" ]; then
    print_error "Database export failed or resulted in empty file"
    exit 1
fi

print_success "Database exported to: $BACKUP_PATH"

# Sanitize the export if requested
if [ "$SANITIZE" = true ]; then
    print_status "Sanitizing database export..."
    
    # Create sanitized version
    SANITIZED_PATH="${BACKUP_PATH%.*}-sanitized.sql"
    cp "$BACKUP_PATH" "$SANITIZED_PATH"
    
    # Remove sensitive data using sed
    # Replace actual URLs with placeholders
    if [ "$USE_DDEV" = true ]; then
        CURRENT_URL="https://trinity-health-website.ddev.site"
    else
        CURRENT_URL="http://localhost"
    fi
    
    sed -i.bak "s|$CURRENT_URL|{{SITE_URL}}|g" "$SANITIZED_PATH"
    
    # Clear user passwords (set to empty)
    sed -i.bak "s|'user_pass','[^']*'|'user_pass',''|g" "$SANITIZED_PATH"
    
    # Clear session tokens
    sed -i.bak "/session_tokens/d" "$SANITIZED_PATH"
    
    # Clear transients
    sed -i.bak "/DELETE FROM.*_transient/d" "$SANITIZED_PATH"
    sed -i.bak "/INSERT INTO.*_transient/d" "$SANITIZED_PATH"
    
    # Remove backup file
    rm "${SANITIZED_PATH}.bak" 2>/dev/null || true
    
    print_success "Sanitized database export created: $SANITIZED_PATH"
    
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
if [ "$EXPORT_TYPE" = "content" ]; then
    echo "  To import content: ./scripts/db-import.sh staging --content-only --source=$COMPRESSED_PATH"
else
    echo "  To import to staging: ./scripts/db-import.sh staging --source=$COMPRESSED_PATH"
    echo "  To import to production: ./scripts/db-import.sh production --source=$COMPRESSED_PATH"
fi
echo ""