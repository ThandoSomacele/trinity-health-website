<?php

/**
 * The base configuration for WordPress
 *
 * This file is used by the wp-config.php creation script during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * Trinity Health WordPress Configuration
 * Traditional WordPress setup with DDEV support
 */

// Include DDEV-generated settings if available
if (file_exists(__DIR__ . '/wp-config-ddev.php')) {
    include __DIR__ . '/wp-config-ddev.php';
}

// ** Database settings - DDEV or fallback ** //
if (getenv('IS_DDEV_PROJECT') == 'true') {
    /** The name of the database for WordPress */
    defined('DB_NAME') || define('DB_NAME', 'db');

    /** MySQL database username */
    defined('DB_USER') || define('DB_USER', 'db');

    /** MySQL database password */
    defined('DB_PASSWORD') || define('DB_PASSWORD', 'db');

    /** MySQL hostname */
    defined('DB_HOST') || define('DB_HOST', 'ddev-trinity-health-website-db');

    /** WP_HOME URL */
    defined('WP_HOME') || define('WP_HOME', 'https://trinity-health-website.ddev.site');

    /** WP_SITEURL location - Traditional WordPress structure */
    defined('WP_SITEURL') || define('WP_SITEURL', WP_HOME);
} else {
    // Production database settings - to be configured
    define('DB_NAME', 'trinity_health_db');
    define('DB_USER', 'username_here');
    define('DB_PASSWORD', 'password_here');
    define('DB_HOST', 'localhost');
}

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 * Generate these using {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
if (getenv('IS_DDEV_PROJECT') == 'true') {
    defined('WP_DEBUG') || define('WP_DEBUG', true);
    defined('WP_DEBUG_LOG') || define('WP_DEBUG_LOG', true);
    defined('WP_DEBUG_DISPLAY') || define('WP_DEBUG_DISPLAY', true);
} else {
    defined('WP_DEBUG') || define('WP_DEBUG', false);
}

/**
 * Trinity Health specific configurations
 */
// Enable WordPress memory limit
define('WP_MEMORY_LIMIT', '256M');

// Disable file editing in admin
define('DISALLOW_FILE_EDIT', true);

// Enable WordPress automatic updates
define('WP_AUTO_UPDATE_CORE', true);

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
