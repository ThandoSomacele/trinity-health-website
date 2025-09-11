#!/bin/bash

# Trinity Health - Improved Database Deployment Script
# Direct URL handling without placeholders

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
    echo "  export-local        Export local database with local URLs intact"
    echo "  export-staging      Export local database with staging URLs"
    echo "  export-production   Export local database with production URLs"
    echo "  import-staging      Import database to staging server"
    echo "  import-production   Import database to production server"
    echo ""
    echo "Options:"
    echo "  --file=PATH        Database file to import (for import commands)"
    echo "  --no-backup        Skip creating backup before import"
    echo "  -y, --yes          Auto-confirm import without prompting"
    echo ""
    echo "Examples:"
    echo "  $0 export-staging                     # Export with staging URLs"
    echo "  $0 export-production                  # Export with production URLs"
    echo "  $0 import-staging --file=backup.sql   # Import to staging"
    echo ""
}

# Check arguments
if [ $# -eq 0 ]; then
    print_error "Command required"
    show_usage
    exit 1
fi

COMMAND=$1
shift

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

# Load environment configuration
ENV_FILE=".env"
if [ ! -f "$ENV_FILE" ]; then
    print_error "Environment file not found: $ENV_FILE"
    print_error "Please create .env file with the following variables:"
    echo "  LOCAL_URL=https://trinity-health-website.ddev.site"
    echo "  STAGING_URL=https://staging.object91.co.za"
    echo "  PRODUCTION_URL=https://trinityhealth.co.zm"
    echo "  STAGING_DB_HOST=localhost"
    echo "  STAGING_DB_NAME=database_name"
    echo "  STAGING_DB_USER=username"
    echo "  STAGING_DB_PASS=password"
    exit 1
fi

source "$ENV_FILE"

# Set default URLs if not defined in .env
LOCAL_URL=${LOCAL_URL:-https://trinity-health-website.ddev.site}
STAGING_URL=${STAGING_URL:-https://staging.object91.co.za}
PRODUCTION_URL=${PRODUCTION_URL:-https://trinityhealth.co.zm}

# Create backup directory
BACKUP_DIR="./backups/database"
mkdir -p "$BACKUP_DIR"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)

# Function to export database with URL replacement
export_database() {
    local TARGET_ENV=$1
    local TARGET_URL=$2
    
    print_status "Exporting database for $TARGET_ENV environment"
    print_status "Target URL: $TARGET_URL"
    
    # Check DDEV is running
    if ! ddev status 2>/dev/null | grep -q "OK"; then
        print_error "DDEV is not running. Start it with: ddev start"
        exit 1
    fi
    
    # Set export filename
    EXPORT_FILE="$BACKUP_DIR/trinity-health-${TIMESTAMP}-${TARGET_ENV}.sql"
    
    print_status "Exporting database..."
    
    # Export using ddev export-db
    if ! ddev export-db --gzip=false > "$EXPORT_FILE" 2>/dev/null; then
        print_error "Database export failed"
        exit 1
    fi
    
    # Check if export was successful
    if [ ! -f "$EXPORT_FILE" ] || [ ! -s "$EXPORT_FILE" ]; then
        print_error "Database export failed - file is empty or missing"
        exit 1
    fi
    
    # Replace URLs if not exporting for local
    if [ "$TARGET_ENV" != "local" ]; then
        print_status "Updating URLs from $LOCAL_URL to $TARGET_URL..."
        
        # Create a temporary file for processing
        TEMP_FILE="${EXPORT_FILE}.tmp"
        
        # Replace URLs in the database
        sed "s|${LOCAL_URL}|${TARGET_URL}|g" "$EXPORT_FILE" > "$TEMP_FILE"
        
        # Also replace common local development URLs
        sed -i.bak "s|http://localhost:8000|${TARGET_URL}|g" "$TEMP_FILE"
        sed -i.bak "s|http://localhost|${TARGET_URL}|g" "$TEMP_FILE"
        sed -i.bak "s|http://trinity-health-website.ddev.site|${TARGET_URL}|g" "$TEMP_FILE"
        
        # Replace email addresses with staging domain
        if [ "$TARGET_ENV" = "staging" ]; then
            sed -i.bak "s|@trinity-health-website.ddev.site|@staging.object91.co.za|g" "$TEMP_FILE"
        elif [ "$TARGET_ENV" = "production" ]; then
            sed -i.bak "s|@trinity-health-website.ddev.site|@trinityhealth.co.zm|g" "$TEMP_FILE"
        fi
        
        # Clean up backup files
        rm -f "${TEMP_FILE}.bak"
        
        # Move processed file back
        mv "$TEMP_FILE" "$EXPORT_FILE"
    fi
    
    # Compress the file
    print_status "Compressing database..."
    gzip -f "$EXPORT_FILE"
    
    FINAL_FILE="${EXPORT_FILE}.gz"
    FILE_SIZE=$(ls -lh "$FINAL_FILE" | awk '{print $5}')
    
    print_success "Database exported successfully!"
    echo ""
    echo "  File: $FINAL_FILE"
    echo "  Size: $FILE_SIZE"
    echo "  Environment: $TARGET_ENV"
    echo "  URL: $TARGET_URL"
    echo ""
    
    return 0
}

# Function to import database to remote server
import_database() {
    local TARGET_ENV=$1
    
    print_status "Importing database to $TARGET_ENV"
    
    # Get environment configuration
    case $TARGET_ENV in
        staging)
            DB_HOST=${STAGING_DB_HOST:-localhost}
            DB_NAME=${STAGING_DB_NAME}
            DB_USER=${STAGING_DB_USER}
            DB_PASS=${STAGING_DB_PASS}
            SITE_URL=${STAGING_URL}
            ;;
        production)
            DB_HOST=${PRODUCTION_DB_HOST:-localhost}
            DB_NAME=${PRODUCTION_DB_NAME}
            DB_USER=${PRODUCTION_DB_USER}
            DB_PASS=${PRODUCTION_DB_PASS}
            SITE_URL=${PRODUCTION_URL}
            ;;
        *)
            print_error "Invalid target environment: $TARGET_ENV"
            exit 1
            ;;
    esac
    
    # Validate database configuration
    if [ -z "$DB_NAME" ] || [ -z "$DB_USER" ] || [ -z "$DB_PASS" ]; then
        print_error "Database configuration missing for $TARGET_ENV in .env file"
        print_error "Required variables: ${TARGET_ENV^^}_DB_NAME, ${TARGET_ENV^^}_DB_USER, ${TARGET_ENV^^}_DB_PASS"
        exit 1
    fi
    
    # Find source file if not specified
    if [ -z "$SOURCE_FILE" ]; then
        print_status "Looking for latest $TARGET_ENV database export..."
        
        # Look for environment-specific export first
        SOURCE_FILE=$(find "$BACKUP_DIR" -name "*-${TARGET_ENV}.sql.gz" -type f 2>/dev/null | sort -r | head -n1)
        
        if [ -z "$SOURCE_FILE" ]; then
            print_warning "No $TARGET_ENV export found. Creating one now..."
            
            # Export database for target environment
            if [ "$TARGET_ENV" = "staging" ]; then
                export_database "staging" "$STAGING_URL"
            else
                export_database "production" "$PRODUCTION_URL"
            fi
            
            # Find the newly created file
            SOURCE_FILE=$(find "$BACKUP_DIR" -name "*-${TARGET_ENV}.sql.gz" -type f 2>/dev/null | sort -r | head -n1)
        fi
    fi
    
    # Validate source file
    if [ ! -f "$SOURCE_FILE" ]; then
        print_error "Source file not found: $SOURCE_FILE"
        exit 1
    fi
    
    print_status "Source file: $SOURCE_FILE"
    print_status "Target database: $DB_NAME on $DB_HOST"
    print_status "Site URL: $SITE_URL"
    
    # Confirm before proceeding
    if [ "$AUTO_CONFIRM" = false ]; then
        echo ""
        read -p "Continue with database import to $TARGET_ENV? [y/N]: " -n 1 -r
        echo ""
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            print_status "Import cancelled"
            exit 0
        fi
    fi
    
    # Test database connection
    print_status "Testing database connection..."
    mysql_cmd="mysql -h$DB_HOST -u$DB_USER -p$DB_PASS"
    
    if ! $mysql_cmd -e "SELECT 1;" $DB_NAME >/dev/null 2>&1; then
        print_error "Cannot connect to database. Check your credentials in .env"
        exit 1
    fi
    
    print_success "Database connection successful"
    
    # Create backup if requested
    if [ "$CREATE_BACKUP" = true ]; then
        BACKUP_FILE="$BACKUP_DIR/${TARGET_ENV}-backup-${TIMESTAMP}.sql.gz"
        
        print_status "Creating backup of current $TARGET_ENV database..."
        
        if mysqldump -h$DB_HOST -u$DB_USER -p$DB_PASS $DB_NAME \
            --single-transaction --routines --triggers 2>/dev/null | gzip > "$BACKUP_FILE"; then
            BACKUP_SIZE=$(ls -lh "$BACKUP_FILE" | awk '{print $5}')
            print_success "Backup created: $BACKUP_FILE ($BACKUP_SIZE)"
        else
            print_warning "Could not create backup, continuing anyway..."
        fi
    fi
    
    # Prepare import file
    TEMP_DIR="/tmp/trinity-db-import-$$"
    mkdir -p "$TEMP_DIR"
    TEMP_SQL="$TEMP_DIR/import.sql"
    
    print_status "Preparing database for import..."
    
    # Decompress the file
    gunzip -c "$SOURCE_FILE" > "$TEMP_SQL"
    
    # Final URL check - ensure correct URLs for target environment
    print_status "Verifying URLs for $TARGET_ENV environment..."
    
    # Count URL occurrences
    LOCAL_COUNT=$(grep -c "$LOCAL_URL" "$TEMP_SQL" 2>/dev/null || echo "0")
    TARGET_COUNT=$(grep -c "$SITE_URL" "$TEMP_SQL" 2>/dev/null || echo "0")
    
    if [ "$LOCAL_COUNT" -gt 0 ]; then
        print_warning "Found $LOCAL_COUNT local URLs, replacing with $SITE_URL..."
        sed -i.bak "s|${LOCAL_URL}|${SITE_URL}|g" "$TEMP_SQL"
        rm -f "$TEMP_SQL.bak"
    fi
    
    print_status "Database contains $TARGET_COUNT correct URLs for $TARGET_ENV"
    
    # Import database
    print_status "Importing database to $TARGET_ENV..."
    
    if $mysql_cmd $DB_NAME < "$TEMP_SQL" 2>/dev/null; then
        print_success "Database import completed successfully!"
    else
        print_error "Database import failed"
        rm -rf "$TEMP_DIR"
        exit 1
    fi
    
    # Clean up temporary files
    rm -rf "$TEMP_DIR"
    
    print_success "Database deployment completed!"
    echo ""
    echo "Summary:"
    echo "  Environment: $TARGET_ENV"
    echo "  Database: $DB_NAME"
    echo "  Site URL: $SITE_URL"
    if [ "$CREATE_BACKUP" = true ] && [ -f "$BACKUP_FILE" ]; then
        echo "  Backup: $BACKUP_FILE"
    fi
    echo ""
    echo "Next steps:"
    echo "  1. Clear all caches on $SITE_URL"
    echo "  2. Test the site functionality"
    echo "  3. Verify all URLs are correct"
    
    return 0
}

# Main command handling
case $COMMAND in
    export-local)
        export_database "local" "$LOCAL_URL"
        ;;
    export-staging)
        export_database "staging" "$STAGING_URL"
        ;;
    export-production)
        export_database "production" "$PRODUCTION_URL"
        ;;
    import-staging)
        import_database "staging"
        ;;
    import-production)
        import_database "production"
        ;;
    --help)
        show_usage
        exit 0
        ;;
    *)
        print_error "Invalid command: $COMMAND"
        show_usage
        exit 1
        ;;
esac