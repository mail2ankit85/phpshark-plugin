<?php
namespace Project\Admin;

class Columns{
    public function __construct(){

      // Posts
      add_filter( 'manage_posts_columns', [$this,'smashing_post_columns'] );
      add_filter( 'manage_edit-posts_sortable_columns', [$this,'smashing_posts_sortable_columns']);

      //Video Posts
      // add_filter( 'manage_video_post_posts_columns', [$this,'smashing_video_post_columns'] );
      // add_action( 'manage_video_post_posts_custom_column', [$this,'smashing_video_post_column'], 10, 2);
      // add_filter( 'manage_edit-video_post_sortable_columns', [$this,'smashing_video_post_sortable_columns']);

      //Common Function
      add_action( 'pre_get_posts', [$this,'smashing_posts_orderby'] );
    }

  public function smashing_video_post_columns( $columns ) {
     $columns = array(
       'cb' => $columns['cb'],
       'image' => __( 'Image' ),
       'title' => __( 'Title' ),
       'price' => __( 'Price', 'smashing' ),
       'area' => __( 'Area', 'smashing' ),
     );
   return $columns;
  }


  public function smashing_video_post_column( $column, $post_id ) {
      // Image column
      if ( 'image' === $column ) {
        echo get_the_post_thumbnail( $post_id, array(80, 80) );
      }

      // Monthly price column
       if ( 'price' === $column ) {
         $price = get_post_meta( $post_id, 'price_per_month', true );

         if ( ! $price ) {
           _e( 'n/a' );
         } else {
           echo '$ ' . number_format( $price, 0, '.', ',' ) . ' p/m';
         }
       }

     // Surface area column
       if ( 'area' === $column ) {
         $area = get_post_meta( $post_id, 'area', true );

         if ( ! $area ) {
           _e( 'n/a' );
         } else {
           echo number_format( $area, 0, '.', ',' ) . ' m2';
         }
       }
    }

   public function smashing_video_post_sortable_columns( $columns ) {
     $columns['price'] = 'price_per_month';
     return $columns;
   }


   public function smashing_posts_orderby( $query ) {
     if( ! is_admin() || ! $query->is_main_query() ) {
       return;
     }

     if ( 'price_per_month' === $query->get( 'orderby') ) {
       $query->set( 'orderby', 'meta_value' );
       $query->set( 'meta_key', 'price_per_month' );
       $query->set( 'meta_type', 'numeric' );
     }
   }

   /**
    * Manage User Admin Display Table Columns
    *
    * @param Array $columns
    *      [cb]        => <input type="checkbox" />
     *      [title]     => Title
     *      [author]    => Author
     *      [date]      => Date
    *
    * @return Array $columns
    */
   public function smashing_post_columns($columns){
     // unset( $columns['categories'] );
     // unset( $columns['tags'] );
     // unset( $columns['comments'] );

     $columns = array(
       'cb' => $columns['cb'],
       'date' => __( 'Date' ),
       'title' => __( 'Title' ),
       'author' => __('Author')
     );
     return $columns;
   }

   public function smashing_posts_sortable_columns( $columns ) {
     $columns['date'] = 'Date';
     $columns['title'] = 'Title';
     return $columns;
   }
}

new \Project\Admin\Columns;
