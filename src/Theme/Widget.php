<?php
namespace Src\Theme;

class Widget{
    public function register(){
        add_action( 'widgets_init', [$this,'aixclusiv_widgets_init'] );
    }
    //========================================================================================
    //DEVELOPERS CODE
    //========================================================================================
        public function aixclusiv_widgets_init() {
        	register_sidebar(
        		array(
        			'name'          => esc_html__( 'Sidebar', 'aixclusiv' ),
        			'id'            => 'sidebar-1',
        			'description'   => esc_html__( 'Add widgets here.', 'aixclusiv' ),
        			'before_widget' => '<section id="%1$s" class="widget %2$s">',
        			'after_widget'  => '</section>',
        			'before_title'  => '<h2 class="widget-title">',
        			'after_title'   => '</h2>',
        		)
        	);
        }
    //========================================================================================
    //DEVELOPERS CODE
    //========================================================================================
}
