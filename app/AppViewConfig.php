<?php
namespace Core;

class AppViewConfig{
	private static function generate(){
		$loc = PROJECT_PATH . 'config.xml';
		$xmlDoc = simplexml_load_file($loc);
		$config = $xmlDoc->CONFIGURATION;
		$dom = new DOMDocument();
		$dom->encoding = 'utf-8';
		$dom->xmlVersion = '1.0';
		$dom->formatOutput = true;
		$dom->preserveWhiteSpace = false;
		$xml_file_name = 'asdsadsa942347097.xml';

		$root = $dom->createElement('APP');
		$element_node = $dom->createElement('CONFIGURATION');

		$attr = new DOMAttr('mapping','project_config');
		$element_node->setAttributeNode($attr);

		$php = $dom->createElement('PHP', (string)$config->PHP);
		$element_node->appendChild($php);

		$base = $dom->createElement('BASE', (string)$config->BASE);
		$element_node->appendChild($base);

		$project = $dom->createElement('PROJECT', (string)$config->PROJECT);
		$element_node->appendChild($project);

		$environment= $dom->createElement('ENVIRONMENT', (string)$config->ENVIRONMENT);
		$element_node->appendChild($environment);

		$error_reporting = $dom->createElement('ERROR_REPORTING', (string)$config->ERROR_REPORTING);
		$element_node->appendChild($error_reporting);

		$language = $dom->createElement('LANGUAGE', (string)$config->LANGUAGE);
		$element_node->appendChild($language);

		$convert_to = $dom->createElement('CONVERT_TO', (string)$config->CONVERT_TO);
		$element_node->appendChild($convert_to);

		$root->appendChild($element_node);
		$dom->appendChild($root);

		$dom->save($xml_file_name);
	}
}
