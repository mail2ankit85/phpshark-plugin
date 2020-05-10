<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

if(!function_exists('phpshark_writeLog')):
function phpshark_writeLog($log_type, $error_desc, $filename = null)
{
	$files = new \Core\Lib\Files\Files;
	switch (strtolower(trim($log_type))) {
		case 'db' :
			$location = loc_file_log($log_type, $filename);
			$files->putFileContent($location, date("Y-m-d", $t) . ":" . date("h:i:sa") . ">" . $error_desc);
		case 'audit' :
			$location = loc_file_log($log_type, $filename);
			$files->putFileContent($location, date("Y-m-d", $t) . ":" . date("h:i:sa") . ">" . $error_desc);
		case 'application' :
			$location = loc_file_log($log_type, $filename);
			$files->putFileContent($location, date("Y-m-d", $t) . ":" . date("h:i:sa") . ">" . $error_desc);
	}
}
endif;

if(!function_exists('phpshark_locFilelog')):
function phpshark_locFilelog($log_type, $filename = null)
{
	switch (strtolower(trim($log_type))) {
		case 'db' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('logs/db')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "file-error-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			if ($filename == null) {
				return $path . utils\Config::get('logs/dbfile') . '.txt';
			}
			else {
				return $path . $filename . '.txt';
			}

			break;

		case 'audit' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('logs/audit')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "file-error-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			if ($filename == null) {
				return $path . utils\Config::get('logs/auditfile') . '.txt';
			}
			else {
				return $path . $filename . '.txt';
			}
			break;

		case 'application' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('logs/app')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "file-error-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			if ($filename == null) {
				return $path . utils\Config::get('logs/appfile') . '.txt';
			}
			else {
				return $path . $filename . '.txt';
			}
			break;

		case 'php' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('logs/php')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "file-error-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			if ($filename == null) {
				return $path . utils\Config::get('logs/phpfile') . '.txt';
			}
			else {
				return $path . $filename . '.txt';
			}
			break;
	}
}
endif;

if(!function_exists('phpshark_locFileImport')):
function phpshark_locFileImport($folder, $file)
{
	switch (strtolower(trim($folder))) {
		case 'xml' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('imports/xml')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "application-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			return $path . $file . '.xml';
			break;

		case 'csv' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('imports/csv')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "application-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			return $path . $file . '.csv';
			break;

		case 'text' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('imports/txt')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "application-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			return $path . $file . '.txt';
			break;

		case 'warehouse' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('imports/warehouse')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "application-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			return $path . $file . '.txt';
			break;

		case 'archive' :
			$path = PROJECT_PATH . str_replace('.', DS, utils\Config::get('imports/archive')) . DS;
			if (!file_exists($path)) {
				if (!mkdir($path, 0777, true)) {
					//die('Failed to create folders...');
					write_log('application', __('ERROR: Failed to create folders...',TEXT_DOMAIN));
					die(date("Y-m-d", $t) . ":" . date("h:i:sa") . __('check "application-log" with your log Folder!',TEXT_DOMAIN));
				}
			}
			return $path . $file . '.txt';
			break;
	}
}
endif;
