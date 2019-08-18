<?php

// Remove invalid rel attribute values in the categorylist
if( !function_exists('phpshark_remove_category_rel_from_category_list') ):
function phpshark_remove_category_rel_from_category_list($thelist)
{
	return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Remove invalid rel attribute
add_filter('the_category', 'phpshark_remove_category_rel_from_category_list'); 
endif;