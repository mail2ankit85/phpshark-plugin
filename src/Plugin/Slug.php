<?php

namespace Src\Plugin;

class Slug{
	public function register(){
		// Add slug to body class (Starkers build)
		add_filter('body_class', [$this, 'add_slug_to_body_class']);
    }

	// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
	public function add_slug_to_body_class($classes){
		global $post;
		if (is_home()) {
			$key = array_search('blog', $classes);
			if ($key > -1) {
				unset($classes[$key]);
			}
		} elseif (is_page()) {
			$classes[] = sanitize_html_class($post->post_name);
		} elseif (is_singular()) {
			$classes[] = sanitize_html_class($post->post_name);
		}
		return $classes;
	}


}
