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
// Dynamic versioning based on theme modification time for cache busting
$theme_version = '1.0.0'; // Base version
$theme_mod_time = filemtime(get_template_directory() . '/style.css');
if ($theme_mod_time) {
    $theme_version .= '.' . $theme_mod_time;
}
define('TRINITY_THEME_VERSION', $theme_version);
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
 * Add Open Graph meta tags for social media sharing
 */
function trinity_add_open_graph_tags() {
    // Default values
    $og_title = get_bloginfo('name');
    $og_description = get_bloginfo('description');
    $og_url = home_url('/');
    $og_image = home_url('/wp-content/uploads/2025/09/hero-audiology-1.webp');
    $og_type = 'website';
    
    // For single posts and pages
    if (is_single() || is_page()) {
        $og_title = get_the_title();
        $og_url = get_permalink();
        $og_type = is_single() ? 'article' : 'website';
        
        // Get excerpt or custom description
        if (has_excerpt()) {
            $og_description = get_the_excerpt();
        } else {
            $content = get_the_content();
            $og_description = wp_trim_words(strip_tags($content), 30, '...');
        }
        
        // Check for featured image
        if (has_post_thumbnail()) {
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'large');
            if ($thumbnail) {
                $og_image = $thumbnail[0];
            }
        }
    }
    
    // For archive pages
    if (is_archive()) {
        if (is_category()) {
            $og_title = single_cat_title('', false) . ' - ' . get_bloginfo('name');
            $og_description = category_description();
        } elseif (is_tag()) {
            $og_title = single_tag_title('', false) . ' - ' . get_bloginfo('name');
            $og_description = tag_description();
        }
    }
    
    // Output Open Graph meta tags
    ?>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo esc_attr($og_title); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($og_description); ?>" />
    <meta property="og:url" content="<?php echo esc_url($og_url); ?>" />
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>" />
    <meta property="og:type" content="<?php echo esc_attr($og_type); ?>" />
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />
    <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>" />
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc_attr($og_title); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr($og_description); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>" />
    
    <!-- Additional Meta Tags -->
    <meta name="description" content="<?php echo esc_attr($og_description); ?>" />
    <?php
}
add_action('wp_head', 'trinity_add_open_graph_tags', 5);

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
