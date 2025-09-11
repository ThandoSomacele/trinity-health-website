#!/bin/bash

# Trinity Health - Full Staging Deployment
# Deploys WordPress core files and theme to staging

set -e

echo -e "\033[0;32m🚀 Trinity Health - Full Staging Deployment\033[0m"
echo "====================================="

PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
WP_ROOT="$PROJECT_ROOT/web"
THEME_DIR="$WP_ROOT/wp-content/themes/trinity-health-theme"

# FTP credentials
FTP_USER="dev@object91.co.za"
FTP_PASS="Jhqj4tkKS1PXUp"
FTP_HOST="ftp.object91.co.za"

echo "Project root: $PROJECT_ROOT"
echo "WordPress root: $WP_ROOT"
echo "Theme directory: $THEME_DIR"

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
echo -e "\033[1;33m🌐 Deploying WordPress core files to staging...\033[0m"
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
open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
cd /public_html
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
echo -e "\033[1;33m🎨 Deploying theme to staging...\033[0m"
cd "$THEME_DIR"

lftp -c "
set ssl:verify-certificate no
set ftp:ssl-allow yes
set ftp:ssl-force true
set ftp:ssl-protect-data true
set net:timeout 30
set net:max-retries 3
open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
cd /public_html/wp-content/themes/trinity-health-theme
mirror -R --verbose --parallel=3 --exclude node_modules/ --exclude .git/ --exclude .DS_Store . .
bye
" || {
    echo -e "\033[33m⚠ Some theme files may have failed to upload. Continuing...\033[0m"
}

# Create/update .htaccess for WordPress
echo -e "\033[1;33m📝 Creating .htaccess file...\033[0m"
cat > /tmp/staging-htaccess << 'EOF'
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
</IfModule>

# Prevent directory browsing
Options -Indexes

# Protect wp-config
<files wp-config.php>
order allow,deny
deny from all
</files>
EOF

lftp -c "
set ssl:verify-certificate no
set ftp:ssl-allow yes
set ftp:ssl-force true
set ftp:ssl-protect-data true
open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
cd /public_html
put /tmp/staging-htaccess -o .htaccess
bye
" || {
    echo -e "\033[33m⚠ Failed to upload .htaccess\033[0m"
}

echo -e "\033[1;33m🔍 Verifying deployment...\033[0m"

# Test various endpoints
endpoints=(
    "https://staging.object91.co.za/"
    "https://staging.object91.co.za/wp-login.php"
    "https://staging.object91.co.za/wp-includes/js/jquery/jquery.min.js"
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
echo -e "✅ Full Deployment Complete!"
echo -e "========================================\033[0m"
echo ""
echo "Site URL: https://staging.object91.co.za"
echo "Admin URL: https://staging.object91.co.za/wp-admin/"
echo ""
echo -e "\033[1;33mNext steps:\033[0m"
echo "1. Clear your browser cache"
echo "2. Test the site functionality"
echo "3. If wp-admin still redirects, check server configuration"
echo ""
echo -e "\033[1;33mIf issues persist:\033[0m"
echo "- Check PHP error logs on server"
echo "- Verify database connection settings"
echo "- Ensure SSL certificates are properly configured"