<?php
namespace WP;

class PHPSHarkWPMetabox{
  private $_project;
  private $_fieldType;
  private $_fieldLabel;
  private $_screens;
  private $_html_file;
  private $_context;
  private $_priority;
  private $_callback_args;

  public function add_custom_field($project, $fieldType, $fieldLabel, $screens = [],
                                   $html_file, $context = 'advanced', $priority = 'default', $callback_args = null){
       $this->_project = $project;
       $this->_fieldType = $fieldType;
       $this->_fieldLabel = $fieldLabel;
       $this->_screens = $screens;
       $this->_html_file = $html_file;
       $this->_context = $context;
       $this->_priority = $priority;
       $this->_callback_args = $callback_args;
       $this->createField();
  }

  private function create_callback(){
    $box_callback = "{$this->_project}_{$this->_fieldType}_box_callback";
    $functionCallback = $box_callback;
    $$functionCallback = function($post) {
      wp_nonce_field( "{$this->_project}_save_postdata", "{$this->_project}_{$this->_fieldType}_metabox_nounce" );
      include_once(TEMPLATE."{$this->_html_file}.php");
    };
    return $$box_callback;
  }

  private function createField(){
    $add_custom_box = "{$this->_project}_{$this->_fieldType}_add_custom_box";
    $functionAddCustomBox = $add_custom_box;
    $$functionAddCustomBox = function() {
        // $screens = ['itenary'];
        foreach ($this->_screens as $screen) {
            add_meta_box(
                "{$this->_fieldType}_id", // Unique ID
                $this->_fieldLabel,       // Box title
                $this->create_callback(),            // Content callback, must be of type callable
                $screen,                   // Post type
                $this->_context,   //Default
                $this->_priority,    //Default, high
                $this->_callback_args
            );
        }
    };

  add_action('add_meta_boxes', $$add_custom_box);
  }

}
