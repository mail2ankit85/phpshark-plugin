<?php
//MAKE TEXT DOMAIN
function phpshark_read_config($key, $value){
	return \Core\Lib\Config::get("{$key}/{$value}");
}
