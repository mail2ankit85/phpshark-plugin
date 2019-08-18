<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('phpshark_hashEncrypt')):
function phpshark_hashEncrypt(string $data)
{
	$context = hash_init(
		utils\config::get('database_credits/security_function'),
		HASH_HMAC,
		utils\config::get('database_credits/security_salt')
	);
	hash_update($context, $data);
	return hash_final($context);
}
endif;

if(!function_exists('phpshark_hashToken')):
function phpshark_hashToken($type = 'md5')
{
	$data1 = rand();
	$data2 = rand();
	$context = hash_init($type, HASH_HMAC, $data2);

	hash_update($context, $data1);
	return hash_final($context);
}
endif;

if(!function_exists('phpshark_shaToken')):
function phpshark_shaToken($str, $opt = FALSE){
	return sha1($str, $opt);
}
endif;


if(!function_exists('phpshark_decrypt')):
function phpshark_decrypt($string, $key){
	$result = '';
	$string = base64_decode($string);
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
	return $result;
}
endif;

if(!function_exists('phpshark_encrypt')):
function phpshark_encrypt($string, $key){
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}
endif;
