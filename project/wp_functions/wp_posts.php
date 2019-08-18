<?php 

if ( ! function_exists( 'count_user_posts_by_status' ) ) :
function count_user_posts_by_status($post_status = 'publish',$user_id = 0){
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
