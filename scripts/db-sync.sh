#!/bin/bash

# Trinity Health - Database Sync Script
# Synchronizes database between environments with proper URL handling

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
    echo "Usage: $0 TARGET_ENVIRONMENT [OPTIONS]"
    echo ""
    echo "Arguments:"
    echo "  TARGET_ENVIRONMENT    Where to sync to (staging, production)"
    echo ""
    echo "Options:"
    echo "  --source=ENV         Source environment (local, staging, production)"
    echo "                       Default: local for staging target, staging for production target"
    echo "  --content-only       Sync only content (posts, pages, media)"
    echo "  --full              Sync complete database (default)"
    echo "  --no-backup         Skip creating backup before sync"
    echo "  --dry-run           Show what would be done without executing"
    echo "  --help              Show this help message"
    echo ""
    echo "Common workflows:"
    echo "  $0 staging                    # Sync local → staging"
    echo "  $0 production --source=staging # Sync staging → production"
    echo "  $0 staging --content-only     # Sync only content to staging"
    echo ""
    echo "Examples:"
    echo "  $0 staging                              # Local development → Staging"
    echo "  $0 production --source=staging          # Staging → Production"
    echo "  $0 staging --content-only --no-backup  # Quick content sync"
}

# Check arguments
if [ $# -eq 0 ]; then
    print_error "Target environment argument required"
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

# Set default source environment
if [ "$TARGET_ENV" = "staging" ]; then
    SOURCE_ENV="local"
elif [ "$TARGET_ENV" = "production" ]; then
    SOURCE_ENV="staging"
fi

# Default options
SYNC_TYPE="full"
CREATE_BACKUP=true
DRY_RUN=false

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        --source=*)
            SOURCE_ENV="${1#*=}"
            shift
            ;;
        --content-only)
            SYNC_TYPE="content"
            shift
            ;;
        --full)
            SYNC_TYPE="full"
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

# Validate source environment
case $SOURCE_ENV in
    local|staging|production)
        ;;
    *)
        print_error "Invalid source environment: $SOURCE_ENV. Use 'local', 'staging', or 'production'"
        exit 1
        ;;
esac

# Prevent dangerous syncs
if [ "$SOURCE_ENV" = "production" ] && [ "$TARGET_ENV" = "staging" ]; then
    print_warning "Syncing production → staging will overwrite staging data!"
    echo ""
    read -p "Are you sure you want to proceed? [y/N]: " -n 1 -r
    echo ""
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        print_status "Sync cancelled"
        exit 0
    fi
fi

print_status "Database Sync: $SOURCE_ENV → $TARGET_ENV"
print_status "Sync type: $SYNC_TYPE"

# Load environment configuration
ENV_FILE=".env"
if [ ! -f "$ENV_FILE" ]; then
    print_error "Environment file not found: $ENV_FILE"
    exit 1
fi

source "$ENV_FILE"

# Function to get database config for environment
get_db_config() {
    local env=$1
    case $env in
        local)
            if command -v ddev &> /dev/null && [ -f .ddev/config.yaml ]; then
                DB_HOST="db"
                DB_NAME="db"
                DB_USER="db"
                DB_PASS="db"
                SITE_URL="https://trinity-health-website.ddev.site"
                USE_DDEV=true
            else
                DB_HOST=${LOCAL_DB_HOST:-localhost}
                DB_NAME=${LOCAL_DB_NAME:-trinity_local}
                DB_USER=${LOCAL_DB_USER:-root}
                DB_PASS=${LOCAL_DB_PASS:-}
                SITE_URL=${LOCAL_SITE_URL:-http://localhost}
                USE_DDEV=false
            fi
            ;;
        staging)
            DB_HOST=${STAGING_DB_HOST:-localhost}
            DB_NAME=${STAGING_DB_NAME:-trinity_staging}
            DB_USER=${STAGING_DB_USER}
            DB_PASS=${STAGING_DB_PASS}
            SITE_URL=${STAGING_SITE_URL:-https://staging.trinityhealth.co.zm}
            USE_DDEV=false
            ;;
        production)
            DB_HOST=${PRODUCTION_DB_HOST:-localhost}
            DB_NAME=${PRODUCTION_DB_NAME:-trinity_production}
            DB_USER=${PRODUCTION_DB_USER}
            DB_PASS=${PRODUCTION_DB_PASS}
            SITE_URL=${PRODUCTION_SITE_URL:-https://trinityhealth.co.zm}
            USE_DDEV=false
            ;;
    esac
}

# Get source environment config
get_db_config $SOURCE_ENV
SOURCE_DB_HOST=$DB_HOST
SOURCE_DB_NAME=$DB_NAME
SOURCE_DB_USER=$DB_USER
SOURCE_DB_PASS=$DB_PASS
SOURCE_SITE_URL=$SITE_URL
SOURCE_USE_DDEV=$USE_DDEV

# Get target environment config
get_db_config $TARGET_ENV
TARGET_DB_HOST=$DB_HOST
TARGET_DB_NAME=$DB_NAME
TARGET_DB_USER=$DB_USER
TARGET_DB_PASS=$DB_PASS
TARGET_SITE_URL=$SITE_URL

# Validate configurations
if [ "$SOURCE_ENV" != "local" ] && [ -z "$SOURCE_DB_PASS" ]; then
    print_error "Source database password not set for $SOURCE_ENV environment"
    exit 1
fi

if [ -z "$TARGET_DB_PASS" ]; then
    print_error "Target database password not set for $TARGET_ENV environment"
    exit 1
fi

# Display sync plan
print_status "Sync Plan:"
echo ""
echo "  Source Environment: $SOURCE_ENV"
echo "    Database: $SOURCE_DB_NAME on $SOURCE_DB_HOST"
echo "    Site URL: $SOURCE_SITE_URL"
echo ""
echo "  Target Environment: $TARGET_ENV"
echo "    Database: $TARGET_DB_NAME on $TARGET_DB_HOST"
echo "    Site URL: $TARGET_SITE_URL"
echo ""
echo "  Sync Type: $SYNC_TYPE"
echo "  Create Backup: $CREATE_BACKUP"

if [ "$DRY_RUN" = true ]; then
    print_warning "DRY RUN - No changes will be made"
    exit 0
fi

# Confirm before proceeding
echo ""
read -p "Continue with database sync? [y/N]: " -n 1 -r
echo ""
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    print_status "Sync cancelled"
    exit 0
fi

# Test database connections
print_status "Testing database connections..."

# Test source connection
if [ "$SOURCE_USE_DDEV" = true ]; then
    if ! ddev exec "mysql -e 'SELECT 1;'" >/dev/null 2>&1; then
        print_error "Cannot connect to source database (DDEV)"
        exit 1
    fi
else
    source_mysql_cmd="mysql -h$SOURCE_DB_HOST -u$SOURCE_DB_USER"
    if [ -n "$SOURCE_DB_PASS" ]; then
        source_mysql_cmd="$source_mysql_cmd -p$SOURCE_DB_PASS"
    fi
    
    if ! $source_mysql_cmd -e "SELECT 1;" >/dev/null 2>&1; then
        print_error "Cannot connect to source database ($SOURCE_ENV)"
        exit 1
    fi
fi

# Test target connection
target_mysql_cmd="mysql -h$TARGET_DB_HOST -u$TARGET_DB_USER -p$TARGET_DB_PASS"
if ! $target_mysql_cmd -e "SELECT 1;" >/dev/null 2>&1; then
    print_error "Cannot connect to target database ($TARGET_ENV)"
    exit 1
fi

print_success "Database connections successful"

# Create backup directory
BACKUP_DIR="./backups/database"
mkdir -p "$BACKUP_DIR"
TIMESTAMP=$(date +%Y%m%d_%H%M%S)

# Create backup of target database if requested
if [ "$CREATE_BACKUP" = true ]; then
    BACKUP_FILE="$BACKUP_DIR/${TARGET_ENV}-backup-before-sync-${TIMESTAMP}.sql.gz"
    
    print_status "Creating backup of target $TARGET_ENV database..."
    
    mysqldump -h$TARGET_DB_HOST -u$TARGET_DB_USER -p$TARGET_DB_PASS $TARGET_DB_NAME \
        --single-transaction --routines --triggers | gzip > "$BACKUP_FILE"
    
    if [ -f "$BACKUP_FILE" ] && [ -s "$BACKUP_FILE" ]; then
        BACKUP_SIZE=$(ls -lh "$BACKUP_FILE" | awk '{print $5}')
        print_success "Target backup created: $BACKUP_FILE ($BACKUP_SIZE)"
    else
        print_error "Target backup creation failed"
        exit 1
    fi
fi

# Export from source
EXPORT_FILE="$BACKUP_DIR/sync-${SOURCE_ENV}-to-${TARGET_ENV}-${TIMESTAMP}.sql"
print_status "Exporting from source $SOURCE_ENV database..."

if [ "$SOURCE_USE_DDEV" = true ]; then
    if [ "$SYNC_TYPE" = "content" ]; then
        # Content-only export from DDEV
        ddev exec "mysqldump db wp_posts wp_postmeta wp_terms wp_termmeta wp_term_relationships wp_term_taxonomy wp_comments wp_commentmeta --single-transaction --routines --triggers" > "$EXPORT_FILE"
    else
        # Full export from DDEV
        ddev exec "mysqldump db --single-transaction --routines --triggers" > "$EXPORT_FILE"
    fi
else
    source_mysqldump_cmd="mysqldump -h$SOURCE_DB_HOST -u$SOURCE_DB_USER"
    if [ -n "$SOURCE_DB_PASS" ]; then
        source_mysqldump_cmd="$source_mysqldump_cmd -p$SOURCE_DB_PASS"
    fi
    
    if [ "$SYNC_TYPE" = "content" ]; then
        # Content-only export
        $source_mysqldump_cmd $SOURCE_DB_NAME \
            wp_posts wp_postmeta \
            wp_terms wp_termmeta wp_term_relationships wp_term_taxonomy \
            wp_comments wp_commentmeta \
            --single-transaction --routines --triggers > "$EXPORT_FILE"
    else
        # Full export
        $source_mysqldump_cmd $SOURCE_DB_NAME \
            --single-transaction --routines --triggers > "$EXPORT_FILE"
    fi
fi

# Check if export was successful
if [ ! -f "$EXPORT_FILE" ] || [ ! -s "$EXPORT_FILE" ]; then
    print_error "Source database export failed"
    exit 1
fi

EXPORT_SIZE=$(ls -lh "$EXPORT_FILE" | awk '{print $5}')
print_success "Source exported: $EXPORT_FILE ($EXPORT_SIZE)"

# Process the export file for URL replacement
print_status "Updating URLs for target environment..."
PROCESSED_FILE="${EXPORT_FILE}.processed"
cp "$EXPORT_FILE" "$PROCESSED_FILE"

# Replace source URLs with target URLs
sed -i.bak "s|$SOURCE_SITE_URL|$TARGET_SITE_URL|g" "$PROCESSED_FILE"

# Remove backup file
rm "$PROCESSED_FILE.bak" 2>/dev/null || true

# Import to target
print_status "Importing to target $TARGET_ENV database..."

if [ "$SYNC_TYPE" = "content" ]; then
    print_status "Content-only sync - preserving user accounts and settings"
fi

$target_mysql_cmd $TARGET_DB_NAME < "$PROCESSED_FILE"

print_success "Database import completed"

# Clean up temporary files
rm "$EXPORT_FILE" "$PROCESSED_FILE"

# Update WordPress configuration if WP-CLI is available
if command -v wp &> /dev/null; then
    print_status "Updating WordPress configuration with WP-CLI..."
    
    # Update home and siteurl options
    wp --path=web option update home "$TARGET_SITE_URL" --quiet || true
    wp --path=web option update siteurl "$TARGET_SITE_URL" --quiet || true
    
    # Flush rewrite rules
    wp --path=web rewrite flush --quiet || true
    
    # Clear transients
    wp --path=web transient delete --all --quiet || true
    
    print_success "WordPress configuration updated"
fi

print_success "Database sync completed successfully!"
echo ""
print_status "Sync Summary:"
echo "  Direction: $SOURCE_ENV → $TARGET_ENV"
echo "  Sync type: $SYNC_TYPE"
echo "  Target URL: $TARGET_SITE_URL"
if [ "$CREATE_BACKUP" = true ]; then
    echo "  Backup created: $BACKUP_FILE"
fi
echo ""
print_status "Next steps:"
echo "  1. Test the site: $TARGET_SITE_URL"
echo "  2. Verify all functionality is working"
echo "  3. Clear any caching (if applicable)"
if [ "$TARGET_ENV" = "production" ]; then
    echo "  4. Monitor for any issues"
    echo "  5. Inform stakeholders of the update"
fi
echo ""

# Health check
print_status "Performing basic health check..."
if curl -f -s -I "$TARGET_SITE_URL" >/dev/null 2>&1; then
    print_success "Target site is responding at: $TARGET_SITE_URL"
else
    print_warning "Could not verify target site is responding - check manually"
fi

print_success "Database sync process completed successfully!"