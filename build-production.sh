#!/bin/bash
# Trinity Health Zambia - Production Build Script
# Converts Bedrock + Sage setup to traditional WordPress for shared hosting

set -e  # Exit on any error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Configuration
BUILD_DIR="dist-production"
THEME_NAME="trinity-health"
WP_VERSION="6.7.1"  # Current WordPress version

# FTP Configuration (set these before running with --deploy)
# Option 1: Set directly in this script
FTP_HOST=""           # e.g. "ftp.yourhost.com"
FTP_USER=""           # e.g. "username@domain.com"
FTP_PASS=""           # e.g. "your_password"
FTP_REMOTE_PATH=""    # e.g. "/public_html" or "/wp-content"

# Option 2: Source from external config file (recommended for security)
# Copy ftp-config.example.sh to ftp-config.sh and configure it
if [[ -f "ftp-config.sh" ]]; then
    source ftp-config.sh
fi

# Functions
log() {
    echo -e "${BLUE}[BUILD]${NC} $1"
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

# Main build function
main() {
    log "🔨 Starting Trinity Health production build..."
    
    # Pre-build checks
    check_requirements
    
    # Clean and create build directory
    setup_build_directory
    
    # Build theme assets
    build_theme_assets
    
    # Convert Sage theme to traditional PHP
    convert_sage_theme
    
    # Copy and configure plugins
    setup_plugins
    
    # Copy uploads and content
    copy_content
    
    # Export database
    export_database
    
    # Final verification
    verify_build
    
    success "✅ Production build completed successfully!"
    log "📁 Build output: $BUILD_DIR/wp-content/ (upload to your WordPress installation)"
    log "💾 Database: database-export.sql (with import instructions)"
    
    # Deploy if --deploy flag was used
    if [[ "$DEPLOY_TO_FTP" == "true" ]]; then
        deploy_to_ftp
    else
        log "🚀 Ready for deployment to shared hosting"
        log "💡 Use --deploy flag to automatically upload to FTP"
    fi
}

# Check requirements
check_requirements() {
    log "Checking build requirements..."
    
    # Check if we're in a Bedrock project
    if [[ ! -f "composer.json" ]] || [[ ! -d "web" ]]; then
        error "Not a Bedrock project. Run this from the project root."
    fi
    
    # Check if Sage theme exists
    if [[ ! -d "web/app/themes/$THEME_NAME" ]]; then
        error "Sage theme '$THEME_NAME' not found"
    fi
    
    # Check if theme assets are built
    if [[ ! -d "web/app/themes/$THEME_NAME/public/build" ]]; then
        warning "Theme assets not built. Building now..."
        build_theme_assets_now
    fi
    
    # Check required tools
    command -v curl >/dev/null 2>&1 || error "curl is required"
    command -v unzip >/dev/null 2>&1 || error "unzip is required"
    
    # Check FTP tools if deploying
    if [[ "$DEPLOY_TO_FTP" == "true" ]]; then
        command -v lftp >/dev/null 2>&1 || error "lftp is required for FTP deployment. Install with: brew install lftp"
        check_ftp_config
    fi
    
    success "Requirements check passed"
}

# Build theme assets now if needed
build_theme_assets_now() {
    log "Building theme assets..."
    cd "web/app/themes/$THEME_NAME"
    
    if [[ ! -f "package.json" ]]; then
        error "package.json not found in theme directory"
    fi
    
    # Install dependencies if needed
    if [[ ! -d "node_modules" ]]; then
        log "Installing npm dependencies..."
        npm install
    fi
    
    # Build production assets
    log "Building production assets..."
    npm run build
    
    cd - >/dev/null
    success "Theme assets built"
}

# Setup build directory
setup_build_directory() {
    log "Setting up build directory..."
    
    # Remove existing build
    if [[ -d "$BUILD_DIR" ]]; then
        log "Removing existing build directory..."
        rm -rf "$BUILD_DIR"
    fi
    
    # Create build directory
    mkdir -p "$BUILD_DIR"
    
    success "Build directory ready"
}

# Build theme assets
build_theme_assets() {
    log "Building theme assets..."
    
    cd "web/app/themes/$THEME_NAME"
    
    # Ensure we have built assets
    if [[ ! -d "public/build" ]]; then
        log "Building theme assets..."
        npm run build
    fi
    
    cd - >/dev/null
    success "Theme assets ready"
}


# Convert Sage theme to traditional PHP
convert_sage_theme() {
    log "Converting Sage theme to traditional WordPress theme..."
    
    local theme_src="web/app/themes/$THEME_NAME"
    local theme_dest="$BUILD_DIR/wp-content/themes/$THEME_NAME"
    
    mkdir -p "$theme_dest"
    
    # Copy basic theme files
    cp "$theme_src/style.css" "$theme_dest/"
    cp "$theme_src/screenshot.png" "$theme_dest/" 2>/dev/null || true
    cp "$theme_src/functions.php" "$theme_dest/"
    cp "$theme_src/index.php" "$theme_dest/"
    
    # Copy built assets
    if [[ -d "$theme_src/public/build" ]]; then
        cp -r "$theme_src/public/build" "$theme_dest/assets"
    fi
    
    # Convert Blade templates to PHP
    convert_blade_templates "$theme_src" "$theme_dest"
    
    # Create traditional template hierarchy
    create_traditional_templates "$theme_dest"
    
    # Update functions.php for traditional hosting
    update_functions_php "$theme_dest"
    
    success "Sage theme converted"
}

# Convert Blade templates to PHP
convert_blade_templates() {
    local src_dir="$1/resources/views"
    local dest_dir="$2"
    
    if [[ ! -d "$src_dir" ]]; then
        warning "Blade templates directory not found"
        return
    fi
    
    log "Converting Blade templates..."
    
    # Create PHP templates from Blade
    find "$src_dir" -name "*.blade.php" | while read blade_file; do
        # Get relative path and convert .blade.php to .php (macOS compatible)
        rel_path="${blade_file#$src_dir/}"
        php_file="$dest_dir/${rel_path%.blade.php}.php"
        
        # Create directory if needed
        mkdir -p "$(dirname "$php_file")"
        
        # Convert Blade syntax to PHP
        convert_blade_to_php "$blade_file" "$php_file"
    done
}

# Convert individual Blade file to PHP
convert_blade_to_php() {
    local blade_file="$1"
    local php_file="$2"
    
    # Basic Blade to PHP conversion
    sed -e 's/@extends(\([^)]*\))/<?php get_header(); ?>/' \
        -e 's/@section(\([^)]*\))//' \
        -e 's/@endsection//' \
        -e 's/@yield(\([^)]*\))/<?php get_template_part(\1); ?>/' \
        -e 's/@include(\([^)]*\))/<?php get_template_part(\1); ?>/' \
        -e 's/{{ *\$\([^}]*\) *}}/<?php echo \$\1; ?>/' \
        -e 's/{!! *\$\([^}]*\) *!!}/<?php echo \$\1; ?>/' \
        -e 's/@if(\([^)]*\))/<?php if(\1): ?>/' \
        -e 's/@elseif(\([^)]*\))/<?php elseif(\1): ?>/' \
        -e 's/@else/<?php else: ?>/' \
        -e 's/@endif/<?php endif; ?>/' \
        -e 's/@foreach(\([^)]*\))/<?php foreach(\1): ?>/' \
        -e 's/@endforeach/<?php endforeach; ?>/' \
        -e 's/@php/<?php/' \
        -e 's/@endphp/?>/g' \
        "$blade_file" > "$php_file"
}

# Create traditional template hierarchy
create_traditional_templates() {
    local theme_dir="$1"
    
    log "Creating traditional template files..."
    
    # Create index.php if it doesn't exist
    if [[ ! -f "$theme_dir/index.php" ]]; then
        cat > "$theme_dir/index.php" << 'EOF'
<?php
/**
 * The main template file
 * Trinity Health Theme
 */

get_header(); ?>

<main id="main" class="main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>
                </header>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e('Sorry, no posts found.'); ?></p>
    <?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
EOF
    fi
    
    # Create header.php
    cat > "$theme_dir/header.php" << 'EOF'
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="app">
    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            </div>
            
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary_navigation',
                    'menu_id'        => 'primary-menu',
                ));
                ?>
            </nav>
        </div>
    </header>

    <main id="main" class="main">
EOF
    
    # Create footer.php
    cat > "$theme_dir/footer.php" << 'EOF'
    </main>
    
    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-info">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
EOF
    
    # Create sidebar.php
    cat > "$theme_dir/sidebar.php" << 'EOF'
<aside id="secondary" class="widget-area">
    <?php if (is_active_sidebar('sidebar-primary')) : ?>
        <?php dynamic_sidebar('sidebar-primary'); ?>
    <?php endif; ?>
</aside>
EOF
}

# Update functions.php for traditional hosting
update_functions_php() {
    local theme_dir="$1"
    local functions_file="$theme_dir/functions.php"
    
    log "Updating functions.php for traditional hosting..."
    
    # Create a traditional functions.php
    cat > "$functions_file" << 'EOF'
<?php
/**
 * Trinity Health Theme Functions
 * Converted from Sage for traditional WordPress hosting
 */

// Theme setup
function trinity_health_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary_navigation' => __('Primary Navigation', 'trinity-health'),
    ));
}
add_action('after_setup_theme', 'trinity_health_setup');

// Enqueue scripts and styles
function trinity_health_scripts() {
    // Enqueue compiled CSS
    wp_enqueue_style('trinity-health-style', get_template_directory_uri() . '/assets/app.css', array(), '1.0.0');
    
    // Enqueue compiled JS
    wp_enqueue_script('trinity-health-script', get_template_directory_uri() . '/assets/app.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'trinity_health_scripts');

// Register widget areas
function trinity_health_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'trinity-health'),
        'id'            => 'sidebar-primary',
        'description'   => __('Add widgets here.', 'trinity-health'),
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer', 'trinity-health'),
        'id'            => 'sidebar-footer',
        'description'   => __('Add footer widgets here.', 'trinity-health'),
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'trinity_health_widgets_init');

// Custom Post Types
function trinity_health_register_post_types() {
    // Health Services CPT
    register_post_type('health_service', array(
        'label' => 'Health Services',
        'labels' => array(
            'name' => 'Health Services',
            'singular_name' => 'Health Service',
            'add_new_item' => 'Add New Health Service',
            'edit_item' => 'Edit Health Service',
        ),
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'health-services'),
    ));

    // Audiology Services CPT
    register_post_type('audiology_service', array(
        'label' => 'Audiology Services',
        'labels' => array(
            'name' => 'Audiology Services',
            'singular_name' => 'Audiology Service',
            'add_new_item' => 'Add New Audiology Service',
            'edit_item' => 'Edit Audiology Service',
        ),
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-audio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'audiology-services'),
    ));

    // Team Members CPT
    register_post_type('team_member', array(
        'label' => 'Team Members',
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member',
        ),
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'team'),
    ));

    // Locations CPT
    register_post_type('location', array(
        'label' => 'Locations',
        'labels' => array(
            'name' => 'Locations',
            'singular_name' => 'Location',
            'add_new_item' => 'Add New Location',
            'edit_item' => 'Edit Location',
        ),
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-location',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'locations'),
    ));

    // Testimonials CPT
    register_post_type('testimonial', array(
        'label' => 'Testimonials',
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor'),
    ));
}
add_action('init', 'trinity_health_register_post_types');
EOF
}

# Setup plugins
setup_plugins() {
    log "Setting up plugins..."
    
    local plugins_dir="$BUILD_DIR/wp-content/plugins"
    mkdir -p "$plugins_dir"
    
    # Copy plugins from Bedrock
    if [[ -d "web/app/plugins" ]]; then
        cp -r web/app/plugins/* "$plugins_dir/"
    fi
    
    # Copy mu-plugins
    if [[ -d "web/app/mu-plugins" ]]; then
        cp -r web/app/mu-plugins "$BUILD_DIR/wp-content/"
    fi
    
    success "Plugins copied"
}


# Copy uploads and content
copy_content() {
    log "Copying content and uploads..."
    
    # Copy uploads if they exist
    if [[ -d "web/app/uploads" ]]; then
        cp -r web/app/uploads "$BUILD_DIR/wp-content/"
    fi
    
    # Create wp-content structure
    mkdir -p "$BUILD_DIR/wp-content"
    
    # Create empty uploads directory if none exists
    mkdir -p "$BUILD_DIR/wp-content/uploads"
    
    success "Content copied"
}

# Export database
export_database() {
    log "Exporting database..."
    
    local db_file="$BUILD_DIR/database-export.sql"
    local import_script="$BUILD_DIR/import-database.txt"
    
    # Try DDEV first, then regular WP-CLI
    local wp_cmd=""
    if command -v ddev >/dev/null 2>&1 && ddev status >/dev/null 2>&1; then
        wp_cmd="ddev wp"
        log "Using DDEV WP-CLI for database export..."
    elif command -v wp >/dev/null 2>&1 && wp core is-installed 2>/dev/null; then
        wp_cmd="wp"
        log "Using WP-CLI for database export..."
    else
        warning "WP-CLI not found or WordPress not accessible. Database export skipped."
        warning "You'll need to export/import the database manually using:"
        warning "ddev wp db export database-export.sql"
        warning "Or use your hosting provider's backup tools"
        return
    fi
    
    # Export database
    log "Creating database dump..."
    if $wp_cmd db export "$db_file" 2>/dev/null; then
        success "Database exported to database-export.sql"
        
        # Create import instructions
        cat > "$import_script" << 'EOF'
Trinity Health Database Import Instructions
=========================================

To import the database on your hosting provider:

1. Create a new MySQL database via your hosting control panel
2. Note down the database credentials:
   - Database name
   - Database username  
   - Database password
   - Database host (usually 'localhost')

3. Import the database using one of these methods:

   METHOD A: Using phpMyAdmin (most common)
   ----------------------------------------
   - Log into your hosting control panel
   - Open phpMyAdmin
   - Select your database
   - Click "Import" tab
   - Choose file: database-export.sql
   - Click "Go" to import

   METHOD B: Using command line (if available)
   ------------------------------------------
   mysql -h [host] -u [username] -p [database_name] < database-export.sql

   METHOD C: Using hosting file manager
   ------------------------------------
   Some hosts provide database import via file manager
   - Upload database-export.sql to your hosting account
   - Use hosting control panel database import feature

4. Update wp-config.php with your new database credentials

5. Update site URLs (if domain changed):
   - Log into WordPress admin
   - Go to Settings > General
   - Update "WordPress Address" and "Site Address"
   
   OR use WP-CLI if available:
   wp search-replace 'old-domain.com' 'new-domain.com'

IMPORTANT NOTES:
- The database file contains all your content, users, and settings
- Make sure to update wp-config.php with correct database credentials
- The exported database uses table prefix 'th_' (Trinity Health)
- If you get "Error establishing database connection", check wp-config.php
EOF
        
        log "Database import instructions saved to import-database.txt"
    else
        warning "Database export failed. You'll need to export manually using:"
        warning "wp db export database-export.sql"
        warning "Or use your hosting provider's backup tools"
    fi
}

# Verify build
verify_build() {
    log "Verifying build output..."
    
    local errors=0
    
    # Check wp-content structure
    if [[ ! -d "$BUILD_DIR/wp-content" ]]; then
        error "wp-content directory not found"
        ((errors++))
    fi
    
    # Check theme
    if [[ ! -d "$BUILD_DIR/wp-content/themes/$THEME_NAME" ]]; then
        error "Theme directory not found"
        ((errors++))
    fi
    
    if [[ ! -f "$BUILD_DIR/wp-content/themes/$THEME_NAME/style.css" ]]; then
        error "Theme style.css not found"
        ((errors++))
    fi
    
    # Check plugins
    if [[ ! -d "$BUILD_DIR/wp-content/plugins" ]]; then
        warning "Plugins directory not found"
    fi
    
    if [[ $errors -gt 0 ]]; then
        error "Build verification failed with $errors errors"
    fi
    
    success "Build verification passed"
}

# Check FTP configuration
check_ftp_config() {
    log "Checking FTP configuration..."
    
    if [[ -z "$FTP_HOST" ]]; then
        error "FTP_HOST not set. Please configure FTP settings in the script."
    fi
    
    if [[ -z "$FTP_USER" ]]; then
        error "FTP_USER not set. Please configure FTP settings in the script."
    fi
    
    if [[ -z "$FTP_PASS" ]]; then
        error "FTP_PASS not set. Please configure FTP settings in the script."
    fi
    
    if [[ -z "$FTP_REMOTE_PATH" ]]; then
        warning "FTP_REMOTE_PATH not set. Will upload to root directory."
        FTP_REMOTE_PATH="/"
    fi
    
    success "FTP configuration validated"
}

# Deploy to FTP
deploy_to_ftp() {
    log "🚀 Starting FTP deployment..."
    
    local local_path="$BUILD_DIR/wp-content"
    local remote_path="$FTP_REMOTE_PATH"
    
    # Ensure remote path ends with wp-content
    if [[ "$remote_path" != "*wp-content" ]]; then
        remote_path="$remote_path/wp-content"
    fi
    
    log "Uploading wp-content to $FTP_HOST:$remote_path..."
    
    # Create LFTP script for secure transfer
    local lftp_script="
        set ssl:verify-certificate false
        set ftp:ssl-allow false
        set ftp:passive-mode true
        open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
        lcd $local_path
        cd $remote_path
        mirror --reverse --delete --verbose --exclude-glob=.DS_Store --exclude-glob=Thumbs.db .
        quit
    "
    
    # Execute LFTP transfer
    if echo "$lftp_script" | lftp 2>/dev/null; then
        success "✅ FTP deployment completed successfully!"
        log "📁 Uploaded wp-content to: $FTP_HOST:$remote_path"
        
        # Deploy database separately if requested
        deploy_database_to_ftp
        
        log "🎉 Deployment complete! Remember to:"
        log "   1. Import database-export.sql via hosting control panel"
        log "   2. Activate trinity-health theme in WordPress admin"
        log "   3. Update site URLs if domain changed"
    else
        error "FTP deployment failed. Please check your credentials and try again."
    fi
}

# Deploy database file to FTP
deploy_database_to_ftp() {
    log "Uploading database export and instructions..."
    
    local db_script="
        set ssl:verify-certificate false
        set ftp:ssl-allow false
        set ftp:passive-mode true
        open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST
        lcd $BUILD_DIR
        cd $FTP_REMOTE_PATH
        put database-export.sql
        put import-database.txt
        quit
    "
    
    if echo "$db_script" | lftp 2>/dev/null; then
        success "Database files uploaded to hosting account"
    else
        warning "Database file upload failed. You can manually upload database-export.sql"
    fi
}

# Show usage
usage() {
    echo "Trinity Health Production Build Script"
    echo ""
    echo "Usage: $0 [options]"
    echo ""
    echo "This script converts your Bedrock + Sage development setup"
    echo "into a traditional WordPress installation for shared hosting."
    echo ""
    echo "Options:"
    echo "  --help       Show this help message"
    echo "  --deploy     Build and automatically deploy to FTP server"
    echo ""
    echo "FTP Configuration:"
    echo "  Configure FTP_HOST, FTP_USER, FTP_PASS, and FTP_REMOTE_PATH"
    echo "  variables in the script before using --deploy option."
    echo ""
    echo "Output:"
    echo "  $BUILD_DIR/wp-content/  WordPress content folder only"
    echo ""
    echo "Manual deployment:"
    echo "1. Upload $BUILD_DIR/wp-content/ to your existing WordPress installation"
    echo "2. Create database and import database-export.sql (see import-database.txt)"
    echo "3. Activate the trinity-health theme via WordPress admin"
    echo "4. Update site URLs if domain changed"
    echo "5. Test the site functionality"
    echo ""
    echo "Automatic deployment (--deploy):"
    echo "1. Uploads wp-content automatically via FTP"
    echo "2. Uploads database files for manual import"
    echo "3. Follow post-deployment instructions"
}

# Parse command line arguments
DEPLOY_TO_FTP="false"

while [[ $# -gt 0 ]]; do
    case $1 in
        --help)
            usage
            exit 0
            ;;
        --deploy)
            DEPLOY_TO_FTP="true"
            shift
            ;;
        *)
            error "Unknown option: $1. Use --help for usage information."
            ;;
    esac
done

# Run the build
main "$@"