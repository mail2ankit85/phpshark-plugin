<?php
namespace Src\Router;

class AdminRouter{
	public static function getServices(){
		return [
			\Src\Plugin\AdminStyle::class,
			\Src\Plugin\AdminScript::class,
			\Src\Plugin\PHPSharkCreatePage::class,
			\Src\Plugin\CustomTypes::class,
			\Src\Plugin\Taxonomy::class,
			\Src\Plugin\Tag::class,
			\Src\Plugin\Slug::class,
			\Src\Plugin\Widget::class
		];
	}
}
