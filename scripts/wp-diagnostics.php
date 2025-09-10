#!/usr/bin/env php
<?php
/**
 * WordPress Diagnostics Script
 * Comprehensive health check for Trinity Health WordPress site
 */

// Colors for terminal output
class Colors {
    const RED = "\033[31m";
    const GREEN = "\033[32m";
    const YELLOW = "\033[33m";
    const BLUE = "\033[34m";
    const RESET = "\033[0m";
    const BOLD = "\033[1m";
}

// Load WordPress
$wp_load_path = dirname(__DIR__) . '/web/wp-load.php';
if (!file_exists($wp_load_path)) {
    die(Colors::RED . "Error: Cannot find wp-load.php at $wp_load_path" . Colors::RESET . "\n");
}

// Suppress WordPress output during load
ob_start();
define('WP_USE_THEMES', false);
require_once($wp_load_path);
ob_end_clean();

echo Colors::BOLD . Colors::BLUE . "\n🔍 Trinity Health WordPress Diagnostics\n" . Colors::RESET;
echo str_repeat("=", 50) . "\n\n";

// 1. PHP Configuration
echo Colors::BOLD . "📊 PHP Configuration:\n" . Colors::RESET;
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Memory Limit: " . ini_get('memory_limit') . "\n";
echo "Max Execution Time: " . ini_get('max_execution_time') . "s\n";
echo "Upload Max Filesize: " . ini_get('upload_max_filesize') . "\n";
echo "Post Max Size: " . ini_get('post_max_size') . "\n\n";

// 2. WordPress Configuration
echo Colors::BOLD . "⚙️ WordPress Configuration:\n" . Colors::RESET;
echo "WordPress Version: " . get_bloginfo('version') . "\n";
echo "Site URL: " . get_site_url() . "\n";
echo "Home URL: " . get_home_url() . "\n";
echo "Active Theme: " . wp_get_theme()->get('Name') . " v" . wp_get_theme()->get('Version') . "\n";
echo "Debug Mode: " . (WP_DEBUG ? Colors::YELLOW . "Enabled" : Colors::GREEN . "Disabled") . Colors::RESET . "\n";
echo "Debug Display: " . (WP_DEBUG_DISPLAY ? Colors::YELLOW . "Enabled" : Colors::GREEN . "Disabled") . Colors::RESET . "\n";
echo "Debug Log: " . (WP_DEBUG_LOG ? Colors::GREEN . "Enabled" : Colors::YELLOW . "Disabled") . Colors::RESET . "\n\n";

// 3. Database Check
echo Colors::BOLD . "🗄️ Database Status:\n" . Colors::RESET;
global $wpdb;
$db_check = $wpdb->get_var("SELECT 1");
if ($db_check == 1) {
    echo Colors::GREEN . "✓ Database connection successful" . Colors::RESET . "\n";
    echo "Database Name: " . DB_NAME . "\n";
    echo "Table Prefix: " . $wpdb->prefix . "\n";
    
    // Check table count
    $tables = $wpdb->get_results("SHOW TABLES");
    echo "Total Tables: " . count($tables) . "\n";
} else {
    echo Colors::RED . "✗ Database connection failed!" . Colors::RESET . "\n";
}
echo "\n";

// 4. Theme File Integrity
echo Colors::BOLD . "🎨 Theme Integrity Check:\n" . Colors::RESET;
$theme_dir = get_template_directory();
$required_files = [
    'style.css',
    'functions.php',
    'header.php',
    'footer.php',
    'index.php'
];

foreach ($required_files as $file) {
    $file_path = $theme_dir . '/' . $file;
    if (file_exists($file_path)) {
        echo Colors::GREEN . "✓ $file exists" . Colors::RESET . "\n";
    } else {
        echo Colors::RED . "✗ $file missing!" . Colors::RESET . "\n";
    }
}

// Check build directory
$build_dir = $theme_dir . '/build';
if (is_dir($build_dir)) {
    $build_files = scandir($build_dir);
    $js_files = array_filter($build_files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'js';
    });
    $css_files = array_filter($build_files, function($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'css';
    });
    echo Colors::GREEN . "✓ Build directory exists" . Colors::RESET . "\n";
    echo "  - JS files: " . count($js_files) . "\n";
    echo "  - CSS files: " . count($css_files) . "\n";
} else {
    echo Colors::YELLOW . "⚠ Build directory not found - run npm build" . Colors::RESET . "\n";
}
echo "\n";

// 5. Plugin Status
echo Colors::BOLD . "🔌 Active Plugins:\n" . Colors::RESET;
$active_plugins = get_option('active_plugins');
if (empty($active_plugins)) {
    echo "No active plugins\n";
} else {
    foreach ($active_plugins as $plugin) {
        $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
        echo "- " . $plugin_data['Name'] . " v" . $plugin_data['Version'] . "\n";
    }
}
echo "\n";

// 6. File Permissions Check
echo Colors::BOLD . "🔐 File Permissions:\n" . Colors::RESET;
$dirs_to_check = [
    'wp-content/uploads' => '755',
    'wp-content/themes' => '755',
    'wp-content/plugins' => '755'
];

foreach ($dirs_to_check as $dir => $expected) {
    $full_path = ABSPATH . $dir;
    if (is_dir($full_path)) {
        $perms = substr(sprintf('%o', fileperms($full_path)), -3);
        if (is_writable($full_path)) {
            echo Colors::GREEN . "✓ $dir is writable (permissions: $perms)" . Colors::RESET . "\n";
        } else {
            echo Colors::RED . "✗ $dir is not writable (permissions: $perms)" . Colors::RESET . "\n";
        }
    } else {
        echo Colors::YELLOW . "⚠ $dir does not exist" . Colors::RESET . "\n";
    }
}
echo "\n";

// 7. URL Rewrite Check
echo Colors::BOLD . "🔗 URL Rewrite Status:\n" . Colors::RESET;
$permalink_structure = get_option('permalink_structure');
if (empty($permalink_structure)) {
    echo Colors::YELLOW . "⚠ Using default permalinks (not SEO friendly)" . Colors::RESET . "\n";
} else {
    echo Colors::GREEN . "✓ Pretty permalinks enabled: $permalink_structure" . Colors::RESET . "\n";
}

// Check .htaccess
$htaccess_path = ABSPATH . '.htaccess';
if (file_exists($htaccess_path)) {
    echo Colors::GREEN . "✓ .htaccess file exists" . Colors::RESET . "\n";
} else {
    echo Colors::YELLOW . "⚠ .htaccess file not found" . Colors::RESET . "\n";
}
echo "\n";

// 8. Loading Spinner Check
echo Colors::BOLD . "⏳ Loading Spinner Check:\n" . Colors::RESET;
$animation_path = $theme_dir . '/assets/animations/loading-spinner.json';
if (file_exists($animation_path)) {
    echo Colors::GREEN . "✓ Lottie animation file exists" . Colors::RESET . "\n";
    $file_size = filesize($animation_path);
    echo "  File size: " . number_format($file_size / 1024, 2) . " KB\n";
} else {
    echo Colors::RED . "✗ Lottie animation file missing at: assets/animations/loading-spinner.json" . Colors::RESET . "\n";
}
echo "\n";

// 9. JavaScript Errors Check
echo Colors::BOLD . "📜 JavaScript Dependencies:\n" . Colors::RESET;
$package_json = $theme_dir . '/package.json';
if (file_exists($package_json)) {
    $package_data = json_decode(file_get_contents($package_json), true);
    echo Colors::GREEN . "✓ package.json exists" . Colors::RESET . "\n";
    if (isset($package_data['dependencies']['lottie-web'])) {
        echo Colors::GREEN . "✓ lottie-web dependency found" . Colors::RESET . "\n";
    } else {
        echo Colors::YELLOW . "⚠ lottie-web not in dependencies" . Colors::RESET . "\n";
    }
}

$node_modules = $theme_dir . '/node_modules';
if (is_dir($node_modules)) {
    echo Colors::GREEN . "✓ node_modules directory exists" . Colors::RESET . "\n";
} else {
    echo Colors::RED . "✗ node_modules missing - run npm install" . Colors::RESET . "\n";
}
echo "\n";

// 10. Summary
echo Colors::BOLD . Colors::BLUE . "📋 Summary:\n" . Colors::RESET;
echo str_repeat("-", 50) . "\n";

$issues = [];
$warnings = [];
$success = [];

// Collect issues
if (!file_exists($animation_path)) {
    $issues[] = "Lottie animation file missing";
}
if (!is_dir($build_dir)) {
    $issues[] = "Build directory missing - run npm build";
}
if (!is_dir($node_modules)) {
    $issues[] = "Node modules missing - run npm install";
}

// Collect warnings
if (WP_DEBUG) {
    $warnings[] = "Debug mode is enabled (disable for production)";
}
if (empty($permalink_structure)) {
    $warnings[] = "Using default permalinks";
}

// Display results
if (!empty($issues)) {
    echo Colors::RED . "❌ Critical Issues Found:\n" . Colors::RESET;
    foreach ($issues as $issue) {
        echo "   - $issue\n";
    }
    echo "\n";
}

if (!empty($warnings)) {
    echo Colors::YELLOW . "⚠️ Warnings:\n" . Colors::RESET;
    foreach ($warnings as $warning) {
        echo "   - $warning\n";
    }
    echo "\n";
}

if (empty($issues) && empty($warnings)) {
    echo Colors::GREEN . "✅ All checks passed! Site is healthy.\n" . Colors::RESET;
} else {
    echo Colors::YELLOW . "Please address the issues above before deployment.\n" . Colors::RESET;
}

echo "\n" . Colors::BOLD . "Run this script regularly to ensure site health." . Colors::RESET . "\n\n";