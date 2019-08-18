<?php
/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/
// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

namespace Src\Theme;

class Shortcode{
	public function register(){
			// Shortcodes
			// You can place [html5_shortcode_demo] in Pages, Posts now.
			add_shortcode('phpshark_shortcode_demo', [ $this, 'phpshark_shortcode_demo' ]);

			// Place [html5_shortcode_demo_2] in Pages, Posts now.
			add_shortcode('phpshark_shortcode_demo_2', [$this, 'phpshark_shortcode_demo_2']);

			add_shortcode( 'ct_terms', [$this,'list_terms_custom_taxonomy'] );
			add_filter('widget_text', 'do_shortcode');
    }

	// Shortcode Demo with Nested Capability
	// do_shortcode allows for nested Shortcodes
	public function phpshark_shortcode_demo($atts, $content = null)
	{
		return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>';
	}

	// Shortcode Demo with simple <h2> tag
	// Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
	public function phpshark_shortcode_demo_2($atts, $content = null)
	{
		return '<h2>' . $content . '</h2>';
	}


	public function list_terms_custom_taxonomy( $atts ) {
		// Inside the function we extract custom taxonomy parameter of our shortcode
				extract( shortcode_atts( array(
						'custom_taxonomy' => '',
				), $atts ) );
		
		// arguments for function wp_list_categories
		$args = array( 
				taxonomy => $custom_taxonomy,
				title_li => ''
		);
		
		// We wrap it in unordered list 
		echo '<ul>'; 
		echo wp_list_categories($args);
		echo '</ul>';
	}
}
