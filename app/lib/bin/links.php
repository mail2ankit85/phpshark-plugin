<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

use \Core\Lib\Files\Files as files;
use \Core\Lib\Files\Image as imgs;
use \Core\Lib\Files\Forms as forms;
use \Core\Lib\Json as json;
use \Core\Lib\Pages as pages;

if(!function_exists('phpshark_url')):
function phpshark_url($path = null){
  $base = Core\Lib\Config::get('project/base');
  if($base){
	if($path !== null){
		return "{$base}/{$path}";
	  }else{
		return "{$base}";
	  }
  }else{
		$base_path = '';
		if (isset($_SERVER['HTTPS'])) {
			$http = 'https://';
		}
		else {
			$http = 'http://';
		}

		$base_path = $http . $_SERVER['HTTP_HOST'];
		$base_file = $_SERVER['PHP_SELF'];
		$base_file = explode('/', $base_file);
		if ( ($key = array_search('index.php', $base_file)) !== false) {
			unset($base_file[$key]);
		}
		$folder_link = join('/', $base_file) . '/';
		return $base_path . $folder_link . $path;
  }
}
endif;


if(!function_exists('phpshark_domain')):
function phpshark_domain()
{
    	if (isset($_SERVER['HTTPS'])) {
			$http = 'https://';
		}
		else {
			$http = 'http://';
		}

		$base_path = $http . $_SERVER['HTTP_HOST']. '/';
		return $base_path;
}
endif;



if(!function_exists('phpshark_dbase')):
function phpshark_dbase()
{
    return getcwd();
}
endif;

if(!function_exists('phpshark_externalUrlExist')):
function phpshark_externalUrlExist($url)
{
    $c_url = $url;
    $file = 'http://' . $c_url;
    $file_headers = @get_headers($file);
    if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        return $exists = false;
    }
    else {
        return $exists = true;
    }
}
endif;

if(!function_exists('phpshark_jsonpIsValidCallback')):
function phpshark_jsonpIsValidCallback($subject)
{
    $identifier_syntax
        = '/^[$_\p{L}][$_\p{L}\p{Mn}\p{Mc}\p{Nd}\p{Pc}\x{200C}\x{200D}]*+$/u';

    $reserved_words = array(
        'break', 'do', 'instanceof', 'typeof', 'case',
        'else', 'new', 'var', 'catch', 'finally', 'return', 'void', 'continue',
        'for', 'switch', 'while', 'debugger', 'function', 'this', 'with',
        'default', 'if', 'throw', 'delete', 'in', 'try', 'class', 'enum',
        'extends', 'super', 'const', 'export', 'import', 'implements', 'let',
        'private', 'public', 'yield', 'interface', 'package', 'protected',
        'static', 'null', 'true', 'false'
    );

    return preg_match($identifier_syntax, $subject)
        && !in_array(mb_strtolower($subject, 'UTF-8'), $reserved_words);
}
endif;

if(!function_exists('phpshark_actionCheck')):
function phpshark_actionCheck($action_method){
    if($_SERVER["REQUEST_METHOD"] !== strtoupper($action_method)){
        return false;
    }else{
        return true;
    }
}
endif;

/**
 * Suppose, you are browsing in your localhost
 * http://localhost/myproject/index.php?id=8
 */

 if(!function_exists('phpshark_getBaseUrl')):
 function phpshark_getBaseUrl()
 {
     // output: /myproject/index.php
     $currentPath = $_SERVER['PHP_SELF'];

     // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
     $pathInfo = pathinfo($currentPath);

     // output: localhost
     $hostName = $_SERVER['HTTP_HOST'];

     // output: http://
     $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

     // return: http://localhost/myproject/
     return $protocol.'://'.$hostName.$pathInfo['dirname']."/";
 }
 endif;
