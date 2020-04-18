<?php

namespace Src\Plugin;

//ADMIN FRAMEWORK INTEGRATION
if (file_exists(PLUGIN_DIR . 'app' . DS . 'admin-page-framework' . DS . 'admin-page-framework.php')){
	require_once PLUGIN_DIR . 'app' . DS . 'admin-page-framework' . DS . 'admin-page-framework.php';
}else{
	echo '\"Admin Framework Integration\" Not Found!';
}

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
			// Create a top-level menu.
			$this->setRootMenuPage( 'Theme Options' );
			$this->setRootMenuPage(
				'Theme Options','dashicons-admin-generic'
			);
			// Add sub menu items.
			$this->addSubMenuItems(
					array(
							'title'         => __( 'Resume',  'phpshark-plugin' ),    // page title
							'page_slug'     => 'resume',    // page slug
					),
					array(
							'title'         => __( 'Contact',  'phpshark-plugin' ),     // page title
							'page_slug'     => 'contact',    // page slug
					)
			);
	}

	public function do_form_admin_pages(){
		?>
				<h4> Set your Environmental variables here!! </h4>
		<?php
	}
}
