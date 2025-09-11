<?php
/**
 * Staging Site Redirect Diagnostic Script
 * Upload this to staging root to diagnose wp-admin redirect issues
 */

// Display all errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Staging Site Redirect Diagnostics</h1>";
echo "<pre>";

// 1. Check if we can load WordPress
echo "=== WordPress Loading Test ===\n";
$wp_load = dirname(__FILE__) . '/wp-load.php';
if (file_exists($wp_load)) {
    echo "✓ wp-load.php found\n";
    
    // Try to load WordPress
    define('WP_USE_THEMES', false);
    require($wp_load);
    
    echo "✓ WordPress loaded successfully\n";
    echo "WordPress Version: " . get_bloginfo('version') . "\n";
} else {
    echo "✗ wp-load.php not found\n";
}

// 2. Check site URLs
echo "\n=== Site URL Configuration ===\n";
echo "Site URL: " . get_option('siteurl') . "\n";
echo "Home URL: " . get_option('home') . "\n";
echo "FORCE_SSL_ADMIN: " . (defined('FORCE_SSL_ADMIN') ? (FORCE_SSL_ADMIN ? 'true' : 'false') : 'not defined') . "\n";
echo "FORCE_SSL_LOGIN: " . (defined('FORCE_SSL_LOGIN') ? (FORCE_SSL_LOGIN ? 'true' : 'false') : 'not defined') . "\n";

// 3. Check $_SERVER variables
echo "\n=== Server Variables ===\n";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "HTTP_HOST: " . $_SERVER['HTTP_HOST'] . "\n";
echo "SERVER_NAME: " . $_SERVER['SERVER_NAME'] . "\n";
echo "HTTPS: " . (isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : 'not set') . "\n";
echo "HTTP_X_FORWARDED_PROTO: " . (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO'] : 'not set') . "\n";
echo "HTTP_X_FORWARDED_SSL: " . (isset($_SERVER['HTTP_X_FORWARDED_SSL']) ? $_SERVER['HTTP_X_FORWARDED_SSL'] : 'not set') . "\n";

// 4. Check .htaccess
echo "\n=== .htaccess Check ===\n";
$htaccess = dirname(__FILE__) . '/.htaccess';
if (file_exists($htaccess)) {
    echo "✓ .htaccess exists\n";
    echo "File size: " . filesize($htaccess) . " bytes\n";
    echo "Last modified: " . date('Y-m-d H:i:s', filemtime($htaccess)) . "\n";
    
    // Show first few lines
    $content = file_get_contents($htaccess);
    $lines = explode("\n", $content);
    echo "\nFirst 20 lines of .htaccess:\n";
    echo "----------------------------\n";
    for ($i = 0; $i < min(20, count($lines)); $i++) {
        echo ($i + 1) . ": " . $lines[$i] . "\n";
    }
} else {
    echo "✗ .htaccess not found\n";
}

// 5. Check wp-config.php for any redirect settings
echo "\n=== wp-config.php Settings ===\n";
$wp_config = dirname(__FILE__) . '/wp-config.php';
if (file_exists($wp_config)) {
    echo "✓ wp-config.php exists\n";
    
    // Check for common redirect-related constants
    $config_content = file_get_contents($wp_config);
    
    if (strpos($config_content, 'WP_HOME') !== false) {
        echo "WP_HOME is defined in wp-config.php\n";
    }
    if (strpos($config_content, 'WP_SITEURL') !== false) {
        echo "WP_SITEURL is defined in wp-config.php\n";
    }
    if (strpos($config_content, 'FORCE_SSL_ADMIN') !== false) {
        echo "FORCE_SSL_ADMIN is defined in wp-config.php\n";
    }
} else {
    echo "✗ wp-config.php not found\n";
}

// 6. Check active plugins that might cause redirects
echo "\n=== Active Plugins ===\n";
$active_plugins = get_option('active_plugins');
if ($active_plugins) {
    foreach ($active_plugins as $plugin) {
        echo "- " . $plugin . "\n";
    }
} else {
    echo "No active plugins found\n";
}

// 7. Check user authentication
echo "\n=== Authentication Check ===\n";
if (function_exists('is_user_logged_in')) {
    echo "is_user_logged_in(): " . (is_user_logged_in() ? 'true' : 'false') . "\n";
    
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        echo "Current user: " . $current_user->user_login . "\n";
        echo "User ID: " . $current_user->ID . "\n";
    }
}

// 8. Test redirect detection
echo "\n=== Redirect Detection ===\n";
$test_url = 'https://staging.object91.co.za/wp-admin/';
$ch = curl_init($test_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$redirect_url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
curl_close($ch);

echo "Testing: $test_url\n";
echo "HTTP Code: $http_code\n";
if ($redirect_url) {
    echo "Redirects to: $redirect_url\n";
}

// Parse headers
$headers = [];
$header_lines = explode("\n", $response);
foreach ($header_lines as $line) {
    if (strpos($line, 'Location:') === 0) {
        echo "Location header: " . trim(substr($line, 9)) . "\n";
    }
}

echo "\n=== Recommendations ===\n";
echo "1. Check if site URL and home URL match your staging domain\n";
echo "2. Look for any security or redirect plugins that might be causing loops\n";
echo "3. Verify SSL certificate configuration if FORCE_SSL_ADMIN is enabled\n";
echo "4. Check server configuration for any redirect rules\n";

echo "</pre>";

// Add a button to fix common issues
?>
<hr>
<h2>Quick Fixes</h2>
<p>Try these fixes:</p>
<ol>
    <li>Clear all caches (browser, server, WordPress)</li>
    <li>Check if URLs in database match: <?php echo get_option('siteurl'); ?></li>
    <li>Disable all plugins temporarily to test</li>
    <li>Check .htaccess for redirect loops</li>
</ol>