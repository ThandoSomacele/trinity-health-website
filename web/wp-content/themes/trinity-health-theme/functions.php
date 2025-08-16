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
 * Get Trinity Health logo based on background type
 * 
 * @param string $background_type 'dark' for dark backgrounds, 'light' for light backgrounds
 * @return string Logo image HTML
 */
function trinity_health_get_logo($background_type = 'dark')
{
    $logo_path = get_template_directory_uri() . '/assets/images/';

    if ($background_type === 'dark') {
        // Use white logo for dark backgrounds (maroon header/footer)
        $logo_src = $logo_path . 'trinity-logo-white.png';
        $alt_text = get_bloginfo('name') . ' - White Logo';
    } else {
        // Use original logo for light backgrounds
        $logo_src = $logo_path . 'trinity-logo.jpg';
        $alt_text = get_bloginfo('name') . ' - Logo';
    }

    return '<img src="' . esc_url($logo_src) . '" alt="' . esc_attr($alt_text) . '" class="w-full h-full object-contain min-w-full min-h-full">';
}

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
function trinity_health_woocommerce_setup()
{
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'trinity_health_woocommerce_setup');
