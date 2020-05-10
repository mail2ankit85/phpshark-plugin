<?php
namespace Core\Lib {
	if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

	class Sanitizr
	{
		public function __construct(){}

		private static function stripSlashesDeep($value)
		{
			$value = is_array($value) ? array_map(array($self, 'strip_slashes_deep'), $value) : stripslashes($value);
			return $value;
		}

		public static function removeMagicQuotes()
		{
			if (get_magic_quotes_gpc()) {
				if (isset($_GET)) {
					$_GET = self::stripSlashesDeep($_GET);
				}

				if (isset($_POST)) {
					$_POST = self::stripSlashesDeep($_POST);
				}

				if (isset($_COOKIE)) {
					$_COOKIE = self::stripSlashesDeep($_COOKIE);
				}
			}
		}

		public static function unregisterGlobals()
		{
			if (ini_get('register_globals')) {
				$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
				foreach ($array as $value) {
					foreach ($GLOBALS[$value] as $key => $var) {
						if ($var === $GLOBALS[$key]) {
							unset($GLOBALS[$key]);
						}
					}
				}
			}
		}
		/***************************************************************
		 ***************************************************************/
		public static function cleanBuffer()
		{
			ob_end_clean();
		}
	}
}
