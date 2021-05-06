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
define( 'DB_NAME', 'meliaura' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'I>KGCWuN+4KQ3FtW.j_&DCs<+/I)7o)^>FR90X^9bOOGAEffDlk*g#IzP1u2^EO9' );
define( 'SECURE_AUTH_KEY',  'aW>^t_k?+pcwRM36oEhBm[Mx*.EEJzk/P?^-SJgFAVZE;h^Z%VU!bx^#?S**SKi>' );
define( 'LOGGED_IN_KEY',    'K:1`HKEANJZ8Qh!Y#tYg#q}DK:fpV|6GMp<=|rmO,i?iJ&,LL>XYEHG9fOIU{nNb' );
define( 'NONCE_KEY',        'X|X+<xm:5Sv2K$UtBbPw}rpGfKcGa1 8joadMkhkcO]7#,hC7yv*r.7:Mt:/J3sL' );
define( 'AUTH_SALT',        'f]f}mIvC+]yP+@{CXwXRK!|i.IxL(F%S&D1z:f:$,a1BLr+?sb.&}CBxm)*ux.ub' );
define( 'SECURE_AUTH_SALT', 'C^Xok8=n0IX/WodHH^[NCe Ges/kBLKLZr8AB%H6|M$o!-B0Q/D)ChbGX4$}2j}k' );
define( 'LOGGED_IN_SALT',   'MCDn:`OGj_htzynhov^s+4b-E8gvHJ`,:ZVv Dy$`AnFA,cG$J&AVz.BRoKOwpVY' );
define( 'NONCE_SALT',       'S4|)jNvZ[SQ/o,M?diyyHJg|)+^jzCY:3>mT$Kg0/e(y7lPPv;sn3T3<gJH1fT{N' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';



@ini_set( 'upload_max_filesize' , '2048M' );
@ini_set( 'post_max_size', '2048M');
@ini_set( 'memory_limit', '2048M' );
@ini_set( 'max_execution_time', '3000' );
@ini_set( 'max_input_time', '3000' );
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
