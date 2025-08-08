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

echo -e "${GREEN}🚀 Trinity Health - Staging Deployment${NC}"
echo "=================================="

# Check if .env file exists for FTP credentials
if [ ! -f .env ]; then
    echo -e "${RED}❌ .env file not found${NC}"
    echo "Please create a .env file with:"
    echo "STAGING_HOST=your-staging-server.com"
    echo "STAGING_USER=your-ftp-username"
    echo "STAGING_PASS=your-ftp-password"
    exit 1
fi

# Source environment variables
source .env

echo -e "${YELLOW}📦 Building theme assets...${NC}"
cd $LOCAL_THEME_PATH

# Install dependencies if node_modules doesn't exist
if [ ! -d "node_modules" ]; then
    echo "Installing Node.js dependencies..."
    npm install
fi

# Build production assets
npm run build

cd ../../..

echo -e "${GREEN}✅ Assets built successfully${NC}"

echo -e "${YELLOW}📁 Preparing files for deployment...${NC}"

# Create temporary deployment directory
DEPLOY_TEMP="deploy-temp"
rm -rf $DEPLOY_TEMP
mkdir -p $DEPLOY_TEMP

# Copy WordPress core files (excluding uploads and cache)
echo "Copying WordPress files..."
rsync -av --exclude='wp-content/uploads/' \
          --exclude='wp-content/cache/' \
          --exclude='wp-content/upgrade/' \
          --exclude='wp-content/upgrade-temp-backup/' \
          --exclude='node_modules/' \
          --exclude='.git/' \
          --exclude='debug.log' \
          web/ $DEPLOY_TEMP/

echo -e "${YELLOW}🌐 Deploying to staging server...${NC}"

# FTP deployment using lftp
lftp -c "
set ftp:ssl-allow no;
open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST;
lcd $DEPLOY_TEMP;
cd $STAGING_PATH;
mirror --reverse --delete --verbose --exclude-glob=wp-config.php --exclude-glob=.htaccess
"

echo -e "${YELLOW}📸 Deploying uploads folder...${NC}"

# Deploy uploads folder separately (without --delete to preserve existing uploads)
if [ -d "$UPLOADS_PATH" ]; then
    lftp -c "
    set ftp:ssl-allow no;
    open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST;
    lcd $UPLOADS_PATH;
    cd $STAGING_PATH/wp-content/uploads;
    mirror --reverse --verbose
    "
else
    echo -e "${YELLOW}⚠️  Uploads folder not found, skipping...${NC}"
fi

# Cleanup
echo -e "${YELLOW}🧹 Cleaning up...${NC}"
rm -rf $DEPLOY_TEMP

echo -e "${GREEN}✅ Deployment completed successfully!${NC}"
echo -e "${GREEN}🎉 Your site is now live at: https://$STAGING_HOST${NC}"

# Optional: Run a quick health check
echo -e "${YELLOW}🔍 Running health check...${NC}"
if curl -s --head "$STAGING_HOST" | head -n 1 | grep -q "200 OK"; then
    echo -e "${GREEN}✅ Site is responding correctly${NC}"
else
    echo -e "${YELLOW}⚠️  Site health check failed - please verify manually${NC}"
fi