<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

add_theme_support( 'html5', array( 
	'comment-list', 
	'comment-form', 
	'search-form', 
	'gallery', 
	'caption' ) );


//
// if (function_exists('add_theme_support'))
// {
    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
      	'default-color' => 'FFF',
      	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
      	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
      	'header-text'			=> false,
      	'default-text-color'		=> '000',
      	'width'				=> 1000,
      	'height'			=> 198,
      	'random-default'		=> false,
      	'wp-head-callback'		=> $wphead_cb,
      	'admin-head-callback'		=> $adminhead_cb,
      	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    // add_theme_support('automatic-feed-links');

    // Localisation Support
    // load_theme_textdomain('phpshark', get_template_directory() . '/languages');
// }
