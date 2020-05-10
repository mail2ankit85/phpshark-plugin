<?php
namespace Src\Router;

class AdminRouter{
	public static function getServices(){
		return [
			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================
				 	\Src\Plugin\Admin::class,
					\Src\Plugin\AdminScripts::class,
					\Src\Plugin\AdminOptions::class,
					\Src\Plugin\CustomTypes::class,
					\Src\Plugin\Taxonomy::class,
					\Src\Plugin\Slug::class,
			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================
		];
	}
}
