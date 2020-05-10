<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

if(!function_exists('phpshark_debug')):
function phpshark_debug($var,$value = 'backtrace')
{
	if (!empty($var)) {
		$details = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
		$error = error_get_last();
		echo '<pre>';
		echo '<b>'.__('Line Number',TEXT_DOMAIN).'</b>:' . $details[0]['line'];
		echo '<br/>';
		echo '<b>File</b>:' . $details[0]['file'];
		echo '<br/>';
		if (is_object($var)) {
			echo '<b>'.__('Type',TEXT_DOMAIN).':</b>: Object';
		}
		if (is_array($var)) {
			echo '<b>'.__('Type',TEXT_DOMAIN).':</b>: Array';
		}
		if (is_string($var)) {
			echo '<b>'.__('Type',TEXT_DOMAIN).':</b>: String';
		}
		if (is_bool($var)) {
			echo '<b>'.__('Type',TEXT_DOMAIN).':</b>: Boolean';
		}
		if (is_int($var)) {
			echo '<b>'.__('Type',TEXT_DOMAIN).':</b>: Integer';
		}
		if (is_float($var)) {
			echo '<b>'.__('Type',TEXT_DOMAIN).':</b>: Float';
		}
		echo '<br />';
		if (!empty($error)) {
			echo ''.__('Error log',TEXT_DOMAIN).': <br/>';
			echo '<b>'.__('File',TEXT_DOMAIN).'</b>:' . $error['file'] . '<br/>';
			echo '<b>'.__('Line Number',TEXT_DOMAIN).'</b>:' . $error['line'] . '<br/>';
			echo '<b>'.__('Message',TEXT_DOMAIN).'</b>:' . $error['message'] . '<br/>';
		}
		if (strtolower($value) == 'session') {
			$isSessionActive = (session_status() == PHP_SESSION_ACTIVE);
			if ($isSessionActive) {
				echo '<b>'.__('Sessions',TEXT_DOMAIN).'</b> :: '.__('Active Sessions Exist!',TEXT_DOMAIN).'<br/>';
				echo '<b>'.__('Sessions',TEXT_DOMAIN).'</b> :: '.__('Found Session Values::',TEXT_DOMAIN).'<br/>';
				print_r($_SESSION);
				echo '<b>'.__('Session Method',TEXT_DOMAIN).'</b> :: ' . $_SERVER['REQUEST_METHOD'] . '<br/>';
			}
			else echo '<b>'.__('Sessions',TEXT_DOMAIN).'</b> :: '.__('No Sessions Active!',TEXT_DOMAIN).'<br/>';
		}

		if (is_array($var)) {
			echo '<b>'.__('Array Results',TEXT_DOMAIN).'</b>:<br/>';
			print_r($var);
		}
		else if (is_object($var)) {
			echo '<b>'.__('Object Results',TEXT_DOMAIN).'</b>:<br/>';
			print_r($var);
		}
		else echo '<b>'.__('Result',TEXT_DOMAIN).'</b>: ' . $var;
		if ($value == 'backtrace') {
			echo '<br/>';
			var_dump(debug_print_backtrace());
		}

		echo '<br/><b>----------------------------------------------------------------------------------</b><br/>';
		echo '<b>'.__('Back Tracing / Debug Values',TEXT_DOMAIN).' [<i>'.__('Syntax ',TEXT_DOMAIN).'</i> debug($variables,$options = null)]</b><br/>';
		echo '<i>'.__('Debug Parameter Options',TEXT_DOMAIN).'</i><br/>';
		echo '<ul>';
		echo '<li><i>'.__('Pass Value "backtrace" for backtracing the application',TEXT_DOMAIN).'</i></li>';
		echo '<li><i>'.__('Pass Value "session" for session variables',TEXT_DOMAIN).'</i></li>';
		echo '</ul>';
		echo '</pre>';
	}
}
endif;

if(!function_exists('declared_classes')):
function declared_classes()
{
	echo '<pre>';
	print_r(get_declared_classes());
	echo '</pre>';
}
endif;
