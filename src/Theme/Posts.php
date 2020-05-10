<?php

namespace Src\Theme;

class Posts{
  public function register(){
    add_filter( 'excerpt_length', [$this,'custom_excerpt_length'], 999 );
  }

  public function custom_excerpt_length( $length ) {
      return 20;
  }

}
