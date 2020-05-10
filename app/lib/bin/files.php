<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

if(!function_exists('phpshark_getFileStructure')):
function phpshark_getFileStructure($location, $resource = false)
{
    $result = array();
    if ($handle = opendir($location)) {
        if ($resource == true) {
            array_push($result, $handle);
        }

        /* This is the correct way to loop over the directory. */
        while (false !== ($entry = readdir($handle))) {
            array_push($result, $entry);
        }
        closedir($handle);
    }
    return $result;
}
endif;

if(!function_exists('phpshark_readFileStructure')):
function phpshark_readFileStructure($location, $reverse = false)
{
    $result = array();
    if (!empty($location) == true) {
        if ($result == true) {
            $result = scandir($location, 1);
        }
        else {
            $result = scandir($location);
        }
    }
    return $result;
}
endif;

if(!function_exists('phpshark_listDirectory')):
function phpshark_listDirectory($location)
{
    $result = array();
    $dir = array();
    if (!empty($location) == true) {
        if ($result == true) {
            $result = scandir($location, 1);
        }
        else {
            $result = scandir($location);
        }

        foreach ($result as $res) {
            if (is_dir($location . DS . $res)) {
                array_push($dir, $res);
            }
        }
    }

    return $dir;
}
endif;

if(!function_exists('phpshark_listFiles')):
function phpshark_listFiles($location){
    // $result = array();
    // $files = array();
    // if (!empty($location) == true) {
    //     if ($result == true) {
    //         $result = scandir($location, 1);
    //     }
    //     else {
    //         $result = scandir($location);
    //     }

    //     foreach ($result as $res) {
    //         if (is_file($location . DS . $res)) {
    //             array_push($files, $res);
    //         }
    //     }
    // }
    // return $files;

    if(is_dir($dir)){
        if($handle = opendir($dir)){
            while(($file = readdir($handle)) !== false){
                if($file != "." && $file != ".." && $file != "Thumbs.db"){
                    echo ''.$file.''."\n";
                }
            }
            closedir($handle);
        }
    }
}
endif;

if(!function_exists('phpshark_readFile')):
function phpshark_readFile($location)
{
    $file_content = file($location);
    return $file_content;
}
endif;

if(!function_exists('phpshark_readFileContent')):
function phpshark_readFileContent($location)
{
    $file_content = file_get_contents($location);
    return $file_content;
}
endif;

/*****
*@dir - Directory to destroy
*@virtual[optional]- whether a virtual directory
*/

if(!function_exists('phpshark_destroyDir')):
function phpshark_destroyDir($dir, $virtual = false)
{
	$ds = DIRECTORY_SEPARATOR;
	$dir = $virtual ? realpath($dir) : $dir;
	$dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
	if (is_dir($dir) && $handle = opendir($dir))
	{
		while ($file = readdir($handle))
		{
			if ($file == '.' || $file == '..')
			{
				continue;
			}
			elseif (is_dir($dir.$ds.$file))
			{
				destroyDir($dir.$ds.$file);
			}
			else
			{
				unlink($dir.$ds.$file);
			}
		}
		closedir($handle);
		rmdir($dir);
		return true;
	}
	else
	{
		return false;
	}
}
endif;
