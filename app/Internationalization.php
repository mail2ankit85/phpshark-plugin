<?php
namespace Core;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.contemplativeradicals.com
 * @since      1.0.0
 *
 * @package    PHPShark_Plugin
 * @subpackage PHPShark_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    PHPShark_Plugin
 * @subpackage PHPShark_Plugin/includes
 * @author     Ankit Kumar <mail2ankit85@gmail.com>
 */
class Internationalization {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'phpshark-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . 'project/languages/'
		);
		
	}

}
