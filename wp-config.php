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
define('DB_NAME', 'Platzi');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '>%VA6ZsX Mu6mV9yju(B[3klc6 +.|s0triAx/2(>g!jl};:)1MBD,tu`I->VxwB');
define('SECURE_AUTH_KEY',  'CEWQR#-Gt Q(Lf?3HYrkzKZo4}~R8-7pX)sKFe3kT:+!deQoMv+ZhP+0?j_`+CG5');
define('LOGGED_IN_KEY',    'km&Y195EmS$NEGujZ!1xo2! roRPI([RXMY%bmvu99BkoK5gASsP/T]S)r}Oj[S~');
define('NONCE_KEY',        'Z461+pWl}+b?`@gdvp,}tmEfY!* BZ9WLKIO{_EMVP.O%/y!NP=r~0?5x9!ox;;s');
define('AUTH_SALT',        'xkKW:WUdXyWKt[+baU}G]|*26NlrYC;)$,)F#0ajaG &=-`Hw~,3!2Mk2u3fJo?/');
define('SECURE_AUTH_SALT', 'X<;r9YcQ5jKnr2cZ}J,l9Kvww%2sljv&gS2[;pC#ssDA/ST0y7fle2dPWi$![`yx');
define('LOGGED_IN_SALT',   '=VEeM4@T:I{6jX};)R8aSK}tTOO1LJyF~Xzc3B_Futt]G@eBk%@APj`@-6ji0gUZ');
define('NONCE_SALT',       'CxywtJQ|/]@v)l0wu6x^!xX^*?Ppt-wh7O5m#}R6#xC{H%;TEH1HeLCaMBL}tEwI');

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
