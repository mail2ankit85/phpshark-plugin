<?php
namespace Src\Router;

class PublicRouter{
	public static function getServices(){
		return [
				//========================================================================================
				//DEVELOPERS CODE
				//========================================================================================
					\Src\Theme\Scripts::class,
					\Src\Theme\Shortcode::class,
					\Src\Theme\Navigation::class,
					\Src\Theme\Posts::class,
					\Src\Theme\Pages::class,
					\Src\Theme\Media::class,
					\Src\Theme\Widget::class,
					\Src\Theme\Support::class,
					\Src\Theme\PostView::class
				//========================================================================================
				//DEVELOPERS CODE
				//========================================================================================
		];
	}
}
