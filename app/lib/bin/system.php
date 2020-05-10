<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

use Core\Lib\Files\Files as files;
use Core\Lib\Files\Image as imgs;
use Core\Lib\Files\Forms as forms;
use Core\Lib\Json as json;
use Core\Lib\Pages as pages;

// Name DNS name for Databse Connection
if(!function_exists('phpshark_DNS')):
function phpshark_DNS()
{
	$server = utils\config::get('database_credits/datasource') . ':host=' . utils\config::get('database_credits/host') .
		';dbname=' . utils\config::get('database_credits/database');
	return $server;
}
endif;

// if this is localhost
if(!function_exists('phpshark_isLocalhost')):
function phpshark_isLocalhost()
{
	return $_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '::1';
}
endif;


//Get client IP address
if(!function_exists('phpshark_getClientIP')):
function phpshark_getClientIP()
{
	$ip = "127.0.0.1";
	if (getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	}
	else if (getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}
	else if (getenv("REMOTE_ADDR")) {
		$ip = getenv("REMOTE_ADDR");
	}
	else {
		$ip = "UNKNOWN";
	}

	if ($ip == "::1") {
		$ip = "127.0.0.1";
	}
	return $ip;
}
endif;

// Check if the action is AJAX request
if(!function_exists('phpshark_isAjax')):
function phpshark_isAjax()
{
	return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'));
}
endif;

//Gets server url path
if(!function_exists('phpshark_getServerUrl')):
function phpshark_getServerUrl()
{
	$port = $_SERVER['SERVER_PORT'];
	$http = "http";

	if ($port == "80") {
		$port = "";
	}

	if (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
		$http = "https";
	}
	if (empty($port)) {
		return $http . "://" . $_SERVER['SERVER_NAME'];
	}
	else {
		return $http . "://" . $_SERVER['SERVER_NAME'] . ":" . $port;
	}
}
endif;

/*
function get_current_user(){
	return get_current_user();
}
 */
if(!function_exists('phpshark_getUid')):
function phpshark_getUid()
{
	return getmyuid();
}
endif;

if(!function_exists('phpshark_getPid')):
function phpshark_getPid()
{
	return getmypid();
}
endif;

if(!function_exists('phpshark_UniqueMachineID')):
function phpshark_UniqueMachineID($salt = "")
{
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "diskpartscript.txt";
		if (!file_exists($temp) && !is_file($temp)) file_put_contents($temp, "select disk 0\ndetail disk");
		$output = shell_exec("diskpart /s " . $temp);
		$lines = explode("\n", $output);
		$result = array_filter($lines, function ($line) {
			return stripos($line, "ID:") !== false;
		});
		if (count($result) > 0) {
			$result = array_shift(array_values($result));
			$result = explode(":", $result);
			$result = trim(end($result));
		}
		else $result = $output;
	}
	else {
		$result = shell_exec("blkid -o value -s UUID");
		if (stripos($result, "blkid") !== false) {
			$result = $_SERVER['HTTP_HOST'];
		}
	}
	return md5($salt . md5($result));
}
endif;

if(!function_exists('phpshark_homepath')):
function phpshark_homepath()
{
	return getenv("HOMEPATH");
}
endif;

if(!function_exists('phpshark_homedrive')):
function phpshark_homedrive()
{
	return getenv("HOMEDRIVE");
}
endif;

if(!function_exists('phpshark_username')):
function phpshark_username()
{
	return getenv("username");
}
endif;

if(!function_exists('phpshark_getMacAddress')):
function phpshark_getMacAddress()
{
	$ipAddress = $_SERVER['REMOTE_ADDR'];
	$macAddr = false;

	#run the external command, break output into lines
	$arp = `arp -a $ipAddress`;
	$lines = explode("\n", $arp);

	#look for the output line describing our IP address
	foreach ($lines as $line)
		{
		$cols = preg_split('/\s+/', trim($line));
		if ($cols[0] == $ipAddress)
			{
			$macAddr = $cols[1];
		}
	}
}
endif;

//to check ip is pass from proxy
if(!function_exists('phpshark_getRealIpAddr')):
function phpshark_getRealIpAddr(){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
endif;

/********************
*@file - path to file
*/
if(!function_exists('phpshark_forceDownload')):
function phpshark_forceDownload($file){
    if ((isset($file))&&(file_exists($file))) {
       header("Content-length: ".filesize($file));
       header('Content-Type: application/octet-stream');
       header('Content-Disposition: attachment; filename="' . $file . '"');
       readfile("$file");
    } else {
       echo "No file selected";
    }
}
endif;
