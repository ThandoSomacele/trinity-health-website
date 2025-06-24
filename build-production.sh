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
    
    # Create WordPress core structure
    setup_wordpress_core
    
    # Convert Sage theme to traditional PHP
    convert_sage_theme
    
    # Copy and configure plugins
    setup_plugins
    
    # Create production configuration files
    create_production_configs
    
    # Copy uploads and content
    copy_content
    
    # Final verification
    verify_build
    
    success "✅ Production build completed successfully!"
    log "📁 Build output: $BUILD_DIR/"
    log "🚀 Ready for deployment to shared hosting"
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

# Setup WordPress core
setup_wordpress_core() {
    log "Setting up WordPress core..."
    
    # Download WordPress if not cached
    if [[ ! -f "/tmp/wordpress-${WP_VERSION}.zip" ]]; then
        log "Downloading WordPress $WP_VERSION..."
        curl -s -L "https://wordpress.org/wordpress-${WP_VERSION}.zip" -o "/tmp/wordpress-${WP_VERSION}.zip"
    fi
    
    # Extract WordPress
    log "Extracting WordPress..."
    cd "$BUILD_DIR"
    unzip -q "/tmp/wordpress-${WP_VERSION}.zip"
    
    # Move WordPress files to root
    mv wordpress/* .
    rmdir wordpress
    
    cd - >/dev/null
    success "WordPress core installed"
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

# Create production configuration files
create_production_configs() {
    log "Creating production configuration files..."
    
    # Create wp-config.php template
    cat > "$BUILD_DIR/wp-config-template.php" << 'EOF'
<?php
/**
 * Trinity Health WordPress Configuration
 * 
 * IMPORTANT: Rename this file to wp-config.php and update the database settings
 */

// ** Database settings - You will need to get this info from your hosting provider ** //
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASSWORD', 'your_database_password');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

// ** Authentication Unique Keys and Salts ** //
// Generate these at: https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// ** WordPress Database Table prefix ** //
$table_prefix = 'th_';

// ** WordPress debugging ** //
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

// ** Security settings ** //
define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);
define('FORCE_SSL_ADMIN', true);

// ** WordPress URLs ** //
define('WP_HOME', 'https://your-domain.com');
define('WP_SITEURL', 'https://your-domain.com');

// ** That's all, stop editing! Happy publishing. ** //
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
EOF
    
    # Create .htaccess
    cat > "$BUILD_DIR/.htaccess" << 'EOF'
# BEGIN WordPress Security
<Files wp-config.php>
order allow,deny
deny from all
</Files>

# Block access to sensitive files
<FilesMatch "\.(log|txt|md|json)$">
Order allow,deny
Deny from all
</FilesMatch>

# Hide version info
RewriteEngine On
RewriteRule ^wp-admin/includes/ - [F,L]
RewriteRule !^wp-includes/ - [S=3]
RewriteRule ^wp-includes/[^/]+\.php$ - [F,L]
RewriteRule ^wp-includes/js/tinymce/langs/.+\.php - [F,L]
RewriteRule ^wp-includes/theme-compat/ - [F,L]

# BEGIN WordPress
# The directives (lines) between "BEGIN WordPress" and "END WordPress" are
# dynamically generated, and should only be modified via WordPress filters.
# Any changes to the directives between these markers will be overwritten.
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>

# END WordPress

# Security headers
<IfModule mod_headers.c>
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
Header always set Permissions-Policy "camera=(), microphone=(), geolocation=()"
</IfModule>

# Gzip compression
<IfModule mod_deflate.c>
AddOutputFilterByType DEFLATE text/plain
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE text/css
AddOutputFilterByType DEFLATE application/xml
AddOutputFilterByType DEFLATE application/xhtml+xml
AddOutputFilterByType DEFLATE application/rss+xml
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>

# Browser caching
<IfModule mod_expires.c>
ExpiresActive on
ExpiresByType text/css "access plus 1 month"
ExpiresByType application/javascript "access plus 1 month"
ExpiresByType image/png "access plus 1 month"
ExpiresByType image/jpg "access plus 1 month"
ExpiresByType image/jpeg "access plus 1 month"
ExpiresByType image/gif "access plus 1 month"
ExpiresByType image/svg+xml "access plus 1 month"
ExpiresByType image/x-icon "access plus 1 year"
</IfModule>
EOF
    
    success "Configuration files created"
}

# Copy uploads and content
copy_content() {
    log "Copying content and uploads..."
    
    # Copy uploads if they exist
    if [[ -d "web/app/uploads" ]]; then
        cp -r web/app/uploads "$BUILD_DIR/wp-content/"
    fi
    
    # Create empty uploads directory if none exists
    mkdir -p "$BUILD_DIR/wp-content/uploads"
    
    success "Content copied"
}

# Verify build
verify_build() {
    log "Verifying build output..."
    
    local errors=0
    
    # Check WordPress core files
    if [[ ! -f "$BUILD_DIR/wp-config-template.php" ]]; then
        error "wp-config-template.php not found"
        ((errors++))
    fi
    
    if [[ ! -f "$BUILD_DIR/index.php" ]]; then
        error "WordPress index.php not found"
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
    echo ""
    echo "Output:"
    echo "  $BUILD_DIR/  Traditional WordPress installation"
    echo ""
    echo "After building:"
    echo "1. Upload $BUILD_DIR/ contents to your hosting provider"
    echo "2. Rename wp-config-template.php to wp-config.php"
    echo "3. Update database settings in wp-config.php"
    echo "4. Run WordPress installation at your-domain.com/wp-admin/install.php"
}

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        --help)
            usage
            exit 0
            ;;
        *)
            error "Unknown option: $1. Use --help for usage information."
            ;;
    esac
done

# Run the build
main "$@"