<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clean Array - removes empty array and re-index it.
 *
 * @param Array $arr Mandatory
 *
 */

if(!function_exists('phpshark_arrayClean')):
function phpshark_arrayClean(array $arr)
{
	if (!empty($arr)) {
			$arr = array_filter($arr);
			$arr = array_values($arr);
			return $arr;
	}
	else {
		setError( __("Array Object in function ",TEXT_DOMAIN). __FUNCTION__ ."()". __('cannot be empty!',TEXT_DOMAIN) );
	}
}
endif;

if(!function_exists('phpshark_arraySort')):
function phpshark_arraySort(array $array, string $opt = null, string $by = null)
{
	$ret = array();
	if (isAssoc($array)) {
		switch (strtolower($opt)) {
			case 'ascending' :
				if ($by == 'value') {
					$ret = asort($array);
				}
				else if ($by == 'key') {
					$ret = ksort($array);
				}
				else {
					$ret = ksort($array);
				}
				break;
			case 'descending' :
				if ($by == 'value') {
					$ret = arsort($array);
				}
				else if ($by == 'key') {
					$ret = krsort($array);
				}
				else {
					$ret = krsort($array);
				}
				break;
			default :
				$ret = ksort($array);
		}
	}
	else {
		switch (strtolower($opt)) {
			case 'ascending' :
				$ret = sort($array);
				break;
			case 'descending' :
				$ret = rsort($array);
				break;
			default :
				$ret = sort($array);
		}
	}
}
endif;

if(!function_exists('phpshark_arrayIsAssoc')):
function phpshark_arrayIsAssoc(array $arr)
{
	if (array() === $arr) return false;
	return array_keys($arr) !== range(0, count($arr) - 1);
}
endif;

if(!function_exists('phpshark_arrayFind')):
function phpshark_arrayFind(array $array, string $where, string $value)
{
	if (isAssoc($array)) {
		$key = array_search($where, array_column($array, $value));
		return $key;
	}
	else {
		return null;
	}
}
endif;

if(!function_exists('phpshark_arrayIntersect')):
function phpshark_arrayIntersect(array $array1, array $array2)
{
	$r = array_intersect($array1, $array2);
	return $r;
}
endif;

if(!function_exists('phpshark_arrrayDifference')):
function phpshark_arrrayDifference(array $array1, array $array2)
{
	$r = array_diff($array1, $array2);
	return $r;
}
endif;


if(!function_exists('phpshark_arrayUnique')):
function phpshark_arrayUnique(array $array1, array $array2)
{
	$r =& array_unique(array_merge($array1, $array2));
	return $r;
}
endif;

if(!function_exists('phpshark_arrayConcatanate')):
function phpshark_arrayConcatanate(array $arr, string $using)
{
	$str =& join($using, $arr);
	return $r;
}
endif;

if(!function_exists('phpshark_arrayReccursion')):
function phpshark_arrayReccursion(array $myArray, string $find) {
    $res = array();
    $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($myArray), RecursiveIteratorIterator::SELF_FIRST);
    foreach ($iterator as $k => $v) {
        if($k === $find) {
            $res[] = $v;
        }
    }
    return $res;
}
endif;

if(!function_exists('phpshark_arrayHas')):
function phpshark_arrayHas(Array $array, String $index){
	return array_key_exists($index,$array);
}
endif;
