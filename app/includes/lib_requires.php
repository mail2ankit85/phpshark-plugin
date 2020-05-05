<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/***************************************************************/
/* include bin classes
/***************************************************************/
$bin_path = PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'bin';
foreach (glob("{$bin_path}/*.php") as $bin_filename){
    require_once $bin_filename;
}

/***************************************************************/
/* include special classes
/***************************************************************/
$special_path = PLUGIN_DIR . 'app' . DS . 'lib' . DS . 'bin' . DS . 'performs';
foreach (glob("{$special_path}/*.php") as $spl_filename){
    require_once $spl_filename;
}

/***************************************************************/
/* include Wordpress classes
/***************************************************************/
$wp_path = PLUGIN_DIR . 'project' . DS . 'wp_functions';
foreach (glob("{$wp_path}/*.php") as $wp_filename){
    require_once $wp_filename;
}

/***************************************************************/
/* include Wordpress classes -inc
/***************************************************************/
$wp_path = PLUGIN_DIR . 'project' . DS . 'wp_functions' .DS. 'inc';
foreach (glob("{$wp_path}/*.php") as $wp_filename){
    require_once $wp_filename;
}


/***************************************************************/
/* include Wordpress classes -classes
/***************************************************************/
$wp_path = PLUGIN_DIR . 'project' . DS . 'wp_functions' .DS. 'classes';
foreach (glob("{$wp_path}/*.php") as $wp_filename){
    require_once $wp_filename;
}
