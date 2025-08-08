#!/bin/bash

# Trinity Health - Staging Deployment Script (RSYNC/SFTP Version)
# This script builds assets and deploys to staging server via RSYNC over SSH

set -e  # Exit on any error

# Configuration - Update these with your staging server details
STAGING_HOST="your-staging-server.com"
STAGING_USER="your-ssh-username"
STAGING_PATH="/var/www/html"  # Remote path on staging server
STAGING_PORT="22"  # SSH port (usually 22)
LOCAL_THEME_PATH="web/wp-content/themes/trinity-health"
UPLOADS_PATH="web/wp-content/uploads"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}🚀 Trinity Health - Staging Deployment (RSYNC)${NC}"
echo "============================================="

# Check if .env file exists for SSH credentials
if [ ! -f .env ]; then
    echo -e "${RED}❌ .env file not found${NC}"
    echo "Please create a .env file with:"
    echo "STAGING_HOST=your-staging-server.com"
    echo "STAGING_USER=your-ssh-username"
    echo "STAGING_PATH=/var/www/html"
    echo "STAGING_PORT=22"
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

echo -e "${YELLOW}🌐 Deploying WordPress files to staging server...${NC}"

# Deploy WordPress files (excluding uploads, cache, and development files)
rsync -avz --delete \
    --exclude='wp-content/uploads/' \
    --exclude='wp-content/cache/' \
    --exclude='wp-content/upgrade/' \
    --exclude='wp-content/upgrade-temp-backup/' \
    --exclude='wp-content/themes/trinity-health/node_modules/' \
    --exclude='wp-content/themes/trinity-health/assets/css/src/' \
    --exclude='wp-content/themes/trinity-health/assets/js/src/' \
    --exclude='wp-content/themes/trinity-health/package*.json' \
    --exclude='wp-content/themes/trinity-health/webpack.config.js' \
    --exclude='wp-content/themes/trinity-health/tailwind.config.js' \
    --exclude='.git/' \
    --exclude='debug.log' \
    --exclude='wp-config.php' \
    --exclude='.htaccess' \
    -e "ssh -p $STAGING_PORT" \
    web/ $STAGING_USER@$STAGING_HOST:$STAGING_PATH/

echo -e "${YELLOW}📸 Syncing uploads folder...${NC}"

# Sync uploads folder (without --delete to preserve existing uploads)
if [ -d "$UPLOADS_PATH" ]; then
    rsync -avz \
        -e "ssh -p $STAGING_PORT" \
        $UPLOADS_PATH/ $STAGING_USER@$STAGING_HOST:$STAGING_PATH/wp-content/uploads/
else
    echo -e "${YELLOW}⚠️  Uploads folder not found, skipping...${NC}"
fi

echo -e "${GREEN}✅ Deployment completed successfully!${NC}"
echo -e "${GREEN}🎉 Your site is now live at: https://$STAGING_HOST${NC}"

# Optional: Run a quick health check
echo -e "${YELLOW}🔍 Running health check...${NC}"
if curl -s --head "https://$STAGING_HOST" | head -n 1 | grep -q "200\|301\|302"; then
    echo -e "${GREEN}✅ Site is responding correctly${NC}"
else
    echo -e "${YELLOW}⚠️  Site health check failed - please verify manually${NC}"
fi

# Optional: Set proper file permissions on staging server
echo -e "${YELLOW}🔧 Setting file permissions...${NC}"
ssh -p $STAGING_PORT $STAGING_USER@$STAGING_HOST "
    find $STAGING_PATH -type d -exec chmod 755 {} \;
    find $STAGING_PATH -type f -exec chmod 644 {} \;
    chmod 644 $STAGING_PATH/wp-config.php
"

echo -e "${GREEN}✅ File permissions set successfully${NC}"