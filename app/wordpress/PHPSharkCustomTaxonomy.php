<?php

namespace WP;

class PHPSharkCustomTaxonomy{

  private $_project;
  private $_name;
  private $_plural_name;
  private $_theme_name;
  private $_taxonomiesFor;
  private $_opt_catagories;
  private $_opt_tags;
  private $_internalName;

  public function createTaxonomyCategory($project, $name, $plural_name, $theme_name, $taxonomiesFor, $opt = []){
    $this->_project = $project;
    $this->_name = $name;
    $this->_plural_name = $plural_name;
    $this->_theme_name = $theme_name;
    $this->_taxonomiesFor = str_replace(' ','',strtolower($taxonomiesFor));
    $this->_opt_catagories = $opt;
    $this->createCustomTaxonomyCatagory();
  }

  public function createTaxonomyTag($project, $name, $plural_name, $theme_name, $taxonomiesFor, $opt = []){
    $this->_project = $project;
    $this->_name = $name;
    $this->_plural_name = $plural_name;
    $this->_theme_name = $theme_name;
    $this->_taxonomiesFor = str_replace(' ','',strtolower($taxonomiesFor));
    $this->_opt_tags = $opt;
    $this->createCustomTaxonomyTags();
  }


  private function createCustomTaxonomyCatagory(){
    $this->_internalName = str_replace(' ','_',strtolower($this->_name));
    $create_taxonomy = "{$this->_project}_create_taxonomy_{$this->_internalName}";
    $functionCallback = $create_taxonomy;
    $$functionCallback = function() {
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( $this->_name, 'taxonomy General Name', $this->_theme_name ),
            'singular_name'       => _x( $this->_name, 'taxonomy Singular Name', $this->_theme_name ),
            'search_items'        => __( "Search $this->_name", $this->_theme_name ),
            'all_items'           => __( "All $this->_plural_name", $this->_theme_name ),
            'parent_item'         => __( "Parent $this->_name", $this->_theme_name ),
            'parent_item_colon'   => __( "Parent $this->_name", $this->_theme_name ),
            'edit_item'           => __( "Edit $this->_name", $this->_theme_name ),
            'update_item'         => __( "Update $this->_name", $this->_theme_name ),
            'add_new_item'        => __( "Add New $this->_name", $this->_theme_name ),
            'new_item_name'       => __( 'New Genre Name',$this->_theme_name ),
            'menu_name'           => __( $this->_name, $this->_theme_name )
        );

      // Set other options for Custom Post Type
      $args =   array(
          'labels'                => $labels,
          'label'                 => __( $this->_name, $this->_theme_name ),
          'hierarchical'          => isset($this->_opt_catagories['hierarchical'])? $this->_opt_catagories['hierarchical'] : true,
          'show_ui'               => isset($this->_opt_catagories['show_ui'])? $this->_opt_catagories['show_ui'] : true,
          'show_admin_column'     => isset($this->_opt_catagories['show_admin_column'])? $this->_opt_catagories['show_admin_column'] : true,
          'query_var'             => isset($this->_opt_catagories['query_var'])? $this->_opt_catagories['query_var'] : true,
      );

      register_taxonomy( $this->_internalName, array($this->_taxonomiesFor), $args );
    };

    $priority = isset($opt['priority '])? $opt['priority '] : 0;
    add_action( 'init', $$create_taxonomy, $priority );
  }

  private function createCustomTaxonomyTags(){
    $this->_internalName = str_replace(' ','-',strtolower($this->_name));
    $create_taxonomy = "{$this->_project}_create_taxonomy_{$this->_internalName}";
    $functionCallback = $create_taxonomy;
    $$functionCallback = function() {
        // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( $this->_name, 'taxonomy General Name', $this->_theme_name ),
            'singular_name'       => _x( $this->_name, 'taxonomy Singular Name', $this->_theme_name ),
            'search_items'        => __( "Search $this->_name", $this->_theme_name ),
            'all_items'           => __( "All $this->_plural_name", $this->_theme_name ),
            'parent_item'         => null,
            'parent_item_colon'   => null,
            'edit_item'           => __( "Edit $this->_name", $this->_theme_name ),
            'update_item'         => __( "Update $this->_name", $this->_theme_name ),
            'add_new_item'        => __( "Add New $this->_name", $this->_theme_name ),
            'new_item_name'       => __( 'New Genre Name',$this->_theme_name ),
            'menu_name'           => __( $this->_name, $this->_theme_name )
        );

      // Set other options for Custom Post Type
      $args =   array(
          'labels'                => $labels,
          'label'                 => __( $this->_name, $this->_theme_name ),
          'hierarchical'          => isset($this->_opt_tags['hierarchical'])? $this->_opt_tags['hierarchical'] : false,
          'show_ui'               => isset($this->_opt_tags['show_ui'])? $this->_opt_tags['show_ui'] : true,
          'show_admin_column'     => isset($this->_opt_tags['show_admin_column'])? $this->_opt_tags['show_admin_column'] : true,
          'update_count_callback' => '_update_post_term_count',
          'query_var'             => isset($this->_opt_tags['query_var'])? $this->_opt_tags['query_var'] : true,
      );

      register_taxonomy( $this->_internalName, $this->_taxonomiesFor, $args );
    };

    $priority = isset($opt['priority '])? $opt['priority '] : 0;
    add_action( 'init', $$create_taxonomy, $priority );
  }
}