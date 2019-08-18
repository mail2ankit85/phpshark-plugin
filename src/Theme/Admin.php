<?php

namespace Src\Theme;

class Admin{
	public function register(){
		// Remove Admin Bar from front page
		add_filter('show_admin_bar', '__return_false');
	}
}
