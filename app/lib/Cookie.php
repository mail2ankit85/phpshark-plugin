<?php 
namespace Core\Lib;
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
class Cookie
{
	private $_time;

	public function __construct(array $time)
	{
		$this->_time = $time;
	}

	public function set(array $arr, $available = '/')
	{
		$name = '';
		$cvalue = '';
		$time = '';

		if (array_key_exists('name', $arr) == false) {
			set_error("\COOKIE SYNTAX ERROR: NAME not set in the right position.
			True position is 1. "
			. __CLASS__ . "/". __FUNCTION__ );
		}
		if (array_key_exists('value', $arr) == false) {
			set_error("\COOKIE SYNTAX ERROR: VALUE not set in the right position.
			True position is 2. "
			. __CLASS__ . "/". __FUNCTION__ );
		}
		foreach ($arr as $key => $value) {
			switch ($key) {
				case 'name' :
					$name = $value;
					break;
				case 'value' :
					$cvalue = $value;
					break;
				case 'time' :
					$time = $value;
					break;
				default :
				set_error("\COOKIE SYNTAX ERROR: No such index as ".$key." Exists."
				. __CLASS__ . "/". __FUNCTION__ );
			}
		}
		if ($time == '') {
			$time = $this->_time;
		}
		if ($name != null && $value != null && $time != null && $available != null) {
			setcookie($name, $cvalue, time() + $time, $available);
		}

	}

	public function isCookieEnabled()
	{
		if (count($_COOKIE) > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function unset(array $arr, $available = '/')
	{
		$name = '';
		$cvalue = '';
		$time = '';

		if (array_key_exists('name', $arr) == false) {
			set_error("\COOKIE SYNTAX ERROR: NAME not set in the right position.
			True position is 1. "
			. __CLASS__ . "/". __FUNCTION__ );
		}
		if (array_key_exists('value', $arr) == false) {
			set_error("\COOKIE SYNTAX ERROR: VALUE not set in the right position.
			True position is 2. "
			. __CLASS__ . "/". __FUNCTION__ );
		}
		foreach ($arr as $key => $value) {
			switch ($key) {
				case 'name' :
					$name = $value;
					break;
				case 'value' :
					$cvalue = $value;
					break;
				case 'time' :
					$time = $value;
					break;
				default :
				set_error("\COOKIE SYNTAX ERROR: No such index as ".$key." Exists."
				. __CLASS__ . "/". __FUNCTION__ );
			}
		}
		if ($time == '') {
			$time = $this->_time;
		}
		if ($name != null && $value != null && $available != null) {
			setcookie($name, $cvalue, time() - $time, $available);
		}
	}

}