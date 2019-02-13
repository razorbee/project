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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'i5387410_wp1');

/** MySQL database username */
define('DB_USER', 'i5387410_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'A.6KHTrQWrUb5L1EKvG99');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SiuFyoakcuteI3GJJhKCQV1iQhKClvWGroWr3mvzq1S64eIIqE6qwA4vS87AlBJg');
define('SECURE_AUTH_KEY',  'UPouK3S2qqt49Ifr4smJBbosRNTQ5blVDXpcDQ4Mp2g9Y0VArvc3hTvivJYlad0S');
define('LOGGED_IN_KEY',    'EEM5pH44JSKHVgeXvKBRTfoaMqgyrNHZcYFE96ksatrRG6ZTcczkNRYkaBLanQ9Q');
define('NONCE_KEY',        'aV8P3vG8K0hBR0HZlGrlhRQQtwrEK45cPzovUumIJmyqi9pLTzXWzHnteJUMnEIV');
define('AUTH_SALT',        'tFhrly3dfBtmBtM5bymXrcAVIHkLKxAviWmm5x07qhG18hy4Vsl9aixyf99rWvii');
define('SECURE_AUTH_SALT', 'Szyi8MLUiV0bFY2AmGGH8eFzK85fPIejpOhegRyJVcRpB5dqYtgQByZJGr7JgTPn');
define('LOGGED_IN_SALT',   'dyTVRNy5OLTFjanCRyRfN3fouH0qa7STDek8uvW4VN9hrchDLKaDjmJmMXKXnc80');
define('NONCE_SALT',       'gINk62LJTsPMa7ITWPdkBujBB6jFj354mYcjF0Skh57KmZH3y5F5uyE8bRvLd141');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
