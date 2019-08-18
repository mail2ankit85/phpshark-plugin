<?php

namespace Src\Plugin;

class Taxonomy{
	public function register(){
			add_action( 'category_add_form_fields', [$this,'category_fields_new'], 10 );
			add_action( 'category_edit_form_fields', [$this,'category_fields_edit'], 10, 2 );
			add_action ( 'created_category', [$this,'save_category_fields'] );
			add_action ( 'edited_category', [$this,'save_category_fields'] );
			add_action( 'pre_delete_term', [$this,'remove_term_options'], 10, 2 );
    }

			/**
		 * Category "Add New" Page - Add Additional Field(s)
		 * @param string $taxonomy
		 */
		public function category_fields_new( $taxonomy ) {                             // Function has one field to pass - Taxonomy ( Category in this case )
				wp_nonce_field( 'category_meta_new', 'category_meta_new_nonce' );   // Create a Nonce so that we can verify the integrity of our data
		?>
		    <div class="form-field">
		        <label for="category_fa">Font-Awesome Icon</label>
		        <input name="category_icon" id="category_fa" type="text" value="" style="width:100%" />
		        <p class="description">Enter a custom font-awesome icon - <a href="http://fontawesome.io/icons/" target="_blank">List of Icons</a></p>
		    </div>
		<?php
		}


		/**
		 * Category "Edit Term" Page - Add Additional Field(s)
		 * @param Object $term
		 * @param string $taxonomy
		 */
		public function category_fields_edit( $term, $taxonomy ) {                         // Function has one field to pass - Term ( term object) and Taxonomy ( Category in this case )
		    wp_nonce_field( 'category_meta_edit', 'category_meta_edit_nonce' );     // Create a Nonce so that we can verify the integrity of our data
		    $category_icon = get_option( "{$taxonomy}_{$term->term_id}_icon" );     // Get the icon if one is set already
		?>
		    <tr class="form-field">
		        <th scope="row" valign="top">
		            <label for="category_fa">Font-Awesome Icon</label>
		        </th>
		        <td>
		            <input name="category_icon" id="category_fa" type="text" value="<?php echo ( ! empty( $category_icon ) ) ? $category_icon : ''; ?>" style="width:100%;" /> <!-- IF `$category_icon` is not empty, display it. Otherwise display an empty string -->
		            <p class="description">Enter a custom Font-Awesome icon - <a href="http://fontawesome.io/icons/" target="_blank">List of Icons</a></p>
		        </td>
		    </tr>
		<?php
		}


		/**
		 * Save our Additional Taxonomy Fields
		 * @param int $term_id
		 */
		public function save_category_fields( $term_id ) {

		    /** Verify we're either on the New Category page or Edit Category page using Nonces **/
		    /** Verify that a Taxonomy is set **/
		    if( isset( $_POST['taxonomy'] ) && isset( $_POST['category_icon'] ) &&
		        (
		          isset( $_POST['category_meta_new_nonce'] ) && wp_verify_nonce( $_POST['category_meta_new_nonce'], 'category_meta_new' ) ||        // Verify our New Term Nonce
		          isset( $_POST['category_meta_edit_nonce'] ) && wp_verify_nonce( $_POST['category_meta_edit_nonce'], 'category_meta_edit' )        // Verify our Edited Term Nonce
		        )
		    ) {
		        $taxonomy = $_POST['taxonomy'];
		        $category_icon = get_option( "{$taxonomy}_{$term_id}_icon" );   // Grab our icon if one exists

		        if( ! empty( $_POST['category_icon'] ) ) {                      // IF the user has entered text, update our field.
		            update_option( "{$taxonomy}_{$term_id}_icon", htmlspecialchars( sanitize_text_field( $_POST['category_icon'] ) ) );     // Sanitize our data before adding to the database
		        } elseif( ! empty( $category_icon ) ) {                         // Category Icon IS empty but the option is set, they may not want an icon on this category
		            delete_option( "{$taxonomy}_{$term_id}_icon" );             // Delete our option
		        }

		    } // Nonce Conditional
		} // End Function

		/**
		 * Essential Cleanup of our Options
		 * @param int $term_id
		 * @param string $taxonomy
		 */
		public function remove_term_options( $term_id, $taxonomy ) {
		    delete_option( "{$taxonomy}_{$term_id}_icon" );         // Delete our option
		}
}

//******************************************
//******************************************
// $terms = get_terms(            // Returns an array of Term Objects,
//     'category',                 // Pass our Taxonomy
//     array(                      // Pass our Arguments
//         'hide_empty' => false   // Show ALL Terms
//     )
// );
//
// if( ! empty( $terms ) ) {           // Make sure we have some terms to loop through
//     foreach( $terms as $term ) {    // Loop through each term
//         $icon = get_option( "{$term->taxonomy}_{$term->term_id}_icon" );    // Use our formula to grab the Icon - This translate to "category_1_icon"
//         echo "Category {$term->name} Icon: {$icon}<br />";                  // Display our Category Icon
//     }
// }
//******************************************
//******************************************
