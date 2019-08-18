<?php 
namespace Core\Lib {
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Token
	{
		public static function generate()
		{
			$session = new Session;
			return $session->set(Config::get('session/session_name'), md5(uniqid(rand())));
		}

		public static function delete()
		{
			$session = new Session;
			$tokenName = Config::get('session/session_name');

			if ($session->exists($tokenName) && $token === $session->get($tokenName)) {
				$session->delete($tokenName);
			}
			return false;
		}
		
		public static function init(){
			return new self;
		}
	}
}