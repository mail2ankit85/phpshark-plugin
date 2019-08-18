<?php

namespace Src\Plugin;

class AdminStyle{
	public function register(){
		// Remove 'text/css' from enqueued stylesheet
		// add_filter('style_loader_tag', [ $this, 'style_remove' ]);
		// Add Theme Stylesheet
		// add_action('wp_enqueue_scripts', [ $this, 'phpshark_template_styles'] );
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
			//phpshark_template_styles
			//wp_register_style('normalize', BEP_ASSETS_URI . 'vendors/normalize/normalize.min.css', array(), '1.0', 'all');
			//wp_enqueue_style('normalize'); // Enqueue it!
			// wp_enqueue_style( 'phpshark-datatable', BEP_ASSETS_URI . 'components/table.widget/css/tables-widget-structure.css' );
			// wp_enqueue_style( 'phpshark-datatable-settings', BEP_ASSETS_URI . 'components/table.widget/css/themes/default/tables-widget-settings.css' );
			// wp_enqueue_style( 'phpshark-datatable-widget', BEP_ASSETS_URI . 'components/table.widget/css/themes/default/tables-widget-theme.css' );
			// wp_enqueue_style( 'phpshark-datatable-resp', BEP_ASSETS_URI . 'components/table.widget/css/tables-widget-responsive.css' );
			// wp_enqueue_style( 'phpshark-styles', BEP_ASSETS_URI . 'css/styles.min.css' );
		}
	}
}
