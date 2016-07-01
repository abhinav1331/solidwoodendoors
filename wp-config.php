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
define('DB_NAME', 'db631659792');

/** MySQL database username */
define('DB_USER', 'dbo631659792');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

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
define('AUTH_KEY',         't5uLyRN;qvnE1*Dh5E} j8: WqlHXoRM.1b[;8!/qSzQlz #Q2!+TeT& QCPo=)B');
define('SECURE_AUTH_KEY',  'a.]VpJ]a-Is,UL|AgnKYO) Yxg#0yqj3tkvmt>,3g-*]a^W+mO:1l+fifx5nWU*`');
define('LOGGED_IN_KEY',    '-_/~@E;IZv~Qt)=r2Cn%h6J-drlf-(:%]c#J6S?a^U->Z+4Mls,bM$07NRom~Mfs');
define('NONCE_KEY',        'zsObbVn]O6BBl{vaW#UQZiu1K2GCMEvJ-B^1`.<=uLj85Z-1rK$[gpNh};Q9&WVw');
define('AUTH_SALT',        'G-RQX4<; &`M+n,Hb*d=MB8M<0Kw|xsg*4Eub/ZMC|H]T2T8v^,jV3HX5ALaWFfQ');
define('SECURE_AUTH_SALT', 'l3Ml8B)uegFSfqAQ)OG}$bD+R b/SKTNb01BTpz3`L(1JqJ2%tdF(VHpp]n,=~Ks');
define('LOGGED_IN_SALT',   'tZO;Msa)3Nm4~%6QVYG~00QH:xzc.e~&<+i@|m(BM:asL28KTDyzI$Rm!q`kXCD#');
define('NONCE_SALT',       'O!,-n&e9=Y8okd>p1:VQFo3,3/L;R9T[P7Lsfx:;6asrVkYfHxS=&#UV`<p~`1w~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

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
