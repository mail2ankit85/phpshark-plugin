<?php

namespace Src\Theme;

class Image{
	public function register(){

		//========================================================================================
		//EXAMPLES
		//========================================================================================
		// Add Thumbnail Theme Support
		// add_image_size('large', 700, '', true); // Large Thumbnail
		// add_image_size('medium', 250, '', true); // Medium Thumbnail
		// add_image_size('small', 120, '', true); // Small Thumbnail
		// add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
		//========================================================================================
		//EXAMPLES
		//========================================================================================
		//========================================================================================
		//DEVELOPERS CODE
		//========================================================================================





		//========================================================================================
		//DEVELOPERS CODE
		//========================================================================================

			// Remove width and height dynamic attributes to thumbnails
			add_filter('post_thumbnail_html',[ $this, 'remove_thumbnail_dimensions' ] , 10);

			// Remove width and height dynamic attributes to post images
			add_filter('image_send_to_editor', [ $this, 'remove_thumbnail_dimensions' ], 10);

			// Custom Gravatar in Settings > Discussion
			add_filter('avatar_defaults', [$this, 'gravatar']);
    }


	// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
	public function remove_thumbnail_dimensions( $html )
	{
		$html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		return $html;
	}

	// Custom Gravatar in Settings > Discussion
	public function gravatar ($avatar_defaults)
	{
		$myavatar = IMG_URI . 'gravatar.jpg';
		$avatar_defaults[$myavatar] = "Custom Gravatar";
		return $avatar_defaults;
	}
}
