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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hirerekrut' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'P|IN:jZ<+mBcE!1gdF)N?.3XakV2^v*#3;T1MwD)Qd4]YY{B]~ga4q6=#d7}{9{u' );
define( 'SECURE_AUTH_KEY',  'u^at^pN;!#i,<@=.+g<9j`;YfJqF%nD{(`/?VRfQ<U2~m=o3~F-#S2r20Bs~Vt}O' );
define( 'LOGGED_IN_KEY',    'b1Hrc_G5wAN,{+`>!S8*yya{(O>d9UTa OpgmvX@-pxM28oQh9cx)#=tF&^iFu!i' );
define( 'NONCE_KEY',        'pS/izE]Ln?}`1_7|v6IDhR6?XXq&*<xdPjYO9Vxf]_S:6Sy96~`2)~t^|Qmz$=Dx' );
define( 'AUTH_SALT',        'e^r5Zcp6rtmr<#<8D2>!o]yk8E<I4%.Fegz47?^2J5nb#I;x Sg>IY<(r4t5_bZ5' );
define( 'SECURE_AUTH_SALT', '|S[(F>]kLhemtAKm}/sL&ByP4,NV6[E~+o8Plb |J<[z5N}d,7GPv+>^.Wn,*hXf' );
define( 'LOGGED_IN_SALT',   'Cvbw%9OR0~i&ZU%}` %oHt [ascF&ohi/-~iLcqj}+f^..h~ $PodWh0#H{J~JDp' );
define( 'NONCE_SALT',       '^yiY4%jMAP~nZ|W7PB6]4:p?lan/EN`e~*(E>KoB^D-}kweDl/}56?U}d6Ajv/WY' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
