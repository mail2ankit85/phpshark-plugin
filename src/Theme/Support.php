<?php
/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/
// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

namespace Src\Theme;

class Support{
	public function register(){
		$this->post_formats();
		$this->post_images();
	}

		//Post Images
	public function post_images(){
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-thumbnail size', 800, 400 );
		add_image_size( 'small-icon-1 size', 370, 185 );
		add_image_size( 'screen-1 size', 574, 443 );
		add_image_size( 'screen-2 size', 274, 442 );
		add_image_size( 'screen-3 size', 374, 215 );
	}

	//Post Images
	public function post_formats(){
			$formats = array( 'aside',
						 						'gallery',
												'link',
												'image',
												'quote',
												'status',
												'video',
												'audio',
												'chat');

			add_theme_support( 'post-formats', $formats);
	}
}
