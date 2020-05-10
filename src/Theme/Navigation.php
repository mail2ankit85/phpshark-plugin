<?php

namespace Src\Theme;

class Navigation{
	public function register(){
			// Add Menu Support
			add_theme_support('menus');

			// Add HTML5 Menu
			add_action('init', [ $this, 'register_fixopr_menu']);
  }

	// Register HTML5 Navigation
	public function register_fixopr_menu(){
		register_nav_menus( array(
				'primary_menu'   => __( 'Primary Menu', 'phpshark' ),
				'secondary_menu' => __( 'Secondary Menu', 'phpshark' ),
				'footer_menu'    => __( 'Footer Menu', 'phpshark' ),
				'mobile_menu'    => __( 'Mobile Menu', 'phpshark' ),
				'social_menu'    => __( 'Social Menu', 'phpshark' ),
				'social_menu_footer'    => __( 'Social Menu Footer', 'phpshark' )
		) );
	}


}
