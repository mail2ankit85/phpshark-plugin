<?php
namespace Core\Lib;
	if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

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
			set_error(__("\COOKIE SYNTAX ERROR: NAME not set in the right position.
			True position is 1. ",TEXT_DOMAIN)
			. __CLASS__ . "/". __FUNCTION__ );
		}
		if (array_key_exists('value', $arr) == false) {
			set_error(__("\COOKIE SYNTAX ERROR: VALUE not set in the right position.
			True position is 2. ",TEXT_DOMAIN)
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
				set_error(__("\COOKIE SYNTAX ERROR: No such index as ",TEXT_DOMAIN).$key.__(" Exists.",TEXT_DOMAIN)
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
			set_error(__("\COOKIE SYNTAX ERROR: NAME not set in the right position.
			True position is 1. ",TEXT_DOMAIN)
			. __CLASS__ . "/". __FUNCTION__ );
		}
		if (array_key_exists('value', $arr) == false) {
			set_error(__("\COOKIE SYNTAX ERROR: VALUE not set in the right position.
			True position is 2. ",TEXT_DOMAIN)
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
				set_error(__("\COOKIE SYNTAX ERROR: No such index as ",TEXT_DOMAIN).$key.__(" Exists.",TEXT_DOMAIN)
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
