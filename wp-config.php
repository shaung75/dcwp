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

include('wp-config.local.php');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0iN)fD  P.!gi4]Cbq#ifbfv46,97m)mDfx&Pu`s:dXuba_h(b0(QV8H}Ff#BKbm');
define('SECURE_AUTH_KEY',  '>7Z<CDSh5`Q:V&lK>evGwWayU:SoO7Zcbsa|$A.P#jpBU{lL=tHvoo~zX}3q,B,M');
define('LOGGED_IN_KEY',    'VRxz4s_a8Q{H0SF)AdlHUH[2g@BtDHG0_!Ch+UbIHrg0uy3ubau<wtrdd/pB S,t');
define('NONCE_KEY',        'nC_,r10IK,-2N2z<#8K.a2xxZ8!w5f_QrYnLOpIy&cE{[y`#Db3?YVKL?bViK:1~');
define('AUTH_SALT',        'LjAD9+;^4eb}v*xrAAf7|CR$FPF,Mb;pJvXafHzI|D?Lq?y@ fm;QfF& sYU<6X1');
define('SECURE_AUTH_SALT', '+xe2zUU:6<{7ME.i.z-k )Gfoy5rQgLV|HUizKZ_Xg`%6|J3/Z3Ta5UzuqkkB-.f');
define('LOGGED_IN_SALT',   'wS<Gc{-c${5CDT]Xm$)1{6KYTm;g}KnZPIW6=gic[-X]1@dXc{?h(S3VIFAt1Ex6');
define('NONCE_SALT',       ')W+f[NZsE~2.Z^be`sJ.Sqb8o]mMo%Mt~FNeB0%uEvN1r@/pFn+|eguWE_}dZAf}');

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
