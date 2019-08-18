<?php
namespace Src\Router;

class PublicRouter{
	public static function getServices(){
		return [
				\Src\Theme\Pages::class,
				\Src\Theme\Style::class,
				\Src\Theme\Script::class,
				\Src\Theme\Comment::class,
				\Src\Theme\PostView::class,
				\Src\Theme\Admin::class,
				\Src\Theme\Shortcode::class,
				\Src\Theme\Image::class,
				\Src\Theme\Media::class,
		];
	}
}
