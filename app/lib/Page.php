<?php 
namespace Core\Lib {
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Page{

		/**
         * resolves a virtual path into an absolute path
         */

		public static function UrlContent($path){
			if (self::startsWith($path, '~')) {
				$path = str_replace('/', DS, $path);
				$appPath = SRC_PATH . (self::startsWith($path, '~/') ? '' : DS);
				$result = str_replace('~', $appPath, $path);
				$result = str_replace(DS . DS, DS, $result);
				$result = str_replace(DS . DS . DS, DS, $result);
				//die($result);
				return $result;
			}
			else {
				return $path;
			}
		}		

		/**
         * resolves a virtual path into an absolute path
         */

		public static function templateContent($path){
			if (self::startsWith($path, '~')) {
				$path = str_replace('/', DS, $path);
				$tempPath = TEMPLATE_PATH . (self::startsWith($path, '~/') ? '' : DS);
				$tempPath = rtrim($tempPath,'/');			
				$result = str_replace('~', $tempPath, $path);
				$result = str_replace(DS . DS . DS, DS, $result);
				return $result;
			}
			else {
				return $path;
			}
		}

		public static function startsWith($haystack, $needle){
			$length = strlen($needle);
			return (substr($haystack, 0, $length) === $needle);
		}

		public static function endsWith($haystack, $needle){
			$length = strlen($needle);
			if ($length == 0) {
				return true;
			}

			$start = $length * -1; //negative
			return (substr($haystack, $start) === $needle);
		}

		public static function trimStart($prefix, $string){

			if (substr($string, 0, strlen($prefix)) == $prefix) {
				$string = substr($string, strlen($prefix), strlen($string));
			}

			return $string;
		}

		public static function trimEnd($suffix, $string){
			if (substr($string, (strlen($suffix) * -1)) == $suffix) {
				$string = substr($string, 0, strlen($string) - strlen($suffix));
			}
			return $string;
		}

	}
}