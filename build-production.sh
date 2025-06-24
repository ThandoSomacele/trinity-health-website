#!/bin/bash
# Trinity Health Zambia - Deployment Script
# Deploys built WordPress files to shared hosting via FTP/SFTP

set -e  # Exit on any error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Configuration
BUILD_DIR="dist-production"
BACKUP_DIR="backups"
CONFIG_FILE="deploy-config.sh"

# Functions
log() {
    echo -e "${BLUE}[DEPLOY]${NC} $1"
}

success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

error() {
    echo -e "${RED}[ERROR]${NC} $1"
    exit 1
}

# Main deployment function
main() {
    log "🚀 Starting Trinity Health deployment..."
    
    # Check if build exists
    check_build_exists
    
    # Load or create configuration
    load_deployment_config
    
    # Pre-deployment checks
    pre_deployment_checks
    
    # Create backup if production exists
    create_backup
    
    # Deploy files
    deploy_files
    
    # Post-deployment verification
    post_deployment_verification
    
    success "✅ Deployment completed successfully!"
    log "🌐 Site should be live at: $SITE_URL"
}

# Check if build exists
check_build_exists() {
    if [[ ! -d "$BUILD_DIR" ]]; then
        error "Build directory not found. Run ./build-production.sh first"
    fi
    
    if [[ ! -f "$BUILD_DIR/wp-config.php" ]]; then
        error "WordPress installation not found in build directory"
    fi
    
    success "Build directory verified"
}

# Load deployment configuration
load_deployment_config() {
    if [[ ! -f "$CONFIG_FILE" ]]; then
        log "Creating deployment configuration..."
        create_deployment_config
    fi
    
    source "$CONFIG_FILE"
    
    # Validate configuration
    if [[ -z "$FTP_HOST" ]] || [[ -z "$FTP_USER" ]] || [[ -z "$SITE_URL" ]]; then
        error "Deployment configuration incomplete. Please edit $CONFIG_FILE"
    fi
    
    success "Configuration loaded"
}

# Create deployment configuration
create_deployment_config() {
    cat > "$CONFIG_FILE" << 'EOF'
#!/bin/bash
# Trinity Health Deployment Configuration
# Edit these values with your hosting provider details

# FTP/SFTP Configuration
FTP_HOST="ftp.yourhostingprovider.com"     # Your hosting FTP server
FTP_USER="your_username"                    # Your FTP username
FTP_PASS="your_password"                    # Your FTP password (or use key-based auth)
FTP_PORT="21"                              # FTP port (21 for FTP, 22 for SFTP)
FTP_PATH="/public_html"                    # Remote path (usually /public_html)

# Protocol: "ftp" or "sftp"
PROTOCOL="ftp"

# Site Configuration
SITE_URL="https://trinity-health.co.za"   # Your site URL
ADMIN_EMAIL="admin@trinity-health.co.za"  # Admin email for notifications

# Backup Configuration
ENABLE_BACKUP="true"                       # Create backup before deployment
BACKUP_RETENTION_DAYS="30"                # Keep backups for X days

# Deployment Options
EXCLUDE_UPLOADS="false"                    # Skip uploads directory (if syncing separately)
DRY_RUN="false"                           # Set to true to test without actual deployment
EOF

    warning "Created $CONFIG_FILE - Please edit with your hosting details before running again"
    exit 0
}

# Pre-deployment checks
pre_deployment_checks() {
    log "Running pre-deployment checks..."
    
    # Check required tools
    if [[ "$PROTOCOL" == "sftp" ]]; then
        command -v sftp >/dev/null 2>&1 || error "SFTP not available"
    else
        command -v lftp >/dev/null 2>&1 || error "LFTP not available. Install with: brew install lftp"
    fi
    
    # Test connection
    test_connection
    
    success "Pre-deployment checks passed"
}

# Test connection
test_connection() {
    log "Testing connection to $FTP_HOST..."
    
    if [[ "$PROTOCOL" == "sftp" ]]; then
        # Test SFTP connection
        echo "ls" | sftp -o ConnectTimeout=10 -P "$FTP_PORT" "$FTP_USER@$FTP_HOST" >/dev/null 2>&1 || error "SFTP connection failed"
    else
        # Test FTP connection
        lftp -c "set ftp:connect-program 'nc -w 10 $FTP_HOST $FTP_PORT'; open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST; ls; quit" >/dev/null 2>&1 || error "FTP connection failed"
    fi
    
    success "Connection test successful"
}

# Create backup
create_backup() {
    if [[ "$ENABLE_BACKUP" != "true" ]]; then
        return
    fi
    
    log "Creating backup of current site..."
    
    mkdir -p "$BACKUP_DIR"
    
    local backup_name="trinity-health-backup-$(date +%Y%m%d-%H%M%S)"
    local backup_path="$BACKUP_DIR/$backup_name"
    
    if [[ "$PROTOCOL" == "sftp" ]]; then
        create_sftp_backup "$backup_path"
    else
        create_ftp_backup "$backup_path"
    fi
    
    # Clean old backups
    find "$BACKUP_DIR" -name "trinity-health-backup-*" -mtime +$BACKUP_RETENTION_DAYS -delete 2>/dev/null || true
    
    success "Backup created: $backup_path"
}

# Create FTP backup
create_ftp_backup() {
    local backup_path="$1"
    mkdir -p "$backup_path"
    
    lftp -c "
        set ftp:list-options -a;
        open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST;
        lcd $backup_path;
        cd $FTP_PATH;
        mirror --reverse --verbose --exclude-glob .htaccess;
        quit
    " 2>/dev/null || warning "Backup failed (site may not exist yet)"
}

# Create SFTP backup
create_sftp_backup() {
    local backup_path="$1"
    mkdir -p "$backup_path"
    
    sftp -P "$FTP_PORT" "$FTP_USER@$FTP_HOST" << EOF 2>/dev/null || warning "Backup failed (site may not exist yet)"
cd $FTP_PATH
get -r * $backup_path/
quit
EOF
}

# Deploy files
deploy_files() {
    log "Deploying files to $FTP_HOST..."
    
    if [[ "$DRY_RUN" == "true" ]]; then
        warning "DRY RUN MODE - No files will be uploaded"
        return
    fi
    
    if [[ "$PROTOCOL" == "sftp" ]]; then
        deploy_via_sftp
    else
        deploy_via_ftp
    fi
    
    success "Files deployed successfully"
}

# Deploy via FTP
deploy_via_ftp() {
    log "Uploading via FTP..."
    
    # Build exclude list
    local exclude_opts=""
    if [[ "$EXCLUDE_UPLOADS" == "true" ]]; then
        exclude_opts="--exclude-glob wp-content/uploads/"
    fi
    
    lftp -c "
        set ftp:list-options -a;
        set ftp:ssl-allow no;
        set mirror:use-pget-n 5;
        open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST;
        lcd $BUILD_DIR;
        cd $FTP_PATH;
        mirror --reverse --delete --verbose $exclude_opts --exclude-glob .git/ --exclude-glob node_modules/;
        quit
    "
}

# Deploy via SFTP
deploy_via_sftp() {
    log "Uploading via SFTP..."
    
    # Create a temporary script for SFTP commands
    local sftp_script=$(mktemp)
    
    cat > "$sftp_script" << EOF
cd $FTP_PATH
put -r $BUILD_DIR/* .
quit
EOF
    
    sftp -P "$FTP_PORT" -b "$sftp_script" "$FTP_USER@$FTP_HOST"
    
    rm "$sftp_script"
}

# Post-deployment verification
post_deployment_verification() {
    log "Verifying deployment..."
    
    # Check if site loads
    local http_status=$(curl -s -o /dev/null -w "%{http_code}" "$SITE_URL" || echo "000")
    
    if [[ "$http_status" == "200" ]]; then
        success "Site is loading successfully"
    elif [[ "$http_status" == "301" ]] || [[ "$http_status" == "302" ]]; then
        warning "Site is redirecting (status: $http_status)"
    else
        warning "Site returned status: $http_status (may need WordPress installation)"
    fi
    
    # Check if wp-admin is accessible
    local admin_status=$(curl -s -o /dev/null -w "%{http_code}" "$SITE_URL/wp-admin/" || echo "000")
    
    if [[ "$admin_status" == "200" ]] || [[ "$admin_status" == "302" ]]; then
        success "WordPress admin is accessible"
    else
        warning "WordPress admin returned status: $admin_status"
    fi
    
    # Generate post-deployment report
    generate_deployment_report
}

# Generate deployment report
generate_deployment_report() {
    local report_file="deployment-report-$(date +%Y%m%d-%H%M%S).txt"
    
    cat > "$report_file" << EOF
Trinity Health Deployment Report
==============================
Date: $(date)
Site URL: $SITE_URL
FTP Host: $FTP_HOST
Protocol: $PROTOCOL

Deployment Status: SUCCESS

Post-Deployment Checklist:
========================

1. WordPress Setup:
   [ ] Complete WordPress installation at: $SITE_URL/wp-admin/install.php
   [ ] Create admin user with strong password
   [ ] Update site title and tagline

2. Theme Configuration:
   [ ] Verify Trinity Health theme is active
   [ ] Check homepage displays correctly
   [ ] Test responsive design on mobile

3. Content Setup:
   [ ] Create primary navigation menu
   [ ] Add health services pages
   [ ] Add audiology services pages
   [ ] Upload team member photos
   [ ] Configure contact forms

4. SEO & Analytics:
   [ ] Install and configure SEO plugin
   [ ] Set up Google Analytics
   [ ] Submit sitemap to Google Search Console
   [ ] Verify meta descriptions and titles

5. Security:
   [ ] Install security plugin
   [ ] Enable automatic backups
   [ ] Update all passwords
   [ ] Enable two-factor authentication
   [ ] Test SSL certificate

6. Performance:
   [ ] Install caching plugin
   [ ] Optimize images
   [ ] Test page load speeds
   [ ] Configure CDN (if needed)

7. Testing:
   [ ] Test all forms and functionality
   [ ] Check cross-browser compatibility
   [ ] Verify mobile responsiveness
   [ ] Test email sending

Contact Information:
===================
Technical Support: support@trinity-health.co.za
Admin Panel: $SITE_URL/wp-admin/

Next Steps:
==========
1. Complete WordPress installation
2. Log in to admin panel and configure
3. Begin adding content
4. Test all functionality
5. Go live!

EOF

    log "Deployment report saved: $report_file"
}

# Show usage
usage() {
    echo "Trinity Health Deployment Script"
    echo ""
    echo "Usage: $0 [options]"
    echo ""
    echo "Options:"
    echo "  --dry-run    Show what would be deployed without uploading"
    echo "  --no-backup  Skip backup creation"
    echo "  --help       Show this help message"
    echo ""
    echo "Before first use:"
    echo "1. Run ./build-production.sh to create build"
    echo "2. Edit deploy-config.sh with your hosting details"
    echo "3. Run $0 to deploy"
}

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        --dry-run)
            DRY_RUN="true"
            shift
            ;;
        --no-backup)
            ENABLE_BACKUP="false"
            shift
            ;;
        --help)
            usage
            exit 0
            ;;
        *)
            error "Unknown option: $1. Use --help for usage information."
            ;;
    esac
done

# Run the deployment
main "$@"
