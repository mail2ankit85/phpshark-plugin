<?php

namespace Src\Theme;

class Navigation{
	public function register(){

		// Add Menu Support
		add_theme_support('menus');

		// Add HTML5 Menu
		add_action('init', [ $this, 'register_fixopr_menu']);

		// Remove surrounding <div> from WP Navigation
		add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args');
    }

	// HTML5 navigation
	 public function getSimpleNvigation()
	 {
		wp_nav_menu(
		array(
			'theme_location'  => 'header-menu',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'menu-{menu slug}-container',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul>%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
			)
		);
	 }

	// Register HTML5 Navigation
	public function register_fixopr_menu()
	{
		// Using array to specify more menus if needed
		register_nav_menus(array(
		// Main Navigation
			'unlogged-menu' => __('Unlogged Menu', 'fixopr'),
		// Sidebar Navigation
			'loggedin-menu' => __('LoggedIn Menu', 'fixopr'),
		// Extra Navigation if needed (duplicate as many as you need!)
			'admin-menu' => __('Admin Menu', 'fixopr'),
		// Extra Navigation if needed (duplicate as many as you need!)
			'members-menu' => __('Member\'s Menu', 'fixopr')
		));
	}

	// Remove the <div> surrounding the dynamic navigation to cleanup markup
	public function my_wp_nav_menu_args($args = '')
	{
		$args['container'] = false;
		return $args;
	}

}
