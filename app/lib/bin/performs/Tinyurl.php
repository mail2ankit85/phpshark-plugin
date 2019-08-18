<?php
/**
 * @package  PHPShark-Plugin
 */
namespace Core\Lib\Perform{
  if (!defined('BASEPATH')) exit('No direct script access allowed');
    class TinyUTR{
        public static function get(){
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php?url='.$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
    }
}
