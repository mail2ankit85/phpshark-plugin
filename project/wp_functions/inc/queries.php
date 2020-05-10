<?php
if ( ! function_exists( 'phpshark_count_user_posts_by_status' ) ) :
  function phpshark_count_user_posts_by_status($post_status = 'publish',$user_id = 0){
      global $wpdb;
      $count = $wpdb->get_var(
          $wpdb->prepare(
          "
          SELECT COUNT(ID) FROM $wpdb->posts
          WHERE post_status = %s
          AND post_author = %d",
          $post_status,
          $user_id
          )
      );
      return ($count) ? $count : 0;
  }
endif;

if ( ! function_exists( 'phpshark_get_most_recent_categories' ) ) :
  function phpshark_get_most_recent_categories($limit = 5) {
      // retrieve all categories
      $categories = get_categories();
      $recent_posts = array();
      foreach ($categories as $key=>$category) {
          // get latest post from $category
          $args = array(
              'numberposts' => 1,
              'category' => $category->term_id,
          );
          $post = get_posts($args)[0];
          // save category id & post date in an array
          $recent_posts[ $category->term_id ] = strtotime($post->post_date);
      }
      // order by post date, preserve category_id
      arsort($recent_posts);

      // get $limit most recent category ids
      $recent_categories = array_slice(array_keys($recent_posts), 0, $limit);
      return $recent_categories;
  }
endif;

if ( ! function_exists( 'phpshark_get_terms' ) ) :
function phpshark_get_terms($limit = 10, $args=[]) {
  if(empty($args)){
    $args =   array(
            'taxonomy' => 'post_tag',
            'hide_empty' => false,
            'number' => $limit
          );
  }
  return get_terms( $args );
}
endif;


if ( ! function_exists( 'phpshark_get_recent_post' ) ) :
function phpshark_get_recent_post($feed_count = 10, $post_seq = 'DESC', $args=[]) {
  if(empty($args)){
    $args =   array(
                'posts_per_page' => $feed_count,
                'order' => $post_seq
              );
  }
  return new WP_Query( $args );
}
endif;

if ( ! function_exists( 'phpshark_get_popular_post' ) ) :
function phpshark_get_popular_post($feed_count = 10, $post_seq = 'DESC', $args=[]) {
  if(empty($args)){
    $args =   array( 'posts_per_page' => $feed_count,
                     'meta_key' => 'post_views_count',
                     'orderby' => 'meta_value_num',
                     'order' => $post_seq  );
  }
  return new WP_Query( $args );
}
endif;

if ( ! function_exists( 'phpshark_get_category_by_slug' ) ) :
function phpshark_get_category_by_slug($slug, $feed_count = 10, $post_seq = 'DESC', $args=[]) {
  if(empty($args)){
    $args = array( 'numberposts'   => $feed_count,
                   'category_name' => $slug,
                   'order'         => $post_seq );
  }
  return get_posts( $args );
}
endif;

if ( ! function_exists( 'phpshark_get_post_id' ) ) :
function phpshark_get_post_id($id, $args=[]) {
  if(empty($args)){
    $args = array(
      'category' => $id
    );
  }
  return get_posts( $args );
}
endif;

if ( ! function_exists( 'phpshark_get_post_by_category_slug' ) ) :
function phpshark_get_post_by_category_slug($slug, $feed_count = 10, $args=[]) {
  if(empty($args)){
    $args = ['showposts' => $feed_count,
               'post_type' => 'post',
               'tax_query' => [
                      ['taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $slug]
            ]];
  }
  $query = get_posts($args);
  return new WP_Query( $query[0] );
}
endif;

if ( ! function_exists( 'phpshark_taxonomy_list' ) ) :
function phpshark_taxonomy_list( $taxonomy, $args=[] ){
    if(empty($args)){
      $args = [
          'taxonomy' => $taxonomy,
          'hide_empty' => true
        ];
    }
  return get_terms($args);
}
endif;

if ( ! function_exists( 'phpshark_get_recent_categories' ) ) :
function phpshark_get_recent_categories( $id, $limit = 5, $args=[] ){
  if(empty($args)){
    $args = array( 'category__in' => wp_get_post_categories($id),
                   'numberposts' => $limit,
                   'post__not_in' => array($id) );
  }
  return get_posts( $args );
}
endif;

if ( ! function_exists( 'phpshark_connect_db' ) ) :
function phpshark_connect_db( $username, $password, $database, $query, $localhost='localhost'  ){
  $mydb = new wpdb($username,$password,$database,$localhost);
  return $mydb->get_results(trim($query));
}
endif;
