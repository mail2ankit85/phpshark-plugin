<?php
/**
 * PHPShark WP Navwalker
 *
 * @package PHPShark_WP_Navwalker
 */

/*
 * Class Name: PHPShark_WP_Navwalker
 * Plugin Name: PHPShark WP Navwalker
 * Description: A custom WordPress nav walker class to implement the navigation style in a custom theme using the WordPress built in menu manager.
 * Author: Ankit kumar
 * Version: 1.0.0
*/

/* Check if Class Exists. */
if ( ! class_exists( 'WP_Navwalker' ) ) {
	/**
	 * WP_Bootstrap_Navwalker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class WP_Navwalker extends Walker_Nav_Menu {

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			// depth dependent classes
			$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
			$display_depth = ( $depth + 1); // because it counts the first submenu as 0
			$classes = array(
				'nav-dropdown',
				'menu-depth-' . $display_depth
			);
			$class_names = implode( ' ', $classes );

			// build html
			if ($display_depth == 1) {
				$output .= "\n" . $indent . '<ul class="nav-dropdown">' . "\n";
			} else {
				$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
			}
		}
	}
}
