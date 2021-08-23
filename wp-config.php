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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'basic-backend-setup' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('JWT_AUTH_SECRET_KEY', ';I.6EqS1q3J?dQ/Ao}yza)iQ&_/2qxmC,+gytP)R$$L|hXV:ugS=f4a|9sO<C/d7');

define('JWT_AUTH_EXPIRE', time() + 1800);

//define('JWT_AUTH_CORS_ENABLE', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9DVcUSKX8d]K93aoXD9$2L&E)Fe`{)TPGg!TFos~;RxeEQ2rY6&}34tZil)/y7mm' );
define( 'SECURE_AUTH_KEY',  'yn=!rIF<OzhL;&!J]}7=uc31!$Pz^sp!Q$cOO(p l_&~xy!Y2HuGMS,Uy,9fq$+B' );
define( 'LOGGED_IN_KEY',    'XDNbfHv6k -B?tKPO7A-P>o`*),w38sFuR@MO5x`mN`[C.dCIn9;R=H9 unqk5=n' );
define( 'NONCE_KEY',        'b2B.H*ZOs/zm6~-?/Q.-;}BDhkmnpPXTsj[jSM4&nJK}AG;?dPn0LXWe!ehu?{nY' );
define( 'AUTH_SALT',        '=Ao+|sj;d0E|.k%[$cN9a*;Z#fmWVZ63Cu}$B-eb?IJ4i$AnjC=6^-.BJ{qvoRTT' );
define( 'SECURE_AUTH_SALT', 'xN~R!4CZ|S3V{rV/kpy%~)3 3%Ws6ec},0Hx)8QC[^kdAB(FIh_f{6#gR:e(E8Ou' );
define( 'LOGGED_IN_SALT',   ';I.6EqS1q3J?dQ/Ao}yza)iQ&_/2qxmC,+gytP)R$$L|hXV:ugS=f4a|9sO<C/d7' );
define( 'NONCE_SALT',       'cW[30+s%y}L-qB,iU]KW,]P@$Afn(#>h m8_0NHRy,_bQl& [UjY`$ySvN@/(kmJ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'bbs_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
