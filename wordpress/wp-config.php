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
define('WP_ALLOW_REPAIR', true);
define('DB_NAME', 'sacwordpress');

/** MySQL database username */
define('DB_USER', 'wayko');

/** MySQL database password */
define('DB_PASSWORD', 'b4v0e1jj');

/** MySQL hostname */
define('DB_HOST', 'localhost:3307');

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
define('AUTH_KEY',         'JlK#[B;pb@g!EB8Ne2s.S kv&f?8)a-ntDe2&-z9pq)>=ZQ8Z[1n^NxOz2|p&+i}');
define('SECURE_AUTH_KEY',  '(/3~!XRi!.v:?1_o`PHp9=}$T|SZSzaE}s5$1--FSOHfo#&57=X1Z}G0E++,nE[F');
define('LOGGED_IN_KEY',    'PD=pjnZ1*^|PvrK<Ms#tBW@M,x5 W_+<h9d@IX1?yB-K;X/p{il/vjl:TCcehbJh');
define('NONCE_KEY',        '(b-t^oY4L7~Qw;zci%JPht{wPW|kv/Zmb7 6N~%- 8uN}!2EBUWKeU&$I~iYGEmi');
define('AUTH_SALT',        '=M`!74;>l;#9IxPW]iI. X3+eodP/i,f`WTHLN4K.o,lq;ettjFX+{Mc_[&cyRuq');
define('SECURE_AUTH_SALT', ' *#C*Lt:8vfXh7VGkgB_s%|}|K7e60uzo[@}P!>,A`|&3O/su+aW$uiE<ke;XaHH');
define('LOGGED_IN_SALT',   '{95L$z8?9+&%~AW@w/`g]5zoS_#x)8FS+BzND)!m1E+}a++HBnL(:@+MC8|*)!X7');
define('NONCE_SALT',       '6)#h/~WB(pX@&-Y_a-2>_k,a)rL?s.v2.Rkjm#|<v1FIy8WM{A,UxS:7H]J]cD^~');

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
