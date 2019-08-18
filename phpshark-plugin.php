<?php
/**
 * @package  PHPShark-Plugin
 */
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.contemplativeradicals.com
 * @since             1.0.0
 * @package           PHPShark_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       PHPShark-Plugin
 * Plugin URI:        www.contemplativeradicals.com
 
 * Description:       An MVC-Plugin Created By Contemplative Radical Solutions. This is a commercial plugin created for customer solultions.
 
 * Version:           1.0.0
 * Author:            Ankit Kumar
 * Author URI:        www.contemplativeradicals.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       PHPShark-Plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Set global definitions/constants for the application.
 */
require "app/includes/definition.php";

/**
 * Read Config.xml file from the project folder.
 */
require "app/includes/readConfig.php";

/**
 * Buid application configuration from config.xml.
 */
require "app/includes/buildConfig.php";

/**
 * Set Constants for user environemnt.
 */
require "app/includes/setEvironment.php";

/**
 * Set global variables comming from config.xml.
 */
require "app/includes/globalVars.php";

/**
 * Set the require libraries.
 */
require "app/includes/lib_requires.php";

/**
 * Autoload All Application classes.
 */
require "app/includes/app_autoloads.php";

/**
 * Include Special librarry classes for micro functions.
 */
require "app/includes/inc_special.php";


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Activator.php
 */
function activate_phpshark_plugin() {
	\Src\Activator::activate();
}

register_activation_hook( __FILE__, 'activate_phpshark_plugin' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-crs-plugin-deactivator.php
 */
function deactivate_phpshark_plugin() {
	\Src\Deactivator::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_phpshark_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_phpshark_plugin() {
	
	$plugin = new \Core\App();
	$plugin->run();
	$plugin->registerServices();
	// Session Handle Via Database
	// \WP\Pj_WPDB_Session_Handler::init();

}
run_phpshark_plugin();
//\Core\AppViewConfig::generate();
