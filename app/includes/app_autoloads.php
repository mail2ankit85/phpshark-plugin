<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/***************************************************************
Description: AUTOLOAD function to initialize all library classes
Autoload initiates all the classes in the following folders.
01. root/app/
02. root/app/lib/database/
03. root/app/lib/database/mysql/
04. root/app/lib/
05. root/app/lib/files/
06. root/app/project/template/
07. root/app/project/template/
***************************************************************/

function __loadlib($class) {
	$parts = explode('\\', $class);
	$class = end($parts);

	if (file_exists(PLUGIN_DIR . 'app' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . $class . '.php';

	if (file_exists(PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . $class . '.php';

	if (file_exists(PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'roles' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'roles' . DS . $class . '.php';

	if (file_exists(PLUGIN_DIR . 'app' . DS . 'lib' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . 'lib' . DS . $class . '.php';

	if (file_exists(PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'files' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'files' . DS . $class . '.php';

	if (file_exists(PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . 'mysql' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . 'mysql' . DS . $class . '.php';

	if (file_exists(PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . 'orm' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . 'orm' . DS . $class . '.php';

	if (file_exists(PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . 'crud' . DS . $class . '.php'))
		require_once PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'database' . DS . 'crud' . DS . $class . '.php';
}


//Autoload Class Locations
spl_autoload_register("__loadlib");

//Load Vendor Autoload
require (PLUGIN_DIR.'vendor'.DS.'autoload.php');

