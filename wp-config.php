<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/ploi/staging.tanpong.me/public/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'wp_stagingta_h6n' );

/** MySQL database username */
define( 'DB_USER', 'wp_stagingta_h6n_user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'q6kHxXjtUU1wIZel' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


// define( 'WP_DEBUG', true );

// // Enable Debug logging to the /wp-content/debug.log file
// define( 'WP_DEBUG_LOG', true );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'A4rVWB8849IRz63UCzZc6Rjxp' );
define( 'SECURE_AUTH_KEY',  'r9jH5Dmfno0cgqQCzQOW6SHuB' );
define( 'LOGGED_IN_KEY',    '2ETmqaBR298xFuJ56bAG20eDP' );
define( 'NONCE_KEY',        'S7G3bMBZwIs6ll4sMgaltxN6u' );
define( 'AUTH_SALT',        '2rYJJz6aNqSlHlY555YzNJU2C' );
define( 'SECURE_AUTH_SALT', 'FbJe6VQjKQoXtPGoFIVf5wHn6' );
define( 'LOGGED_IN_SALT',   'YkFkTC0Msx5NeOiOdL1IxGwRe' );
define( 'NONCE_SALT',       'uHzTNcfOeBQWefeYrlpS1m86Q' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
// $table_prefix = 'wp_stg';
$table_prefix = 'dx36fd_';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);
// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', false);
// Disable display of errors and warnings which is recommended on a live site.
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors',0);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
