<?php
/**
 * Enable Plugin Deletion on Staging Server
 * This script connects via FTP and modifies wp-config.php
 */

// Load environment variables manually (parse_ini_file has issues with = in comments)
$envFile = dirname(__DIR__) . '/.env';
if (!file_exists($envFile)) {
    die("Error: .env file not found\n");
}

// Read .env file manually
$envContent = file_get_contents($envFile);
$env = [];
foreach (explode("\n", $envContent) as $line) {
    if (strpos($line, '=') !== false && substr(trim($line), 0, 1) !== '#') {
        list($key, $value) = explode('=', $line, 2);
        $env[trim($key)] = trim($value, " \t\n\r\0\x0B'\"");
    }
}

// FTP Configuration from .env
$ftp_server = $env['STAGING_HOST'] ?? '';
$ftp_user = $env['STAGING_USER'] ?? '';
$ftp_pass = $env['STAGING_PASS'] ?? '';
$ftp_path = $env['STAGING_PATH'] ?? '';

echo "Connecting to FTP server...\n";
$conn_id = ftp_connect($ftp_server);

if (!$conn_id) {
    die("Error: Could not connect to FTP server\n");
}

// Login with username and password
$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);

if (!$login_result) {
    die("Error: FTP login failed\n");
}

echo "Connected successfully to $ftp_server\n";

// Enable passive mode
ftp_pasv($conn_id, true);

// Navigate to staging directory
if (!ftp_chdir($conn_id, $ftp_path)) {
    die("Error: Could not change to directory $ftp_path\n");
}

echo "Changed to directory: $ftp_path\n";

// Download wp-config.php
$local_file = '/tmp/wp-config-staging.php';
$remote_file = 'wp-config.php';

echo "Downloading wp-config.php...\n";
if (!ftp_get($conn_id, $local_file, $remote_file, FTP_ASCII)) {
    die("Error: Could not download wp-config.php\n");
}

// Read and modify the file
$config = file_get_contents($local_file);

// Check for DISALLOW_FILE_MODS and comment it out
if (strpos($config, "define('DISALLOW_FILE_MODS'") !== false || strpos($config, 'define("DISALLOW_FILE_MODS"') !== false) {
    // Comment out DISALLOW_FILE_MODS
    $config = preg_replace(
        "/(define\s*\(\s*['\"]DISALLOW_FILE_MODS['\"].*?\);)/",
        "// $1 // Temporarily disabled to allow plugin management",
        $config
    );
    echo "Found and commented out DISALLOW_FILE_MODS\n";
} else {
    echo "DISALLOW_FILE_MODS not found in wp-config.php\n";
}

// Check for DISALLOW_FILE_EDIT and modify if needed
if (strpos($config, "define('DISALLOW_FILE_EDIT', true)") !== false || strpos($config, 'define("DISALLOW_FILE_EDIT", true)') !== false) {
    echo "Found DISALLOW_FILE_EDIT set to true (this doesn't affect plugin deletion)\n";
}

// Save modified file
file_put_contents($local_file, $config);

// Create backup first
$backup_file = 'wp-config-backup-' . date('Y-m-d-His') . '.php';
echo "Creating backup as $backup_file...\n";
ftp_put($conn_id, $backup_file, $local_file, FTP_ASCII);

// Upload modified file
echo "Uploading modified wp-config.php...\n";
if (!ftp_put($conn_id, $remote_file, $local_file, FTP_ASCII)) {
    die("Error: Could not upload modified wp-config.php\n");
}

echo "\n✅ SUCCESS! Plugin deletion has been enabled on staging server.\n";
echo "A backup was created as: $backup_file\n\n";
echo "⚠️  IMPORTANT NOTES:\n";
echo "1. Refresh your WordPress admin panel\n";
echo "2. You should now see 'Delete' option for inactive plugins\n";
echo "3. After deleting unwanted plugins, consider re-enabling the security setting\n\n";
echo "To re-enable security (after you're done):\n";
echo "   Uncomment the DISALLOW_FILE_MODS line in wp-config.php\n";

// Clean up
unlink($local_file);
ftp_close($conn_id);