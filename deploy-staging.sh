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
rm -rf "$DEPLOY_TEMP"
mkdir -p "$DEPLOY_TEMP"

echo "Deployment temp directory: $DEPLOY_TEMP"
echo "Copying from: $PROJECT_ROOT/web/"

# Verify we have WordPress files in web/ directory
if [ ! -f "$PROJECT_ROOT/web/wp-config-sample.php" ] && [ ! -f "$PROJECT_ROOT/web/index.php" ]; then
    echo -e "${RED}❌ Error: WordPress files not found in web/ directory${NC}"
    echo "Expected to find WordPress core files like index.php or wp-config-sample.php"
    exit 1
fi

# Copy ONLY WordPress files from web/ directory
echo "Copying WordPress files from web/ directory..."
if [ ! -d "$PROJECT_ROOT/web" ]; then
    echo -e "${RED}❌ Error: web/ directory not found at $PROJECT_ROOT/web${NC}"
    exit 1
fi

rsync -av --exclude='wp-content/uploads/' \
          --exclude='wp-content/cache/' \
          --exclude='wp-content/upgrade/' \
          --exclude='wp-content/upgrade-temp-backup/' \
          --exclude='wp-content/themes/*/node_modules/' \
          --exclude='wp-content/themes/*/src/' \
          --exclude='wp-content/themes/*/package.json' \
          --exclude='wp-content/themes/*/package-lock.json' \
          --exclude='wp-content/themes/*/webpack.config.js' \
          --exclude='wp-content/themes/*/tailwind.config.js' \
          --exclude='node_modules/' \
          --exclude='.git/' \
          --exclude='debug.log' \
          "$PROJECT_ROOT/web/" "$DEPLOY_TEMP/"

# Show what's actually being deployed for verification
echo -e "${YELLOW}📋 Files prepared for deployment:${NC}"
echo "Deployment directory contents:"
ls -la "$DEPLOY_TEMP/"
echo ""
echo "Total deployment size:"
du -sh "$DEPLOY_TEMP/"

# Verify no unwanted files are included
if [ -d "$DEPLOY_TEMP/node_modules" ]; then
    echo -e "${RED}❌ WARNING: node_modules found in deployment - this shouldn't happen!${NC}"
    exit 1
fi

if [ -f "$DEPLOY_TEMP/package.json" ]; then
    echo -e "${RED}❌ WARNING: package.json found in deployment - this shouldn't happen!${NC}"
    exit 1
fi

echo -e "${YELLOW}🌐 Deploying to staging server...${NC}"

# FTP deployment using lftp
echo "Deploying from: $DEPLOY_TEMP"
echo "Deploying to: $STAGING_HOST:$STAGING_PATH"
lftp -c "
set ftp:ssl-allow no;
set ftp:port ${STAGING_PORT:-21};
open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST;
lcd $DEPLOY_TEMP;
cd $STAGING_PATH;
mirror --reverse --delete --verbose --exclude-glob=wp-config.php --exclude-glob=.htaccess
"

echo -e "${YELLOW}📸 Deploying uploads folder...${NC}"

# Deploy uploads folder separately (without --delete to preserve existing uploads)
UPLOADS_FULL_PATH="$PROJECT_ROOT/$UPLOADS_PATH"
if [ -d "$UPLOADS_FULL_PATH" ]; then
    echo "Uploading media from: $UPLOADS_FULL_PATH"
    lftp -c "
    set ftp:ssl-allow no;
    set ftp:port ${STAGING_PORT:-21};
    open ftp://$STAGING_USER:$STAGING_PASS@$STAGING_HOST;
    lcd $UPLOADS_FULL_PATH;
    cd $STAGING_PATH/wp-content/uploads;
    mirror --reverse --verbose
    "
else
    echo -e "${YELLOW}⚠️  Uploads folder not found at $UPLOADS_FULL_PATH, skipping...${NC}"
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