<?php 
/**
	Admin Page Framework v3.8.20 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/php-shark>
	Copyright (c) 2013-2019, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class PHPShark_AdminPageFramework_Form_View___CSS_widget extends PHPShark_AdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        return $this->_getWidgetRules();
    }
    private function _getWidgetRules() {
        return ".widget .php-shark-section .form-table > tbody > tr > td,.widget .php-shark-section .form-table > tbody > tr > th{display: inline-block;width: 100%;padding: 0;float: right;clear: right; }.widget .php-shark-field,.widget .php-shark-input-label-container{width: 100%;}.widget .sortable .php-shark-field {padding: 4% 4.4% 3.2% 4.4%;width: 91.2%;}.widget .php-shark-field input {margin-bottom: 0.1em;margin-top: 0.1em;}.widget .php-shark-field input[type=text],.widget .php-shark-field textarea {width: 100%;} @media screen and ( max-width: 782px ) {.widget .php-shark-fields {width: 99.2%;}.widget .php-shark-field input[type='checkbox'], .widget .php-shark-field input[type='radio'] {margin-top: 0;}}";
    }
    protected function _getVersionSpecific() {
        $_sCSSRules = '';
        if (version_compare($GLOBALS['wp_version'], '3.8', '<')) {
            $_sCSSRules.= ".widget .php-shark-section table.mceLayout {table-layout: fixed;}";
        }
        if (version_compare($GLOBALS['wp_version'], '3.8', '>=')) {
            $_sCSSRules.= ".widget .php-shark-section .form-table th{font-size: 13px;font-weight: normal;margin-bottom: 0.2em;}.widget .php-shark-section .form-table {margin-top: 1em;}";
        }
        return $_sCSSRules;
    }
    }
    