<?php
namespace Core\Lib {
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Timestamp
	{
		public static function setTime($format = null)
		{
			$time = Time();
			if ($format == null) {
				$res = date('Y-m-d H:i:s', $time);
			}
			else {
				$res = date($format, $time);
			}
			return $res;
		}
	}
}