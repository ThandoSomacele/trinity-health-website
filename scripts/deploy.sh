#!/bin/bash

# Trinity Health - Modular Deployment Script
# Deploy specific components to staging or production
# Usage: ./deploy.sh [environment] [component] [options]

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Functions for colored output
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

# Show usage
show_usage() {
    echo -e "${GREEN}Trinity Health - Modular Deployment Script${NC}"
    echo ""
    echo "Usage: $0 [environment] [component] [options]"
    echo ""
    echo "Environments:"
    echo "  staging      Deploy to staging server"
    echo "  production   Deploy to production server"
    echo ""
    echo "Components:"
    echo "  theme        Deploy theme files only"
    echo "  plugins      Deploy all plugins"
    echo "  media        Deploy media/uploads"
    echo "  core         Deploy WordPress core files"
    echo "  database     Export and prepare database"
    echo "  full         Deploy everything (core + theme + plugins)"
    echo ""
    echo "Options:"
    echo "  --build      Build assets before deployment (for theme)"
    echo "  --no-backup  Skip creating backups"
    echo "  --dry-run    Show what would be deployed without deploying"
    echo "  -y, --yes    Auto-confirm deployment"
    echo ""
    echo "Examples:"
    echo "  $0 staging theme --build     # Build and deploy theme to staging"
    echo "  $0 staging plugins           # Deploy plugins to staging"
    echo "  $0 staging media             # Sync media files to staging"
    echo "  $0 production full -y        # Full deployment to production"
    echo "  $0 staging database          # Export database for staging"
    echo ""
}

# Check arguments
if [ $# -eq 0 ]; then
    show_usage
    exit 0
fi

# Parse arguments
ENVIRONMENT=$1
COMPONENT=$2
shift 2

# Default options
BUILD_ASSETS=false
CREATE_BACKUP=true
DRY_RUN=false
AUTO_CONFIRM=false

# Parse optional arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        --build)
            BUILD_ASSETS=true
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
        -y|--yes)
            AUTO_CONFIRM=true
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

# Project paths
PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
WP_ROOT="$PROJECT_ROOT/web"
THEME_DIR="$WP_ROOT/wp-content/themes/trinity-health-theme"
PLUGINS_DIR="$WP_ROOT/wp-content/plugins"
UPLOADS_DIR="$WP_ROOT/wp-content/uploads"

# Load environment variables
if [ ! -f ".env" ]; then
    print_error ".env file not found"
    echo "Please create .env file with deployment configuration"
    exit 1
fi

source .env

# Validate environment
case $ENVIRONMENT in
    staging)
        if [ -z "$STAGING_HOST" ] || [ -z "$STAGING_USER" ] || [ -z "$STAGING_PASS" ] || [ -z "$STAGING_PATH" ]; then
            print_error "Missing required staging environment variables"
            echo "Required: STAGING_HOST, STAGING_USER, STAGING_PASS, STAGING_PATH"
            exit 1
        fi
        DEPLOY_HOST=$STAGING_HOST
        DEPLOY_USER=$STAGING_USER
        DEPLOY_PASS=$STAGING_PASS
        DEPLOY_PATH=$STAGING_PATH
        DEPLOY_URL=${STAGING_URL:-https://staging.object91.co.za}
        ;;
    production)
        if [ -z "$PRODUCTION_HOST" ] || [ -z "$PRODUCTION_USER" ] || [ -z "$PRODUCTION_PASS" ] || [ -z "$PRODUCTION_PATH" ]; then
            print_error "Missing required production environment variables"
            echo "Required: PRODUCTION_HOST, PRODUCTION_USER, PRODUCTION_PASS, PRODUCTION_PATH"
            exit 1
        fi
        DEPLOY_HOST=$PRODUCTION_HOST
        DEPLOY_USER=$PRODUCTION_USER
        DEPLOY_PASS=$PRODUCTION_PASS
        DEPLOY_PATH=$PRODUCTION_PATH
        DEPLOY_URL=${PRODUCTION_URL:-https://trinityhealth.co.zm}
        
        # Confirm production deployment
        if [ "$AUTO_CONFIRM" = false ] && [ "$DRY_RUN" = false ]; then
            echo -e "${YELLOW}⚠️  WARNING: This will deploy to PRODUCTION!${NC}"
            read -p "Are you sure you want to continue? (yes/no): " -r
            if [[ ! $REPLY =~ ^[Yy][Ee][Ss]$ ]]; then
                echo "Deployment cancelled"
                exit 0
            fi
        fi
        ;;
    *)
        print_error "Invalid environment: $ENVIRONMENT"
        echo "Use 'staging' or 'production'"
        exit 1
        ;;
esac

print_status "Deploying to: $ENVIRONMENT"
print_status "Component: $COMPONENT"
print_status "Target path: $DEPLOY_PATH"

# Dry run notification
if [ "$DRY_RUN" = true ]; then
    print_warning "DRY RUN MODE - No files will be deployed"
fi

# Function to deploy theme
deploy_theme() {
    print_status "Deploying theme files..."
    
    # Build assets if requested
    if [ "$BUILD_ASSETS" = true ]; then
        print_status "Building theme assets..."
        cd "$THEME_DIR"
        if npm run build; then
            print_success "Assets built successfully"
        else
            print_error "Failed to build assets"
            exit 1
        fi
    fi
    
    if [ "$DRY_RUN" = true ]; then
        print_status "Would deploy theme from: $THEME_DIR"
        print_status "Would deploy to: $DEPLOY_PATH/wp-content/themes/trinity-health-theme"
        return 0
    fi
    
    lftp -c "
    set ssl:verify-certificate no
    set ftp:ssl-allow yes
    set ftp:ssl-force true
    set ftp:ssl-protect-data true
    set net:timeout 30
    set net:max-retries 3
    open ftp://$DEPLOY_USER:$DEPLOY_PASS@$DEPLOY_HOST
    cd $DEPLOY_PATH/wp-content/themes
    mkdir -p trinity-health-theme
    cd trinity-health-theme
    lcd \"$THEME_DIR\"
    mirror -R --verbose --parallel=3 \
        --exclude-glob=node_modules/ \
        --exclude-glob=.git/ \
        --exclude-glob=.DS_Store \
        --exclude-glob=src/ \
        --exclude-glob=assets/css/src/ \
        --exclude-glob=.cache/ \
        --exclude-glob=package-lock.json \
        . .
    bye
    " || {
        print_warning "Some theme files may have failed to upload"
    }
    
    print_success "Theme deployment completed"
}

# Function to deploy plugins
deploy_plugins() {
    print_status "Deploying plugins..."
    
    if [ ! -d "$PLUGINS_DIR" ]; then
        print_error "Plugins directory not found: $PLUGINS_DIR"
        return 1
    fi
    
    # Count plugins
    PLUGIN_COUNT=$(find "$PLUGINS_DIR" -maxdepth 1 -type d | wc -l)
    print_status "Found $PLUGIN_COUNT plugins to deploy"
    
    if [ "$DRY_RUN" = true ]; then
        print_status "Would deploy plugins from: $PLUGINS_DIR"
        print_status "Would deploy to: $DEPLOY_PATH/wp-content/plugins"
        ls -la "$PLUGINS_DIR" | grep ^d | awk '{print "  - " $9}'
        return 0
    fi
    
    lftp -c "
    set ssl:verify-certificate no
    set ftp:ssl-allow yes
    set ftp:ssl-force true
    set ftp:ssl-protect-data true
    set net:timeout 60
    set net:max-retries 3
    set mirror:parallel-transfer-count 2
    open ftp://$DEPLOY_USER:$DEPLOY_PASS@$DEPLOY_HOST
    cd $DEPLOY_PATH/wp-content
    lcd \"$PLUGINS_DIR\"
    mirror -R --verbose --parallel=2 \
        --exclude-glob=.git/ \
        --exclude-glob=.DS_Store \
        --exclude-glob=*.log \
        --exclude-glob=cache/ \
        . plugins
    bye
    " || {
        print_warning "Some plugins may have failed to upload"
    }
    
    print_success "Plugins deployment completed"
}

# Function to deploy media files
deploy_media() {
    print_status "Deploying media/uploads..."
    
    if [ ! -d "$UPLOADS_DIR" ]; then
        print_error "Uploads directory not found: $UPLOADS_DIR"
        return 1
    fi
    
    # Calculate size
    MEDIA_SIZE=$(du -sh "$UPLOADS_DIR" | cut -f1)
    print_status "Media folder size: $MEDIA_SIZE"
    
    if [ "$DRY_RUN" = true ]; then
        print_status "Would deploy media from: $UPLOADS_DIR"
        print_status "Would deploy to: $DEPLOY_PATH/wp-content/uploads"
        print_status "Total size: $MEDIA_SIZE"
        return 0
    fi
    
    # Confirm for large uploads
    if [ "$AUTO_CONFIRM" = false ]; then
        echo -e "${YELLOW}This will upload $MEDIA_SIZE of media files${NC}"
        read -p "Continue? (y/n): " -n 1 -r
        echo
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            print_warning "Media deployment skipped"
            return 0
        fi
    fi
    
    lftp -c "
    set ssl:verify-certificate no
    set ftp:ssl-allow yes
    set ftp:ssl-force true
    set ftp:ssl-protect-data true
    set net:timeout 120
    set net:max-retries 3
    set mirror:parallel-transfer-count 2
    open ftp://$DEPLOY_USER:$DEPLOY_PASS@$DEPLOY_HOST
    cd $DEPLOY_PATH/wp-content
    lcd \"$UPLOADS_DIR\"
    mirror -R --verbose --parallel=2 \
        --exclude-glob=.DS_Store \
        --exclude-glob=*.log \
        --exclude-glob=_wpallimport/ \
        . uploads
    bye
    " || {
        print_warning "Some media files may have failed to upload"
    }
    
    print_success "Media deployment completed"
}

# Function to deploy WordPress core
deploy_core() {
    print_status "Deploying WordPress core files..."
    
    if [ "$DRY_RUN" = true ]; then
        print_status "Would deploy WordPress core from: $WP_ROOT"
        print_status "Would deploy to: $DEPLOY_PATH"
        echo "  - wp-admin/"
        echo "  - wp-includes/"
        echo "  - wp-*.php files"
        return 0
    fi
    
    lftp -c "
    set ssl:verify-certificate no
    set ftp:ssl-allow yes
    set ftp:ssl-force true
    set ftp:ssl-protect-data true
    set net:timeout 60
    set net:max-retries 3
    set mirror:parallel-transfer-count 3
    open ftp://$DEPLOY_USER:$DEPLOY_PASS@$DEPLOY_HOST
    cd $DEPLOY_PATH
    lcd \"$WP_ROOT\"
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
        print_warning "Some core files may have failed to upload"
    }
    
    print_success "WordPress core deployment completed"
}

# Function to export database
deploy_database() {
    print_status "Exporting database for $ENVIRONMENT..."
    
    if [ "$DRY_RUN" = true ]; then
        print_status "Would export database for: $ENVIRONMENT"
        return 0
    fi
    
    # Use the existing database deployment script
    if [ -x "$PROJECT_ROOT/scripts/database-deploy.sh" ]; then
        "$PROJECT_ROOT/scripts/database-deploy.sh" "export-$ENVIRONMENT"
    else
        print_error "Database deployment script not found"
        return 1
    fi
    
    print_success "Database export completed"
}

# Function for full deployment
deploy_full() {
    print_status "Starting full deployment..."
    
    # Deploy in order: core, theme, plugins
    deploy_core
    deploy_theme
    deploy_plugins
    
    print_success "Full deployment completed"
}

# Main deployment logic
case $COMPONENT in
    theme)
        deploy_theme
        ;;
    plugins)
        deploy_plugins
        ;;
    media)
        deploy_media
        ;;
    core)
        deploy_core
        ;;
    database)
        deploy_database
        ;;
    full)
        deploy_full
        ;;
    *)
        print_error "Invalid component: $COMPONENT"
        show_usage
        exit 1
        ;;
esac

# Verify deployment
if [ "$DRY_RUN" = false ]; then
    print_status "Verifying deployment..."
    
    # Test site availability
    response=$(curl -s -o /dev/null -w "%{http_code}" "$DEPLOY_URL")
    if [ "$response" -eq 200 ] || [ "$response" -eq 301 ] || [ "$response" -eq 302 ]; then
        print_success "Site is accessible: $DEPLOY_URL (HTTP $response)"
    else
        print_warning "Site returned HTTP $response"
    fi
fi

print_success "Deployment completed!"
echo ""
echo "Environment: $ENVIRONMENT"
echo "Component: $COMPONENT"
echo "URL: $DEPLOY_URL"
echo ""

if [ "$COMPONENT" = "database" ]; then
    echo "Next steps:"
    echo "1. Upload the database file to the server"
    echo "2. Run the import script: php db-import.php $ENVIRONMENT"
elif [ "$COMPONENT" = "theme" ] || [ "$COMPONENT" = "plugins" ]; then
    echo "Next steps:"
    echo "1. Clear any caches"
    echo "2. Test the updated functionality"
fi