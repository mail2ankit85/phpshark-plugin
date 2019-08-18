<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/***************************************************************/
/* include special classes
/***************************************************************/
if(isset($global_functions) !== ''){
	$global_path = PROJECT_PATH.'functions';
}else{
	$global_functions = str_replace('.','/',$global_functions);
	$global_path = PROJECT_PATH.$global_functions;
}

foreach (glob("{$global_path}/*.php") as $filename){
    require_once $filename;
}
