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

/** Composer Autoloader **/
require_once realpath(__DIR__.'/../vendor/autoload.php');

/** DotEnv Setup **/
(Dotenv\Dotenv::createImmutable(__DIR__.'/../'))->load();

/** ENvironment Setups **/
define('ENVIRONMENT_DEV', 'dev');
define('ENVIRONMENT_STAGE', 'stage');
define('ENVIRONMENT_PROD', 'prod');
define('ENVIRONMENT', getenv('ENVIRONMENT'));

/** no errors on production **/
if (ENVIRONMENT === ENVIRONMENT_PROD) {
    error_reporting(0);
    @ini_set('display_errors', 0);
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('DB_NAME') );

/** MySQL database username */
define( 'DB_USER', getenv('DB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('DB_HOST') );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('SAVEQUERIES', (bool) getenv('DB_SAVE_QUERIES'));

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'D}?3gmSG*5bu.Oq]uaQ`$A?7jUJcfa!2o9UC!5Y&^<~4X|!=->8)+QrF/sI}Zn0f' );
define( 'SECURE_AUTH_KEY',  '2G4|ij_BRZljs-T`WN%p++#g|?=XfYPZ@D7yH@D|YU;X9RE&0dt@QAlT4gL*n/]I' );
define( 'LOGGED_IN_KEY',    'yDUF_)vea$K2ia#,iEe81km+BoWF=Onn+R={Ne&y#(ciE&byH>!;UIP~@! N2gX4' );
define( 'NONCE_KEY',        '<)0>?).ZS8@}J@1D%LvH,KHs!w.d&FY8>*LejO>U(be[i{`RT,tI@8q_PV*5Rw!0' );
define( 'AUTH_SALT',        'Z[WoKPbsJ3u6R8tQxFb-^^yGd}AenUEcwB_ON;kn8M62Bf0_jKA0ys8gNc2#LuE<' );
define( 'SECURE_AUTH_SALT', '~V/VO6I95mIO#Eh7X/qT]>q#8own]a$@9_cI8T:5{;kM%.N205ceViGG$_QPLtM[' );
define( 'LOGGED_IN_SALT',   'O U_K~Bd (P>}{yX[R`(,JV:nYDzo@KWA@PX,s|u(;jnPkWPJT57^`Vc(cM)#ePi' );
define( 'NONCE_SALT',       '9WIpgqdQYSX#VsO7M)z=ev3StWFaTyNI52o/YOfJ&zZqxq#eB#L2(,SMbri_.K[R' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_PREFIX');

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
define( 'WP_DEBUG', (bool) getenv('WP_DEBUG') );

define('WP_AUTO_UPDATE_CORE', (bool) getenv('WP_AUTO_UPDATE_CORE'));

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
