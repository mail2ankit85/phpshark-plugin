<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//Set Base Path
//$url = $_SERVER['HTTP_HOST'].
/***************************************************************
Description: Global Application Configurations
All configurations are comming from the settings.xml file residing
in the project folder.
 ***************************************************************/
//Global Application Configurations
	$GLOBALS['config'] = [
	'project' => array(
		'name' => $project,
		'base' => $base,
	),

	'error' => array(
		'display' => strtoupper(trim($app_error)),
	),

	'text-domain' => array(
		'name' => $text_domain
	),

	//Database Configurations
	'database_credits' => array(
		'persistent' => trim($persistent),
		'datasource' => trim($datasource),
		'host' => trim($host),
		'port' => trim($port),
		'database' => trim($database),
		'login' => trim($login),
		'password' => trim($password),
		'charset' => trim($charset),
		'collation' => trim($collation),
		'prefix' => trim($prefix),
		'mailer_template' => trim($template_folder),
		'locale' => trim($language),
		'security_function' => trim($security_function),
		'security_salt' => trim($security_salt),
	),

	//$webadminUser
	'webadmin' => array(
		'userTable' => trim($webadminUserTable),
		'userKey'   => trim($webadminUserKey),
	),

	//Role Table
	'role' => array(
		'module_active' 	=> trim($role_module_active),
		'roles' 			=> trim($roles_tables),
		'permissions' 		=> trim($permission_tables),
		'role_permissions'  => trim($role_permissions),
		'user_roles'		=> trim($user_role),
		'objects'           => trim($obj_type),
		'activity'		    => trim($act_type)
	),

	//Session Configurations
	'session' => array(
		'session_name' => trim($session_name),
		'token_name'   => trim($token_name),
	),

	//folder Configurations
	'folder' => array(
		'upload'   => trim($upload_folder),
		'download' => trim($download_folder),
	),

	//Mail Configurations
	'mail' => array(
		'mail_host' => trim($mail_host),
		'mail_user' => trim($mail_user),
		'mail_password' => trim($mail_password),
		'mail_smtp_secure' => trim($mail_smtp_secure),
		'mail_port' => trim($mail_port),
		'mail_set_from' => trim($mail_set_from),
		'mail_set_from_type' => trim($mail_set_from_type),
		'mail_smtp_auth' => trim($mail_smtp_auth),
		'mail_add_address' => trim($mail_add_address),
		'mail_recipient_name' => trim($mail_recipient_name),
		'mail_is_html' => trim($mail_is_html),
	),

	//Log Configurations
	'logs' => array(
		'auditswitch' => trim($audit_log_switch),

		'appfile' => trim($app_file),
		'dbfile' => trim($db_file),
		'auditfile' => trim($audit_file),
		'phpfile' => trim($php_file),

		'app' => trim($app_log),
		'db' => trim($db_log),
		'audit' => trim($audit_log),
		'php' => trim($php_log),
	),

	//View Configurations
	'src' => array(
		'view' => trim($view_folder),
	),

	//Language Configurations
	'language' => array(
		'base' => trim($language),
		'convert' => trim($convert_to),
	),

	//SMS Configurations
	'sms_settings' => array(
		'api_name' => trim($app_name),
		'set_time_limit' => trim($set_time_limit),
		'api_id' => trim($api_id),
		'api_password' => trim($api_password),
	),

	//Formats Configurations
	'format' => array(
		'date_format' => trim($date_format),
		'time_format' => trim($time_format),
	),

	//Currency Configurations
	'currency' => array(
		'decimal' => trim($currency_decimal),
		'separator' => trim($currency_separator),
		'decimal_places' => trim($currency_decimal_places),
		'base' => trim($currency_base),
	),
];

/***************************************************************
Description: Initialize Application
This includes the non-class library files into the application
to initialize the library functions and costants.
 ***************************************************************/
