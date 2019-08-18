<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use Core\Lib\Files\Files as files;
use Core\Lib\Files\Image as imgs;
use Core\Lib\Files\Forms as forms;
use Core\Lib\Json as json;
use Core\Lib\Pages as pages;

if(!function_exists('phpshark_redirect')):
function phpshark_redirect(string $location){
	$link = $location;
	if (headers_sent()) { echo "<meta http-equiv=\"refresh\" content=\"0; URL={$link}\">"; }
	else{	exit(header('Location:' . $link, true, 303)); }
}
endif;

if(!function_exists('php_requestPage')):
function php_requestPage($redirection = ""){
	$link = url($redirection);
	if (headers_sent()) { echo "<meta http-equiv=\"refresh\" content=\"0; URL={$link}\">"; }
	else{ exit(header('Location:' . $link, true, 303)); }
}
endif;
