<?php
/**
 * @package  PHPShark-Plugin
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//-----------------------------------------------------------------------------------
// BUILD Configuration
//-----------------------------------------------------------------------------------
	//Project Name:
	$project = $config->PROJECT;
	$base    = $config->BASE;
	$text_domain    = $config->TEXT_DOMAIN;

	//Set Your Environment
	$environment     = $config->ENVIRONMENT;
	$error_reporting = $config->ERROR_REPORTING;

	//Set Application Error
	$app_error = $config->ERROR;

	//Database Settings
	$persistent   = $config->PERSISTENT;
	$datasource   = $config->DATASOURCE;
    $host         = $config->HOST;
	$port         = $config->PORT;
	$database     = $config->DATABASE;
	$login		  = $config->LOGIN;
    $password	  = $config->PASSWORD;
	$charset	  = $config->CHARSET;
	$collation    = $config->COLLATION;
	$prefix    	  = $config->PREFIX;

	//Email Settings
	$mail_host        = $config->MAIL_HOST;
	$mail_user        = $config->MAIL_USER;
	$mail_password    = $config->MAIL_PASSWORD;
    $mail_smtp_secure = $config->MAIL_SMTP_SECURE;
	$mail_port        = $config->MAIL_PORT;
	$mail_set_from         = $config->MAIL_SET_FROM;
	$mail_set_from_type    = $config->MAIL_SET_FROM_TYPE;
	$mail_smtp_auth        = $config->MAIL_SMTP_AUTH;
	$mail_add_address      = $config->MAIL_ADD_ADDRESS;
	$mail_recipient_name   = $config->MAIL_RECIPIENT_NAME;
	$mail_is_html          = $config->MAIL_IS_HTML;
	$template_folder       = $config->TEMPLATE_FOLDER;

	//Role Tables
	$webadminUserTable     = $config->WEBADMIN_USER_TABLE;
	$webadminUserKey       = $config->WEBADMIN_USER_KEY;
	$role_module_active    = $config->ROLE_MODULE_ACTIVE;
	$roles_tables          = $config->ROLE_TABLES;
	$permission_tables     = $config->PERMISSION_TABLES;
	$role_permissions      = $config->ROLE_PERMISSION_TABLES;
	$user_role             = $config->USER_ROLES_TABLES;
	$obj_type              = $config->OBJECT_TYPE_TABLE;
	$act_type              = $config->ACTIVITY_TYPE_TABLE;

	// Application Language
	$language              = $config->LANGUAGE;
	$convert_to            = $config->CONVERT_TO;

	//Security Settings
	$security_function     = $config->SECURITY_FUNCTION;
	$security_salt         = $config->SECURITY_SALT;

	//Folder Setting
	$TargetFileFolder      = $config->TARGET_FILE_FOLDER;
	$OriginalFileFolder    = $config->ORIGINAL_FILE_FOLDER;
	$ResizedFileFolder     = $config->RESIZED_FILE_FOLDER;
	$ThumbnailFileFolder   = $config->THUMBNAIL_FILE_FOLDER;
	$filePrefix 		   = $config->FILE_PREFIX;
	$upload_folder 		   = $config->UPLOAD_FOLDER;
	$download_folder 	   = $config->DOWNLOAD_FOLDER;

	//Logs;
	$audit_log_switch  = $config->AUDIT_LOG_SWITCH;
	$app_log           = $config->APP_LOG;
	$db_log            = $config->DB_LOG;
	$audit_log         = $config->AUDIT_LOG;
	$php_log           = $config->ERROR_LOG;

	$app_file          = $config->APP_FILE;
	$db_file           = $config->DB_FILE;
	$audit_file        = $config->AUDIT_FILE;
	$php_file          = $config->PHP_FILE;

	//Cookie Settings
	$expiry = $config->COOLKIE_EXPIRY;

	//Session Settings
	$session_name = $config->SESSION_NAME;
	$token_name   = $config->TOKEN_NAME;

	//PHP Settings
	$maximum_execution_time = $config->MAXIMUM_EXECUTION_TIME;
	$date_timezone          = $config->DATE_TIMEZONE;
	$short_open_tag         = $config->SHORT_OPEN_TAG;
	$safe_mode              = $config->SAFE_MODE;

	//PHP INI SETTINGS
	$display_errors        		= $config->DISPLAY_ERRORS;
	$set_error_reporting_manual = $config->DATE_TIMEZONE;
	$log_errors                 = $config->LOG_ERRORS;
	$error_log                  = $config->ERROR_LOG;
	$set_time_limit             = $config->SET_TIME_LIMIT;

	// SMS Settings
	$app_name        = $config->API_NAME;
	$set_time_limit  = $config->SET_TIME_LIMIT;
	$api_id          = $config->API_ID;
	$api_password    = $config->API_PASSWORD;

	// Date Formatting
	$date_format     	= $config->DATE_FORMAT;
	$time_format     	= $config->TIME_FORMAT;
	$currency_decimal   = $config->SHORT_OPEN_TAG;
	$error_log          = $config->ERROR_LOG;
	$set_time_limit     = $config->SET_TIME_LIMIT;
	$currency_separator = $config->CURRENCY_SEPARATOR;
	$currency_decimal_places = $config->CURRENCY_DECIMAL_PLACES;
	$currency_base      = $config->BASE_CURRENCY;

	//Project Folders
	$view_folder      = $config->VIEW_FOLDER;
	$global_functions = $config->GLOBAL_FUNCTIONS;
//-----------------------------------------------------------------------------------
// End of building Configuration
//-----------------------------------------------------------------------------------
