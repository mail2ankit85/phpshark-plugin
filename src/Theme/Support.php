<?php
/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/
// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

namespace Src\Theme;

class Support{
	public function register(){
		$this->post_images();
		// $this->post_formats();
	}

		//Post Images
	public function post_images(){
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-image', 800, 400 );
		add_image_size( 'very-small-icon',  56, 56 );
		add_image_size( 'small-icon-1',   370, 185 );
		add_image_size( 'screen-1',  574, 443 );
		add_image_size( 'screen-2',  274, 442 );
		add_image_size( 'screen-3',  374, 215 );
	}
}
