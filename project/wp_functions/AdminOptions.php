<?php
if ( ! function_exists( 'getAdminSettingsOption' ) ) :
function getAdminSettingsOption($class, $section, $field, $default = null){
	$oData = get_option( $class, array() );
	$dataUtil  = new PHPShark_AdminPageFramework_Utility;
	return $_sMyFieldValue = $dataUtil->getElement(
			$oData,    // subject array
			array( $section , $field ),   // dimensional path
			$default         // default value
	);
}
endif;
