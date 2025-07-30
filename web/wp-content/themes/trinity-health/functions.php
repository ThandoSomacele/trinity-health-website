<?php
/**
 * Trinity Health Theme Functions
 * 
 * Modern WordPress theme for healthcare professionals
 * Built with wp-scripts, Tailwind CSS, and modern development practices
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme constants
define('TRINITY_THEME_VERSION', '1.0.0');
define('TRINITY_THEME_URL', get_template_directory_uri());
define('TRINITY_THEME_PATH', get_template_directory());

/**
 * Include theme setup files
 */
require_once TRINITY_THEME_PATH . '/inc/setup.php';
require_once TRINITY_THEME_PATH . '/inc/enqueue.php';
require_once TRINITY_THEME_PATH . '/inc/custom-post-types.php';
require_once TRINITY_THEME_PATH . '/inc/acf-fields.php';

/**
 * Theme setup
 */
function trinity_health_setup() {
    // Add theme support for various WordPress features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    
    // WooCommerce support for e-commerce phase
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'trinity-health'),
        'footer' => __('Footer Navigation', 'trinity-health'),
    ));
    
    // Add editor stylesheet
    add_editor_style('assets/css/dist/editor.css');
    
    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'trinity_health_setup');

/**
 * Register widget areas
 */
function trinity_health_widgets_init() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'trinity-health'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'trinity-health'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'trinity-health'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in the footer.', 'trinity-health'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'trinity_health_widgets_init');

/**
 * Custom excerpt length
 */
function trinity_health_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'trinity_health_excerpt_length');

/**
 * Custom excerpt more
 */
function trinity_health_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'trinity_health_excerpt_more');