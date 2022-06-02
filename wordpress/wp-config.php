<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '?dQ9QlB+:1]!=+VFBj/LVs@E)EO9>]sJrM8<6B,JtyM8LZUe)ZlSvgP{EYW%QA>N' );
define( 'SECURE_AUTH_KEY',  'P1n[M# a!SMXC0]U`jex,9zT^ Z=<nt; aH/I;pb*oMwalBjzt}po*JbLOx5NPze' );
define( 'LOGGED_IN_KEY',    '$2%4MQPNWM$LCz` 02_0L>.Q.q7B7G$sbW)oE^>;N)d:Zg|@ SM2(T7xndX&7^zz' );
define( 'NONCE_KEY',        '.2@HgGeD<;.73Bi;!r8MFwn<`G;([m>f9;1Y[xEBB,2V#%*5!];$:H_ml4)=Lwgj' );
define( 'AUTH_SALT',        'J9><^z7Y`xt#HM*oc=a&rQE%;M4RU^-I/}O2w.Uo!! d*sHrqF`^:oLpiqc#j#B~' );
define( 'SECURE_AUTH_SALT', 'J5;$Zqc8])%BU9 ZX1SUir4BDhBmtn!=~365xLDF@k3txpK}w<9^x6Jb)uSg4k R' );
define( 'LOGGED_IN_SALT',   '}Fn({,<>gaKmZeTH}xV;U+q*z=~0?C|H<XH!1i%9 IJgyC+K,kObi#AhM^Jv3hHx' );
define( 'NONCE_SALT',       'VZwSfFCbu2X,m9,OvQPJ|oDT<cG?BlBlX=eNQ>CCM$xS`O1-q>~BFe_CP(65qBHw' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
