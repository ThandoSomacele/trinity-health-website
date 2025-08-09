#!/bin/bash

# Trinity Health - Remote Database Import Script
# Uploads database file to staging server and imports it there

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
    echo "Usage: $0 ENVIRONMENT SOURCE_FILE"
    echo ""
    echo "Arguments:"
    echo "  ENVIRONMENT       Target environment (staging, production)"
    echo "  SOURCE_FILE       Local database file to upload and import"
    echo ""
    echo "Examples:"
    echo "  $0 staging ./backups/database/trinity-health-full-20250809_002858.sql.gz"
    echo "  $0 staging ./trinity-export.sql"
}

# Check arguments
if [ $# -lt 2 ]; then
    show_usage
    exit 1
fi

ENVIRONMENT=$1
SOURCE_FILE=$2

# Check if source file exists
if [ ! -f "$SOURCE_FILE" ]; then
    print_error "Source file not found: $SOURCE_FILE"
    exit 1
fi

# Load environment variables
ENV_FILE="../.env"
if [ -f ".env" ]; then
    ENV_FILE=".env"
elif [ -f "../.env" ]; then
    ENV_FILE="../.env"
else
    print_error ".env file not found. Please create it with your server credentials."
    exit 1
fi

source "$ENV_FILE"

# Set environment-specific variables
case $ENVIRONMENT in
    staging)
        DB_HOST=$STAGING_DB_HOST
        DB_NAME=$STAGING_DB_NAME
        DB_USER=$STAGING_DB_USER
        DB_PASS=$STAGING_DB_PASS
        SITE_URL=$STAGING_SITE_URL
        SERVER_HOST=$STAGING_HOST
        SERVER_USER=$STAGING_USER
        SERVER_PASS=$STAGING_PASS
        SERVER_PATH=$STAGING_PATH
        ;;
    production)
        DB_HOST=$PRODUCTION_DB_HOST
        DB_NAME=$PRODUCTION_DB_NAME
        DB_USER=$PRODUCTION_DB_USER
        DB_PASS=$PRODUCTION_DB_PASS
        SITE_URL=$PRODUCTION_SITE_URL
        SERVER_HOST=$PRODUCTION_HOST
        SERVER_USER=$PRODUCTION_USER
        SERVER_PASS=$PRODUCTION_PASS
        SERVER_PATH=$PRODUCTION_PATH
        ;;
    *)
        print_error "Invalid environment: $ENVIRONMENT"
        print_error "Valid environments: staging, production"
        exit 1
        ;;
esac

print_status "Remote Database Import Plan:"
print_status "  Environment: $ENVIRONMENT"
print_status "  Source file: $SOURCE_FILE"
print_status "  Target server: $SERVER_HOST"
print_status "  Target database: $DB_NAME"
print_status "  Site URL: $SITE_URL"

# Get filename for upload
FILENAME=$(basename "$SOURCE_FILE")
REMOTE_TEMP_FILE="/tmp/$FILENAME"

echo ""
echo "This will:"
echo "1. Upload database file to $SERVER_HOST"
echo "2. Import database on remote server"
echo "3. Replace URLs with $SITE_URL"
echo "4. Clean up temporary files"
echo ""
read -p "Continue? [y/N]: " -n 1 -r
echo
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    print_status "Import cancelled."
    exit 0
fi

print_status "Uploading database file to staging server..."

# Upload database file via FTP
lftp -c "
set ftp:ssl-allow no;
set ftp:port ${STAGING_PORT:-21};
open ftp://$SERVER_USER:$SERVER_PASS@$SERVER_HOST;
cd $SERVER_PATH;
put \"$SOURCE_FILE\" -o \"$FILENAME\";
"

print_success "Database file uploaded successfully"

print_status "Creating remote import script..."

# Create temporary import script
IMPORT_SCRIPT="/tmp/remote-db-import-$ENVIRONMENT.sh"
cat > "$IMPORT_SCRIPT" << EOF
#!/bin/bash
set -e

DB_FILE="$SERVER_PATH/$FILENAME"
DB_HOST="$DB_HOST"
DB_NAME="$DB_NAME"  
DB_USER="$DB_USER"
DB_PASS="$DB_PASS"
SITE_URL="$SITE_URL"

echo "[INFO] Starting database import on remote server..."
echo "[INFO] Database file: \$DB_FILE"
echo "[INFO] Target database: \$DB_NAME"

# Create backup first
echo "[INFO] Creating backup of current database..."
mysqldump -h"\$DB_HOST" -u"\$DB_USER" -p"\$DB_PASS" "\$DB_NAME" | gzip > "$SERVER_PATH/backup-before-import-\$(date +%Y%m%d_%H%M%S).sql.gz"

# Import database
echo "[INFO] Importing database..."
if [[ "\$DB_FILE" == *.gz ]]; then
    gunzip -c "\$DB_FILE" | mysql -h"\$DB_HOST" -u"\$DB_USER" -p"\$DB_PASS" "\$DB_NAME"
else
    mysql -h"\$DB_HOST" -u"\$DB_USER" -p"\$DB_PASS" "\$DB_NAME" < "\$DB_FILE"
fi

# Update URLs
echo "[INFO] Updating site URLs to \$SITE_URL..."
mysql -h"\$DB_HOST" -u"\$DB_USER" -p"\$DB_PASS" "\$DB_NAME" <<SQL
UPDATE wp_options SET option_value = '\$SITE_URL' WHERE option_name = 'home';
UPDATE wp_options SET option_value = '\$SITE_URL' WHERE option_name = 'siteurl';
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', '\$SITE_URL');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'https://localhost:8000', '\$SITE_URL');
UPDATE wp_posts SET post_excerpt = REPLACE(post_excerpt, 'http://localhost:8000', '\$SITE_URL');
UPDATE wp_posts SET post_excerpt = REPLACE(post_excerpt, 'https://localhost:8000', '\$SITE_URL');
SQL

echo "[SUCCESS] Database import completed successfully"
echo "[INFO] Cleaning up temporary files..."
rm -f "\$DB_FILE"
rm -f "\$0"
EOF

# Upload and execute import script
print_status "Uploading and executing import script..."

lftp -c "
set ftp:ssl-allow no;
set ftp:port ${STAGING_PORT:-21};
open ftp://$SERVER_USER:$SERVER_PASS@$SERVER_HOST;
cd $SERVER_PATH;
put \"$IMPORT_SCRIPT\" -o \"remote-import.sh\";
"

# Note: This requires SSH access to execute the script
print_warning "Database file and import script uploaded to staging server."
print_warning "To complete the import, you need to:"
print_warning "1. Log into your staging server via cPanel File Manager or SSH"
print_warning "2. Navigate to $SERVER_PATH"
print_warning "3. Run: bash remote-import.sh"

# Cleanup local temp file
rm -f "$IMPORT_SCRIPT"

print_status "Upload completed. Manual execution required on server."