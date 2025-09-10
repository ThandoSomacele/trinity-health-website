<?php
/**
 * Fix Plugin Issues on Staging Server
 * Deactivates problematic plugins via database update
 */

// Load environment variables
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

// Database configuration from .env
$db_host = $env['STAGING_DB_HOST'] ?? 'localhost';
$db_name = $env['STAGING_DB_NAME'] ?? '';
$db_user = $env['STAGING_DB_USER'] ?? '';
$db_pass = $env['STAGING_DB_PASS'] ?? '';

echo "Connecting to staging database...\n";

// Connect to database
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error . "\n");
}

echo "Connected successfully to database: $db_name\n";

// Get current active plugins
$query = "SELECT option_value FROM wp_options WHERE option_name = 'active_plugins'";
$result = $mysqli->query($query);

if ($result && $row = $result->fetch_assoc()) {
    $active_plugins = unserialize($row['option_value']);
    
    echo "\nCurrent active plugins:\n";
    foreach ($active_plugins as $plugin) {
        echo "  - $plugin\n";
    }
    
    // Remove problematic plugins
    $problematic_plugins = [
        'wp-fastest-cache/wpFastestCache.php',
        // Add other problematic plugins here if needed
    ];
    
    $modified = false;
    foreach ($problematic_plugins as $plugin) {
        $key = array_search($plugin, $active_plugins);
        if ($key !== false) {
            unset($active_plugins[$key]);
            echo "\nDeactivating: $plugin\n";
            $modified = true;
        }
    }
    
    if ($modified) {
        // Re-index array
        $active_plugins = array_values($active_plugins);
        
        // Update database
        $new_value = serialize($active_plugins);
        $update_query = "UPDATE wp_options SET option_value = '" . $mysqli->real_escape_string($new_value) . "' WHERE option_name = 'active_plugins'";
        
        if ($mysqli->query($update_query)) {
            echo "\n✅ Successfully deactivated problematic plugins!\n";
            
            echo "\nRemaining active plugins:\n";
            foreach ($active_plugins as $plugin) {
                echo "  - $plugin\n";
            }
        } else {
            echo "\n❌ Error updating database: " . $mysqli->error . "\n";
        }
    } else {
        echo "\n✅ No problematic plugins found in active plugins list.\n";
    }
    
} else {
    echo "Error fetching active plugins: " . $mysqli->error . "\n";
}

// Clean up cache-related transients
echo "\nCleaning up cache-related transients...\n";
$cleanup_queries = [
    "DELETE FROM wp_options WHERE option_name LIKE '%wpfc%'",
    "DELETE FROM wp_options WHERE option_name LIKE '%_transient_wpfc%'",
    "DELETE FROM wp_options WHERE option_name LIKE '%_transient_timeout_wpfc%'"
];

foreach ($cleanup_queries as $query) {
    if ($mysqli->query($query)) {
        $affected = $mysqli->affected_rows;
        if ($affected > 0) {
            echo "  Removed $affected cache-related entries\n";
        }
    }
}

echo "\n✅ Cleanup complete!\n";
echo "\nRecommendations:\n";
echo "1. Clear browser cache and refresh the staging site\n";
echo "2. If you need caching, consider installing a fresh copy of a cache plugin\n";
echo "3. Delete the wp-fastest-cache plugin folder via FTP if it exists\n";

$mysqli->close();