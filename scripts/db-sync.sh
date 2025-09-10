#!/bin/bash

# Trinity Health - Database Management Script
# Export local database or import to staging/production environments

set -e  # Exit on any error

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
    echo "Usage: $0 COMMAND [OPTIONS]"
    echo ""
    echo "Commands:"
    echo "  export              Export local database to file"
    echo "  import staging      Import to staging (auto-exports if needed)"
    echo "  import production   Import to production (auto-exports if needed)"
    echo ""
    echo "Options:"
    echo "  --file=PATH         Database file to import (for import command)"
    echo "  --no-backup        Skip creating backup before import"
    echo "  -y, --yes          Auto-confirm import without prompting"
    echo "  --help             Show this help message"
    echo ""
    echo "Examples:"
    echo "  $0 export                           # Export full local database"
    echo "  $0 import staging                   # Auto-export and import to staging"
    echo "  $0 import staging --file=backup.sql # Import specific file to staging"
    echo "  $0 import production                # Auto-export and import to production"
    echo ""
    echo "Note: Import commands will automatically export the local database"
    echo "      if no recent export is found."
}

# Check arguments
if [ $# -eq 0 ]; then
    print_error "Command required"
    show_usage
    exit 1
fi

COMMAND=$1
shift

# For import command, get the target environment
if [ "$COMMAND" = "import" ]; then
    if [ $# -eq 0 ]; then
        print_error "Target environment required for import command"
        show_usage
        exit 1
    fi
    TARGET_ENV=$1
    shift
    
    # Validate target environment
    case $TARGET_ENV in
        staging|production)
            ;;
        *)
            print_error "Invalid target environment: $TARGET_ENV. Use 'staging' or 'production'"
            exit 1
            ;;
    esac
elif [ "$COMMAND" != "export" ] && [ "$COMMAND" != "--help" ]; then
    print_error "Invalid command: $COMMAND"
    show_usage
    exit 1
fi

# Default options
CREATE_BACKUP=true
SOURCE_FILE=""
AUTO_CONFIRM=false

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        --file=*)
            SOURCE_FILE="${1#*=}"
            shift
            ;;
        --no-backup)
            CREATE_BACKUP=false
            shift
            ;;
        --yes|-y)
            AUTO_CONFIRM=true
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

# Handle help command
if [ "$COMMAND" = "--help" ]; then
    show_usage
    exit 0
fi


# Load environment configuration
ENV_FILE=".env"
if [ ! -f "$ENV_FILE" ]; then
    print_error "Environment file not found: $ENV_FILE"
    exit 1
fi

source "$ENV_FILE"

# Create backup directory
BACKUP_DIR="./backups/database"
mkdir -p "$BACKUP_DIR"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)

# ==================== EXPORT COMMAND ====================
if [ "$COMMAND" = "export" ]; then
    print_status "Exporting full local database"
    
    # Check DDEV is running
    if ! ddev status 2>/dev/null | grep -q "OK"; then
        print_error "DDEV is not running. Start it with: ddev start"
        exit 1
    fi
    
    # Set export filename
    EXPORT_FILE="$BACKUP_DIR/trinity-health-${TIMESTAMP}.sql"
    
    print_status "Exporting database to: $EXPORT_FILE"
    
    # Full export using ddev export-db
    ddev export-db --gzip=false > "$EXPORT_FILE"
    
    # Check if export was successful
    if [ ! -f "$EXPORT_FILE" ] || [ ! -s "$EXPORT_FILE" ]; then
        print_error "Database export failed"
        exit 1
    fi
    
    # Replace local URLs with placeholders for staging/production
    print_status "Preparing database for deployment..."
    
    # Create processed file
    PROCESSED_FILE="${EXPORT_FILE%.sql}-ready.sql"
    cp "$EXPORT_FILE" "$PROCESSED_FILE"
    
    # Replace DDEV URLs with placeholder
    sed -i.bak 's|https://trinity-health-website.ddev.site|{{SITE_URL}}|g' "$PROCESSED_FILE"
    sed -i.bak 's|http://localhost:8000|{{SITE_URL}}|g' "$PROCESSED_FILE"
    sed -i.bak 's|http://localhost|{{SITE_URL}}|g' "$PROCESSED_FILE"
    
    # Remove backup file
    rm "${PROCESSED_FILE}.bak" 2>/dev/null || true
    
    # Compress the processed file
    gzip -c "$PROCESSED_FILE" > "${PROCESSED_FILE}.gz"
    
    # Remove uncompressed versions
    rm "$EXPORT_FILE" "$PROCESSED_FILE"
    
    FINAL_FILE="${PROCESSED_FILE}.gz"
    FILE_SIZE=$(ls -lh "$FINAL_FILE" | awk '{print $5}')
    
    print_success "Database exported successfully!"
    echo ""
    echo "  File: $FINAL_FILE"
    echo "  Size: $FILE_SIZE"
    echo ""
    echo "This file is ready for deployment to staging or production."
    echo "Upload it to your server and use the import command."
    
# ==================== IMPORT COMMAND ====================
elif [ "$COMMAND" = "import" ]; then
    print_status "Importing database to $TARGET_ENV"
    
    # Load environment configuration
    if [ ! -f ".env" ]; then
        print_error "Environment file not found: .env"
        print_status "Create .env file with database configuration for $TARGET_ENV"
        exit 1
    fi
    
    source ".env"
    
    # Get target environment configuration
    case $TARGET_ENV in
        staging)
            DB_HOST=${STAGING_DB_HOST:-localhost}
            DB_NAME=${STAGING_DB_NAME:-trinity_staging}
            DB_USER=${STAGING_DB_USER}
            DB_PASS=${STAGING_DB_PASS}
            SITE_URL=${STAGING_SITE_URL:-https://staging.trinityhealth.co.zm}
            ;;
        production)
            DB_HOST=${PRODUCTION_DB_HOST:-localhost}
            DB_NAME=${PRODUCTION_DB_NAME:-trinity_production}
            DB_USER=${PRODUCTION_DB_USER}
            DB_PASS=${PRODUCTION_DB_PASS}
            SITE_URL=${PRODUCTION_SITE_URL:-https://trinityhealth.co.zm}
            ;;
    esac
    
    # Validate database configuration
    if [ -z "$DB_PASS" ]; then
        print_error "Database password not set for $TARGET_ENV environment in .env file"
        exit 1
    fi
    
    # Find source file if not specified
    if [ -z "$SOURCE_FILE" ]; then
        print_status "Looking for latest database export..."
        
        SOURCE_FILE=$(find "$BACKUP_DIR" -name "*ready.sql.gz" -type f 2>/dev/null | sort -r | head -n1)
        
        if [ -z "$SOURCE_FILE" ]; then
            print_warning "No database export found. Creating one now..."
            
            # Check DDEV is running
            if ! ddev status 2>/dev/null | grep -q "OK"; then
                print_status "Starting DDEV..."
                ddev start
                
                # Wait for DDEV to be ready
                sleep 5
            fi
            
            # Export database
            print_status "Exporting local database..."
            
            # Set export filename
            EXPORT_FILE="$BACKUP_DIR/trinity-health-${TIMESTAMP}.sql"
            
            # Full export using ddev export-db
            if ! ddev export-db --gzip=false > "$EXPORT_FILE" 2>/dev/null; then
                print_error "Failed to export database"
                exit 1
            fi
            
            # Check if export was successful
            if [ ! -f "$EXPORT_FILE" ] || [ ! -s "$EXPORT_FILE" ]; then
                print_error "Database export failed"
                exit 1
            fi
            
            # Replace local URLs with placeholders for staging/production
            print_status "Preparing database for deployment..."
            
            # Create processed file
            PROCESSED_FILE="${EXPORT_FILE%.sql}-ready.sql"
            cp "$EXPORT_FILE" "$PROCESSED_FILE"
            
            # Replace DDEV URLs with placeholder
            sed -i.bak 's|https://trinity-health-website.ddev.site|{{SITE_URL}}|g' "$PROCESSED_FILE"
            sed -i.bak 's|http://localhost:8000|{{SITE_URL}}|g' "$PROCESSED_FILE"
            sed -i.bak 's|http://localhost|{{SITE_URL}}|g' "$PROCESSED_FILE"
            
            # Remove backup file
            rm "${PROCESSED_FILE}.bak" 2>/dev/null || true
            
            # Compress the processed file
            gzip -c "$PROCESSED_FILE" > "${PROCESSED_FILE}.gz"
            
            # Remove uncompressed versions
            rm "$EXPORT_FILE" "$PROCESSED_FILE"
            
            SOURCE_FILE="${PROCESSED_FILE}.gz"
            FILE_SIZE=$(ls -lh "$SOURCE_FILE" | awk '{print $5}')
            
            print_success "Database exported successfully! ($FILE_SIZE)"
        fi
    fi
    
    # Validate source file
    if [ ! -f "$SOURCE_FILE" ]; then
        print_error "Source file not found: $SOURCE_FILE"
        exit 1
    fi
    
    print_status "Source file: $SOURCE_FILE"
    print_status "Target: $DB_NAME on $DB_HOST"
    print_status "Site URL: $SITE_URL"
    
    # Confirm before proceeding (unless auto-confirm is set)
    if [ "$AUTO_CONFIRM" = false ]; then
        echo ""
        read -p "Continue with database import to $TARGET_ENV? [y/N]: " -n 1 -r
        echo ""
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            print_status "Import cancelled"
            exit 0
        fi
    else
        print_status "Auto-confirming import to $TARGET_ENV"
    fi
    
    # Test database connection
    print_status "Testing database connection..."
    mysql_cmd="mysql -h$DB_HOST -u$DB_USER -p$DB_PASS"
    
    if ! $mysql_cmd -e "SELECT 1;" >/dev/null 2>&1; then
        print_error "Cannot connect to database. Check your credentials in .env"
        exit 1
    fi
    
    print_success "Database connection successful"
    
    # Create backup if requested
    if [ "$CREATE_BACKUP" = true ]; then
        BACKUP_FILE="$BACKUP_DIR/${TARGET_ENV}-backup-before-import-${TIMESTAMP}.sql.gz"
        
        print_status "Creating backup of current $TARGET_ENV database..."
        
        mysqldump -h$DB_HOST -u$DB_USER -p$DB_PASS $DB_NAME \
            --single-transaction --routines --triggers | gzip > "$BACKUP_FILE"
        
        if [ -f "$BACKUP_FILE" ] && [ -s "$BACKUP_FILE" ]; then
            BACKUP_SIZE=$(ls -lh "$BACKUP_FILE" | awk '{print $5}')
            print_success "Backup created: $BACKUP_FILE ($BACKUP_SIZE)"
        else
            print_error "Backup creation failed"
            exit 1
        fi
    fi
    
    # Prepare import file
    TEMP_DIR="/tmp/trinity-db-import-$$"
    mkdir -p "$TEMP_DIR"
    TEMP_SQL="$TEMP_DIR/import.sql"
    
    print_status "Preparing database for import..."
    
    # Decompress if needed
    if [[ "$SOURCE_FILE" == *.gz ]]; then
        gunzip -c "$SOURCE_FILE" > "$TEMP_SQL"
    else
        cp "$SOURCE_FILE" "$TEMP_SQL"
    fi
    
    # Replace placeholder URLs with target environment URL
    print_status "Updating URLs for $TARGET_ENV environment..."
    sed -i.bak "s|{{SITE_URL}}|$SITE_URL|g" "$TEMP_SQL"
    
    # Also replace any remaining development URLs
    sed -i.bak "s|https://trinity-health-website.ddev.site|$SITE_URL|g" "$TEMP_SQL"
    sed -i.bak "s|http://localhost:8000|$SITE_URL|g" "$TEMP_SQL"
    sed -i.bak "s|http://localhost|$SITE_URL|g" "$TEMP_SQL"
    
    # Remove backup file
    rm "$TEMP_SQL.bak" 2>/dev/null || true
    
    # Import database
    print_status "Importing database to $TARGET_ENV..."
    
    $mysql_cmd $DB_NAME < "$TEMP_SQL"
    
    # Clean up temporary files
    rm -rf "$TEMP_DIR"
    
    print_success "Database import completed successfully!"
    
    # Update WordPress configuration if WP-CLI is available
    if command -v wp &> /dev/null && [ -d "web" ]; then
        print_status "Updating WordPress configuration..."
        
        wp --path=web search-replace "{{SITE_URL}}" "$SITE_URL" --quiet || true
        wp --path=web option update home "$SITE_URL" --quiet || true
        wp --path=web option update siteurl "$SITE_URL" --quiet || true
        wp --path=web rewrite flush --quiet || true
        wp --path=web transient delete --all --quiet || true
        
        print_success "WordPress configuration updated"
    fi
    
    print_success "Database import completed!"
    echo ""
    echo "Summary:"
    echo "  Environment: $TARGET_ENV"
    echo "  Database: $DB_NAME"
    echo "  Site URL: $SITE_URL"
    if [ "$CREATE_BACKUP" = true ]; then
        echo "  Backup: $BACKUP_FILE"
    fi
    echo ""
    echo "Next steps:"
    echo "  1. Test the site: $SITE_URL"
    echo "  2. Clear any caching"
    echo "  3. Verify functionality"
    
else
    print_error "Invalid command: $COMMAND"
    show_usage
    exit 1
fi