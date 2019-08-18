<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use Core\Lib\Files\Files as files;
use Core\Lib\Files\Image as imgs;
use Core\Lib\Files\Forms as forms;
use Core\Lib\Json as json;
use Core\Lib\Pages as pages;

if(!function_exists('phpshark_getStringBetween')):
function phpshark_getStringBetween($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
endif;

if(!function_exists('phpshark_htmlStatement')):
function phpshark_htmlStatement($str)
{
    return htmlentities($str);
}
endif;

if(!function_exists('phpshark_localInformation')):
function phpshark_localInformation($string)
{
    return nl_langinfo($string);
}
endif;

if(!function_exists('phpshark_replaceOccurrenceOf')):
function phpshark_replaceOccurrenceOf($string, $with)
{
    $arr1 = $explode(' ', $string);
    $key = array_search($arr, $with);

    $arr2 = array();
    $final = array();
    $arr2 = [$key => $with];
    $final = array_replace($arr1, $arr2);
    return join(" ", $final);
}
endif;

if(!function_exists('phpshark_getByPosition')):
function phpshark_getByPosition($string, $start_pos, $end_pos = null)
{
    $sub = substr($string, $start_pos, $end_pos);
    return $sub;
}
endif;

if(!function_exists('phpshark_getByPositionAfter')):
function phpshark_getByPositionAfter($string, $start_pos)
{
    $sub = substr($string, $start_pos);
    return $sub;
}
endif;

if(!function_exists('phpshark_getByPositionBefore')):
function phpshark_getByPositionBefore($string, $end_pos)
{
    return get_by_position($string, '0', $end_pos);
}
endif;

if(!function_exists('phpshark_uppercase')):
function phpshark_uppercase($string)
{
    return strtoupper($string);
}
endif;

if(!function_exists('phpshark_lowercase')):
function phpshark_lowercase($string)
{
    return strtolower($string);
}
endif;

if(!function_exists('phpshark_prettyWords')):
function phpshark_prettyWords($words)
{
    $word = lowercase($words);
    return ucwords($word);
}
endif;

if(!function_exists('phpshark_findWords')):
function phpshark_findWords($string,$word,$before=0,$after=0,$maxFoundCount=1)
{
    $stringWords = str_word_count($string,1);
    $stringWordsPos = array_keys(str_word_count($string,2));

    $foundCount = 0;
    $foundInstances = array();
    while ($foundCount < $maxFoundCount) {
        if (($myWordPos = array_search($word,$stringWords)) === false)
            break;
        ++$foundCount;
        if (($myWordPos+$after) >= count($stringWords))
            $after = count($stringWords) - $myWordPos - 1;
        $startPos = $stringWordsPos[$myWordPos-$before];
        $endPos = $stringWordsPos[$myWordPos+$after] + strlen($stringWords[$myWordPos+$after]);

        $stringWords = array_slice($stringWords,$myWordPos+1);
        $stringWordsPos = array_slice($stringWordsPos,$myWordPos+1);

        $foundInstances[] = substr($string,$startPos,$endPos-$startPos);
    }
    return $foundInstances;
}
endif;

if(!function_exists('phpshark_stringClean')):
function phpshark_stringClean($string){
	$table = array(
			'?' => 'S', '?' => 's', '?' => 'Dj', '?' => 'dj', '?' => 'Z',
			'?' => 'z', '?' => 'C', '?' => 'c', '?' => 'C', '?' => 'c',
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
			'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
			'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
			'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
			'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
			'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
			'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
			'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
			'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
			'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
			'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
			'ÿ' => 'y', '?' => 'R', '?' => 'r', 'ü' => 'u', 'º' => '',
			'ª' => '',
		);
	$string = strtr($string, $table);
	return $string;
}
endif;

if(!function_exists('phpshark_getDecoratedDiff')):
function phpshark_getDecoratedDiff(string $old, string $new){
	$from_start = strspn($old ^ $new, "\0");
	$from_end = strspn(strrev($old) ^ strrev($new), "\0");

	$old_end = strlen($old) - $from_end;
	$new_end = strlen($new) - $from_end;

	$start = substr($new, 0, $from_start);
	$end = substr($new, $new_end);
	$new_diff = substr($new, $from_start, $new_end - $from_start);
	$old_diff = substr($old, $from_start, $old_end - $from_start);

	$new = "$start<ins style='background-color:#ccffcc'>$new_diff</ins>$end";
	$old = "$start<del style='background-color:#ffcccc'>$old_diff</del>$end";
	return array("old"=>$old, "new"=>$new);
}
endif;
