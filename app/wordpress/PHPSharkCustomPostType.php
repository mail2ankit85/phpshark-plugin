<?php

namespace WP;

class PHPSharkCustomPostType{
  private $_project;
  private $_name;
  private $_plural_name;
  private $_theme_name;
  private $_icon;
  private $_supports;
  private $_taxonomies;
  private $_opt;
  private $_internalName;

  public function createPost($project, $name, $plural_name, $theme_name, $icon, $supports = [], $taxonomies =[], $opt = []){
    $this->_project = $project;
    $this->_name = $name;
    $this->_plural_name = $plural_name;
    $this->_theme_name = $theme_name;
    $this->_icon = $icon;
    $this->_supports = $supports;
    $this->_taxonomies = $taxonomies;
    $this->_opt = $opt;
    $this->createCustomPostType();
  }

  private function createCustomPostType(){
    $this->_internalName = str_replace(' ','',strtolower($this->_name));
    $create_posttype = "{$this->_project}_create_posttype_{$this->_internalName}";
    $functionCallback = $create_posttype;
    $$functionCallback = function() {
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( $this->_name, __('Post Type General Name'), $this->_theme_name ),
            'singular_name'       => _x( $this->_name, __('Post Type Singular Name'), $this->_theme_name ),
            'menu_name'           => __( $this->_name, $this->_theme_name ),
            'parent_item_colon'   => __( "Parent $this->_name", $this->_theme_name ),
            'all_items'           => __( "All $this->_plural_name", $this->_theme_name ),
            'view_item'           => __( "View $this->_name", $this->_theme_name ),
            'add_new_item'        => __( "Add New $this->_name", $this->_theme_name ),
            'add_new'             => __( "Add New", $this->_theme_name ),
            'edit_item'           => __( "Edit $this->_name", $this->_theme_name ),
            'update_item'         => __( "Update $this->_name", $this->_theme_name ),
            'search_items'        => __( "Search $this->_name", $this->_theme_name ),
            'not_found'           => __( "Not Found", $this->_theme_name ),
            'not_found_in_trash'  => __( "Not found in Trash", $this->_theme_name ),
        );

      // Set other options for Custom Post Type
      $args =   array(
          'label'               => __( $this->_name, $this->_theme_name ),
          'description'         => __( $this->_name, $this->_theme_name ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => $this->_supports,
          // You can associate this CPT with a taxonomy or custom taxonomy.
          'taxonomies'          => $this->_taxonomies,
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */
          'query_var'           => isset($this->_opt['query_var'])? $this->_opt['query_var'] : true,
          'hierarchical'        => isset($this->_opt['hierarchical'])? $this->_opt['hierarchical'] : false,
          'show_ui'             => isset($this->_opt['show_ui'])? $this->_opt['show_ui'] : true,
          'show_in_rest'        => isset($this->_opt['show_in_rest'])? $this->_opt['show_in_rest'] : true,
          'show_in_menu'        => isset($this->_opt['show_in_menu'])? $this->_opt['show_in_menu'] : true,
          'show_in_nav_menus'   => isset($this->_opt['show_in_nav_menus'])? $this->_opt['show_in_nav_menus'] : true,
          'show_in_admin_bar'   => isset($this->_opt['show_in_admin_bar'])? $this->_opt['show_in_admin_bar'] : true,
          'menu_position'       => isset($this->_opt['menu_position'])? $this->_opt['menu_position'] :  26,
          'can_export'          => isset($this->_opt['can_export'])? $this->_opt['can_export'] : true,
          'has_archive'         => isset($this->_opt['has_archive'])? $this->_opt['has_archive'] : true,
          'exclude_from_search' => isset($this->_opt['exclude_from_search'])? $this->_opt['exclude_from_search'] : false,
          'public'  => isset($this->_opt['publicly_queryable'])? $this->_opt['publicly_queryable'] : true,
          'publicly_queryable'  => isset($this->_opt['publicly_queryable'])? $this->_opt['publicly_queryable'] : true,
          'capability_type'     => isset($this->_opt['capability_type'])? $this->_opt['capability_type'] : 'page',
          'menu_icon'           => $this->_icon,
      );

      register_post_type( $this->_internalName, $args );
    };

    $priority = isset($opt['priority '])? $opt['priority '] : 0;
    add_action( 'init', $$create_posttype, $priority );
  }

}
