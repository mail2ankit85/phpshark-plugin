<?php

// Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'do_shortcode');

// Remove <p> tags in Dynamic Sidebars (better!)
add_filter('widget_text', 'shortcode_unautop');

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'phpshark'),
        'description' => __('Description for this widget-area...', 'phpshark'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'phpshark'),
        'description' => __('Description for this widget-area...', 'phpshark'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

class Realty_Widget extends WP_Widget{
    public function __construct() {
        parent::__construct(
            'realty_widget', // Base ID
            'Realty Widget', // Name
                array('description' => __( 'Displays your latest listings. Outputs the post thumbnail, title and date per listing'))
        );
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['numberOfListings'] = strip_tags($new_instance['numberOfListings']);
        return $instance;
    }

    function form($instance) {
        if( $instance) {
            $title = esc_attr($instance['title']);
            $numberOfListings = esc_attr($instance['numberOfListings']);
        } else {
            $title = '';
            $numberOfListings = '';
        }
    }
    
    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $numberOfListings = $instance['numberOfListings'];
        echo $before_widget;
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
        $this->getRealtyListings($numberOfListings);
        echo $after_widget;
    }

    function getRealtyListings($numberOfListings) { //html
        global $post;
        add_image_size( 'realty_widget_size', 85, 45, false );
        $listings = new WP_Query();
        $listings->query('post_type=listings&amp;posts_per_page=' . $numberOfListings );
        var_dump($listings);
    }       
}

add_action('widgets_init', 'register_states_widget');
function register_states_widget() {
    register_widget('Realty_Widget');
}