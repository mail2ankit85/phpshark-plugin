<?php
if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));
//API LINK: https://restcountries.eu

$API = 'https://restcountries.eu/rest/v2/';

if(!function_exists('phpshark_getAllCountries')):
function phpshark_getAllCountries(){
    global $API;
    $url = "{$API}all";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_getCountryByName')):
function phpshark_getCountryByName($name,$fullname = false){
    global $API;
    $url = "{$API}name/{$name}";
    if($fullname === true) $url .= "{$url}fullText=true";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_getCountryByCode')):
function phpshark_getCountryByCode($code){
    global $API;
    if(is_array($code)){
        $codeList = implode(";",$code);
        $url = "{$API}alpha?codes={$codeList}";
        $content = file_get_contents($url, false);
        return json_decode($content);
    }else{
        $url = "{$API}alpha/{$code}";
        $content = file_get_contents($url, false);
        return json_decode($content);
    }
}
endif;

if(!function_exists('phpshark_getCurrencyByCode')):
function phpshark_getCurrencyByCode($currency){
    global $API;
    $url = "{$API}currency/{$currency}";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_getLanguageByCode')):
function phpshark_getLanguageByCode($language){
    global $API;
    $url = "{$API}lang/{$language}";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_getDetailByCapital')):
function phpshark_getDetailByCapital($capital){
    global $API;
    $url = "{$API}capital/{$capital}";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_getDetailByCallCode')):
function phpshark_getDetailByCallCode($callCode){
    global $API;
    $url = "{$API}callingcode/{$callCode}";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_getDetailByRegion')):
function phpshark_getDetailByRegion($region){
    global $API;
    $url = "{$API}region/{$region}";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_regionalBloc')):
function phpshark_regionalBloc($block){
    global $API;
    $url = "{$API}regionalbloc/{$block}";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;

if(!function_exists('phpshark_getPlacesDetails')):
function phpshark_getPlacesDetails(Array $details){
    global $API;
    $fields = implode(";", $details);
    $url = "{$API}all?fields={$fields}";
    $content = file_get_contents($url, false);
    return json_decode($content);
}
endif;
