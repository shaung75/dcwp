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
define('AUTH_KEY',         '^F=t^ZJUh=dyYLOA=f-O/Hri/=ZkMfkD3NS7C9aYEKbetrDPMjcCbUYT+GX+M1Jj');
define('SECURE_AUTH_KEY',  'qd)9HE=GBDG44xH4IYYV-O^nK00=iAGyNKtM8yG0p52Zep2(vdsV9f9L+h34_VlV');
define('LOGGED_IN_KEY',    '9MrNf)sYgTfN3gzwCDfdv#h)gmdDFdnai/saPtrSR#KbpX6nQCrBURhKYa6cF-EK');
define('NONCE_KEY',        '5)977MMJW0#)5A9fT4utXB0AGKYdfJtL6cF1lR9_Fvy^0M7Sq0FOs8_GzStc/f(I');
define('AUTH_SALT',        'y_00O0zovxKWArCMjm-b-HOEmRqBKdb)1(MmnYQflCCE(B!#Y))h6Qdu-y9mpGLq');
define('SECURE_AUTH_SALT', 'ErCr82pg6j#jP(eyL4xmHQL-+QaSV#0U7zApemP6C==srOzgJzC803)EutG1zrU(');
define('LOGGED_IN_SALT',   'tI5^zRlfh3XOP3UGbbj7=DgqA30T3(Mqd(s)!_/L!p3_JfLlVDG4)Oopunv+7KW(');
define('NONCE_SALT',       'sbxJFqX+O^V5wR-PZms4q+fUE1thxpKr)Z0MZTUtVdY^dhNtRqhXB3#3u(BA5Y2d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 *  Change this to true to run multiple blogs on this installation.
 *  Then login as admin and go to Tools -> Network
 */
define('WP_ALLOW_MULTISITE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/* Destination directory for file streaming */
define('WP_TEMP_DIR', ABSPATH . 'wp-content/');

