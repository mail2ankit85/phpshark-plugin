<?php
namespace Core\Lib;

	if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

class Session
{

	public static function init()
	{
		if(phpversion() >= "5.4.0"){
			if (session_status() == PHP_SESSION_NONE) {
				@session_start();
			}
		}
		if(phpversion() < "5.4.0"){
			if(session_id() == '') {
				session_start();
			}
		}
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if (isset($_SESSION[$key]))
			return $_SESSION[$key];
	}

	public static function exists($key)
	{
		if (isset($_SESSION[$key])) {
			return true;
		}
		else {
			return false;
		}
	}

	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
	}

	public static function delete(string $key)
	{
		if (self::exists($key)) {
			unset($_SESSION[$key]);
		}
	}

	public static function flash(string $key, string $string = '')
	{
		if (self::exists($key)) {
			$session = self::get($key);
			self::delete($key);
			return $session;
		}
		else {
			self::set($name, $string);
		}
	}
}
