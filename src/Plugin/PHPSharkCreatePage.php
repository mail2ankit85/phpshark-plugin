<?php

namespace Src\Plugin;

//========================================================================================
//EXAMPLES
//========================================================================================
/**
 * ********************************************
 * SAMPLE CODE BLOCK
 * EXAMPLE
 * *********************************************
 */
	// public function load_search() {
		// $this->addSettingSections(
		// 	array(
		// 		'section_id'        => 'search_section',
		// 		'title'             => __( 'Search Configurations', 'phpshark-plugin' ),
		// 	)
		// );

		// $this->addSettingFields(
		//     'email_section',   // target section ID
		//     array(
		//         'field_id'  => 'my_field_a',
		//         'title'     => 'Field A',
		//         'type'      => 'text',
		//     ),
		//     array(
		//         'field_id'  => 'my_field_b',
		//         'title'     => 'Field B',
		//         'type'      => 'text',
		//     ),
		//     array(
		//         'field_id'  => '_submit',
		//         'type'      => 'submit',
		//         'save'      => false,
		//     )
		// );

	// }
	//========================================================================================
	//EXAMPLES
	//========================================================================================
class PHPSharkCreatePage extends \PHPShark_AdminPageFramework {
	public function __construct(){
		parent::__construct();
	}

	public function setup() {
		//========================================================================================
		//DEVELOPERS CODE
		//========================================================================================
			// Create a top-level menu.
			$this->setRootMenuPage( 'Theme Options' );
			$this->setRootMenuPage(
				'Theme Options','dashicons-admin-generic'
			);
			// Add sub menu items.
			$this->addSubMenuItems(
					array(
							'title'         => __( 'Header',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_header',    // page slug
					),
					array(
							'title'         => __( 'Footer',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_footer',    // page slug
					),
					array(
							'title'         => __( 'Banner',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_banner',    // page slug
					),
					array(
							'title'         => __( 'Color',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_color',    // page slug
					),
					array(
							'title'         => __( 'Sections',  'phpshark-plugin' ),     // page title
							'page_slug'     => 'page_sections',    // page slug
					),
					array(
							'title'         => __( 'Ads',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_ads',    // page slug
					),
					array(
							'title'         => __( 'Homepage',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_home',    // page slug
					),
					array(
							'title'         => __( 'World',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_world',    // page slug
					),
					array(
							'title'         => __( 'News',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_news',    // page slug
					),
					array(
							'title'         => __( 'Sports',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_sports',    // page slug
					),
					array(
							'title'         => __( 'Health',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_health',    // page slug
					),
					array(
							'title'         => __( 'Travel',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_travel',    // page slug
					),
					array(
							'title'         => __( 'Entertainment',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_entertainment',    // page slug
					),
					array(
							'title'         => __( 'Environment',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_environment',    // page slug
					),
					array(
							'title'         => __( 'Automobile',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_automobile',    // page slug
					),
					array(
							'title'         => __( 'TV Schedule',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_schedule',    // page slug
					),
					array(
							'title'         => __( 'Deals',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'page_deals',    // page slug
					),
					array(
							'title'         => __( 'Contact Page',  'phpshark-plugin' ),     // page title
							'page_slug'     => 'page_contact',    // page slug
					),
					array(
							'title'         => __( 'Analytics',  'phpshark-plugin' ),     // page title
							'page_slug'     => 'page_analytics',    // page slug
					)
			);

			//========================================================================================
			//DEVELOPERS CODE
			//========================================================================================
	}

	//========================================================================================
	//DEVELOPERS CODE
	//========================================================================================

	//========================================================================================
	//DEVELOPERS CODE
	//========================================================================================

}
//========================================================================================
//DEVELOPERS CODE
//========================================================================================

class Logo_Upload extends \PHPShark_AdminPageFramework_PageMetaBox {

    public function setUp() {
				$this->addSettingFields(
						array(
						    'field_id'      => 'site_logo_field',
						    'title'         => __( 'Select logo for website', 'admin-page-framework-loader' ),
						    'type'          => 'image',
						    // 'label'         => __( 'First', 'admin-page-framework-loader' ),
						    'default'       =>  get_template_directory_uri().'/assets/img/logo.png',
						    'allow_external_source' => true,
						    'attributes'    => array(
						        'preview' => array(
						            'style' => 'max-width:300px;' // the size of the preview image.
						        ),
						    )
						),

						array(    // Text Area
								'field_id'      => 'my_textarea_field',
								'type'          => 'textarea',
								'title'         => 'Single Text Area',
								'description'   => 'Type a text string here.',
								'default'       => 'Hello World! This is set as the default string.',
						),
						
						array(
						    'field_id'      => 'color_picker_field',
						    'title'         => __( 'Color Picker', 'admin-page-framework-loader' ),
						    'type'          => 'color',
								'default'				=> '#000FFF'
						),

						array(
						    'field_id'      => 'submit_button_reset',
						    'title'         => __( 'Reset Button', 'admin-page-framework-loader' ),
						    'type'          => 'submit',
						    'label'         => __( 'Reset', 'admin-page-framework-loader' ),
						    'reset'         => true,
						    'attributes'    => array(
						        'class' => 'button button-secondary',
						    ),
						),

						array( // Submit button
								'field_id'      => 'submit_button',
								'type'          => 'submit',
						)
				);

    }

}


class Logo_Upload2 extends \PHPShark_AdminPageFramework_PageMetaBox {

    public function setUp() {
				$this->addSettingFields(
						array(
						    'field_id'      => 'site_logo_field_2',
						    'title'         => __( 'Select logo for website', 'admin-page-framework-loader' ),
						    'type'          => 'image',
						    // 'label'         => __( 'First', 'admin-page-framework-loader' ),
						    'default'       =>  get_template_directory_uri().'/assets/img/logo.png',
						    'allow_external_source' => true,
						    'attributes'    => array(
						        'preview' => array(
						            'style' => 'max-width:300px;' // the size of the preview image.
						        ),
						    )
						),

						array(
							'field_id' => 'media_with_attributes',
							'title' => __( 'Media File with Attributes', 'admin-page-framework-loader' ),
							'type' => 'media',
							'attributes_to_store' => array( 'id', 'caption', 'description' ),
								'attributes' => array(
									'button' => array(
										'data-label' => __( 'Select File', 'admin-page-framework-loader' ),
								),
										'remove_button' => array( // 3.2.0+
										'data-label' => __( 'Remove', 'admin-page-framework-loader' ), // will set the Remove button label instead of the dashicon
								),
							),
						),

						array(    // Text Area
								'field_id'      => 'my_textarea_field',
								'type'          => 'textarea',
								'title'         => 'Single Text Area',
								'description'   => 'Type a text string here.',
								'default'       => 'Hello World! This is set as the default string.',
						),

						array( // Submit button
								'field_id'      => 'submit_button',
								'type'          => 'submit',
						)
				);

    }

}


new Logo_Upload(
    null,                       // (null|string) meta box id - passing null will make it auto generate
    'Site Logo',    // (sting) title
    'page_header',        // (array|string) target page slug
    'side',                   // (string) context - either 'normal', 'side', or 'advanced'.
    'default'                   // (string) priority - either 'high', 'low', or 'default'.
);

new Logo_Upload2(
    null,                       // (null|string) meta box id - passing null will make it auto generate
    'Site Logo 2',    // (sting) title
    'page_header',        // (array|string) target page slug
    'normal',                   // (string) context - either 'normal', 'side', or 'advanced'.
    'default'                   // (string) priority - either 'high', 'low', or 'default'.
);

//========================================================================================
//DEVELOPERS CODE
//========================================================================================
