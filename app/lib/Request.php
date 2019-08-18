<?php 
namespace Core\Lib {
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Request
	{

		var $method;

		public function __construct()
		{
			$this->getServerMethod();
		}
		
		public function isPost()
		{
			if ($this->method === 'POST') {
				return true;
			}
			else {
				return false;
			}
		}

		public function isGet()
		{
			if ($this->method === 'GET') {
				return true;
			}
			else {
				return false;
			}
		}

		public function getServerMethod()
		{
			$this->method = $_SERVER['REQUEST_METHOD'];
		}

		public function getUrlVariable($var){
			$parts = parse_url($_SERVER['REQUEST_URI']);
			parse_str($parts['query'], $query);
			return($query[$var]);
		}

	}
}