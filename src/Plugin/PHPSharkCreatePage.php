<?php

namespace Src\Plugin;

//ADMIN FRAMEWORK INTEGRATION
if (file_exists(PLUGIN_DIR . 'app' . DS . 'admin-page-framework' . DS . 'admin-page-framework.php')){
	require_once PLUGIN_DIR . 'app' . DS . 'admin-page-framework' . DS . 'admin-page-framework.php';
}else{
	echo '\"Admin Framework Integration\" Not Found!';
}

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

	public function load_resume() {
			$this->addSettingSections(
				array(
					'section_id'        => 'resume',
					'title'             => 'Resume Page Settings',
				)
			);
			$this->addSettingFields(
				'resume',   // target section ID
				array(
					'field_id'  => 'bio_field_name',
					'title'     => 'Biography',
					'type'      => 'text',
					'default'   => 'About',
				),
				array(
					'field_id'  => 'exp_field_name',
					'title'     => 'Experiance',
					'type'      => 'text',
					'default'   => 'Experiance',
				),
				array(
					'field_id'  => 'edu_field_name',
					'title'     => 'Education',
					'type'      => 'text',
					'default'   => 'Education',
				),
				array(
					'field_id'  => 'skl_field_name',
					'title'     => 'Skill',
					'type'      => 'text',
					'default'   => 'Skill',
				),
				array(
					'field_id'  => 'prg_field_name',
					'title'     => 'Programming Languages &amp; Tools',
					'type'      => 'text',
					'default'   => 'Programming Languages &amp; Tools',
				),
				array(
					'field_id'  => 'erp_field_name',
					'title'     => 'SAP/ERP Competencies',
					'type'      => 'text',
					'default'   => 'SAP/ERP Competencies',
				),
				array(
					'field_id'  => 'prj_field_name',
					'title'     => 'Project',
					'type'      => 'text',
					'default'   => 'Project',
				),
				array(
					'field_id'  => 'int_field_name',
					'title'     => 'Interest',
					'type'      => 'text',
					'default'   => 'Interest',
				),
				array(
					'field_id'  => 'awd_field_name',
					'title'     => 'Awards',
					'type'      => 'text',
					'default'   => 'Awards &amp; Certifications',
				),
				array(
					'field_id'  => '_submit',
					'type'      => 'submit',
					'save'      => false,
				)
			);
	}

	public function load_contact() {
		$this->addSettingSections(
			array(
				'section_id'        => 'contact',
				'title'             => 'Contact Settings',
			)
		);
		$this->addSettingFields(
			'contact',   // target section ID
			array(
				'field_id'  => 'company_name',
				'title'     => 'Company',
				'type'      => 'text',
				'attributes'    => array( 'size' => 60 ),
			),
			array(
				'field_id'  => 'phone',
				'title'     => 'Phone',
				'type'      => 'text',
			),
			array(
				'field_id'  => 'longitude',
				'title'     => 'Longitude',
				'type'      => 'text',
			),
			array(
				'field_id'  => 'latitude',
				'title'     => 'Latitude',
				'type'      => 'text',
			),
			array(
				'field_id'  => 'longitude',
				'title'     => 'Longitude',
				'type'      => 'text',
			),
			array(
				'field_id'  => 'address',
				'title'     => 'Registered Address',
				'type'      => 'textarea',
								'rich' => array(
								'media_buttons' => false,
								'tinymce'       => false
							),
			),
			array(
				'field_id'  => '_submit',
				'type'      => 'submit',
				'save'      => false,
			)
		);
	}
}