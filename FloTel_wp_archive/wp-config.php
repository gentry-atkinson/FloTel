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
define( 'DB_NAME', 'FloTel' );

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}Nvo$LzO|a![l,/vnI.jXBu 7k*u!Dw>E<d116Sg<_>oFn6ud2zp~JCH1`?+le^g' );
define( 'SECURE_AUTH_KEY',  'Hd^{iG34SY)MpsejX9G=Y.@t9!o^hX+.@]K wJsaWPAW;SL!b?6~U1%J1`UbRyec' );
define( 'LOGGED_IN_KEY',    '[d*(hS%ig|v.Og:m4]IenH s$K>u5&sqUR5<2k.bS<<_[5{NQvd$zV+1mJp$D3HT' );
define( 'NONCE_KEY',        'ig.lQE^r}6=p-XwE0.WtsXexFDon:2u<G{/L|wM~pSSYXr-[m}H9cx U`zlc#)`^' );
define( 'AUTH_SALT',        '%iK vJxpDchoX2rwTmm(`X(A6yjCvoV_=2px@KAP3/HELeZo0ceQ;3iuz`~7H66T' );
define( 'SECURE_AUTH_SALT', 'EQH0wj|6#IGl9&&;qUU%gTKiw&Y3ta*.>[$=;N]2*@b*oniK.a7HYcl(B|lXgNw(' );
define( 'LOGGED_IN_SALT',   '>6FfY]sLNnoOf#$k1NL7:4Zyh4FcagzdZcz7ij1}u!XCHbLAKdi;i(PU[+4M `*,' );
define( 'NONCE_SALT',       'JC/yjVI=RNCd9mB:;ULX9P@GzvPSKXl_Kag:v#%R;{wmf&eeg0#2YlOrz-m%.U<(' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ft_';

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
