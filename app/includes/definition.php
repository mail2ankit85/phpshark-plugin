<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//-------------------DO NOT CHANGE--------------------------------------------------------------//
Defined("DS") || Define('DS', DIRECTORY_SEPARATOR);
//-------------------DO NOT CHANGE--------------------------------------------------------------//
//Path definitions
Defined("ROOT") || Define('ROOT', dirname(__FILE__,6) . DS);
Defined("PLUGIN_DIR") || Define('PLUGIN_DIR', realpath(dirname(__FILE__,3)) . DS);
Defined("PLUGIN_ROOT") || Define('PLUGIN_ROOT', dirname(__FILE__,4) . DS);

//Content Folders
Defined("WP_CONTENT") || Define('WP_CONTENT', ROOT . 'wp-content' . DS);
Defined("WP_THEME") || Define('WP_THEME', WP_CONTENT . 'themes' . DS);
Defined("WP_UPGRADE") || Define('WP_UPGRADE', WP_CONTENT . 'upgrade' . DS);
Defined("WP_UPLOAD_DIR") || Define('WP_UPLOAD', WP_CONTENT . 'uploads' . DS);

//Project paths
Defined("APP_PATH") || Define('APP_PATH', PLUGIN_DIR . 'App' . DS);
Defined("PROJECT_PATH") || Define('PROJECT_PATH', PLUGIN_DIR . 'project' . DS);
Defined("VENDOR_PATH") || Define('VENDOR_PATH', PLUGIN_DIR . 'vendor' . DS);
Defined("PUBLIC_PATH") || Define('PUBLIC_PATH', PLUGIN_DIR . 'public' . DS);
Defined("SRC_PATH") || Define('SRC_PATH', PLUGIN_DIR . 'src' . DS);
Defined("TEMPLATE_PATH") || Define('TEMPLATE_PATH',  SRC_PATH . 'Admin'. DS .'Templates' . DS);
Defined("TEMPLATE") || Define('TEMPLATE',  PROJECT_PATH . 'templates' . DS);

//Old App Integrations Rquired Defines
Defined("ROOT_PATH") || Define('ROOT_PATH', ROOT);
Defined("BASEPATH") || Define('BASEPATH', PLUGIN_ROOT);
Defined("FOLDER_PATH") || Define('FOLDER_PATH', PLUGIN_DIR);

/* PLUGIN ASSET URI */
Defined("PLUGIN_URI") || Define('PLUGIN_URI', plugins_url() . '/phpshark-plugin/');
Defined("PLUGIN_PUBLIC_URI") || Define('PLUGIN_PUBLIC_URI', PLUGIN_URI . 'public/');
defined('BEP_ASSETS_URI') || define('BEP_ASSETS_URI', PLUGIN_PUBLIC_URI .'assets/');
defined('BEP_CSS_URI') || define('BEP_CSS_URI', PLUGIN_PUBLIC_URI.'assets/css/');
defined('BEP_JS_URI') || define('BEP_JS_URI', PLUGIN_PUBLIC_URI .'assets/js/');
defined('BEP_IMG_URI') || define('BEP_IMG_URI', PLUGIN_PUBLIC_URI .'assets/img/');
defined('BEP_FONT_URI') || define('BEP_FONT_URI', PLUGIN_PUBLIC_URI .'assets/fonts/');

/* THEME ASSET URI */
defined('BET_THEME_URI') || define('BET_THEME_URI', get_template_directory_uri().'/');
defined('BET_ASSETS_URI') || define('BET_ASSETS_URI', BET_THEME_URI .'assets/');
defined('BET_CSS_URI') || define('BET_CSS_URI', BET_THEME_URI.'assets/css/');
defined('BET_JS_URI') || define('BET_JS_URI', BET_THEME_URI .'assets/js/');
defined('BET_IMG_URI') || define('BET_IMG_URI', BET_THEME_URI .'assets/img/');
defined('BET_FONT_URI') || define('BET_FONT_URI', BET_THEME_URI .'assets/fonts/');
defined('PLUGIN') || define('PLUGIN', plugin_basename( dirname( __FILE__, 3 ) ). '/crs-plugin.php' );
defined('PLUGIN_NAME') || define('PLUGIN_NAME', dirname( __FILE__, 3 ) );

IF ( WP_DEBUG === true ){
	defined('ENV') || define('ENV', 'DEV');
}else{
	defined('ENV') || define('ENV', 'PRD');
}
