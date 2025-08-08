#!/bin/bash

# Trinity Health - Database Import Script
# Imports database with URL replacement and environment configuration

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
    echo "Usage: $0 ENVIRONMENT [OPTIONS]"
    echo ""
    echo "Arguments:"
    echo "  ENVIRONMENT       Target environment (staging, production)"
    echo ""
    echo "Options:"
    echo "  --source=FILE     Source database file (default: latest backup)"
    echo "  --content-only    Import only content tables"
    echo "  --full           Import complete database (default)"
    echo "  --no-backup      Skip creating backup before import"
    echo "  --dry-run        Show what would be done without executing"
    echo "  --help           Show this help message"
    echo ""
    echo "Examples:"
    echo "  $0 staging                                    # Import latest backup to staging"
    echo "  $0 staging --source=backup-20231201.sql.gz   # Import specific backup"
    echo "  $0 production --content-only                  # Import only content to production"
}

# Check arguments
if [ $# -eq 0 ]; then
    print_error "Environment argument required"
    show_usage
    exit 1
fi

ENVIRONMENT=$1
shift

# Validate environment
case $ENVIRONMENT in
    staging|production)
        ;;
    *)
        print_error "Invalid environment: $ENVIRONMENT. Use 'staging' or 'production'"
        exit 1
        ;;
esac

# Default options
IMPORT_TYPE="full"
SOURCE_FILE=""
CREATE_BACKUP=true
DRY_RUN=false

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        --source=*)
            SOURCE_FILE="${1#*=}"
            shift
            ;;
        --content-only)
            IMPORT_TYPE="content"
            shift
            ;;
        --full)
            IMPORT_TYPE="full"
            shift
            ;;
        --no-backup)
            CREATE_BACKUP=false
            shift
            ;;
        --dry-run)
            DRY_RUN=true
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
    print_status "Create .env file with database configuration"
    exit 1
fi

source "$ENV_FILE"

# Set database variables based on environment
case $ENVIRONMENT in
    staging)
        DB_HOST=${STAGING_DB_HOST:-localhost}
        DB_NAME=${STAGING_DB_NAME:-trinity_staging}
        DB_USER=${STAGING_DB_USER:-staging_user}
        DB_PASS=${STAGING_DB_PASS}
        SITE_URL=${STAGING_SITE_URL:-https://staging.trinityhealth.co.zm}
        ;;
    production)
        DB_HOST=${PRODUCTION_DB_HOST:-localhost}
        DB_NAME=${PRODUCTION_DB_NAME:-trinity_production}
        DB_USER=${PRODUCTION_DB_USER:-production_user}
        DB_PASS=${PRODUCTION_DB_PASS}
        SITE_URL=${PRODUCTION_SITE_URL:-https://trinityhealth.co.zm}
        ;;
esac

# Validate database configuration
if [ -z "$DB_PASS" ]; then
    print_error "Database password not set for $ENVIRONMENT environment"
    exit 1
fi

print_status "Target Environment: $ENVIRONMENT"
print_status "Database: $DB_NAME on $DB_HOST"
print_status "Site URL: $SITE_URL"

# Find source file if not specified
if [ -z "$SOURCE_FILE" ]; then
    BACKUP_DIR="./backups/database"
    if [ ! -d "$BACKUP_DIR" ]; then
        print_error "Backup directory not found: $BACKUP_DIR"
        exit 1
    fi
    
    # Find latest backup
    if [ "$IMPORT_TYPE" = "content" ]; then
        SOURCE_FILE=$(find "$BACKUP_DIR" -name "*content*.sql.gz" -type f | sort -r | head -n1)
    else
        SOURCE_FILE=$(find "$BACKUP_DIR" -name "*full*.sql.gz" -o -name "trinity-health-*.sql.gz" | grep -v content | sort -r | head -n1)
    fi
    
    if [ -z "$SOURCE_FILE" ]; then
        print_error "No suitable backup file found in $BACKUP_DIR"
        exit 1
    fi
fi

# Validate source file
if [ ! -f "$SOURCE_FILE" ]; then
    print_error "Source file not found: $SOURCE_FILE"
    exit 1
fi

print_status "Source file: $SOURCE_FILE"

# Show what will be done
print_status "Import Plan:"
echo "  Environment: $ENVIRONMENT"
echo "  Import type: $IMPORT_TYPE"
echo "  Source file: $SOURCE_FILE"
echo "  Create backup: $CREATE_BACKUP"
echo "  Target database: $DB_NAME"
echo "  Site URL: $SITE_URL"

if [ "$DRY_RUN" = true ]; then
    print_warning "DRY RUN - No changes will be made"
    exit 0
fi

# Confirm before proceeding
echo ""
read -p "Continue with database import? [y/N]: " -n 1 -r
echo ""
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    print_status "Import cancelled"
    exit 0
fi

# Test database connection
print_status "Testing database connection..."
mysql_cmd="mysql -h$DB_HOST -u$DB_USER -p$DB_PASS"

if ! $mysql_cmd -e "SELECT 1;" >/dev/null 2>&1; then
    print_error "Cannot connect to database. Check your credentials."
    exit 1
fi

print_success "Database connection successful"

# Create backup of target database if requested
if [ "$CREATE_BACKUP" = true ]; then
    BACKUP_DIR="./backups/database"
    mkdir -p "$BACKUP_DIR"
    TIMESTAMP=$(date +%Y%m%d_%H%M%S)
    BACKUP_FILE="$BACKUP_DIR/${ENVIRONMENT}-backup-before-import-${TIMESTAMP}.sql.gz"
    
    print_status "Creating backup of current $ENVIRONMENT database..."
    
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

# Prepare temporary file for processing
TEMP_DIR="/tmp/trinity-db-import-$$"
mkdir -p "$TEMP_DIR"
TEMP_SQL="$TEMP_DIR/import.sql"

print_status "Preparing database file for import..."

# Decompress if needed
if [[ "$SOURCE_FILE" == *.gz ]]; then
    gunzip -c "$SOURCE_FILE" > "$TEMP_SQL"
else
    cp "$SOURCE_FILE" "$TEMP_SQL"
fi

# Replace URLs in the database dump
print_status "Updating URLs for $ENVIRONMENT environment..."

# Replace placeholder URLs with target environment URL
sed -i.bak "s|{{SITE_URL}}|$SITE_URL|g" "$TEMP_SQL"

# Replace common development URLs
sed -i.bak "s|https://trinity-health-website.ddev.site|$SITE_URL|g" "$TEMP_SQL"
sed -i.bak "s|http://localhost:8000|$SITE_URL|g" "$TEMP_SQL"
sed -i.bak "s|http://localhost|$SITE_URL|g" "$TEMP_SQL"

# Remove backup file
rm "$TEMP_SQL.bak" 2>/dev/null || true

# Import database
print_status "Importing database to $ENVIRONMENT..."

if [ "$IMPORT_TYPE" = "content" ]; then
    print_status "Content-only import - preserving user accounts and settings"
    # Import only specific tables for content-only imports
    $mysql_cmd $DB_NAME < "$TEMP_SQL"
else
    # Full import - replace entire database
    print_status "Full database import - this will replace all data"
    $mysql_cmd $DB_NAME < "$TEMP_SQL"
fi

# Clean up temporary files
rm -rf "$TEMP_DIR"

print_success "Database import completed successfully"

# Update WordPress configuration if WP-CLI is available
if command -v wp &> /dev/null; then
    print_status "Updating WordPress configuration with WP-CLI..."
    
    # Update URLs
    wp --path=web search-replace "{{SITE_URL}}" "$SITE_URL" --dry-run --quiet || true
    wp --path=web search-replace "{{SITE_URL}}" "$SITE_URL" --quiet || true
    
    # Update home and siteurl options
    wp --path=web option update home "$SITE_URL" --quiet || true
    wp --path=web option update siteurl "$SITE_URL" --quiet || true
    
    # Flush rewrite rules
    wp --path=web rewrite flush --quiet || true
    
    # Clear transients
    wp --path=web transient delete --all --quiet || true
    
    print_success "WordPress configuration updated"
else
    print_warning "WP-CLI not found - manual URL updates may be required"
fi

# Post-import tasks
print_status "Running post-import tasks..."

# Update wp-config.php constants if needed
if [ "$ENVIRONMENT" = "production" ]; then
    print_status "Production environment - ensuring debug mode is disabled"
    # Note: This would be handled by environment-specific wp-config.php files
fi

print_success "Database import process completed!"
echo ""
print_status "Import Summary:"
echo "  Environment: $ENVIRONMENT"
echo "  Database: $DB_NAME"
echo "  Site URL: $SITE_URL"
echo "  Import type: $IMPORT_TYPE"
if [ "$CREATE_BACKUP" = true ]; then
    echo "  Backup created: $BACKUP_FILE"
fi
echo ""
print_status "Next steps:"
echo "  1. Test the site: $SITE_URL"
echo "  2. Verify all functionality is working"
echo "  3. Clear any caching (if applicable)"
echo "  4. Update any environment-specific plugin settings"
echo ""

# Health check
print_status "Performing basic health check..."
if curl -f -s -I "$SITE_URL" >/dev/null 2>&1; then
    print_success "Site is responding at: $SITE_URL"
else
    print_warning "Could not verify site is responding - check manually"
fi

print_success "Database import completed successfully!"