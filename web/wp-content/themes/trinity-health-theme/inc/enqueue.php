<?php
/**
 * Trinity Health Theme Asset Enqueue
 * 
 * Handles loading of CSS and JavaScript files
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue theme styles and scripts
 */
function trinity_health_enqueue_assets() {
    // Get the asset file for cache busting
    $asset_file = TRINITY_THEME_PATH . '/build/index.asset.php';
    
    if (file_exists($asset_file)) {
        $asset = include $asset_file;
    } else {
        $asset = array(
            'dependencies' => array(),
            'version' => TRINITY_THEME_VERSION,
        );
    }
    
    // Enqueue main stylesheet
    wp_enqueue_style(
        'trinity-health-style',
        TRINITY_THEME_URL . '/build/index.css',
        array(),
        $asset['version']
    );
    
    // Enqueue Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.0.0'
    );
    
    // Enqueue Swiper JavaScript
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        '11.0.0',
        true
    );
    
    // Enqueue main JavaScript with proper dependencies
    wp_enqueue_script(
        'trinity-health-script',
        TRINITY_THEME_URL . '/build/index.js',
        array_merge($asset['dependencies'], array('swiper-js')),
        $asset['version'],
        true
    );
    
    // Add script dependency check for staging
    wp_add_inline_script('trinity-health-script', '
        // Check if Swiper loaded properly after a brief delay
        setTimeout(function() {
            if (typeof Swiper === "undefined") {
                console.error("Swiper library not loaded properly. Loading fallback...");
                // Fallback CDN load
                var swiperScript = document.createElement("script");
                swiperScript.src = "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js";
                swiperScript.onload = function() {
                    console.log("Swiper loaded via fallback CDN");
                    // Re-initialize components that were waiting
                    if (window.needsTestimonialsSwiper && window.initTestimonialsSwiper) {
                        window.initTestimonialsSwiper();
                    }
                    if (window.needsArticlesSwiper && window.initArticlesSwiper) {
                        window.initArticlesSwiper();
                    }
                };
                swiperScript.onerror = function() {
                    console.error("Failed to load Swiper even from fallback CDN");
                };
                document.head.appendChild(swiperScript);
            }
        }, 1000);
    ', 'before');
    
    // Localize script for AJAX
    wp_localize_script('trinity-health-script', 'trinity_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('trinity_nonce'),
        'site_url' => get_site_url(),
    ));
    
    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'trinity_health_enqueue_assets');

/**
 * Enqueue block editor assets
 */
function trinity_health_enqueue_block_editor_assets() {
    $asset_file = TRINITY_THEME_PATH . '/build/editor.asset.php';
    
    if (file_exists($asset_file)) {
        $asset = include $asset_file;
    } else {
        $asset = array(
            'dependencies' => array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
            'version' => TRINITY_THEME_VERSION,
        );
    }
    
    // Enqueue block editor stylesheet
    wp_enqueue_style(
        'trinity-health-block-editor',
        TRINITY_THEME_URL . '/build/editor.css',
        array(),
        $asset['version']
    );
    
    // Enqueue block editor JavaScript
    wp_enqueue_script(
        'trinity-health-block-editor',
        TRINITY_THEME_URL . '/build/editor.js',
        $asset['dependencies'],
        $asset['version'],
        true
    );
}
add_action('enqueue_block_editor_assets', 'trinity_health_enqueue_block_editor_assets');

/**
 * Add async/defer attributes to scripts
 */
function trinity_health_add_script_attributes($tag, $handle, $src) {
    // Add async to non-critical scripts
    $async_scripts = array(
        'trinity-health-script',
    );
    
    if (in_array($handle, $async_scripts)) {
        return str_replace('<script ', '<script async ', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'trinity_health_add_script_attributes', 10, 3);

/**
 * Preload critical assets
 */
function trinity_health_preload_assets() {
    // Preload main CSS file
    echo '<link rel="preload" href="' . TRINITY_THEME_URL . '/build/index.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    
    // Preload critical fonts if any
    // echo '<link rel="preload" href="' . TRINITY_THEME_URL . '/assets/fonts/font-file.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action('wp_head', 'trinity_health_preload_assets', 1);

/**
 * Remove unnecessary WordPress assets
 */
function trinity_health_cleanup_head() {
    // Remove unnecessary meta tags
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Remove emoji scripts and styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'trinity_health_cleanup_head');