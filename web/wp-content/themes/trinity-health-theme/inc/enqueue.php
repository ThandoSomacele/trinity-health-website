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
    
    // Enqueue Swiper CSS from CDN
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.0.0'
    );
    
    // Enqueue Swiper JavaScript from CDN with proper loading
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        '11.0.0',
        true
    );
    
    // Enqueue navigation JavaScript
    wp_enqueue_script(
        'trinity-health-navigation',
        TRINITY_THEME_URL . '/assets/js/src/navigation.js',
        array(),
        TRINITY_THEME_VERSION,
        true
    );
    
    // Enqueue main JavaScript with Swiper dependency
    wp_enqueue_script(
        'trinity-health-script',
        TRINITY_THEME_URL . '/build/index.js',
        array_merge($asset['dependencies'], array('swiper-js')),
        $asset['version'],
        true
    );
    
    // Add improved mobile-compatible script loading
    wp_add_inline_script('trinity-health-script', '
        // Enhanced mobile debugging
        console.log("Trinity Health theme loading - User agent:", navigator.userAgent);
        console.log("Screen dimensions:", window.innerWidth + "x" + window.innerHeight);
        console.log("Touch support available:", "ontouchstart" in window);
        
        // Check for Swiper availability with retry mechanism
        let swiperCheckCount = 0;
        const maxRetries = 10;
        
        function checkSwiperAndInit() {
            swiperCheckCount++;
            console.log("Checking for Swiper... attempt", swiperCheckCount);
            
            if (typeof Swiper !== "undefined") {
                console.log("Swiper detected! Initializing components...");
                
                // Re-initialize any components that were waiting
                if (window.needsTestimonialsSwiper && window.initTestimonialsSwiper) {
                    console.log("Retrying testimonials swiper...");
                    window.initTestimonialsSwiper();
                }
                if (window.needsArticlesSwiper && window.initArticlesSwiper) {
                    console.log("Retrying articles swiper...");
                    window.initArticlesSwiper();
                }
                return true;
            } else if (swiperCheckCount < maxRetries) {
                console.log("Swiper not ready yet, retrying in 500ms...");
                setTimeout(checkSwiperAndInit, 500);
                return false;
            } else {
                console.error("Swiper failed to load after", maxRetries, "attempts");
                return false;
            }
        }
        
        // Start checking after a brief delay
        setTimeout(checkSwiperAndInit, 1000);
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