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
define( 'DB_NAME', 'portfolio' );

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
define( 'AUTH_KEY',         '6``0~ ZhKCY{/Tyrnj6dj80 HsI=I{/qXp3kh!_^cM?e8KaZ6ritO%1m>(Z5@05s' );
define( 'SECURE_AUTH_KEY',  'Byw=sEA@TqVP43Mqa}*sX9[[$.ly`M:?/0$)$G?~CkB^?e+?~`E}KiqgpK4v1Mfa' );
define( 'LOGGED_IN_KEY',    'q,<&@SU41P*z=84-e5uVeirB8KvJ1wRV7e@.f@%0D!ct>W2r?q8d0:@LT9c]c1vD' );
define( 'NONCE_KEY',        'KyS1KjrZm@qf1aICncE:Zw?k19Xo!z]1vT=5R9zVjTG2g=S,Pnd.H8X 4u^DP<$y' );
define( 'AUTH_SALT',        '98re+Rp-?9.W*!M&+%X.]3 }Qs3M+274C0LwT$NG>]F]w:%~].i-.yyoE~_hp<w^' );
define( 'SECURE_AUTH_SALT', 'iT&]AKQ;l%?J7#>Z2{=wr+m^G!^nJ3X}~MDmtz5vG!59I?.Po802U3/-h*Kz|&_!' );
define( 'LOGGED_IN_SALT',   '/~<>(Vu,0W.zn6&eVEbkx=x`yaCidBQ#5,Yo/qgcw&%tf. %ruxLI*|pPaG*z$r)' );
define( 'NONCE_SALT',       '[&:vqi%)KNj>B[YQ^a%pTgI|,#9-8#mD`*i_-Y/79TqPxv.Fpq01CG5Bfn<k]I}z' );

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

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
