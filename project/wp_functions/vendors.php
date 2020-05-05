<?php

/**
 * Activates Theme Mode
 */
add_filter( 'ot_theme_mode', '__return_true' );
/**
 * Loads OptionTree
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
$GLOBALS['THEME_COLOR'] = array();




/**
* Shortcodes - Components
**/
require get_template_directory() . '/shortcodes/shortcode-launch.php';
require get_template_directory() . '/shortcodes/shortcode-ads.php';
/**
* Shortcodes - Layout
**/
require get_template_directory() . '/shortcodes/shortcode-grid.php';
require get_template_directory() . '/shortcodes/shortcode-widget.php';
require get_template_directory() . '/shortcodes/shortcode-elements.php';
