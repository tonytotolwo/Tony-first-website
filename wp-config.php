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
define('DB_NAME', 'highschool');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1149tony');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tdz}QUc,>M+ruxJ~!UqQ?D`OI-L|kmAd5D3J73-H2CGB-`Tt@gx4ej9+e=tB=.|=');
define('SECURE_AUTH_KEY',  'hvz@(@KZ}YYqmJJ8!FLNyr^I^tz`(D9R8J07K??#?}D -YQiSepXUE^qkP :4mL1');
define('LOGGED_IN_KEY',    '?UZmry&Q%U-MNO gS/#LQJ.lSjI0Vt:F/{g)sqn&@C5hG/.eXm)a_P,Z7p0aP#6U');
define('NONCE_KEY',        '1QY?jD<4)Rf6_kKP6=IO9B]D=FLqKy<q<#wEijDj:Ipo t?6{L(uCA(%S1:D8-+V');
define('AUTH_SALT',        'M)k 278I%^SnsqJp#4zg=?zfS6js.z4qV&6)_j7<*cyj;(/rP*C1lnr7 J(P~cCG');
define('SECURE_AUTH_SALT', 'hlxosJ~(>|*Ik4PT`Tc7TvB+/TB_:Nr|#SakD)#r*nbFXj~1t>)v%~yY<0Sk8Eq3');
define('LOGGED_IN_SALT',   'Wz/5LFG,q=%hDhBW@_x1u?CX^ eO7HJ(+t5(F?NG$cQ[_sLn):9yp:FEsJ^1W&nX');
define('NONCE_SALT',       '%b (_a3X]Np}]@?$bCsqsG4}95Vk$ejmvn-t`zEo ,NRvbJ`X!{>(m]Ln#n?D(L&');

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
