<?php
/**
 * Trinity Health Theme Setup
 * 
 * Theme setup functions and WordPress feature support
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function trinity_health_setup() {
    // Make theme available for translation
    load_theme_textdomain('trinity-health', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    
    // Set custom image sizes for Trinity Health
    add_image_size('trinity-hero', 1920, 1080, true);
    add_image_size('trinity-card', 400, 300, true);
    add_image_size('trinity-service', 350, 250, true);
    add_image_size('trinity-team', 300, 400, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'trinity-health'),
        'footer'  => esc_html__('Footer Menu', 'trinity-health'),
        'services' => esc_html__('Services Menu', 'trinity-health'),
        'social'  => esc_html__('Social Links Menu', 'trinity-health'),
    ));

    // Switch default core markup for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Set up the WordPress core custom background feature
    add_theme_support('custom-background', apply_filters('trinity_health_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('build/editor.css');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for custom line height controls
    add_theme_support('custom-line-height');

    // Add support for custom units
    add_theme_support('custom-units');

    // Add support for custom spacing
    add_theme_support('custom-spacing');

    // Add support for block patterns
    add_theme_support('core-block-patterns');

    // Remove support for block-based widgets editor
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'trinity_health_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function trinity_health_content_width() {
    $GLOBALS['content_width'] = apply_filters('trinity_health_content_width', 1200);
}
add_action('after_setup_theme', 'trinity_health_content_width', 0);

/**
 * Register widget area.
 */
function trinity_health_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'trinity-health'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'trinity-health'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Footer widget areas
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer %d', 'trinity-health'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(esc_html__('Add widgets to footer column %d.', 'trinity-health'), $i),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'trinity_health_widgets_init');

/**
 * Custom logo setup
 */
function trinity_health_custom_logo_setup() {
    $defaults = array(
        'height'               => 60,
        'width'                => 200,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => false, 
    );

    add_theme_support('custom-logo', $defaults);
}

/**
 * Fallback menu for primary navigation
 */
function trinity_health_primary_menu_fallback() {
    ?>
    <ul class="nav-menu flex items-center space-x-6">
        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-white hover:text-trinity-gold-light transition-colors duration-300 px-2 py-2 font-medium text-base"><?php esc_html_e('Home', 'trinity-health'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/about')); ?>" class="text-white hover:text-trinity-gold-light transition-colors duration-300 px-2 py-2 font-medium text-base"><?php esc_html_e('About', 'trinity-health'); ?></a></li>
        <li class="menu-item-has-children">
            <a href="<?php echo esc_url(home_url('/services')); ?>" class="text-white hover:text-trinity-gold-light transition-colors duration-300 px-2 py-2 font-medium text-base"><?php esc_html_e('Services', 'trinity-health'); ?></a>
            <ul class="sub-menu">
                <li><a href="<?php echo esc_url(home_url('/services/general-health')); ?>"><?php esc_html_e('General Health', 'trinity-health'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/services/audiology')); ?>"><?php esc_html_e('Audiology', 'trinity-health'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/services/dental-care')); ?>"><?php esc_html_e('Dental Care', 'trinity-health'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/services/eye-care')); ?>"><?php esc_html_e('Eye Care', 'trinity-health'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/services/laboratory')); ?>"><?php esc_html_e('Laboratory', 'trinity-health'); ?></a></li>
            </ul>
        </li>
        <li class="menu-item-has-children">
            <a href="#" class="text-white hover:text-trinity-gold-light transition-colors duration-300 px-2 py-2 font-medium text-base"><?php esc_html_e('Our Team', 'trinity-health'); ?></a>
            <ul class="sub-menu">
                <li><a href="<?php echo esc_url(home_url('/staff')); ?>"><?php esc_html_e('Staff', 'trinity-health'); ?></a></li>
                <li><a href="<?php echo esc_url(home_url('/careers')); ?>"><?php esc_html_e('Careers', 'trinity-health'); ?></a></li>
            </ul>
        </li>
        <li><a href="<?php echo esc_url(home_url('/contact')); ?>" class="text-white hover:text-trinity-gold-light transition-colors duration-300 px-2 py-2 font-medium text-base"><?php esc_html_e('Contact', 'trinity-health'); ?></a></li>
    </ul>
    <?php
}
add_action('after_setup_theme', 'trinity_health_custom_logo_setup');

function trinity_health_footer_menu_fallback() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/privacy-policy')) . '">' . esc_html__('Privacy Policy', 'trinity-health') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/terms-of-service')) . '">' . esc_html__('Terms of Service', 'trinity-health') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">' . esc_html__('Contact', 'trinity-health') . '</a></li>';
    echo '</ul>';
}

function trinity_health_services_menu_fallback() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/services/general-medicine')) . '">' . esc_html__('General Medicine', 'trinity-health') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/audiology')) . '">' . esc_html__('Audiology', 'trinity-health') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/health-screening')) . '">' . esc_html__('Health Screening', 'trinity-health') . '</a></li>';
    echo '</ul>';
}

/**
 * Add custom classes to body
 */
function trinity_health_body_classes($classes) {
    // Add class to distinguish between mobile and desktop
    if (wp_is_mobile()) {
        $classes[] = 'mobile-device';
    } else {
        $classes[] = 'desktop-device';
    }

    // Add class for pages with featured images
    if (is_singular() && has_post_thumbnail()) {
        $classes[] = 'has-featured-image';
    }

    // Add class for front page
    if (is_front_page()) {
        $classes[] = 'trinity-home';
    }

    return $classes;
}
add_filter('body_class', 'trinity_health_body_classes');

/**
 * Add pingback url auto-discovery header for single posts and pages
 */
function trinity_health_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'trinity_health_pingback_header');

/**
 * Custom excerpt length
 */
function trinity_health_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'trinity_health_excerpt_length', 999);

/**
 * Custom excerpt more link
 */
function trinity_health_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'trinity_health_excerpt_more');

/**
 * Add async/defer attributes to enqueued scripts
 */
function trinity_health_script_loader_tag($tag, $handle, $src) {
    // Add async to specific scripts
    $async_scripts = array(
        'trinity-health-script',
    );

    if (in_array($handle, $async_scripts)) {
        return str_replace('<script ', '<script async ', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'trinity_health_script_loader_tag', 10, 3);

/**
 * Security enhancements
 */
function trinity_health_security_headers() {
    if (!is_admin()) {
        // Remove WordPress version from head
        remove_action('wp_head', 'wp_generator');
        
        // Remove version from RSS
        add_filter('the_generator', '__return_empty_string');
        
        // Remove version from scripts and styles
        add_filter('style_loader_src', 'trinity_health_remove_version_strings');
        add_filter('script_loader_src', 'trinity_health_remove_version_strings');
    }
}
add_action('init', 'trinity_health_security_headers');

/**
 * Remove version strings from scripts and styles
 */
function trinity_health_remove_version_strings($src) {
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');