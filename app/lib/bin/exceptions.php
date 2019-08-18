<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
<!--
    LOGS
-->
<APP_ERROR_LOG>'logs'.DS.'application'.DS.'core-error-log.txt'</APP_ERROR_LOG>
<PHP_LOG>'logs'.DS.'php'.DS.'php-log.txt'</PHP_LOG>
 ***************************************************************/
 
if(!function_exists('phpshark_writeDBLog')):
function phpshark_writeDBLog($e, $query = null)
{
	$file = new \Core\Lib\Files\Files;
	$t = time();
	$ms = ($query != null) ? $query : " ";
	$location = loc_file_log('db');
	$file->putFileContpent($location, ">" . date("Y-m-d", $t) . ":" . date("h:i:sa") . " " . $ms . " ");
	$file->putFileContent($location, "- " . $e->getMessage());
}
endif;

if(!function_exists('phpshark_writeDBErrorLog')):
function phpshark_writeDBErrorLog($message, $query = null)
{
	$file = new \Core\Lib\Files\Files;
	$t = time();
	$ms = ($query != null) ? $query : " ";
	$location = loc_file_log('db');
	$file->putFileContent($location, ">" . date("Y-m-d", $t) . ":" . date("h:i:sa") . " " . $ms . " ");
	$file->putFileContent($location, "- " . $message);
}
endif;

if(!function_exists('phpshark_writeFiles')):
function phpshark_writeFiles($e, $msg)
{
	$file = new \Core\Lib\Files\Files;
	$t = time();
	$ms = ($msg != null) ? $msg : " ";
	$location = loc_file_log('application');
	$file->putFileContent($location, "> " . date("Y-m-d", $t) . ":" . date("h:i:sa") . " " . $ms . " ");
	$file->putFileContent($location, "- " . $e->getMessage());
}
endif;

if(!function_exists('phpshark_applicationLog')):
function phpshark_applicationLog($msg)
{
	$file = new \Core\Lib\Files\Files;
	$t = time();
	$ms = ($msg != null) ? $msg : " ";
	$location = loc_file_log('application');
	$file->putFileContent($location, "> " . date("Y-m-d", $t) . ":" . date("h:i:sa") . " " . $ms . " ");
}
endif;

if(!function_exists('phpshark_deleteLog')):
function phpshark_deleteLog($query = null, $record)
{
	$file = new \Core\Lib\Files\Files;
	$t = time();
	$ms = ($query != null) ? $query : " ";
	$location = loc_file_log('audit');
	$file->putFileContent($location, "> " . date("Y-m-d", $t) . ":" . date("h:i:sa") . " " . $ms . " ");
	$file->putFileContent($location, "- " . 'Existing Old Deleted Record Was ' . $record);
}
endif;

if(!function_exists('phpshark_stackTrace')):
function phpshark_stackTrace() {
	$stack = debug_backtrace();
    $output = '';

    $stackLen = count($stack);
    for ($i = 1; $i < $stackLen; $i++) {
        $entry = $stack[$i];

        $func = $entry['function'] . '(';
        $argsLen = count($entry['args']);
        for ($j = 0; $j < $argsLen; $j++) {
            $my_entry = $entry['args'][$j];
            if (is_string($my_entry)) {
                $func .= $my_entry;
            }
            if ($j < $argsLen - 1) $func .= ', ';
        }
        $func .= ')';

        $entry_file = 'NO_FILE';
        if (array_key_exists('file', $entry)) {
            $entry_file = $entry['file'];
        }
        $entry_line = 'NO_LINE';
        if (array_key_exists('line', $entry)) {
            $entry_line = $entry['line'];
        }
        $output .= $entry_file . ':' . $entry_line . ' - ' . $func . PHP_EOL;
    }
    return $output;
}
endif;

if(!function_exists('phpshark_setError')):
function phpshark_setError($error, $page = "exception", $type = E_USER_NOTICE ){
	$env = strtolower(ENVIRONMENT);
	if($env == 'production' || $env == 'testing'){
		ob_start();
		debug_print_backtrace();
		$log = ob_get_clean();
		$log .= $error;
		applicationLog($log);
	}else{
		trigger_error($error, $type);
		echo "<br/>";
		echo "<pre>".stackTrace()."</pre>";
	}
}
endif;
