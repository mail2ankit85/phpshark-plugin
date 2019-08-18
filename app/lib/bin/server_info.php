<?php
/**
 * @package  PHPShark-Plugin
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('phpshark_returnBytes')):
function phpshark_returnBytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // The 'G' modifier is available since PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }
    return $val;
}
endif;

if(!function_exists('phphshark_getServerDetails')):
function phphshark_getServerDetails($info = null){
    $info = strtolower($info);
    switch($info){
        case 'general':
            return phpinfo (INFO_GENERAL);
        break;
        case 'credits':
            return phpinfo (INFO_CREDITS);
        break;
        case 'config':
            return phpinfo (INFO_CONFIGURATION);
        break;
        case 'modules':
            return phpinfo (INFO_MODULES);
        break;
        case 'environment':
            return phpinfo (INFO_ENVIRONMENT);
        break;
        case 'variables':
            return phpinfo (INFO_VARIABLES);
        break;
        case 'license':
            return phpinfo (INFO_LICENSE);
        break;
        case 'version':
            return phpversion();
        break;
        default:
            phpinfo (INFO_ALL);

    }
}
endif;

if(!function_exists('phpshark_getINI')):
function phpshark_getINI(string $varname){
    return ini_get ( $varname );
}
endif;
