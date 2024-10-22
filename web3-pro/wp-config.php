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
define( 'DB_NAME', 'web3-pro' );

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
define( 'AUTH_KEY',         'Fsy6DcbfdT3u1dHVrq02i1G7kswmyl5ZTw1MKJPyPlq0DNMJ12ZMKW3bmGcTllTg' );
define( 'SECURE_AUTH_KEY',  'btFsO5zhCpalzJOKK2w76NiLGtVgl2xBAXRBl4NOge7HYpZO3w9odLeyyMfYaATP' );
define( 'LOGGED_IN_KEY',    'iIkVOxZAlobs9pSscjHmXefhTJaEf5kOT65INagvEt1OU5OlRYQPQRtiygeL4qSf' );
define( 'NONCE_KEY',        'eYXYp8mCJrQZ4LyqWbzqXpFF6aIyqU8EJj3KREzs3zMvk0na5kFpZNAV69uPOVyS' );
define( 'AUTH_SALT',        '6zTSdp3f1aJksHK0NekJFRUlXkIiGky4JyCJ0fubqWv3VHbJpZb3jZkQ8awjdZrg' );
define( 'SECURE_AUTH_SALT', '00ScpAM8CQYftVmClIogfxGaOjpwGY2NdIpPOtyCOtn21Qf2mJBw7nbTDMgxJoEq' );
define( 'LOGGED_IN_SALT',   'idTJNH3DntoXNPFWfq9ThQdxbHqu2dtJWkPsFxdqd5NHlgWG93XqDQ81SGR8jX2s' );
define( 'NONCE_SALT',       'GVDPoZ4PznWrhtQgKoiut9sMTbH516gsYPRdF7pcDwnX2PDio9v9sdyW64q3niuw' );

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
