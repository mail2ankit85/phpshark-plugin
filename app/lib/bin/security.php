<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

use Core\Lib\Files\Files as files;
use Core\Lib\Files\Image as imgs;
use Core\Lib\Files\Forms as forms;
use Core\Lib\Json as json;
use Core\Lib\Pages as pages;

if(!function_exists('phpshark_filter')):
function phpshark_filter($data)
{ //Filters data against security risks.
    if (is_array($data)) {
        foreach ($data as $key => $element) {
            $data[$key] = filter($element);
        }
    }
    else {
        $data = trim(htmlentities(strip_tags($data)));
        if (get_magic_quotes_gpc()) $data = stripslashes($data);
        $data = mysql_real_escape_string($data);
    }
    return $data;
}
endif;

/**************
*@length - length of random string (must be a multiple of 2)
**************/
if(!function_exists('phpshark_readableRandomString')):
function phpshark_readableRandomString($length = 6){
    $conso=array("b","c","d","f","g","h","j","k","l",
    "m","n","p","r","s","t","v","w","x","y","z");
    $vocal=array("a","e","i","o","u");
    $password="";
    srand ((double)microtime()*1000000);
    $max = $length/2;
        for($i=1; $i<=$max; $i++){
            $password.=$conso[rand(0,19)];
            $password.=$vocal[rand(0,4)];
        }
        return $password;
}
endif;

/*************
*@l - length of random string
*/
if(!function_exists('phpshark_generateRand')):
function phpshark_generateRand($l){
    $c= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    srand((double)microtime()*1000000);
    for($i=0; $i<$l; $i++) {
        $rand.= $c[rand()%strlen($c)];
    }
    return $rand;
}
endif;

if(!function_exists('phpshark_encodeEmail')):
function phpshark_encodeEmail($email='info@domain.com',
         $linkText='Contact Us', $attrs ='class="emailencoder"' ){

	// remplazar aroba y puntos
	$email = str_replace('@', '@', $email);
	$email = str_replace('.', '.', $email);
	$email = str_split($email, 5);

	$linkText = str_replace('@', '@', $linkText);
	$linkText = str_replace('.', '.', $linkText);
	$linkText = str_split($linkText, 5);

	$part1 = '<a href="ma';
	$part2 = 'ilto:';
	$part3 = '" '. $attrs .' >';
	$part4 = '</a>';

	$encoded = '<script type="text/javascript">';
	$encoded .= "document.write('$part1');";
	$encoded .= "document.write('$part2');";
	foreach($email as $e)
	{
			$encoded .= "document.write('$e');";
	}
	$encoded .= "document.write('$part3');";
	foreach($linkText as $l)
	{
			$encoded .= "document.write('$l');";
	}
	$encoded .= "document.write('$part4');";
	$encoded .= '</script>';

	return $encoded;
}
endif;

if(!function_exists('phpshark_isValidEmail')):
function phpshark_isValidEmail($email, $test_mx = false){
	if(eregi("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email))
		if($test_mx)
		{
			list($username, $domain) = split("@", $email);
			return getmxrr($domain, $mxrecords);
		}
		else
			return true;
	else
		return false;
}
endif;
