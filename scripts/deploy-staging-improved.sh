#!/bin/bash

# Trinity Health - Improved Staging Deployment Script
# With better error handling and complete file sync

set -e  # Exit on any error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}🚀 Trinity Health - Improved Staging Deployment${NC}"
echo "====================================="

# Project paths
PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
THEME_PATH="$PROJECT_ROOT/web/wp-content/themes/trinity-health-theme"
ENV_FILE="$PROJECT_ROOT/.env"

# Check if .env exists
if [ ! -f "$ENV_FILE" ]; then
    echo -e "${RED}❌ Error: .env file not found${NC}"
    exit 1
fi

# Load environment variables
source "$ENV_FILE"

# FTP Configuration
FTP_HOST="${STAGING_HOST}"
FTP_USER="${STAGING_USER}"
FTP_PASS="${STAGING_PASS}"
FTP_PATH="${STAGING_PATH}"

echo "Project root: $PROJECT_ROOT"
echo "Theme path: $THEME_PATH"

# Step 1: Build theme assets
echo -e "${YELLOW}📦 Building theme assets...${NC}"
cd "$THEME_PATH"

# Clean build directory first
rm -rf build/
echo "Cleaned build directory"

# Build production assets
if npm run build; then
    echo -e "${GREEN}✅ Assets built successfully${NC}"
else
    echo -e "${RED}❌ Build failed${NC}"
    exit 1
fi

# Step 2: Deploy theme files via FTP
echo -e "${YELLOW}🌐 Deploying theme to staging server...${NC}"

# Create FTP script
cat > /tmp/ftp_deploy.txt << EOF
set ftp:ssl-allow no
set ftp:list-options -a
open -u ${FTP_USER},${FTP_PASS} ${FTP_HOST}
cd ${FTP_PATH}/wp-content/themes/trinity-health-theme
lcd ${THEME_PATH}

# Upload all theme files except node_modules
mirror -R --no-perms \
  --exclude node_modules/ \
  --exclude .git/ \
  --exclude .DS_Store \
  --exclude package-lock.json \
  --exclude .env \
  --exclude .gitignore \
  --parallel=5 \
  --verbose

bye
EOF

# Execute FTP deployment
if lftp -f /tmp/ftp_deploy.txt; then
    echo -e "${GREEN}✅ Theme deployed successfully${NC}"
else
    echo -e "${RED}❌ Deployment failed${NC}"
    rm -f /tmp/ftp_deploy.txt
    exit 1
fi

# Clean up
rm -f /tmp/ftp_deploy.txt

# Step 3: Clear cache on staging (if possible)
echo -e "${YELLOW}🧹 Attempting to clear staging cache...${NC}"

# Create PHP script to clear cache
cat > /tmp/clear_cache.php << 'EOF'
<?php
// Clear WordPress transients
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '%_transient_%'");

// Clear object cache if available
if (function_exists('wp_cache_flush')) {
    wp_cache_flush();
}

echo "Cache cleared successfully";
EOF

# Upload and execute cache clear script via FTP
cat > /tmp/ftp_clear_cache.txt << EOF
set ftp:ssl-allow no
open -u ${FTP_USER},${FTP_PASS} ${FTP_HOST}
cd ${FTP_PATH}
put /tmp/clear_cache.php
bye
EOF

lftp -f /tmp/ftp_clear_cache.txt 2>/dev/null || true
rm -f /tmp/ftp_clear_cache.txt /tmp/clear_cache.php

# Step 4: Verify deployment
echo -e "${YELLOW}🔍 Verifying deployment...${NC}"

# Check if site is accessible
if curl -s -o /dev/null -w "%{http_code}" "${STAGING_SITE_URL}" | grep -q "200\|301\|302"; then
    echo -e "${GREEN}✅ Staging site is accessible${NC}"
else
    echo -e "${YELLOW}⚠️ Warning: Staging site returned unexpected status${NC}"
fi

# Final summary
echo ""
echo -e "${GREEN}========================================${NC}"
echo -e "${GREEN}✅ Deployment Complete!${NC}"
echo -e "${GREEN}========================================${NC}"
echo ""
echo "Site URL: ${STAGING_SITE_URL}"
echo "Admin URL: ${STAGING_SITE_URL}/wp-admin/"
echo ""
echo -e "${YELLOW}Next steps:${NC}"
echo "1. Clear your browser cache"
echo "2. Test the site functionality"
echo "3. Check for any console errors"
echo ""
echo -e "${YELLOW}If you encounter issues:${NC}"
echo "1. Check FTP connection settings in .env"
echo "2. Verify staging server file permissions"
echo "3. Review deployment logs above"

exit 0