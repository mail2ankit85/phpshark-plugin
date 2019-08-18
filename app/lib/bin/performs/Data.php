<?php
/**
 * @package  PHPShark-Plugin
 */
namespace Core\Lib\Perform{
  if (!defined('BASEPATH')) exit('No direct script access allowed');
  
    class Data{
        public static function uri(){
            $contents=file_get_contents($file);
            $base64=base64_encode($contents);
            echo "data:$mime;base64,$base64";
        }
    }
}
