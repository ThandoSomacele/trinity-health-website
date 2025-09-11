<?php
/**
 * Trinity Health - Staging Database Import Script
 * Upload this file and the database export to staging server
 * Then run: php staging-db-import.php
 */

// Database configuration
$db_host = 'localhost';
$db_name = 'objecxuk_wp19';
$db_user = 'objecxuk_wp19';
$db_pass = '812Sm@F[Pp';
$site_url = 'https://staging.object91.co.za';
$table_prefix = 'wpyn_'; // Staging table prefix

// Colors for output
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

// Check if running from CLI
if (php_sapi_name() !== 'cli') {
    die("This script must be run from the command line\n");
}

print_status("Trinity Health - Staging Database Import");
print_status("=========================================");

// Find the latest staging export
$backup_dir = dirname(__FILE__) . '/../backups/database';
$sql_file = '';

// Check for command line argument
if ($argc > 1) {
    $sql_file = $argv[1];
} else {
    // Look for latest staging export
    $files = glob($backup_dir . '/*-staging.sql.gz');
    if (!empty($files)) {
        usort($files, function($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        $sql_file = $files[0];
    }
}

if (empty($sql_file) || !file_exists($sql_file)) {
    print_error("No database file found. Please specify a file:");
    print_error("  php staging-db-import.php /path/to/database.sql.gz");
    exit(1);
}

print_status("Database file: " . basename($sql_file));
$file_size = filesize($sql_file);
print_status("File size: " . number_format($file_size / 1024 / 1024, 2) . " MB");

// Test database connection
print_status("Testing database connection...");
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
    print_error("Connection failed: " . $mysqli->connect_error);
    exit(1);
}

print_success("Database connection successful");

// Create backup of current database
print_status("Creating backup of current database...");
$backup_file = dirname(__FILE__) . '/staging-backup-' . date('YmdHis') . '.sql.gz';
$backup_cmd = "mysqldump -h{$db_host} -u{$db_user} -p'{$db_pass}' {$db_name} --single-transaction --routines --triggers | gzip > {$backup_file}";
exec($backup_cmd . ' 2>&1', $output, $return_var);

if ($return_var === 0 && file_exists($backup_file) && filesize($backup_file) > 0) {
    print_success("Backup created: " . basename($backup_file));
} else {
    print_warning("Could not create backup, continuing anyway...");
}

// Prepare import file
print_status("Preparing database for import...");
$temp_sql = '/tmp/import-' . uniqid() . '.sql';

// Decompress the file
if (substr($sql_file, -3) === '.gz') {
    exec("gunzip -c {$sql_file} > {$temp_sql}");
} else {
    copy($sql_file, $temp_sql);
}

// Verify URLs are correct
print_status("Verifying URLs in database...");
$check_cmd = "grep -c '{$site_url}' {$temp_sql}";
exec($check_cmd, $output, $return_var);
$url_count = isset($output[0]) ? intval($output[0]) : 0;

if ($url_count > 0) {
    print_success("Found {$url_count} instances of staging URL");
} else {
    print_warning("No staging URLs found, checking for local URLs...");
    
    // Check for local URLs that need replacement
    $local_urls = [
        'https://trinity-health-website.ddev.site',
        'http://trinity-health-website.ddev.site',
        'http://localhost:8000',
        'http://localhost'
    ];
    
    foreach ($local_urls as $local_url) {
        $check_cmd = "grep -c '{$local_url}' {$temp_sql}";
        exec($check_cmd, $output, $return_var);
        $count = isset($output[0]) ? intval($output[0]) : 0;
        
        if ($count > 0) {
            print_warning("Found {$count} instances of {$local_url}, replacing...");
            exec("sed -i 's|{$local_url}|{$site_url}|g' {$temp_sql}");
        }
    }
}

// Import database
print_status("Importing database...");
print_warning("This may take a few minutes for large databases...");

$import_cmd = "mysql -h{$db_host} -u{$db_user} -p'{$db_pass}' {$db_name} < {$temp_sql}";
exec($import_cmd . ' 2>&1', $output, $return_var);

if ($return_var === 0) {
    print_success("Database import completed successfully!");
} else {
    print_error("Database import failed");
    print_error("Output: " . implode("\n", $output));
    unlink($temp_sql);
    exit(1);
}

// Clean up temporary file
unlink($temp_sql);

// Update WordPress options
print_status("Updating WordPress options...");

$queries = [
    "UPDATE {$db_name}.wp_options SET option_value = '{$site_url}' WHERE option_name = 'siteurl'",
    "UPDATE {$db_name}.wp_options SET option_value = '{$site_url}' WHERE option_name = 'home'",
    "DELETE FROM {$db_name}.wp_options WHERE option_name LIKE '_transient_%'",
    "DELETE FROM {$db_name}.wp_options WHERE option_name LIKE '_site_transient_%'"
];

foreach ($queries as $query) {
    if ($mysqli->query($query)) {
        print_success("Query executed successfully");
    } else {
        print_warning("Query failed: " . $mysqli->error);
    }
}

$mysqli->close();

print_success("========================================");
print_success("Database deployment completed!");
print_success("========================================");
echo "\n";
echo "Site URL: {$site_url}\n";
echo "Admin URL: {$site_url}/wp-admin/\n";
if (isset($backup_file) && file_exists($backup_file)) {
    echo "Backup saved: " . basename($backup_file) . "\n";
}
echo "\n";
print_status("Next steps:");
echo "1. Clear all caches\n";
echo "2. Test the site functionality\n";
echo "3. Verify all URLs are correct\n";
echo "4. Check that media files are loading properly\n";