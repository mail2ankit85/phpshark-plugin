<?php 
namespace Src\Plugin;

class Widget{
    public function register(){
        add_action( 'widgets_init', [$this,'my_custom_sidebar'] );
    }

    public function my_custom_sidebar() {
        register_sidebar(
            array (
                'name' => __( 'Primary Sidebar', 'primer' ),
                'id' => 'sidebar-3',
                'description' => __( 'Blog Sidebar', 'primer' ),
            )
        );
    }

}
