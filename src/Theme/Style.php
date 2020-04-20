<?php

namespace Src\Theme;

class Style{
	public function register(){
		// Remove 'text/css' from enqueued stylesheet
		add_filter('style_loader_tag', [ $this, 'style_remove' ]);

		//========================================================================================
		//EXAMPLES
		//========================================================================================
		// Add Theme Stylesheet
		// add_action('wp_enqueue_scripts', [ $this, 'phpshark_template_styles'] );
		//========================================================================================
		//EXAMPLES
		//========================================================================================
    }

	// Remove 'text/css' from our enqueued stylesheet
	public function style_remove($tag)
	{
		return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
	}

	// Load HTML5 Blank styles
	public function phpshark_template_styles()
	{


		if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
			//========================================================================================
			//EXAMPLES
			//========================================================================================
			//phpshark_template_styles
			// wp_register_style('normalize', BEP_ASSETS_URI . 'vendors/normalize/normalize.min.css', array(), '1.0', 'all');
			// wp_enqueue_style('normalize'); // Enqueue it!
			// wp_enqueue_style( 'phpshark-fontawesome', 'https://kit.fontawesome.com/b1ac3fac09.js' );
			// wp_enqueue_style( 'phpshark-styles', BEP_ASSETS_URI . 'vendor/foundation/css/foundation.min.css' );
			// wp_enqueue_style( 'phpshark-styles', BEP_ASSETS_URI . 'css/styles.css' );
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
}
