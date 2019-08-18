<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use Core\Lib\Files\Files as files;
use Core\Lib\Files\Image as imgs;
use Core\Lib\Files\Forms as forms;
use Core\Lib\Json as json;
use Core\Lib\Pages as pages;

if(!function_exists('phpshark_condense')):
function phpshark_condense($str)
{
	if (is_string($str)) {
		return $str = trim($str);
	}
}
endif;

if(!function_exists('phpshark_concatenate')):
function phpshark_concatenate($str = '')
{
	if (is_string($str)) {
		$str .= $str;
		return str;
	}
}
endif;

if(!function_exists('phpshark_timestamp')):
function phpshark_timestamp($dateformat = "Y-m-d", $timeformat = "H:i:sa", $sparator = ":")
{
	$t = time();
	$ts = date($dateformat, $t) . $sparator . date($timeformat);
	return $ts;
}
endif;

if(!function_exists('phpshark_echoJson')):
function phpshark_echoJson($data)
{
	header('Content-Type: application/json');
	echo json_encode($data);
}
endif;

if(!function_exists('phpshark_jsonApi')):
function phpshark_jsonApi($data,$extra = "")
{
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json {$extra}");
	echo json_encode($data);
}
endif;

if(!function_exists('phpshark_getSessionUserID')):
function phpshark_getSessionUserID($userIDKey)
{
	if (isset($_SESSION) && !empty($_SESSION)) {
		return $_SESSION[$userIDKey];
	}
}
endif;

if(!function_exists('phpshark_getConfiguration')):
function phpshark_getConfiguration($module,$key){
	switch($module){
		case 'db': $module_name = 'database_credits';
			break;
		case 'sms': $module_name = 'sms_settings';
			break;
		default:
			$module_name = $module;
	}
	return utils\Config::get("{$module_name}/{$key}");
}
endif;

if(!function_exists('phpshark_sanitizeOutput')):
function phpshark_sanitizeOutput($buffer) {
	$search = array(
		'/\>[^\S ]+/s',     // strip whitespaces after tags, except space
		'/[^\S ]+\</s',     // strip whitespaces before tags, except space
		'/(\s)+/s',         // shorten multiple whitespace sequences
	);

	if(\Core\Lib\Config::get('project/remove_comments') == 'on'){
		array_push($search, '/<!--(.|\s)*?-->/'); // Remove HTML comments
	}

	$replace = array(
		'>',
		'<',
		'\\1',
		''
	);

	$buffer = preg_replace($search, $replace, $buffer);
	return $buffer;
}
endif;

if(!function_exists('phpshark_isInitial')):
function phpshark_isInitial($value,$key = null){
	if(is_array($value) && $key !== null){
		$result = array_key_exists($key,$value);
	}else if(is_array($value)){
		if(empty($value)){
			$result = true;
		}else{
			$result = false;
		}
	}else if(is_array($value) && $key !== null){
		if(empty($value) || !isset($value[$key]) ){
			$result = true;
		}else{
			$result = false;
		}
	}else {
		if($value == null || $value == '' || empty($value) || !isset($value) ){
			$result = true;
		}else{
			$result = false;
		}
	}

	return $result;
}
endif;

if(!function_exists('phpshark_click')):
function phpshark_click($id, $href = '#',$content, $class = '', $attrib = ''){
	$click .= "<a id=\"{$id}\" href=\"{$href}\" class=\"button {$class}\" {$attrib}>{$content}</a>";
	return $click;
}
endif;

if(!function_exists('phpshark_a')):
function phpshark_a($id, $content, $herf = '#', $class='', $attrib=''){
	return "<a id=\"{$id}\" class=\"{$class}\" href=\"{$herf}\" {$attrib}>{$content}</a>";
}
endif;

if(!function_exists('phpshark_ptext')):
function phpshark_ptext($content, $id = ''){
	return "<span id=\"{$id}\" class=\"ptext\">$content</span>";
}
endif;

if(!function_exists('phpshark_thisClass')):
function phpshark_thisClass($obj = null){
	if(is_object($obj)){
		return get_class($obj);
	}
}
endif;

if(!function_exists('phpshark_createSlug')):
function phpshark_createSlug($string){
	$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}
endif;

if(!function_exists('phpshark_getClassFile')):
function phpshark_getClassFile($class){
	$reflector = new \ReflectionClass($class);
	return $reflector->getFileName();
}
endif;

if(!function_exists('phpshark_removeSpaces')):
function phpshark_removeSpaces(String $string){
	return str_replace(' ', '', $string);
}
endif;

if(!function_exists('phpshark_removeWhiteSpaces')):
function phpshark_removeWhiteSpaces(String $string){
	return str_replace(' ', '', $string);
}
endif;

if(!function_exists('phpshark_createObject')):
function phpshark_createObject(){
	return new stdClass();
}
endif;

if(!function_exists('phpshark_getVendor')):
function phpshark_getVendor(){
	include_once(PROJECT_FOLDER."vendors.php");
}
endif;

if(!function_exists('phpshark_covertArrayToObject')):
function phpshark_covertArrayToObject($array) {
	if (!is_array($array)) {
		return $array;
	}
	$object = new stdClass();
	if (is_array($array) && count($array) > 0) {
		foreach ($array as $name=>$value) {
			$name = strtolower(trim($name));
			if (!empty($name)) {
				$object->$name = arrayToObject($value);
			}
		}
		return $object;
	}
	else {
		return FALSE;
	}
}
endif;

