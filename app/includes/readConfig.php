<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*****************************************************************************************/
/* READ XML SETTINGS FILE
/*****************************************************************************************/
$loc = PROJECT_PATH . 'config.xml';
$xmlDoc = simplexml_load_file($loc);
$config = $xmlDoc->CONFIGURATION;
//-----------------------------------------------------------------------------------
// End of Reading Configuration File
//-----------------------------------------------------------------------------------
