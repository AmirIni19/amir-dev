<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'amri-dev' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*Ja<IP<m]d#QYo`9.FO+F+>}bUDgXvi$<&Ly]u8sc_<!yj7lKJKzBXp:AguCIM{0' );
define( 'SECURE_AUTH_KEY',  'Ij;DTX:j_F/U3w.%79{&sq36-#lYzgqAD5W=VVI{yroStb,=dI~FArWjmie+;Xk}' );
define( 'LOGGED_IN_KEY',    '+m5[t3K{AltyW]^v;GzHO.T]Dlka1Z2ym*xRGrqz_~7%Z[l6N`tM:--vR_;8)gY}' );
define( 'NONCE_KEY',        'P.~DGB6b#{43;0M@2kyYY$wy.sV|_U2=_l}$u],>K AEiN_tU2[YaX8%.h;2?rf>' );
define( 'AUTH_SALT',        '%_wa=D~z8%gClAfcox:.$/38YD+d.Q|I]d=/^FR$C_/&$5-s%c|:|0UNh46~YUJ)' );
define( 'SECURE_AUTH_SALT', 'r<z_`GK[+(mo8.;bTt@+13Y#,|:s>-h9DMefHaMI1:sNk0l+^q}Pa%,-t24A-=~(' );
define( 'LOGGED_IN_SALT',   '{}J!d?Q^vFy~M,I|s5h+zv3DhVaCFQ]7qO={ex|=-XLF00wsfW#(BwnQkRxxc=$z' );
define( 'NONCE_SALT',       'TiAHaZ5]$qN2OV6vn^~}VX0me?EUSefjApXZo,[@=GV~?9d$zRY^//Wyi)@6OT{=' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
