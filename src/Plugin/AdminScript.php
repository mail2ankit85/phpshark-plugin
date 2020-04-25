<?php

namespace Src\Plugin;

class AdminScript{
	public function register(){
			//========================================================================================
			//CORE APPLICATION CODE
			//========================================================================================
			// Add Custom Scripts to wp_head
			add_action('init', [ $this, 'phpshark_template_header_scripts' ]);

			// Add Conditional Page Scripts
			add_action('wp_print_scripts', [ $this, 'phpshark_template_scripts'] );
			//========================================================================================
			//CORE APPLICATION CODE
			//========================================================================================
			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================



			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================
    }

	// Load scripts (header.php)
	public function phpshark_template_header_scripts()
	{
		if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
			//========================================================================================
			//EXAMPLES
			//========================================================================================
			// wp_register_script('modernizr', BEP_ASSETS_URI . 'vendor/modernizr.min.js', array(), '2.7.1'); // Modernizr
			// wp_enqueue_script('modernizr'); // Enqueue it!
			// wp_register_script('conditionizr', BEP_ASSETS_URI . 'vendor/conditionizr.min.js', array(), '4.3.0'); // Conditionizr
			// wp_enqueue_script('conditionizr'); // Enqueue it!
			// wp_register_script('requirejs', BEP_ASSETS_URI. 'vendor/require.min.js', array(), '1.0.0'); // Custom scripts
			// wp_enqueue_script('requirejs'); // Enqueue it!
			//========================================================================================
			//EXAMPLES
			//========================================================================================
			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================



			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================
		}
	}

	// Load conditional scripts
	public function phpshark_template_scripts()
	{
		//========================================================================================
		//EXAMPLES
		//========================================================================================
		/*
			wp_deregister_script('jquery');
			wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
		*/
		// wp_register_script('phpsharkPlugScript', BEP_ASSETS_URI. 'phpshark/phpshark-scripts.js', array(), '1.0.0'); // Custom scripts
		// wp_enqueue_script('phpsharkPlugScript');
		// wp_register_script('phpsharkRequire', BEP_ASSETS_URI. 'phpshark/phpshark-require.js', array(), '1.0.0', true); // Custom scripts
		// wp_enqueue_script('phpsharkRequire');
		//========================================================================================
		//EXAMPLES
		//========================================================================================



		//========================================================================================
		//DEVELOPERS CODE
		//========================================================================================
		if (is_page('pagenamehere'))
		{
			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================





			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================
		}
	}
}
