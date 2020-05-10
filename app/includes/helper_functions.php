<?php
//MAKE TEXT DOMAIN
if(!function_exists(phpshark_read_config)){
	function phpshark_read_config($key, $value){
		return \Core\Lib\Config::get("{$key}/{$value}");
	}
}
