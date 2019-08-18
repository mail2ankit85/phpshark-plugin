<?php 
/**
 * @package  PHPShark-Plugin
 */
namespace Core\Lib\Files {
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class CSV
	{

		public function ReadCSV($filePath)
		{
			$csvData = file_get_contents($filePath);
			$lines = explode(PHP_EOL, $csvData);
			$array = array();
			foreach ($lines as $line) {
				$array[] = str_getcsv($line);
			}
			return $array;
		}

		public function getCSV($path)
		{
			$file = fopen('myCSVFile.csv', 'r');
			while ( ($line = fgetcsv($file)) !== FALSE) {
				//$line is an array of the csv elements
				print_r($line);
			}
			fclose($file);
		}

		public function WriteCSV($data, $fileName)
		{
			header('Content-Type: application/excel');
			header('Content-Disposition: attachment; filename="' . $fileName . '"');
			$fp = fopen('php://output', 'w');
			foreach ($data as $line) {
				$val = explode(",", $line);
				fputcsv($fp, $val);
			}
			fclose($fp);
		}

		public function getCSVStream()
		{
			return stream_get_contents('php://input');
		}

		public function generateCsv($data, $delimiter = ',', $enclosure = '"') 
		{
			$handle = fopen('php://temp', 'r+');
			foreach ($data as $line) {
				fputcsv($handle, $line, $delimiter, $enclosure);
			}
			rewind($handle);
			while (!feof($handle)) {
				$contents .= fread($handle, 8192);
			}
			fclose($handle);
			return $contents;
		}
	}
}