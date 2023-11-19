<?php
/**
 * Plugin Name: Easy remove item menu
 * Plugin URI:  https://wordpress.org/plugins/easy-remove-item-menu
 * Description: A plugin to easily delete items from the menu
 * Version:     1.0.5
 * Author:      Camilo
 * Author URI:  https://camilowp.com/
 * Text Domain: easy-rm-item-menu
 * Domain Path: /languages
 * License:     GPL3
 */



class EARemoveItemMenu {


	const name = 'Easy remove item menu';
	const slug = 'easy-rm-item-menu';


	function __construct() {
		add_action( 'admin_footer', array( &$this, 'int_easy_remove_item_menu' ) );
		load_plugin_textdomain(self::slug, false, dirname(plugin_basename(__FILE__)) . '/languages');

	}

	/**
	 * Runs when the plugin is initialized
	 */
	function int_easy_remove_item_menu() {
		if ( is_admin() ) {
			global $pagenow;
		    if ( !is_super_admin())
		      return;
		    if ( 'nav-menus.php' != $pagenow ) {
		        return;
		    }

				?>
				  <style type="text/css">
						.menu-item-bar .hp-menu-delete{margin-top: 10px;margin-right: 10px;font-size:20px;}
				  </style>
				<?php

		wp_enqueue_script('removemenu.js', plugin_dir_url(__FILE__) . 'js/removemenumin.js', ['jquery'], array( 'wp-i18n' ), 'true');
		wp_set_script_translations( 'removemenu', 'easy-rm-item-menu' );

		}
	}

} // end class

new EARemoveItemMenu();
?>
