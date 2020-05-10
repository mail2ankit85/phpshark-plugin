<?php
/**
 * @package  PHPShark-Plugin
 */
namespace  Core\Lib\Files {
	if (!defined('BASEPATH')) exit(__('No direct script access allowed',TEXT_DOMAIN));

	use \PDO;


	class Files
	{

		public function __construct(){}

		public function fileContent($path)
		{
			return file_get_contents($path);
		}

		public function fileExist($target_file)
		{
			if (!file_exists($target_file)) {
				return false;
			}
			else {
				return true;
			}
		}

		public function fileSize($formUploadNameAttr)
		{
			return $_FILES[$formUploadNameAttr]["size"];
		}

		public function fileName($formUploadNameAttr)
		{
			return basename($_FILES[$formUploadNameAttr]["name"]);
		}

		public function fileType($loc, $formUploadNameAttr)
		{
			$target_file = $loc . basename($_FILES[$formUploadNameAttr]["name"]);
			return pathinfo($target_file, PATHINFO_EXTENSION);
		}

		public function fileInfo($target_file)
		{
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$info = finfo_file($finfo, $target_file);
			finfo_close($finfo);
			return $info;
		}

		public function imageSize($formUploadNameAttr)
		{
			if(isset($_FILES[$formUploadNameAttr]["tmp_name"]) !== null){
				if(file_exists($_FILES[$formUploadNameAttr]["tmp_name"])){
					return getimagesize($_FILES[$formUploadNameAttr]["tmp_name"]);
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		public function isImage($formUploadNameAttr)
		{
			if ($this->imageSize($formUploadNameAttr) == '') {
				return false;
			}
			else {
				return true;
			}
		}

		public function isFile($target_file)
		{
			return is_file($target_file);
		}

		public function createFolder($target_file)
		{
			if (file_exists($target_file)) {
				return true;
			}
			else {
				if (!mkdir($target_file, 0777, true)) {
					//die('Failed to create folders...');
				}
			}
			return true;
		}

		//public function putFileContent($target_file, $args, $dateflag = false, $noAppendFlag = false)
		public function putFileContent()
		{
			$noAppendFlag = false;
			$dateflag = false;
			$args = func_get_args();
			$target_file = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $args[0]);

			$parts = explode(DIRECTORY_SEPARATOR, $target_file);
			array_pop($parts);
			$directory = '';
			foreach ($parts as $part) :
			$check_path = $directory . $part;
			if (is_dir($check_path . DIRECTORY_SEPARATOR) === FALSE) {
				echo $check_path;
				mkdir($check_path, 0755);
			}
			$directory = $check_path . DIRECTORY_SEPARATOR;
			endforeach;

			if(isset($arg[4])) $noAppendFlag = $arg[4];
			if(isset($arg[3])) $dateflag = $arg[3];

			if ($noAppendFlag == true) {
				if ($dateflag == true) {
					$date = 'date:';
					file_put_contents($target_file, $date, LOCK_EX);
				}
				file_put_contents($target_file, trim($args[1]) . PHP_EOL, LOCK_EX);
				return true;

			}
			else {
				if ($dateflag == true) {
					$date = 'date:';
					file_put_contents($target_file, $date, FILE_APPEND | LOCK_EX);
				}
				file_put_contents($target_file, trim($args[1]) . PHP_EOL, FILE_APPEND | LOCK_EX);
				return true;
			}
		}

		public function fileRename($loc, $old, $new)
		{
			$old = $loc . $old;
			$new = $loc . $new;
			if (rename($old, $new)) {
				return true;
			}
			else {
				return false;
			}
		}

		public function fileDelete($target_file)
		{
			// Remove the uploaded file from the PHP temp folder
			if (file_exists($target_file)) {
				unlink($target_file);
				return true;
			}
		}

		public function fileMode($target_file, $mode)
		{
			return chmod($target_file, $mode);
		}

		public function getChangeGroup($target_file, $group = "admin")
		{
			if (!chgrp($target_file, $group)) {
				return true;
			}
			else {
				return false;
			}
		}

		public function fileUploadToServer($formUploadNameAttr, $target_file)
		{
			if (move_uploaded_file($_FILES[$formUploadNameAttr]["tmp_name"], $target_file)) {
				return true;
			}
			else {
				return false;
			}
		}
	}
}
