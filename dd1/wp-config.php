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
define( 'DB_NAME', 'dd1' );

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
define( 'AUTH_KEY',         'XP6KsDDpbSKDkZKtJuYTUVWcBuQW42T3HQoMKSZT0CS0KcIWIAIKtrRHHrrpg1uW' );
define( 'SECURE_AUTH_KEY',  'ombVrAuPqqHHAR0qHQHRf7Mht8T7u7mu0PD4anoMzqYZQviGVwUWcaZZ0fC825lD' );
define( 'LOGGED_IN_KEY',    'p7Pbf7nuYry2PSwgNVd2GUYeaXNK2x0wdveDqGg7YBjowTuQWqFW6baGpqKxQKaa' );
define( 'NONCE_KEY',        '8y4J4aQ4ZTtomHyRoWcuFYgDcrTB2WgiakN3JAedkcs52BUPAQWcQzsPeiG5Ob8p' );
define( 'AUTH_SALT',        'TFXqEv148EaWsY4HSMiGVNKKybyCWLIvW8KtQmzzHvCUmR637XwprH8Gw1Qb05RU' );
define( 'SECURE_AUTH_SALT', 'GBdbFvZfi5g7jsNaP1WgluOI65ZdiMPs8oVrk5746ajj8S0nyUK7WatT5aD6aGY2' );
define( 'LOGGED_IN_SALT',   'EHbiFJcuJMke13HL2hmGuyOXsEkHVOh3m77YOuA9tCCzXJAjH8d0ZsgSQuwWDV3i' );
define( 'NONCE_SALT',       'NLcP4Rt1upKWlW17VZ7jwRmkP3lEh4JX6IvCExfWRd3fi0hXtqz5wVcZ7o8wcupl' );

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
