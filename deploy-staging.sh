#!/bin/bash

# Trinity Health - Staging Deployment Script
# This script builds assets and deploys to staging server via FTP

set -e  # Exit on any error

# Configuration - Update these with your staging server details
STAGING_HOST="your-staging-server.com"
STAGING_USER="your-ftp-username"
STAGING_PATH="/public_html"  # Remote path on staging server
LOCAL_THEME_PATH="web/wp-content/themes/trinity-health"
UPLOADS_PATH="web/wp-content/uploads"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Parse command line arguments
FRESH_DEPLOY=false

while [[ $# -gt 0 ]]; do
    case $1 in
        --fresh)
            FRESH_DEPLOY=true
            shift
            ;;
        --help)
            echo "Usage: $0 [OPTIONS]"
            echo ""
            echo "Options:"
            echo "  --fresh    Perform fresh deployment (overwrite all staging files)"
            echo "  --help     Show this help message"
            echo ""
            echo "Examples:"
            echo "  $0                # Normal deployment (sync changes)"
            echo "  $0 --fresh        # Fresh deployment (overwrite everything)"
            exit 0
            ;;
        *)
            echo "Unknown option: $1"
            echo "Use --help for usage information"
            exit 1
            ;;
    esac
done

if [ "$FRESH_DEPLOY" = true ]; then
    echo -e "${GREEN}🚀 Trinity Health - FRESH Staging Deployment${NC}"
    echo "=============================================="
    echo -e "${YELLOW}⚠️  WARNING: This will overwrite ALL files on staging server${NC}"
else
    echo -e "${GREEN}🚀 Trinity Health - Staging Deployment${NC}"
    echo "=================================="
fi

# Get the absolute path to the project root
PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$PROJECT_ROOT"

echo "Project root: $PROJECT_ROOT"
echo "Current directory: $(pwd)"

# Check if we're in the project root directory
if [ ! -d "web" ]; then
    echo -e "${RED}❌ Error: 'web' directory not found${NC}"
    echo "Please ensure this script is in the Trinity Health project root directory"
    echo "Current directory: $(pwd)"
    ls -la
    exit 1
fi

# Check if .env file exists for FTP credentials
if [ ! -f .env ]; then
    echo -e "${RED}❌ .env file not found${NC}"
    echo "Please create a .env file with your staging server details"
    echo "Copy .env.example to .env and update with your credentials"
    exit 1
fi

# Source environment variables
source .env

# Validate required environment variables
if [ -z "$STAGING_HOST" ] || [ -z "$STAGING_USER" ] || [ -z "$STAGING_PASS" ] || [ -z "$STAGING_PATH" ]; then
    echo -e "${RED}❌ Missing required environment variables${NC}"
    echo "Please ensure your .env file contains:"
    echo "  STAGING_HOST=ftp.object91.co.za"
    echo "  STAGING_USER=dev@object91.co.za" 
    echo "  STAGING_PASS=your-password"
    echo "  STAGING_PATH=/staging.object91.co.za"
    exit 1
fi

echo -e "${YELLOW}📦 Building theme assets...${NC}"
THEME_PATH="$PROJECT_ROOT/$LOCAL_THEME_PATH"
echo "Theme path: $THEME_PATH"
cd "$THEME_PATH"

# Install dependencies if node_modules doesn't exist
if [ ! -d "node_modules" ]; then
    echo "Installing Node.js dependencies..."
    npm install
fi

# Build production assets
npm run build

# Return to project root
cd "$PROJECT_ROOT"

echo -e "${GREEN}✅ Assets built successfully${NC}"

echo -e "${YELLOW}📁 Preparing files for deployment...${NC}"

# Create temporary deployment directory
DEPLOY_TEMP="$PROJECT_ROOT/deploy-temp"
echo "Cleaning and creating deployment directory: $DEPLOY_TEMP"
rm -rf "$DEPLOY_TEMP"
mkdir -p "$DEPLOY_TEMP"

# Verify we have a clean deployment directory
if [ "$(find "$DEPLOY_TEMP" -type f | wc -l | xargs)" -ne 0 ]; then
    echo -e "${RED}❌ Error: Deployment directory is not clean after creation${NC}"
    exit 1
fi

echo "Deployment temp directory: $DEPLOY_TEMP"
echo "Copying from: $PROJECT_ROOT/web/"

# Verify we have WordPress files in web/ directory
if [ ! -f "$PROJECT_ROOT/web/wp-config-sample.php" ] && [ ! -f "$PROJECT_ROOT/web/index.php" ]; then
    echo -e "${RED}❌ Error: WordPress files not found in web/ directory${NC}"
    echo "Expected to find WordPress core files like index.php or wp-config-sample.php"
    exit 1
fi

# Copy ONLY our custom theme and essential WordPress config files
echo "Copying Trinity Health theme and essential files..."
if [ ! -d "$PROJECT_ROOT/web" ]; then
    echo -e "${RED}❌ Error: web/ directory not found at $PROJECT_ROOT/web${NC}"
    exit 1
fi

# Create the basic WordPress structure in deploy temp
mkdir -p "$DEPLOY_TEMP/wp-content/themes"

# Copy our custom theme (built assets only, exclude all development files)
if [ -d "$PROJECT_ROOT/web/wp-content/themes/trinity-health" ]; then
    echo "Copying Trinity Health custom theme..."
    
    # Verify node_modules won't be copied
    if [ -d "$PROJECT_ROOT/web/wp-content/themes/trinity-health/node_modules" ]; then
        echo "Found node_modules in theme - excluding from deployment"
    fi
    
    rsync -av --exclude='node_modules' \
              --exclude='node_modules/*' \
              --exclude='node_modules/**' \
              --exclude='src/' \
              --exclude='package.json' \
              --exclude='package-lock.json' \
              --exclude='webpack.config.js' \
              --exclude='tailwind.config.js' \
              --exclude='postcss.config.js' \
              --exclude='.git/' \
              --exclude='*.log' \
              "$PROJECT_ROOT/web/wp-content/themes/trinity-health/" "$DEPLOY_TEMP/wp-content/themes/trinity-health/"
              
    # Double-check no node_modules was copied
    if [ -d "$DEPLOY_TEMP/wp-content/themes/trinity-health/node_modules" ]; then
        echo -e "${RED}❌ ERROR: node_modules was copied to deployment! Removing...${NC}"
        rm -rf "$DEPLOY_TEMP/wp-content/themes/trinity-health/node_modules"
    fi
else
    echo -e "${RED}❌ Error: Trinity Health theme not found at web/wp-content/themes/trinity-health${NC}"
    exit 1
fi

# Copy WordPress core files from web/ directory only
echo "Copying WordPress core files..."
rsync -av --exclude='wp-content/' \
          --exclude='wp-config.php' \
          --exclude='.htaccess' \
          --exclude='deploy-temp/' \
          --exclude='.git/' \
          --exclude='debug.log' \
          --exclude='.DS_Store' \
          --exclude='.gitignore' \
          "$PROJECT_ROOT/web/" "$DEPLOY_TEMP/"

# Copy plugins directory  
echo "Copying WordPress plugins..."
if [ -d "$PROJECT_ROOT/web/wp-content/plugins" ] && [ "$(ls -A "$PROJECT_ROOT/web/wp-content/plugins" 2>/dev/null)" ]; then
    rsync -av --exclude='node_modules' "$PROJECT_ROOT/web/wp-content/plugins/" "$DEPLOY_TEMP/wp-content/plugins/"
    echo "✅ Plugins copied successfully"
else
    mkdir -p "$DEPLOY_TEMP/wp-content/plugins"
    echo "# Plugin directory - plugins should be managed separately" > "$DEPLOY_TEMP/wp-content/plugins/.gitkeep"
    echo "⚠️ No plugins found to copy"
fi

# Show what's actually being deployed for verification
echo -e "${YELLOW}📋 Files prepared for deployment:${NC}"
echo "Deployment directory structure:"
tree "$DEPLOY_TEMP/" -L 3 2>/dev/null || find "$DEPLOY_TEMP/" -type d | head -20
echo ""
echo "Trinity Health theme contents:"
ls -la "$DEPLOY_TEMP/wp-content/themes/trinity-health/" 2>/dev/null || echo "Theme directory not found"
echo ""
echo "Total deployment size:"
du -sh "$DEPLOY_TEMP/"

# Count files being deployed
TOTAL_FILES=$(find "$DEPLOY_TEMP/" -type f | wc -l | xargs)
echo "Total files: $TOTAL_FILES"

# Verify no unwanted files are included
if [ -d "$DEPLOY_TEMP/node_modules" ]; then
    echo -e "${RED}❌ WARNING: node_modules found in deployment - this shouldn't happen!${NC}"
    exit 1
fi

if [ -f "$DEPLOY_TEMP/package.json" ]; then
    echo -e "${RED}❌ WARNING: package.json found in deployment root - this shouldn't happen!${NC}"
    exit 1
fi

# Check if any development files slipped through
DEV_FILES=$(find "$DEPLOY_TEMP/" -name "package.json" -o -name "node_modules" -o -name ".git" | wc -l | xargs)
if [ "$DEV_FILES" -gt 0 ]; then
    echo -e "${RED}❌ WARNING: $DEV_FILES development files found in deployment!${NC}"
    find "$DEPLOY_TEMP/" -name "package.json" -o -name "node_modules" -o -name ".git"
    exit 1
fi

echo -e "${GREEN}✅ Deployment package verified clean${NC}"

echo -e "${YELLOW}🔧 Creating staging wp-config.php...${NC}"

# Generate wp-config.php for staging environment
cat > "$DEPLOY_TEMP/wp-config.php" << EOF
<?php
/**
 * WordPress Configuration - Staging Environment
 * Generated automatically by deploy-staging.sh
 */

// ** Database settings ** //
define('DB_NAME', '${STAGING_DB_NAME}');
define('DB_USER', '${STAGING_DB_USER}');
define('DB_PASSWORD', '${STAGING_DB_PASS}');
define('DB_HOST', '${STAGING_DB_HOST}');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// ** Site URLs ** //
define('WP_HOME', '${STAGING_SITE_URL}');
define('WP_SITEURL', '${STAGING_SITE_URL}');

// ** WordPress Security Keys ** //
// These should be unique for each environment
define('AUTH_KEY',         'staging-$(openssl rand -hex 16)');
define('SECURE_AUTH_KEY',  'staging-$(openssl rand -hex 16)');
define('LOGGED_IN_KEY',    'staging-$(openssl rand -hex 16)');
define('NONCE_KEY',        'staging-$(openssl rand -hex 16)');
define('AUTH_SALT',        'staging-$(openssl rand -hex 16)');
define('SECURE_AUTH_SALT', 'staging-$(openssl rand -hex 16)');
define('LOGGED_IN_SALT',   'staging-$(openssl rand -hex 16)');
define('NONCE_SALT',       'staging-$(openssl rand -hex 16)');

// ** WordPress Database Table prefix ** //
\$table_prefix = 'wp_';

// ** WordPress Environment ** //
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', true);

// ** Enhanced Debug Logging for Admin Issues ** //
ini_set('log_errors', 1);
ini_set('error_log', \$_SERVER['DOCUMENT_ROOT'] . '/wp-content/debug.log');

// ** Disable file modifications in staging ** //
define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);

// ** SSL Configuration for staging ** //
// Comprehensive SSL detection for shared hosting
if (
    (!empty(\$_SERVER['HTTPS']) && \$_SERVER['HTTPS'] !== 'off') ||
    (!empty(\$_SERVER['HTTP_X_FORWARDED_PROTO']) && \$_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (!empty(\$_SERVER['HTTP_X_FORWARDED_SSL']) && \$_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
    (\$_SERVER['SERVER_PORT'] == 443)
) {
    \$_SERVER['HTTPS'] = 'on';
    define('FORCE_SSL_ADMIN', true);
}

// Force HTTPS URLs in WordPress
define('FORCE_SSL', true);

// ** WordPress Paths ** //
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
EOF

echo -e "${GREEN}✅ Created wp-config.php for staging environment${NC}"

echo -e "${YELLOW}🔧 Creating .htaccess file for SSL and WordPress...${NC}"

# Generate .htaccess file for staging environment
cat > "$DEPLOY_TEMP/.htaccess" << 'EOF'
# Trinity Health Staging - WordPress & SSL Configuration
# Generated automatically by deploy-staging.sh

# Force HTTPS redirect
RewriteEngine On
RewriteCond %{HTTPS} off [OR]
RewriteCond %{HTTP_X_FORWARDED_PROTO} !https
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Security headers
Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options SAMEORIGIN
Header always set X-XSS-Protection "1; mode=block"

# Allow access to WordPress core files and plugins
<Files ~ "\.(css|js|png|jpg|jpeg|gif|ico|svg)$">
    Order allow,deny
    Allow from all
    Require all granted
</Files>

# Allow access to wp-includes and wp-content directories
<Directory "wp-includes">
    Order allow,deny
    Allow from all
    Require all granted
</Directory>

<Directory "wp-content">
    Order allow,deny
    Allow from all
    Require all granted
</Directory>

# WordPress pretty permalinks
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]

# Enable compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>

# Enable browser caching
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 month"
    ExpiresByType image/gif "access plus 1 month"
    ExpiresByType image/png "access plus 1 month"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/pdf "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    ExpiresByType application/x-shockwave-flash "access plus 1 month"
    ExpiresByType image/x-icon "access plus 1 year"
    ExpiresDefault "access plus 2 days"
</IfModule>
EOF

echo -e "${GREEN}✅ Created .htaccess file for staging environment${NC}"

echo -e "${YELLOW}🌐 Deploying to staging server...${NC}"

# FTP deployment using lftp
echo "Deploying from: $DEPLOY_TEMP"
echo "Deploying to: $STAGING_HOST:$STAGING_PATH"

# Verify deploy temp directory exists and has content
if [ ! -d "$DEPLOY_TEMP" ]; then
    echo -e "${RED}❌ Error: Deploy temp directory not found at $DEPLOY_TEMP${NC}"
    exit 1
fi

echo "Contents of deploy directory before upload:"
find "$DEPLOY_TEMP" -maxdepth 2 -type f | head -10

# Verify we're in the correct deployment directory
if [ ! -d "$DEPLOY_TEMP" ]; then
    echo -e "${RED}❌ Error: Deploy temp directory not found at $DEPLOY_TEMP${NC}"
    exit 1
fi

# Change to deployment directory and run lftp from there
cd "$DEPLOY_TEMP"
echo "Current directory: $(pwd)"
echo "Local files to upload (first 5):"
find . -maxdepth 1 -type f | head -5

# Verify we're NOT in the project root (safety check)
if [ "$(pwd)" = "$PROJECT_ROOT" ]; then
    echo -e "${RED}❌ SAFETY CHECK FAILED: Still in project root directory!${NC}"
    echo -e "${RED}This would upload all project files. Aborting deployment.${NC}"
    exit 1
fi

# Verify we have WordPress files in current directory
if [ ! -f "index.php" ] || [ ! -d "wp-admin" ] || [ ! -d "wp-includes" ]; then
    echo -e "${RED}❌ Error: WordPress core files not found in deploy directory${NC}"
    echo "Current directory: $(pwd)"
    echo "Contents:"
    ls -la
    exit 1
fi

echo -e "${GREEN}✅ Safety checks passed - deploying WordPress files only${NC}"

echo -e "${YELLOW}🔧 Fixing WordPress directory permissions...${NC}"

# Fix WordPress core directory permissions after deployment
lftp -c "
set ftp:ssl-allow no;
open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST:${STAGING_PORT:-21};
cd $STAGING_PATH;
echo 'Setting WordPress core file permissions...';
chmod -R 644 wp-admin wp-includes;
chmod 755 wp-admin wp-includes;
chmod -R 755 wp-admin wp-includes 2>/dev/null || echo 'Directory permissions set via alternative method';
"

if [ "$FRESH_DEPLOY" = true ]; then
    echo -e "${YELLOW}🔥 Performing FRESH deployment - removing existing files first${NC}"
    
    # Fresh deployment: Remove WordPress core directories first, then upload
    lftp -c "
    set ftp:ssl-allow no;
    open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST:${STAGING_PORT:-21};
    cd $STAGING_PATH;
    pwd;
    echo 'Removing existing WordPress core files for fresh deployment...';
    rm -rf wp-admin;
    rm -rf wp-includes;
    rm -f wp-*.php;
    rm -f index.php;
    rm -f xmlrpc.php;
    rm -f license.txt;
    rm -f readme.html;
    echo 'Uploading fresh WordPress files...';
    mirror --reverse --verbose --exclude-glob=.htaccess .;
    echo 'Fresh deployment completed';
    "
else
    echo -e "${GREEN}📦 Performing standard deployment - syncing changes${NC}"
    
    # Standard deployment: Sync changes only
    lftp -c "
    set ftp:ssl-allow no;
    open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST:${STAGING_PORT:-21};
    cd $STAGING_PATH;
    pwd;
    mirror --reverse --delete --verbose --exclude-glob=.htaccess .
    "
fi

# Return to project root
cd "$PROJECT_ROOT"

echo -e "${YELLOW}📸 Deploying uploads folder...${NC}"

# Deploy uploads folder separately (without --delete to preserve existing uploads)
UPLOADS_FULL_PATH="$PROJECT_ROOT/$UPLOADS_PATH"
if [ -d "$UPLOADS_FULL_PATH" ] && [ "$(ls -A "$UPLOADS_FULL_PATH" 2>/dev/null)" ]; then
    echo "Uploading media from: $UPLOADS_FULL_PATH"
    lftp -c "
    set ftp:ssl-allow no;
    open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST:${STAGING_PORT:-21};
    lcd '$UPLOADS_FULL_PATH';
    mkdir -p $STAGING_PATH/wp-content/uploads;
    cd $STAGING_PATH/wp-content/uploads;
    mirror --reverse --verbose --only-newer;
    echo 'Fixing file permissions for web accessibility...';
    chmod -R 644 .;
    chmod -R 755 . 2>/dev/null || echo 'Upload directory permissions set';
    "
else
    echo -e "${YELLOW}⚠️  Uploads folder not found or empty at $UPLOADS_FULL_PATH, skipping...${NC}"
fi

# Cleanup
echo -e "${YELLOW}🧹 Cleaning up...${NC}"
rm -rf "$DEPLOY_TEMP"

echo -e "${GREEN}✅ Deployment completed successfully!${NC}"

# Construct the site URL based on staging path
SITE_URL="https://staging.object91.co.za"
echo -e "${GREEN}🎉 Your site should be live at: $SITE_URL${NC}"

# Optional: Run a quick health check
echo -e "${YELLOW}🔍 Running health check...${NC}"
if curl -s --head --max-time 10 "$SITE_URL" | head -n 1 | grep -q -E "(200|301|302)"; then
    echo -e "${GREEN}✅ Site is responding correctly${NC}"
else
    echo -e "${YELLOW}⚠️  Site health check inconclusive - please verify manually at: $SITE_URL${NC}"
fi