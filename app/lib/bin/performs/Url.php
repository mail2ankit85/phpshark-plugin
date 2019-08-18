<?php
/**
 * @package  PHPShark-Plugin
 */
namespace Core\Lib\Perform{
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Url{
        public static function getCurrent(){
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $validURL = str_replace("&", "&amp;", $url);
            return validURL;
        }
    }
}
