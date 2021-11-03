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
define( 'DB_NAME', 'monypainting' );

/** MySQL database username */
define( 'DB_USER', 'galaxy' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Galaxy123$' );

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
define( 'AUTH_KEY',         '(K8VJ{P>Ff_3IC$-c0kqYky, E/5(q2pgt~VnmfZZ#cHmUNHZqf!$2R7{R?HpdO9' );
define( 'SECURE_AUTH_KEY',  'z?%^pxbS^6*+.V)q}t@+9RIX36BM.&X$e5n.fA*o^}vmcGTsn9nJT&t+&d$G_Azy' );
define( 'LOGGED_IN_KEY',    'XatC=j&8[jpX-[qit9tI)/_~Ph;$w|F.C#(R!P}xVA$e0%_Jtf`(X&]W4`kx!xvq' );
define( 'NONCE_KEY',        '(Q4#.d6G}uTI:]dhNFKHaE&:NgpokN-= qd7nX5]%{d|+Uo}zj=l*/ST}&3GeX{J' );
define( 'AUTH_SALT',        'dMHA$c7B?.%$dSBhDSp.>w]((@bnnN7aihgb{yE<_M/n#X_+:T+d2w] -m=x_1I@' );
define( 'SECURE_AUTH_SALT', '!U}1eO0NbT]jM?I>Ijo5Qnjxfl9IPD<=wGY}^Ov]MmnUqV^%,4Q/,MMxmbxW4X6K' );
define( 'LOGGED_IN_SALT',   'Pm+{Q}J#68O; ,5(;2gd#?A4^?U#<lZ_t&21n$1YoeuS L[)=$`b=p,3}dJi8G_H' );
define( 'NONCE_SALT',       '-T l0xegCfu@+q=rcQy@TP[=A9N.HtzOM7!^J_dd9ikG)Ca^V_G>6O`C&N@W 8pv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
