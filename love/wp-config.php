<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'love' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nWgUFkP2b6pqTAKVUG9GI3gLEkgLLq5TOi4e6nYUupdJMY6f1wFjKprKn7Hyy2kU' );
define( 'SECURE_AUTH_KEY',  '8MLMDK8wYcisRDu8n8nlwXZpbj8IJwcBn9kFrhi1WNxh3WqbBYlfBLsAhe5aak3T' );
define( 'LOGGED_IN_KEY',    'hQMj2Ro3JQHabxNshP8ZxgwNyI0G5LEw7KJjikXOloXXnn8PmgH09eoHx9FLJTpV' );
define( 'NONCE_KEY',        'gL6uqJrvec0TFkWFVu6MQc8T6pgK01MPLV9maGD2JcMNDYqTrkPG7SS2yTboSQRP' );
define( 'AUTH_SALT',        'dQ3BqYEKFTd2mUQg9LucZf99sZBeN3eo1DjTD7978E54tPRPAwiKaaG1kd5fl5U6' );
define( 'SECURE_AUTH_SALT', 'gq3WC9oDhzsWn0sIGfzJzWUXkYisMGG0vN8ZikdxvbW2zXW8yhHeXyx4PPOtQs8f' );
define( 'LOGGED_IN_SALT',   'qu3t2fF03cSEI3L4AXjnBfrkGmjp9V95epwC9oSlUMmIUoDLjA49u2ta6Jp5q2uh' );
define( 'NONCE_SALT',       'Kx7qNfZV8MEVEfs9b7mevNwQ4z2QcoBlqW0lm5GSkwUPKpz9IZjTuFxoNeJo8Vb6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
