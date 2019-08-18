<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('loc_file_import')):
function phpshark_publicFolder($myFolder,$section = null){
    $section = strtolower($section);
    switch($section){
        case 'project':
            $loc = PROJECT_PATH.$myFolder.DS;
        default:
            $loc = PUBLIC_PATH.$myFolder.DS;
        break;
    }
    return $loc;
}
endif;

if(!function_exists('phpshark_folderAccess')):
function phpshark_folderAccess($path,$section = null){
    $section = strtolower($section);
    switch($section){
        case 'project':
            $loc = PROJECT_PATH.$path;
        default:
            $loc = PUBLIC_PATH.$path;
        break;
    }
    return $loc;
}
endif;

if(!function_exists('phpshark_checkFilePermission')):
function phpshark_checkFilePermission($file){
    $perms = fileperms($file);
    switch ($perms & 0xF000) {
        case 0xC000: // socket
            $info = 's';
            break;
        case 0xA000: // symbolic link
            $info = 'l';
            break;
        case 0x8000: // regular
            $info = 'r';
            break;
        case 0x6000: // block special
            $info = 'b';
            break;
        case 0x4000: // directory
            $info = 'd';
            break;
        case 0x2000: // character special
            $info = 'c';
            break;
        case 0x1000: // FIFO pipe
            $info = 'p';
            break;
        default: // unknown
            $info = 'u';
    }

    // Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
                (($perms & 0x0800) ? 's' : 'x' ) :
                (($perms & 0x0800) ? 'S' : '-'));

    // Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
                (($perms & 0x0400) ? 's' : 'x' ) :
                (($perms & 0x0400) ? 'S' : '-'));

    // World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
                (($perms & 0x0200) ? 't' : 'x' ) :
                (($perms & 0x0200) ? 'T' : '-'));

    echo $info;
}
endif;

if(!function_exists('phpshark_changeFolderPermission')):
function phpshark_changeFolderPermission($path, $permission = "0755"){
    chmod($path, $permission);
}
endif;

if(!function_exists('phpshark_makePublicWritable')):
function phpshark_makePublicWritable($path){
    if(!is_writable($path)){
        chmod($path, "0777");
    }
}
endif;
