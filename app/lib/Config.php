<?php
/**
 * @package  PHPShark-Plugin
 */
namespace Core\Lib {
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Config
	{
		public static function get($path = null)
		{
			if ($path) {
				$config = $GLOBALS['config'];
				$path = explode('/', $path);

				foreach ($path as $bit) {
					if (isset($config[$bit])) {
						$config = $config[$bit];
					}
				}
				return $config->__toString();
			}
			return false;
		}
	}

}
