<?php
/**
 * WordPress Configuration Checker
 * Upload this file to your staging site root and access it via browser
 * Delete immediately after use for security
 */

// Check if WordPress is loaded
if (!file_exists('wp-config.php')) {
    die('Please upload this file to your WordPress root directory');
}

// Load WordPress config
require_once('wp-config.php');

echo "<h2>WordPress File Management Configuration Check</h2>";
echo "<pre>";

// Check critical constants that affect plugin deletion
$constants = [
    'DISALLOW_FILE_MODS' => 'Completely disables file modifications (plugins/themes install/update/delete)',
    'DISALLOW_FILE_EDIT' => 'Disables theme/plugin editor (sometimes affects deletion)',
    'WP_DEBUG' => 'Debug mode status',
    'FS_METHOD' => 'File system method (direct, ssh2, ftpext, ftpsockets)',
    'FTP_USER' => 'FTP username if configured',
    'FTP_HOST' => 'FTP host if configured'
];

foreach ($constants as $const => $description) {
    echo "\n<strong>$const:</strong> ";
    if (defined($const)) {
        $value = constant($const);
        if (is_bool($value)) {
            echo $value ? 'TRUE' : 'FALSE';
        } else {
            echo $value;
        }
    } else {
        echo 'NOT DEFINED';
    }
    echo "\n  → $description\n";
}

// Check file permissions
echo "\n<h3>Directory Permissions:</h3>";
$dirs = [
    'wp-content' => 'wp-content',
    'plugins' => 'wp-content/plugins',
    'themes' => 'wp-content/themes',
    'uploads' => 'wp-content/uploads'
];

foreach ($dirs as $label => $dir) {
    if (file_exists($dir)) {
        $perms = substr(sprintf('%o', fileperms($dir)), -4);
        $writable = is_writable($dir) ? 'YES' : 'NO';
        echo "$label: $perms (Writable: $writable)\n";
    }
}

echo "\n<h3>User Capabilities:</h3>";
// This would need WordPress loaded fully to check
echo "To check user capabilities, you need to be logged into WordPress admin.\n";

echo "</pre>";

echo "\n<h2>How to Fix Missing Delete Option:</h2>";
echo "<ol>";
echo "<li><strong>If DISALLOW_FILE_MODS is TRUE:</strong> Set it to FALSE or remove the line in wp-config.php</li>";
echo "<li><strong>If permissions are not writable:</strong> Set wp-content/plugins to 755 or 775</li>";
echo "<li><strong>If using managed hosting:</strong> Contact your host to enable file modifications</li>";
echo "</ol>";

echo "\n<p style='color:red;'><strong>⚠️ DELETE THIS FILE IMMEDIATELY AFTER CHECKING!</strong></p>";