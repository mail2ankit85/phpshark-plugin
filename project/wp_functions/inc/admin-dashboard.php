<?php

function phpshark_admin_cptname_custom_css() {
   echo "<style type='text/css' media='screen'>
       #adminmenu .menu-icon-environment div.wp-menu-image:before {
            /* content: '\\f5d0'; */
        }
				#adminmenu .menu-icon-news div.wp-menu-image:before ,
 				#adminmenu .menu-icon-events div.wp-menu-image:before ,
 				#adminmenu .menu-icon-video_posts div.wp-menu-image:before,
				#adminmenu .menu-icon-photos div.wp-menu-image:before,
				#adminmenu .menu-icon-about_us div.wp-menu-image:before {
 						color: black;
         }

				#adminmenu .menu-icon-news,
				#adminmenu .menu-icon-events,
				#adminmenu .menu-icon-video_posts,
				#adminmenu .menu-icon-photos,
				#adminmenu .menu-icon-about_us{
 						background-color: orange;
						color: black;
        }
     </style>";
}
// add_action('admin_head', 'phpshark_admin_cptname_custom_css');
