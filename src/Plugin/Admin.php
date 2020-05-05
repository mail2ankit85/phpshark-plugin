<?php

namespace Src\Plugin;

class Admin{
  	public function register(){
  		// Remove Admin Bar from front page
  		add_filter('show_admin_bar', '__return_false');
  		// add_filter('login_redirect', [$this, 'admin_default_page']);
      register_activation_hook( __FILE__, [$this,'make_capabilities'] );
  	}

    //Login Redirections
  	public function admin_default_page() {
  	  return home_url('/dashboard');
  	}

    public function make_capabilities(){
      //     $capabilities = [];
      //     add_role( 'society_admin', __('Society Admin'), $capabilities );
    }

}
