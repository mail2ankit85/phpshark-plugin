<?php 

// $role = get_role( 'author' );
// $wp_roles->remove_cap( $role, $cap ); 

function fixopr_society_administrator() {
    $capabilities = [

    ];
    add_role( 'society_admin', __('Society Admin'), $capabilities );
}
// register_activation_hook( __FILE__, 'fixopr_society_administrator' );