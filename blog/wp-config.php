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
define('DB_NAME', 'db_pankajnepal');

/** MySQL database username */
define('DB_USER', 'db_pankajnepal');

/** MySQL database password */
define('DB_PASSWORD', 'wQj9LJH8dnB3vBr2');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'hI/--3RMxn}y@~t`d<@e[[}Y/gU/#qElK/BsKg{eGuk(fmo5!evo)rFd{D1?(1T[');
define('SECURE_AUTH_KEY',  '-|#+m4Ew@gR,s@@g})DIQ/tJ:WL`G*&w;2i7kk#s|-5E(D0R,5`T?T}.  K)5|u+');
define('LOGGED_IN_KEY',    '-E6*t[WUQ8F#XaH}$ZQe]bJ1VPrw^1Nm-TneVFMiM}h*?z*8q5D?VX_dsOI&H|+@');
define('NONCE_KEY',        '@-e5T:-FT%b+mv!sn7xWf[M,|+|s`HU(:m<;8V8^VI,u*De%@N|ita@h(C+`RpF>');
define('AUTH_SALT',        '-GE:?vZ^/`VRe=(j6dG;[rR7ANx:?@qM3|^P85jvt&]ZdFr R]$llLq^pIxN)Y)K');
define('SECURE_AUTH_SALT', 'efs8@,Z?>+^=Q|Fw-*mZK8k$HSE U_tNlD+ukimtUxldKdx_lMu|~*I;Z/=s8J+I');
define('LOGGED_IN_SALT',   '++PHR)EP_y!6M[gAbBmv]*O_Hey/4H1jXC2ZCQWe@U&lm-VgEoyVXA[7c^-13{kV');
define('NONCE_SALT',       '[F#)w_G/XD1I/%g%V$(y+u+kKwYm@-uA52@XzBkU3C%ruB(NM,6vk&SDPl4l7A`1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pn_';

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
