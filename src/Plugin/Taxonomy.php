<?php

namespace Src\Plugin;

class Taxonomy{
	public function register(){
		add_filter('the_tags',[ $this, 'add_class_the_tags']);
  }

		// add custom class to tag
		public function add_class_the_tags($html){
			$postid = get_the_ID();
			$html = str_replace('<a','<a class="tag tag-rounded"',$html);
			return $html;
		}
}
