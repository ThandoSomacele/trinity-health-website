#!/bin/bash

# Trinity Health - Common Deployment Functions
# Shared functions for deployment scripts

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

# Load and validate environment variables
load_environment() {
    local ENV_TYPE=$1  # staging or production
    
    if [ ! -f ".env" ]; then
        print_error ".env file not found"
        echo "Please create .env file with deployment configuration"
        exit 1
    fi
    
    source .env
    
    # Validate based on environment type
    if [ "$ENV_TYPE" = "staging" ]; then
        if [ -z "$STAGING_HOST" ] || [ -z "$STAGING_USER" ] || [ -z "$STAGING_PASS" ] || [ -z "$STAGING_PATH" ]; then
            print_error "Missing required staging environment variables"
            echo "Required: STAGING_HOST, STAGING_USER, STAGING_PASS, STAGING_PATH"
            exit 1
        fi
        export DEPLOY_HOST=$STAGING_HOST
        export DEPLOY_USER=$STAGING_USER
        export DEPLOY_PASS=$STAGING_PASS
        export DEPLOY_PATH=$STAGING_PATH
        export DEPLOY_URL=${STAGING_URL:-https://staging.object91.co.za}
    elif [ "$ENV_TYPE" = "production" ]; then
        if [ -z "$PRODUCTION_HOST" ] || [ -z "$PRODUCTION_USER" ] || [ -z "$PRODUCTION_PASS" ] || [ -z "$PRODUCTION_PATH" ]; then
            print_error "Missing required production environment variables"
            echo "Required: PRODUCTION_HOST, PRODUCTION_USER, PRODUCTION_PASS, PRODUCTION_PATH"
            exit 1
        fi
        export DEPLOY_HOST=$PRODUCTION_HOST
        export DEPLOY_USER=$PRODUCTION_USER
        export DEPLOY_PASS=$PRODUCTION_PASS
        export DEPLOY_PATH=$PRODUCTION_PATH
        export DEPLOY_URL=${PRODUCTION_URL:-https://trinityhealth.co.zm}
    else
        print_error "Invalid environment type: $ENV_TYPE"
        echo "Use 'staging' or 'production'"
        exit 1
    fi
}

# Build theme assets
build_assets() {
    local THEME_DIR=$1
    
    print_status "Building theme assets..."
    cd "$THEME_DIR"
    
    if npm run build; then
        print_success "Assets built successfully"
        return 0
    else
        print_error "Failed to build assets"
        return 1
    fi
}

# Deploy WordPress core files
deploy_wordpress_core() {
    local WP_ROOT=$1
    
    print_status "Deploying WordPress core files..."
    echo "This will deploy:"
    echo "  - wp-admin/ directory"
    echo "  - wp-includes/ directory"
    echo "  - Core PHP files (wp-*.php)"
    echo "  - index.php"
    
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
        print_warning "Some core files may have failed to upload"
        return 1
    }
}

# Deploy theme files
deploy_theme() {
    local THEME_DIR=$1
    
    print_status "Deploying theme files..."
    cd "$THEME_DIR"
    
    lftp -c "
    set ssl:verify-certificate no
    set ftp:ssl-allow yes
    set ftp:ssl-force true
    set ftp:ssl-protect-data true
    set net:timeout 30
    set net:max-retries 3
    open ftp://$DEPLOY_USER:$DEPLOY_PASS@$DEPLOY_HOST
    cd $DEPLOY_PATH/wp-content/themes/trinity-health-theme
    mirror -R --verbose --parallel=3 --exclude node_modules/ --exclude .git/ --exclude .DS_Store --exclude src/ --exclude assets/css/src/ . .
    bye
    " || {
        print_warning "Some theme files may have failed to upload"
        return 1
    }
}

# Deploy plugins directory
deploy_plugins() {
    local WP_ROOT=$1
    
    print_status "Deploying plugins..."
    cd "$WP_ROOT"
    
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
    lcd $WP_ROOT/wp-content
    mirror -R --verbose --parallel=2 --exclude .git/ plugins plugins
    bye
    " || {
        print_warning "Some plugins may have failed to upload"
        return 1
    }
}

# Create and upload .htaccess
deploy_htaccess() {
    local ENV_TYPE=$1
    local HTACCESS_FILE="/tmp/${ENV_TYPE}-htaccess"
    
    print_status "Creating .htaccess file..."
    
    cat > "$HTACCESS_FILE" << 'EOF'
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
EOF

    # Add HSTS for production only
    if [ "$ENV_TYPE" = "production" ]; then
        cat >> "$HTACCESS_FILE" << 'EOF'
Header set Strict-Transport-Security "max-age=31536000; includeSubDomains"
EOF
    fi
    
    cat >> "$HTACCESS_FILE" << 'EOF'
</IfModule>

# Prevent directory browsing
Options -Indexes

# Protect wp-config
<files wp-config.php>
order allow,deny
deny from all
</files>

# Disable XML-RPC (optional - uncomment if needed)
# <Files xmlrpc.php>
# order deny,allow
# deny from all
# </Files>
EOF
    
    lftp -c "
    set ssl:verify-certificate no
    set ftp:ssl-allow yes
    set ftp:ssl-force true
    set ftp:ssl-protect-data true
    open ftp://$DEPLOY_USER:$DEPLOY_PASS@$DEPLOY_HOST
    cd $DEPLOY_PATH
    put $HTACCESS_FILE -o .htaccess
    bye
    " || {
        print_warning "Failed to upload .htaccess"
        return 1
    }
    
    rm -f "$HTACCESS_FILE"
}

# Verify deployment
verify_deployment() {
    print_status "Verifying deployment..."
    
    local endpoints=(
        "$DEPLOY_URL/"
        "$DEPLOY_URL/wp-login.php"
        "$DEPLOY_URL/wp-includes/js/jquery/jquery.min.js"
    )
    
    local all_success=true
    
    for url in "${endpoints[@]}"; do
        response=$(curl -s -o /dev/null -w "%{http_code}" "$url")
        if [ "$response" -eq 200 ] || [ "$response" -eq 301 ] || [ "$response" -eq 302 ]; then
            print_success "$url - HTTP $response"
        else
            print_error "$url - HTTP $response"
            all_success=false
        fi
    done
    
    if [ "$all_success" = true ]; then
        return 0
    else
        return 1
    fi
}

# Export functions for use in other scripts
export -f print_status
export -f print_success
export -f print_warning
export -f print_error
export -f load_environment
export -f build_assets
export -f deploy_wordpress_core
export -f deploy_theme
export -f deploy_plugins
export -f deploy_htaccess
export -f verify_deployment