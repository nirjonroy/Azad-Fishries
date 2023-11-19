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


define( 'DB_NAME', 'azadfish_ecom' );

/** MySQL database username */
define( 'DB_USER', 'azadfish_ecom' );

/** MySQL database password */
define( 'DB_PASSWORD', '5dxTRvJ5bjrI' );

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
define( 'AUTH_KEY',         'dpyypthqotdeaetxyqpplmbrnk8mu9ygufd0utzevofon18br8shsk48ardyway7' );
define( 'SECURE_AUTH_KEY',  'dp6cwbodb7zcljiebei0wafshggilkicecklrby86zumhpvjo4tx2qbgaijj5o9n' );
define( 'LOGGED_IN_KEY',    'xexahfhznf39nzxh4ledac6qsr55qmbh7sayyiikngu97dlqa9musr9wujmhv2jm' );
define( 'NONCE_KEY',        'ikhyljt5nn81pco0cnkqyunzf4nd96ad1uzsqwpgm9lo377dl9sjtunbqwkg4i3u' );
define( 'AUTH_SALT',        'q4sfoogv7kmhfbvynijs9ngacgfw2xkfvxzvk00mwdqqr0tbw4crezunam6htz0w' );
define( 'SECURE_AUTH_SALT', '1gycthzdrovcpzja8rlt0b7uqdxdtsojptlkjep55esk62xbppsefhcmped6hcv1' );
define( 'LOGGED_IN_SALT',   '5bho4zslucwvykbsvexkl6wznbjrwyey8tquackurzf3ndsxzcieb4krucr3cifo' );
define( 'NONCE_SALT',       'eis9nr0gia0yj61c1hohpflqkoiklnuedstwmfvbcc7p3eytwzv18stw29xygbs4' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpml_';

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
