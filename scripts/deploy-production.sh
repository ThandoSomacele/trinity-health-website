#!/bin/bash

# Trinity Health - Production Deployment Script
# Deploys WordPress core files and theme to production

set -e

echo -e "\033[0;32m🚀 Trinity Health - Production Deployment\033[0m"
echo "====================================="

PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
WP_ROOT="$PROJECT_ROOT/web"
THEME_DIR="$WP_ROOT/wp-content/themes/trinity-health-theme"

# Load environment variables
if [ ! -f ".env" ]; then
    echo -e "\033[31m❌ .env file not found\033[0m"
    echo "Please create .env file with deployment configuration"
    exit 1
fi

source .env

# Validate required environment variables
if [ -z "$PRODUCTION_HOST" ] || [ -z "$PRODUCTION_USER" ] || [ -z "$PRODUCTION_PASS" ] || [ -z "$PRODUCTION_PATH" ]; then
    echo -e "\033[31m❌ Missing required environment variables\033[0m"
    echo "Required: PRODUCTION_HOST, PRODUCTION_USER, PRODUCTION_PASS, PRODUCTION_PATH"
    exit 1
fi

echo "Project root: $PROJECT_ROOT"
echo "WordPress root: $WP_ROOT"
echo "Theme directory: $THEME_DIR"
echo "Production path: $PRODUCTION_PATH"

# Confirm production deployment
echo -e "\033[1;33m⚠️  WARNING: This will deploy to PRODUCTION!\033[0m"
read -p "Are you sure you want to deploy to production? (yes/no): " -r
if [[ ! $REPLY =~ ^[Yy][Ee][Ss]$ ]]; then
    echo "Deployment cancelled"
    exit 0
fi

# Build theme assets first
echo -e "\033[1;33m📦 Building theme assets...\033[0m"
cd "$THEME_DIR"
npm run build

if [ $? -eq 0 ]; then
    echo -e "\033[0;32m✅ Assets built successfully\033[0m"
else
    echo -e "\033[31m❌ Failed to build assets\033[0m"
    exit 1
fi

cd "$WP_ROOT"

# Deploy WordPress core files
echo -e "\033[1;33m🌐 Deploying WordPress core files to production...\033[0m"
echo "This will deploy:"
echo "  - wp-admin/ directory"
echo "  - wp-includes/ directory"
echo "  - Core PHP files (wp-*.php)"
echo "  - index.php"

# Use lftp to mirror WordPress core files
lftp -c "
set ssl:verify-certificate no
set ftp:ssl-allow yes
set ftp:ssl-force true
set ftp:ssl-protect-data true
set net:timeout 60
set net:max-retries 3
set mirror:parallel-transfer-count 3
open ftp://$PRODUCTION_USER:$PRODUCTION_PASS@$PRODUCTION_HOST
cd $PRODUCTION_PATH
lcd $WP_ROOT
mirror -R --verbose --parallel=3 wp-admin wp-admin
mirror -R --verbose --parallel=3 wp-includes wp-includes
put index.php
put wp-activate.php
put wp-blog-header.php
put wp-comments-post.php
put wp-cron.php
put wp-links-opml.php
put wp-load.php
put wp-login.php
put wp-mail.php
put wp-settings.php
put wp-signup.php
put wp-trackback.php
put xmlrpc.php
bye
" || {
    echo -e "\033[33m⚠ Some files may have failed to upload. Continuing...\033[0m"
}

# Deploy theme
echo -e "\033[1;33m🎨 Deploying theme to production...\033[0m"
cd "$THEME_DIR"

lftp -c "
set ssl:verify-certificate no
set ftp:ssl-allow yes
set ftp:ssl-force true
set ftp:ssl-protect-data true
set net:timeout 30
set net:max-retries 3
open ftp://$PRODUCTION_USER:$PRODUCTION_PASS@$PRODUCTION_HOST
cd $PRODUCTION_PATH/wp-content/themes/trinity-health-theme
mirror -R --verbose --parallel=3 --exclude node_modules/ --exclude .git/ --exclude .DS_Store . .
bye
" || {
    echo -e "\033[33m⚠ Some theme files may have failed to upload. Continuing...\033[0m"
}

# Create/update .htaccess for WordPress
echo -e "\033[1;33m📝 Creating .htaccess file...\033[0m"
cat > /tmp/production-htaccess << 'EOF'
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress

# Security headers
<IfModule mod_headers.c>
Header set X-Content-Type-Options "nosniff"
Header set X-Frame-Options "SAMEORIGIN"
Header set X-XSS-Protection "1; mode=block"
Header set Strict-Transport-Security "max-age=31536000; includeSubDomains"
</IfModule>

# Prevent directory browsing
Options -Indexes

# Protect wp-config
<files wp-config.php>
order allow,deny
deny from all
</files>

# Disable XML-RPC
<Files xmlrpc.php>
order deny,allow
deny from all
</Files>
EOF

lftp -c "
set ssl:verify-certificate no
set ftp:ssl-allow yes
set ftp:ssl-force true
set ftp:ssl-protect-data true
open ftp://$PRODUCTION_USER:$PRODUCTION_PASS@$PRODUCTION_HOST
cd $PRODUCTION_PATH
put /tmp/production-htaccess -o .htaccess
bye
" || {
    echo -e "\033[33m⚠ Failed to upload .htaccess\033[0m"
}

echo -e "\033[1;33m🔍 Verifying deployment...\033[0m"

# Test various endpoints
PRODUCTION_URL=${PRODUCTION_URL:-https://trinityhealth.co.zm}
endpoints=(
    "$PRODUCTION_URL/"
    "$PRODUCTION_URL/wp-login.php"
    "$PRODUCTION_URL/wp-includes/js/jquery/jquery.min.js"
)

for url in "${endpoints[@]}"; do
    response=$(curl -s -o /dev/null -w "%{http_code}" "$url")
    if [ "$response" -eq 200 ] || [ "$response" -eq 301 ] || [ "$response" -eq 302 ]; then
        echo -e "\033[0;32m✅ $url - HTTP $response\033[0m"
    else
        echo -e "\033[31m❌ $url - HTTP $response\033[0m"
    fi
done

echo -e "\033[0;32m========================================"
echo -e "✅ Production Deployment Complete!"
echo -e "========================================\033[0m"
echo ""
echo "Site URL: $PRODUCTION_URL"
echo "Admin URL: $PRODUCTION_URL/wp-admin/"
echo ""
echo -e "\033[1;33mPost-deployment checklist:\033[0m"
echo "1. Clear all caches"
echo "2. Test critical functionality"
echo "3. Monitor error logs"
echo "4. Verify SSL certificate"
echo "5. Check database connectivity"
echo ""
echo -e "\033[1;31mIMPORTANT:\033[0m"
echo "- Monitor the site closely for the next hour"
echo "- Have a rollback plan ready"
echo "- Keep backups accessible"