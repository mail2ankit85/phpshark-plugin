<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

/********************************
Browser Functions
 *********************************/

if(!function_exists('phpshark_check')):
function phpshark_check($pattern)
{
	$agent = $_SERVER['HTTP_USER_AGENT'];
	$match = preg_match($pattern, strtolower($agent));
	return !empty($match);
}
endif;


if(!function_exists('phpshark_isOpera')):
function phpshark_isOpera()
{
	check("/opera/");
}
endif;

if(!function_exists('phpshark_isOpera10_5')):
function phpshark_isOpera10_5()
{
	return isOpera() && check("/version\/10\.5/");
}
endif;

if(!function_exists('phpshark_isChrome')):
function phpshark_isChrome()
{
	return check("/\bchrome\b/");
}
endif;

if(!function_exists('phpshark_phpshark_isWebKit')):
function phpshark_phpshark_isWebKit()
{
	return check("/webkit/");
}
endif;

if(!function_exists('phpshark_isAndroid')):
function phpshark_isAndroid()
{
	return check("/android/");
}
endif;

if(!function_exists('phpshark_isSafari')):
function phpshark_isSafari()
{
	return !isChrome() && check("/safari/");
}
endif;

if(!function_exists('phpshark_isSafari2')):
function phpshark_isSafari2()
{
	return isSafari() && check("/applewebkit\/4/");
}
endif;

if(!function_exists('phpshark_isSafari3')):
function phpshark_isSafari3()
{
	return isSafari() && check("/version\/3/");
}
endif;

if(!function_exists('phpshark_isSafari4')):
function phpshark_isSafari4()
{
	return isSafari() && check("/version\/4/");
}
endif;

if(!function_exists('phpshark_isSafari5')):
function phpshark_isSafari5()
{
	return isSafari() && check("/version\/5/");
}
endif;

if(!function_exists('phpshark_isiPhone')):
function phpshark_isiPhone()
{
	return isSafari() && check("/iphone/");
}
endif;

if(!function_exists('phpshark_isiPod')):
function phpshark_isiPod()
{
	return isSafari() && check("/ipod/");
}
endif;

if(!function_exists('phpshark_isiPad')):
function phpshark_isiPad()
{
	return isSafari() && check("/ipad/");
}
endif;

if(!function_exists('phpshark_isIE')):
function phpshark_isIE()
{
	return !isOpera() && check("/msie/");
}
endif;

if(!function_exists('phpshark_isGecko')):
function phpshark_isGecko()
{
	return !isWebKit() && check("/gecko/");
}
endif;

if(!function_exists('phpshark_isGecko3')):
function phpshark_isGecko3()
{
	return isGecko() && check("/rv:1\.9/");
}
endif;

if(!function_exists('phpshark_isGecko4')):
function phpshark_isGecko4()
{
	return isGecko() && check("/rv:2\.0/");
}
endif;

if(!function_exists('phpshark_isGecko5')):
function phpshark_isGecko5()
{
	return isGecko() && check("/rv:5\./");
}
endif;


if(!function_exists('phpshark_isFF')):
function phpshark_isFF()
{
	return isGecko() && check("/firefox/");
}
endif;

if(!function_exists('phpshark_isFF3_0')):
function phpshark_isFF3_0()
{
	return isGecko3() && check("/rv:1\.9\.0/");
}
endif;

if(!function_exists('phpshark_isFF3_5')):
function phpshark_isFF3_5()
{
	return isGecko3() && check("/rv:1\.9\.1/");
}
endif;

if(!function_exists('phpshark_isFF3_6')):
function phpshark_isFF3_6()
{
	return isGecko3() && check("/rv:1\.9\.2/");
}
endif;

if(!function_exists('phpshark_isWindows')):
function phpshark_isWindows()
{
	return check("/windows|win32/");
}
endif;

if(!function_exists('phpshark_isWindowsCE')):
function phpshark_isWindowsCE()
{
	return check("/windows ce/");
}
endif;

if(!function_exists('phpshark_isMac')):
function phpshark_isMac()
{
	return check("/macintosh|mac os x/");
}
endif;

if(!function_exists('phpshark_isLinux')):
function phpshark_isLinux()
{
	return check("/linux/");
}
endif;

if(!function_exists('phpshark_isiOS')):
function phpshark_isiOS()
{
	return isiPhone() || isiPod() || isiPad();
}
endif;

if(!function_exists('phpshark_isMobile')):
function phpshark_isMobile()
{
	return isiOS() || isAndroid();
}
endif;

?>
