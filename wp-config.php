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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '+Otg8#eWG!CKD9f99qWOI;N0A^$}U^)0dfSKSV V -zSMhXMSHoqD|$2y!C]aVt,' );
define( 'SECURE_AUTH_KEY',  'L=5M5^dmQ*QtiC$f?@=yys$Mom29Ygy/qMN*J0gjHBSU!1W`dWgy&$>wwJ=vw7xy' );
define( 'LOGGED_IN_KEY',    'CAU|m W>WS&na?0Q$nIMvN?= )^q!``.<!fi*<$Sy~n{W}4vy]jq?nwu[wFf2UP+' );
define( 'NONCE_KEY',        '~=%_?*=kD5IBx2R8&[hASuBoTGnh)VL$M5>b*.`_E:G6XanY}cO,4^ze)oqLHW`]' );
define( 'AUTH_SALT',        'LlKmMe)Q<QCw6v>ZK9.>=Pz{f.x>D?@9qFs*%:%38EZlZ9r.Rib:rWuw<,N2;o,%' );
define( 'SECURE_AUTH_SALT', '2K1YhQcxBW<59o<?G0 n-bzee*`SaGjp^UqDn;GoXTZ}#e^lW,<YC#F3v*-j]EX{' );
define( 'LOGGED_IN_SALT',   ';ogC. ZT!}[*-]`7DvK12Y=Te#4_seKF8?Q26.1z{ ~%PuhE}o?v&pt (1^sE_#5' );
define( 'NONCE_SALT',       'roBt[V`!zq]+r<(Xz6?;%q*QFA1=Yw2H<mYcXH2zITDp0>ybGNB%#o%OZnsX,VH%' );

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
