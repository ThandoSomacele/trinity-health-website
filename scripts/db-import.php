<?php
/**
 * Trinity Health - Universal Database Import Script
 * Uses environment variables from .env file
 * 
 * Usage: php db-import.php staging database-file.sql.gz
 *        php db-import.php production database-file.sql.gz
 */

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

// Check arguments
if ($argc < 2) {
    print_error("Usage: php db-import.php [staging|production] [database-file.sql.gz]");
    exit(1);
}

$environment = $argv[1];
$sql_file = isset($argv[2]) ? $argv[2] : '';

// Load environment variables
$env_file = dirname(__FILE__) . '/../.env';
if (!file_exists($env_file)) {
    print_error(".env file not found at: $env_file");
    exit(1);
}

// Parse .env file
$env_vars = [];
$lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    if (strpos($line, '#') === 0) continue;
    if (strpos($line, '=') === false) continue;
    
    list($key, $value) = explode('=', $line, 2);
    $key = trim($key);
    $value = trim($value);
    
    // Remove quotes if present
    if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
        (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
        $value = substr($value, 1, -1);
    }
    
    $env_vars[$key] = $value;
}

// Get configuration based on environment
if ($environment === 'staging') {
    $db_host = $env_vars['STAGING_DB_HOST'] ?? 'localhost';
    $db_name = $env_vars['STAGING_DB_NAME'] ?? '';
    $db_user = $env_vars['STAGING_DB_USER'] ?? '';
    $db_pass = $env_vars['STAGING_DB_PASS'] ?? '';
    $site_url = $env_vars['STAGING_URL'] ?? '';
    $local_url = $env_vars['LOCAL_URL'] ?? 'https://trinity-health-website.ddev.site';
} elseif ($environment === 'production') {
    $db_host = $env_vars['PRODUCTION_DB_HOST'] ?? 'localhost';
    $db_name = $env_vars['PRODUCTION_DB_NAME'] ?? '';
    $db_user = $env_vars['PRODUCTION_DB_USER'] ?? '';
    $db_pass = $env_vars['PRODUCTION_DB_PASS'] ?? '';
    $site_url = $env_vars['PRODUCTION_URL'] ?? '';
    $local_url = $env_vars['LOCAL_URL'] ?? 'https://trinity-health-website.ddev.site';
} else {
    print_error("Invalid environment: $environment");
    print_error("Use 'staging' or 'production'");
    exit(1);
}

// Validate configuration
if (empty($db_name) || empty($db_user) || empty($db_pass) || empty($site_url)) {
    print_error("Missing database configuration for $environment in .env file");
    print_error("Required: {$environment}_DB_NAME, {$environment}_DB_USER, {$environment}_DB_PASS, {$environment}_URL");
    exit(1);
}

print_status("Trinity Health - Database Import for $environment");
print_status("=========================================");
print_status("Database: $db_name@$db_host");
print_status("Site URL: $site_url");

// Find database file if not specified
if (empty($sql_file)) {
    print_status("Looking for latest $environment database export...");
    
    $backup_dir = dirname(__FILE__) . '/../backups/database';
    $files = glob($backup_dir . "/*-{$environment}.sql.gz");
    
    if (empty($files)) {
        print_error("No database file found for $environment");
        print_error("Please specify a file: php db-import.php $environment /path/to/file.sql.gz");
        exit(1);
    }
    
    // Get the most recent file
    usort($files, function($a, $b) {
        return filemtime($b) - filemtime($a);
    });
    
    $sql_file = $files[0];
}

// Validate SQL file
if (!file_exists($sql_file)) {
    print_error("Database file not found: $sql_file");
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

// Get table prefix from wp-config.php if it exists
$table_prefix = 'wp_'; // Default
$wp_config = dirname(__FILE__) . '/../web/wp-config.php';
if (!file_exists($wp_config)) {
    // Try current directory (if running on server)
    $wp_config = './wp-config.php';
}

if (file_exists($wp_config)) {
    $config_content = file_get_contents($wp_config);
    if (preg_match("/\\\$table_prefix\s*=\s*['\"]([^'\"]+)['\"]/", $config_content, $matches)) {
        $table_prefix = $matches[1];
        print_status("Using table prefix from wp-config.php: $table_prefix");
    }
} else {
    print_warning("wp-config.php not found, using default prefix: $table_prefix");
}

// Create backup of current database
$timestamp = date('YmdHis');
$backup_file = dirname(__FILE__) . "/{$environment}-backup-{$timestamp}.sql.gz";

print_status("Creating backup of current database...");
$backup_cmd = "mysqldump -h{$db_host} -u{$db_user} -p'{$db_pass}' {$db_name} --single-transaction --routines --triggers | gzip > {$backup_file}";
exec($backup_cmd . ' 2>&1', $output, $return_var);

if ($return_var === 0 && file_exists($backup_file) && filesize($backup_file) > 0) {
    print_success("Backup created: " . basename($backup_file));
} else {
    print_warning("Could not create backup, continuing anyway...");
}

// Prepare import file
print_status("Preparing database for import...");
$temp_dir = '/tmp/trinity-db-import-' . uniqid();
mkdir($temp_dir);
$temp_sql = $temp_dir . '/import.sql';

// Decompress the file
if (substr($sql_file, -3) === '.gz') {
    exec("gunzip -c {$sql_file} > {$temp_sql}");
} else {
    copy($sql_file, $temp_sql);
}

// Replace URLs
print_status("Updating URLs from $local_url to $site_url...");
$replacements = [
    $local_url => $site_url,
    'http://localhost:8000' => $site_url,
    'http://localhost' => $site_url,
    'http://trinity-health-website.ddev.site' => $site_url,
];

foreach ($replacements as $search => $replace) {
    exec("sed -i 's|{$search}|{$replace}|g' {$temp_sql}");
}

// Clean up malformed URLs
print_status("Cleaning up malformed URLs...");
exec("sed -i 's|{$site_url}:33001/wp|{$site_url}|g' {$temp_sql}");
exec("sed -i 's|{$site_url}:33001|{$site_url}|g' {$temp_sql}");
exec("sed -i 's|{$site_url}/wp|{$site_url}|g' {$temp_sql}");

// Replace email domains
$local_domain = parse_url($local_url, PHP_URL_HOST);
$target_domain = parse_url($site_url, PHP_URL_HOST);
exec("sed -i 's|@{$local_domain}|@{$target_domain}|g' {$temp_sql}");

// Convert table prefix if needed
$source_prefix = 'wp_'; // Local and staging both use wp_ now
if ($table_prefix !== $source_prefix) {
    print_status("Converting table prefix from {$source_prefix} to {$table_prefix}...");
    
    // Replace in table names
    exec("sed -i \"s|'{$source_prefix}|'{$table_prefix}|g\" {$temp_sql}");
    exec("sed -i \"s|\`{$source_prefix}|\`{$table_prefix}|g\" {$temp_sql}");
    exec("sed -i \"s| {$source_prefix}| {$table_prefix}|g\" {$temp_sql}");
    
    // Replace in options that reference table names
    exec("sed -i \"s|{$source_prefix}user|{$table_prefix}user|g\" {$temp_sql}");
    exec("sed -i \"s|{$source_prefix}capabilities|{$table_prefix}capabilities|g\" {$temp_sql}");
}

// Import database
print_status("Importing database to $environment...");
$import_cmd = "mysql -h{$db_host} -u{$db_user} -p'{$db_pass}' {$db_name} < {$temp_sql}";
exec($import_cmd . ' 2>&1', $output, $return_var);

if ($return_var === 0) {
    print_success("Database import completed successfully!");
} else {
    print_error("Database import failed");
    print_error("Output: " . implode("\n", $output));
    
    // Clean up
    exec("rm -rf {$temp_dir}");
    exit(1);
}

// Clean up temporary files
exec("rm -rf {$temp_dir}");

// Update WordPress options
print_status("Updating WordPress options...");

$queries = [
    "UPDATE {$table_prefix}options SET option_value = '{$site_url}' WHERE option_name = 'siteurl'",
    "UPDATE {$table_prefix}options SET option_value = '{$site_url}' WHERE option_name = 'home'",
    "DELETE FROM {$table_prefix}options WHERE option_name LIKE '_transient_%'",
    "DELETE FROM {$table_prefix}options WHERE option_name LIKE '_site_transient_%'"
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
print_success("Database import completed!");
print_success("========================================");
echo "\n";
echo "Environment: $environment\n";
echo "Database: $db_name\n";
echo "Site URL: $site_url\n";
echo "Table Prefix: $table_prefix\n";
if (isset($backup_file) && file_exists($backup_file)) {
    echo "Backup saved: " . basename($backup_file) . "\n";
}
echo "\n";
print_status("Next steps:");
echo "1. Clear all caches\n";
echo "2. Test the site functionality\n";
echo "3. Verify all URLs are correct\n";
echo "4. Check that admin login works\n";