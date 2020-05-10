<?php

namespace Src\Theme;

class Scripts{
		public function register(){
			add_action('wp_enqueue_scripts', [$this, 'phpshark_template_styles'] );
			add_action('wp_enqueue_scripts', [$this, 'phpshark_add_google_fonts'] );
    }

		// Load HTML5 Blank styles
		public function phpshark_template_styles(){
			//CSS
			wp_enqueue_style( 'aixclusiv-themestyle', get_template_directory_uri().'/style.css' , array(), _S_VERSION );
			wp_enqueue_style( 'aixclusiv-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css' , array(), '3.3.7' );
			wp_enqueue_style( 'aixclusiv-main', get_template_directory_uri().'/assets/css/main.css' , array(), _S_VERSION );
			wp_enqueue_style( 'aixclusiv-style2', get_template_directory_uri().'/assets/css/style.css' , array(), _S_VERSION );
			wp_enqueue_style( 'aixclusiv-colors', get_template_directory_uri().'/assets/css/colors.css' , array(), _S_VERSION );
			wp_enqueue_style( 'aixclusiv-responsive', get_template_directory_uri().'/assets/css/responsive.css' , array(), _S_VERSION );
			wp_enqueue_style( 'aixclusiv-jquery-ui', get_template_directory_uri().'/assets/css/jquery-ui.min.css' , array(), _S_VERSION );
			wp_enqueue_style( 'aixclusiv-project', get_template_directory_uri().'/assets/css/project.css' , array(), _S_VERSION );
			wp_style_add_data( 'aixclusiv-style', 'rtl', 'replace' );


			//Javascripts
			wp_deregister_script('jquery');
			wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.1.1.min.js', array(), '3.1.1', true );
			wp_enqueue_script('jquery');
			wp_register_script( 'aixclusiv-js-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.7', true );
			wp_enqueue_script('aixclusiv-js-bootstrap');
			wp_register_script( 'aixclusiv-js-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array(), _S_VERSION, true );
			wp_enqueue_script('aixclusiv-js-jquery-ui');
			wp_register_script( 'aixclusiv-js-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(), _S_VERSION, true );
			wp_enqueue_script('aixclusiv-js-plugins');

			if(is_page_template('contact.php')){
				wp_register_script( 'aixclusiv-js-validator', get_template_directory_uri() . '/assets/js/validator.js', array(), _S_VERSION, true );
				wp_enqueue_script('aixclusiv-js-validator');
				wp_register_script( 'aixclusiv-js-googlemap', 'http://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY', array(), _S_VERSION, true );
				wp_enqueue_script('aixclusiv-js-googlemap');
				wp_register_script( 'aixclusiv-js-gmapjs', get_template_directory_uri() . '/assets/js/google-map.js', array('jquery'), '', true );
				wp_enqueue_script('aixclusiv-js-gmapjs');
			}

			wp_register_script( 'aixclusiv-js-functions', get_template_directory_uri() . '/assets/js/functions.js', array('jquery'), '', true );
			wp_enqueue_script('aixclusiv-js-functions');
			wp_register_script( 'aixclusiv-js-project', get_template_directory_uri() . '/assets/js/project.js', array('jquery'), '', true );
			wp_enqueue_script('aixclusiv-js-project');
		}

	public function phpshark_add_google_fonts(){
		wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed%7CRoboto+Slab:300,400,700%7CRoboto:300,400,500,700', false );
	}
}
