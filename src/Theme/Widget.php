<?php
namespace Src\Theme;

class Widget{
    public function register(){
        add_action( 'widgets_init', [$this,'aixclusiv_widgets_init'] );
    }
    //========================================================================================
    //DEVELOPERS CODE
    //========================================================================================
        public function aixclusiv_widgets_init() {
        	register_sidebar(
        		array(
        			'name'          => esc_html__( 'Archive Page', 'phpshark' ),
        			'id'            => 'archive-page',
        			'description'   => esc_html__( 'Add widgets for archive page.', 'phpshark' ),
        			'before_widget' => '<section class="sidebar-archive">',
        			'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
        		)
        	);
          register_sidebar(
            array(
              'name'          => esc_html__( 'Single Page', 'phpshark' ),
              'id'            => 'single-page',
              'description'   => esc_html__( 'Add widgets for a single page.', 'phpshark' ),
              'before_widget' => '<section class="sidebar-archive">',
        			'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
            )
          );
          register_sidebar(
            array(
              'name'          => esc_html__( 'Page', 'phpshark' ),
              'id'            => 'page',
              'description'   => esc_html__( 'Add widgets for general page.', 'phpshark' ),
              'before_widget' => '<section id="%1$s" class="widget %2$s">',
              'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
            )
          );
          register_sidebar(
            array(
              'name'          => esc_html__( 'Search Page', 'phpshark' ),
              'id'            => 'search-page',
              'description'   => esc_html__( 'Add widgets for search page.', 'phpshark' ),
              'before_widget' => '<section id="%1$s" class="widget %2$s">',
              'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
            )
          );
          register_sidebar(
            array(
              'name'          => esc_html__( 'Front Page', 'phpshark' ),
              'id'            => 'front-page',
              'description'   => esc_html__( 'Add widgets for front page.', 'phpshark' ),
              'before_widget' => '<section id="%1$s" class="widget %2$s">',
              'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Footer Column 1', 'phpshark' ),
              'id'            => 'footer-col-1',
              'description'   => esc_html__( 'Add widgets for footer column 1.', 'phpshark' ),
              'before_widget' => '<section id="%1$s" class="widget %2$s">',
              'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Footer Column 2', 'phpshark' ),
              'id'            => 'footer-col-2',
              'description'   => esc_html__( 'Add widgets for footer column 2.', 'phpshark' ),
              'before_widget' => '<section id="%1$s" class="widget %2$s">',
              'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Footer Column 3', 'phpshark' ),
              'id'            => 'footer-col-3',
              'description'   => esc_html__( 'Add widgets for footer column 3.', 'phpshark' ),
              'before_widget' => '<section id="%1$s" class="widget %2$s">',
              'after _widget'  => '</section>',
              'before_title'  => '<h2 id="sidebar-widget-title">',
              'after_title'   => '</h2>',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Page Ad 728x90 (Header)', 'phpshark' ),
              'id'            => 'page-ad-header-728x90',
              'description'   => esc_html__( 'Header Ad Location 728x90 for page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="desktop-add widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Single Page Ad 728x90 (Header)', 'phpshark' ),
              'id'            => 'single-page-ad-header-728x90',
              'description'   => esc_html__( 'Header Ad Location 728x90 for single page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="desktop-add widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Archive Ad 728x90 (Header)', 'phpshark' ),
              'id'            => 'archive-ad-header-728x90',
              'description'   => esc_html__( 'Header Ad Location 728x90 for archive page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="desktop-add widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Front Page Ad 728x90 (Header)', 'phpshark' ),
              'id'            => 'front-page-ad-header-728x90',
              'description'   => esc_html__( 'Header Ad Location 728x90 for front page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="desktop-add widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Search Page Ad 728x90 (Header)', 'phpshark' ),
              'id'            => 'search-page-ad-header-728x90',
              'description'   => esc_html__( 'Header Ad Location 728x90 for search page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="desktop-add widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );


          register_sidebar(
            array(
              'name'          => esc_html__( 'Page Ad 1248x100 (Bottom)', 'phpshark' ),
              'id'            => 'page-ad-bottom-1248x100',
              'description'   => esc_html__( 'Bottom Ad Location 1248x100 for page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="bottom-add-place widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Single Page Ad 1248x90 (Bottom)', 'phpshark' ),
              'id'            => 'single-page-ad-bottom-1248x100',
              'description'   => esc_html__( 'Bottom Ad Location 1248x100 for single page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="bottom-add-place widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Archive Ad 1248x100 (Bottom)', 'phpshark' ),
              'id'            => 'archive-ad-bottom-1248x100',
              'description'   => esc_html__( 'Bottom Ad Location 1248x100 for archive page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="bottom-add-place widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Front Page Ad 1248x100 (Bottom)', 'phpshark' ),
              'id'            => 'front-page-ad-bottom-1248x100',
              'description'   => esc_html__( 'Bottom Ad Location 1248x100 for front page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="bottom-add-place widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Search Page Ad 1248x100 (Bottom)', 'phpshark' ),
              'id'            => 'search-page-ad-bottom-1248x100',
              'description'   => esc_html__( 'Bottom Ad Location 1248x100 for search page.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="bottom-add-place widget %2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Author\'s page', 'phpshark' ),
              'id'            => 'authors-page',
              'description'   => esc_html__( 'Author\'s Page Sidebar.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="%2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );

          register_sidebar(
            array(
              'name'          => esc_html__( 'Common Sidebar', 'phpshark' ),
              'id'            => 'common-sidebar',
              'description'   => esc_html__( 'Common Sidebar.', 'phpshark' ),
              'before_widget' => '<div id="%1$s" class="%2$s">',
              'after _widget'  => '</div>',
              'before_title'  => '',
              'after_title'   => '',
            )
          );
        }
    //========================================================================================
    //DEVELOPERS CODE
    //========================================================================================
}
