<?php

namespace Src\Theme;

class Pages{
  public function register(){
    add_filter( 'page_template', [$this,'phpshark_page_templates'] );
    add_filter( 'post_template', [$this,'phpshark_page_templates'] );
  }

  public function phpshark_page_templates(){
      $page_template = '';
      //========================================================================================
  		//EXAMPLES
  		//========================================================================================
      // if ( is_page( 'confirmation' ) ) {
      //     $page_template = TEMPLATE.'theme'.DS.'page-confirmation.php';
      // }
      // if ( is_page( 'register' ) ) {
      //     $page_template = TEMPLATE.'theme'.DS.'page-register.php';
      // }
      // if ( is_page( 'login' ) ) {
      //     $page_template = TEMPLATE.'theme'.DS.'page-login.php';
      // }
      // if ( is_page( 'lostpassword' ) ) {
      //     $page_template = TEMPLATE.'theme'.DS.'page-lostPassword.php';
      // }
      // if ( is_page( 'dashboard' ) ) {
      //     $page_template = TEMPLATE.'theme'.DS.'page-dashboard.php';
      // }
      // if ( is_page( 'profile' ) ) {
      //     $page_template = TEMPLATE.'theme'.DS.'page-profile.php';
      // }
      // if ( is_page( 'logout' ) ) {
      //     $page_template = TEMPLATE.'theme'.DS.'page-logout.php';
      // }
      //========================================================================================
  		//EXAMPLES
  		//========================================================================================

      //========================================================================================
  		//DEVELOPERS CODE
  		//========================================================================================





      //========================================================================================
  		//DEVELOPERS CODE
  		//========================================================================================

      if(is_front_page()){
      //========================================================================================
  		//DEVELOPERS CODE
  		//========================================================================================







      //========================================================================================
  		//DEVELOPERS CODE
  		//========================================================================================
      }
      return $page_template;
  }
}
