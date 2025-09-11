<?php
/**
 * Trinity Health - WordPress Core Verification Script
 * Upload this to staging server root and run
 * Usage: php wp-core-verify.php
 */

// Don't load WordPress yet - we need to check paths first
$red = "\033[0;31m";
$green = "\033[0;32m";
$yellow = "\033[1;33m";
$blue = "\033[0;34m";
$nc = "\033[0m";

function print_status($msg) {
    global $blue, $nc;
    echo "{$blue}[INFO]{$nc} $msg\n";
}

function print_success($msg) {
    global $green, $nc;
    echo "{$green}[SUCCESS]{$nc} $msg\n";
}

function print_error($msg) {
    global $red, $nc;
    echo "{$red}[ERROR]{$nc} $msg\n";
}

function print_warning($msg) {
    global $yellow, $nc;
    echo "{$yellow}[WARNING]{$nc} $msg\n";
}

print_status("WordPress Core Files Verification\n");
print_status("==================================\n");

// 1. Check current directory
$current_dir = getcwd();
print_status("Current directory: " . $current_dir);

// 2. Check for wp-config.php
if (!file_exists('wp-config.php')) {
    print_error("wp-config.php not found in current directory!");
    print_status("Looking for wp-config.php in parent directory...");
    if (file_exists('../wp-config.php')) {
        print_warning("wp-config.php found in parent directory - this might be the issue!");
    }
    exit(1);
}

print_success("wp-config.php found");

// 3. Check wp-config.php contents
print_status("\nChecking wp-config.php settings...");
$config_content = file_get_contents('wp-config.php');

// Check ABSPATH
if (preg_match("/define\s*\(\s*['\"]ABSPATH['\"]\s*,\s*([^)]+)\)/", $config_content, $matches)) {
    print_status("ABSPATH definition: " . trim($matches[1]));
} else {
    print_warning("ABSPATH not explicitly defined (WordPress will auto-define it)");
}

// Check WP_CONTENT_DIR
if (preg_match("/define\s*\(\s*['\"]WP_CONTENT_DIR['\"]\s*,\s*([^)]+)\)/", $config_content, $matches)) {
    print_status("WP_CONTENT_DIR: " . trim($matches[1]));
} else {
    print_status("WP_CONTENT_DIR: Not defined (using default)");
}

// Check WP_CONTENT_URL
if (preg_match("/define\s*\(\s*['\"]WP_CONTENT_URL['\"]\s*,\s*([^)]+)\)/", $config_content, $matches)) {
    print_status("WP_CONTENT_URL: " . trim($matches[1]));
} else {
    print_status("WP_CONTENT_URL: Not defined (using default)");
}

// 4. Check core WordPress files
print_status("\nChecking core WordPress files...");

$core_files = [
    'index.php' => 'Entry point',
    'wp-load.php' => 'Bootstrap loader',
    'wp-config.php' => 'Configuration',
    'wp-settings.php' => 'Settings bootstrap',
    'wp-blog-header.php' => 'Blog header',
    'wp-login.php' => 'Login page',
    'wp-admin/index.php' => 'Admin dashboard',
    'wp-admin/admin-ajax.php' => 'AJAX handler',
    'wp-admin/upload.php' => 'Media upload handler',
    'wp-admin/async-upload.php' => 'Async upload handler',
    'wp-includes/version.php' => 'WordPress version',
    'wp-includes/functions.php' => 'Core functions',
    'wp-includes/media.php' => 'Media functions',
    'wp-includes/post.php' => 'Post functions',
];

$missing_files = [];
foreach ($core_files as $file => $description) {
    if (file_exists($file)) {
        print_success("✓ $file - $description");
    } else {
        print_error("✗ $file - $description - MISSING!");
        $missing_files[] = $file;
    }
}

// 5. Check WordPress version
if (file_exists('wp-includes/version.php')) {
    require_once('wp-includes/version.php');
    global $wp_version;
    print_status("\nWordPress version: " . $wp_version);
}

// 6. Now load WordPress to check more
if (count($missing_files) === 0) {
    print_status("\nLoading WordPress to check configuration...");
    
    define('WP_USE_THEMES', false);
    require('./wp-load.php');
    
    // Check upload directory
    $upload_dir = wp_upload_dir();
    print_status("\nUpload Directory Configuration:");
    print_status("  Base Dir: " . $upload_dir['basedir']);
    print_status("  Base URL: " . $upload_dir['baseurl']);
    print_status("  Path: " . $upload_dir['path']);
    print_status("  URL: " . $upload_dir['url']);
    
    if ($upload_dir['error']) {
        print_error("  Error: " . $upload_dir['error']);
    }
    
    // Check AJAX URL
    $ajax_url = admin_url('admin-ajax.php');
    print_status("\nAJAX URL: " . $ajax_url);
    
    // Check if AJAX file exists
    $ajax_file = ABSPATH . 'wp-admin/admin-ajax.php';
    if (file_exists($ajax_file)) {
        print_success("AJAX handler file exists");
    } else {
        print_error("AJAX handler file missing at: " . $ajax_file);
    }
    
    // Check async-upload.php (used by Media Library)
    $async_upload = ABSPATH . 'wp-admin/async-upload.php';
    if (file_exists($async_upload)) {
        print_success("Async upload handler exists");
    } else {
        print_error("Async upload handler missing at: " . $async_upload);
    }
    
    // Check includes/media.php
    $media_file = ABSPATH . 'wp-includes/media.php';
    if (file_exists($media_file)) {
        print_success("Media functions file exists");
    } else {
        print_error("Media functions file missing at: " . $media_file);
    }
    
    // Check if we can get to admin
    print_status("\nChecking admin accessibility...");
    $admin_dir = ABSPATH . 'wp-admin';
    if (is_dir($admin_dir)) {
        print_success("wp-admin directory exists");
        
        // Count files in wp-admin
        $admin_files = glob($admin_dir . '/*.php');
        print_status("  PHP files in wp-admin: " . count($admin_files));
        
        // Check critical admin files for Media Library
        $critical_admin = [
            'upload.php',
            'admin-ajax.php',
            'async-upload.php',
            'media-upload.php',
            'media.php',
            'media-new.php'
        ];
        
        print_status("\nCritical Media Library admin files:");
        foreach ($critical_admin as $file) {
            $full_path = $admin_dir . '/' . $file;
            if (file_exists($full_path)) {
                print_success("  ✓ $file");
            } else {
                print_error("  ✗ $file - MISSING!");
            }
        }
    } else {
        print_error("wp-admin directory MISSING!");
    }
    
    // Check JavaScript files for Media Library
    print_status("\nChecking Media Library JavaScript files...");
    $js_files = [
        'wp-includes/js/media-views.min.js',
        'wp-includes/js/media-models.min.js',
        'wp-includes/js/plupload/plupload.full.min.js',
        'wp-admin/js/media-upload.min.js'
    ];
    
    foreach ($js_files as $js) {
        if (file_exists(ABSPATH . $js)) {
            print_success("  ✓ $js");
        } else {
            print_warning("  ✗ $js - Missing");
        }
    }
}

// 7. Summary and recommendations
print_status("\n==================================");
print_status("SUMMARY & RECOMMENDATIONS");
print_status("==================================\n");

if (count($missing_files) > 0) {
    print_error("CRITICAL: WordPress core files are missing!");
    print_status("Missing files:");
    foreach ($missing_files as $file) {
        print_error("  - $file");
    }
    print_status("\nRECOMMENDATION: Re-deploy WordPress core files");
    print_status("Run: ./scripts/deploy.sh staging core");
} else {
    print_success("All critical core files are present");
}

// Check if this is a subdirectory installation
if (strpos($current_dir, '/public_html') !== false || strpos($current_dir, '/www') !== false) {
    print_status("\nDetected standard hosting environment");
} else {
    print_warning("\nNon-standard directory structure detected");
    print_status("Current path: " . $current_dir);
}

print_status("\nIf Media Library still doesn't work after verifying core files:");
print_status("1. Check browser console for JavaScript errors");
print_status("2. Try disabling all plugins");
print_status("3. Switch to default Twenty Twenty-Four theme temporarily");
print_status("4. Check server error logs");
print_status("5. Verify .htaccess file is not blocking admin-ajax.php");

print_status("\nVerification complete!");
?>