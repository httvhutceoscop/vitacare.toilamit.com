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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/domains/vitacare.vn/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'vitacarevn_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
/*define( 'AUTOSAVE_INTERVAL', 60*60*60*24*365 ); // autosave 1x per year
define( 'EMPTY_TRASH_DAYS',  0 ); // zero days
define( 'WP_POST_REVISIONS', false ); // no revisions*/
define('DISALLOW_FILE_EDIT',true);
define('DISALLOW_FILE_MODS',true);

/*define('DISALLOW_FILE_EDIT',true);
define('DISALLOW_FILE_MODS',true);*/
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Sw+<yL+?UJVL@{O9-q$NU33xH M|)BbV-+F(P|NrI-G| .qk)C(*WpZOw(])=q}a');
define('SECURE_AUTH_KEY',  '2UeN?:,g5i[MwU?)P,|Sw}eDH89F~/n]+/Vk*[ADjDPR!J3@qRY%u^o;J 02YJ.f');
define('LOGGED_IN_KEY',    'zy-rY|eD|,wZL.!e%~[$j-T`yI|+ QWM5|;Xz7Y:e<Kvli444Ye[S`~m!_c-&1kt');
define('NONCE_KEY',        ';x(N+;xI,mu2a)-|80 pm,MF!&+iHpv@ni-DHr`%|[XIQPb@yDBkW{[o_]0ke?^]');
define('AUTH_SALT',        '69z@Oy+^Y+6I]zZK]K~|#TQ <1UCbY6gE.AMmrXHZMSx!-Q|2Q9/[6>JdW/p<(h@');
define('SECURE_AUTH_SALT', 'XF Mh>>)+m.Q?SVb d&pO&@qOV:a#>}*htq:A2c2r7.Hq^3c6-/B.R8fq^,|m7>.');
define('LOGGED_IN_SALT',   '|_[Y%qlp/ tZT!N9oOwa Y[||N;n9D.[!DB2jk>p34DY>Vh O8WDO#Sr5K&}Y^bY');
define('NONCE_SALT',       '~e|:q/8!>&5l,DI1);ob/k]K+)+WN0p9d9%h|me,Wg+`)>X[FMdh7kj4-lnbX|`-');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'xtl_';

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
