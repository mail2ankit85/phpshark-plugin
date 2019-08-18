<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('phpshark_currencyFormat')):
function phpshark_currencyFormat($amount, $decimals = null, $decimalpoint = null, $separator = null)
{
    if ($decimals == null) {
        $decimals = \app\utilities\Config::get('currency/decimal');
    }
    if ($decimalpoint == null) {
        $decimalpoint = \app\utilities\Config::get('currency/decimal_places');
    }
    if ($separator == null) {
        $separator = \app\utilities\Config::get('currency/separator');
    }
    return number_format($amount, $decimals, $decimalpoint, $separator);
}
endif;
