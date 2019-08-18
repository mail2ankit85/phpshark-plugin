<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

Defined("ENVIRONMENT") || Define('ENVIRONMENT', $environment);
Defined("SCRIPT") || Define('SCRIPT', $_SERVER['SCRIPT_NAME']);
