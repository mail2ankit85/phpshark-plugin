<?php
/************************************CODE-1***************************************
* @Author: Boutros AbiChedid 
* @Date:   January 16, 2012
* @Websites: http://bacsoftwareconsulting.com/ ; http://blueoliveonline.com/
* @Description: Displays the Number of times Posts are Viewed on Your Blog.
* Function: Sets, Tracks and Displays the Count of Post Views (Post View Counter)
* Code is browser and JavaScript independent.
* @Tested on: WordPress version 3.2.1 
*********************************************************************************/

//Set the Post Custom Field in the WP dashboard as Name/Value pair 
if ( ! function_exists( 'phpshark_PostViews' ) ) :
function phpshark_PostViews($post_ID) {
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
     
    //If the the Post Custom Field value is empty. 
    if($count == ''){
        $count = 0; // set the counter to zero.
         
        //Delete all custom fields with the specified key from the specified post. 
        delete_post_meta($post_ID, $count_key);
         
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count . ' View';
     
    //If the the Post Custom Field value is NOT empty.
    }else{
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);
         
        //If statement, is just to have the singular form 'View' for the value '1'
        if($count == '1'){
        return $count . ' View';
        }
        //In all other cases return (count) Views
        else {
        return $count . ' Views';
        }
    }
}
endif;

if ( ! function_exists( 'phpshark_getPostViews' ) ) :
function phpshark_getPostViews( $postID ){

	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0";
	}
	return $count;
}
endif;