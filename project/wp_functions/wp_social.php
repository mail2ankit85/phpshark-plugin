<?php
/**
 * Social media share buttons
 * 	<?php phpshark_plugin_share_buttons(); ?>
 */
function phpshark_plugin_share_buttons() {
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
    include( TEMPLATE.'theme'.DS.'social.php' );
}

// Function to handle the thumbnail request
function get_the_post_thumbnail_src($img){
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}

function phpshark_plugin_social_buttons($content) {
    global $post;
    $googleURL = '';
    if(is_singular() || is_home()){
    
        // Get current page URL 
        $sb_url = urlencode(get_the_permalink());

        // Get current page title
        // $sb_title = str_replace( ' ', '%20', get_the_title());
        $sb_title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
        
        // Get Post Thumbnail for pinterest
        $sb_thumb = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=wpvkp';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
        $bufferURL = 'https://bufferapp.com/add?url='.$sb_url.'&amp;text='.$sb_title;
        $whatsappURL = 'whatsapp://send?text='.$sb_title . ' ' . $sb_url;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;

       if(!empty($sb_thumb) || $sb_thumb !== '') {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;media='.$sb_thumb[0].'&amp;description='.$sb_title;
        }
        else {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;description='.$sb_title;
        }
 
        // Based on popular demand added Pinterest too
        if(!empty($sb_thumb) || $sb_thumb !== '') {
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;media='.$sb_thumb[0].'&amp;description='.$sb_title;
            $gplusURL ='https://plus.google.com/share?url='.$sb_title.'';
        }
 
        // Add sharing button at the end of page/page content
        $content .= '<div class="social-box"><div class="social-btn">';
        $content .= '<a class="col-1 sbtn s-twitter" href="'. $twitterURL .'" target="_blank" rel="nofollow"><span>Share on twitter</span></a>';
        $content .= '<a class="col-1 sbtn s-facebook" href="'.$facebookURL.'" target="_blank" rel="nofollow"><span>Share on facebook</span></a>';
        $content .= '<a class="col-2 sbtn s-whatsapp" href="'.$whatsappURL.'" target="_blank" rel="nofollow"><span>WhatsApp</span></a>';
        if( $googleURL !== '' ) {
            $content .= '<a class="col-2 sbtn s-googleplus" href="'.$googleURL.'" target="_blank" rel="nofollow"><span>Google+</span></a>';
        }
        $content .= '<a class="col-2 sbtn s-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank" rel="nofollow"><span>Pin It</span></a>';
        $content .= '<a class="col-2 sbtn s-linkedin" href="'.$linkedInURL.'" target="_blank" rel="nofollow"><span>LinkedIn</span></a>';
        $content .= '<a class="col-2 sbtn s-buffer" href="'.$bufferURL.'" target="_blank" rel="nofollow"><span>Buffer</span></a>';
        $content .= '</div></div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
// Enable the_content if you want to automatically show social buttons below your post.

// add_filter( 'the_content', 'phpshark_plugin_social_buttons');   

// This will create a wordpress shortcode [social].
// Please it in any widget and social buttons appear their.
// You will need to enabled shortcode execution in widgets.
add_shortcode('social','phpshark_plugin_social_buttons');