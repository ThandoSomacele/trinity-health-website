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
 * 
 * All major theme functionality is separated into include files
 * for better organization and maintainability
 */
require_once TRINITY_THEME_PATH . '/inc/setup.php';          // Theme setup and WordPress feature support
require_once TRINITY_THEME_PATH . '/inc/enqueue.php';        // Asset loading (CSS, JS)
require_once TRINITY_THEME_PATH . '/inc/custom-post-types.php'; // Services, Team, Testimonials
require_once TRINITY_THEME_PATH . '/inc/acf-fields.php';     // Advanced Custom Fields setup

/**
 * Additional WooCommerce support for e-commerce phase
 */
function trinity_health_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'trinity_health_woocommerce_setup');