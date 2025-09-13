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

/**
 * Calculate reading time for posts
 * 
 * @return int Reading time in minutes
 */
function trinity_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed of 200 words per minute
    return $reading_time;
}

/**
 * Convert markdown content to HTML with styled lists
 * 
 * @param string $content The content to convert
 * @return string Converted HTML content
 */
function trinity_convert_markdown_to_html($content) {
    // Convert headers
    $content = preg_replace('/^### (.*?)$/m', '<h3>$1</h3>', $content);
    $content = preg_replace('/^## (.*?)$/m', '<h2>$1</h2>', $content);
    $content = preg_replace('/^# (.*?)$/m', '<h1>$1</h1>', $content);
    
    // Convert bold text
    $content = preg_replace('/\*\*(.*?)\*\*/s', '<strong>$1</strong>', $content);
    
    // Convert italic text
    $content = preg_replace('/\*(.*?)\*/s', '<em>$1</em>', $content);
    
    // Convert unordered lists with styled-list class
    $content = preg_replace_callback('/^((?:- .*\n?)+)/m', function($matches) {
        $items = explode("\n", trim($matches[1]));
        $html = '<ul class="styled-list">';
        foreach ($items as $item) {
            if (trim($item)) {
                $item = preg_replace('/^- /', '', $item);
                $html .= '<li>' . trim($item) . '</li>';
            }
        }
        $html .= '</ul>';
        return $html;
    }, $content);
    
    // Convert ordered lists with styled-list class
    $content = preg_replace_callback('/^((?:\d+\. .*\n?)+)/m', function($matches) {
        $items = explode("\n", trim($matches[1]));
        $html = '<ol class="styled-list">';
        foreach ($items as $item) {
            if (trim($item)) {
                $item = preg_replace('/^\d+\. /', '', $item);
                $html .= '<li>' . trim($item) . '</li>';
            }
        }
        $html .= '</ol>';
        return $html;
    }, $content);
    
    // Convert paragraphs
    $paragraphs = explode("\n\n", $content);
    $html = '';
    foreach ($paragraphs as $paragraph) {
        $paragraph = trim($paragraph);
        if ($paragraph && !preg_match('/^<[^>]+>/', $paragraph)) {
            $html .= '<p>' . $paragraph . '</p>';
        } else {
            $html .= $paragraph;
        }
    }
    
    return $html;
}

/**
 * Filter the content to convert markdown to HTML
 */
function trinity_filter_content($content) {
    if (is_single() && in_the_loop() && is_main_query()) {
        return trinity_convert_markdown_to_html($content);
    }
    return $content;
}
add_filter('the_content', 'trinity_filter_content', 5);
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
