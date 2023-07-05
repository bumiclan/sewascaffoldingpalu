<?php

if ( ! isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}


/**
||-> wega
 
*/
function wega($redux_meta_name1,$redux_meta_name2 = ''){

    global  $wega;

    if (is_null($wega)) {
        return;
    }

    $html = '';
    if (isset($redux_meta_name1) && !empty($redux_meta_name2)) {
        $html = $wega[$redux_meta_name1][$redux_meta_name2];
    }elseif(isset($redux_meta_name1) && empty($redux_meta_name2)){
        $html = $wega[$redux_meta_name1];
    }
    
    return $html;

}


/**
||-> wega_setup
*/
function wega_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on wega, use a find and replace
     * to change 'wega' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'wega', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary menu', 'wega' )
    ) );

    // ADD THEME SUPPORT
    add_theme_support('woocommerce');
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    // Enable support for Post Formats.
    add_theme_support( 'custom-background', apply_filters( 'smartowl_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );// Set up the WP core custom background feature.

}
add_action( 'after_setup_theme', 'wega_setup' );

/**
||-> Register widget areas.
*/
function wega_widgets_init() {

    global  $wega;

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wega' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Main Theme Sidebar', 'wega' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    if ( class_exists( 'WooCommerce' ) ) {
	    register_sidebar( array(
	        'name'          => esc_html__( 'Woocommerce Sidebar', 'wega' ),
	        'id'            => 'sidebar-2',
	        'description'   => esc_html__( 'Shop Sidebar', 'wega' ),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget'  => '</aside>',
	        'before_title'  => '<h3 class="widget-title">',
	        'after_title'   => '</h3>',
	    ) );
	}


	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	    if (!empty($wega['mt_dynamic_sidebars'])){
	        foreach ($wega['mt_dynamic_sidebars'] as &$value) {
	            $id           = str_replace(' ', '', $value);
	            $id_lowercase = strtolower($id);
	            if ($id_lowercase) {
	                register_sidebar( array(
	                    'name'          => esc_html($value),
	                    'id'            => esc_html($id_lowercase),
	                    'description'   => esc_html__( 'Sidebar ', 'wega' ) . esc_html($value),
	                    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }
	    }
	    
	    // FOOTER ROW 1
	    if ($wega['mt_footer_row_1'] == true) {
	        $footer_row_1 = $wega['mt_footer_row_1_layout'];
	        $nr1 = array("1", "2", "3", "4", "5", "6");
	        if (in_array($footer_row_1, $nr1)) {
	            for ($i=1; $i <= $footer_row_1 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_1_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_1 == 'column_half_sub_half' || $footer_row_1 == 'column_sub_half_half') {
	            $footer_row_1 = '3';
	            for ($i=1; $i <= $footer_row_1 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ', 'wega' ) . esc_html($i),
	                    'id'            => 'footer_row_1_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_1 == 'column_sub_fourth_third' || $footer_row_1 == 'column_third_sub_fourth') {
	            $footer_row_1 = '5';
	            for ($i=1; $i <= $footer_row_1 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_1_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_1 == 'column_sub_third_half' || $footer_row_1 == 'column_half_sub_third') {
	            $footer_row_1 = '4';
	            for ($i=1; $i <= $footer_row_1 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 1 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_1_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 1 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }
	    }

	    // FOOTER ROW 2
	    if ($wega['mt_footer_row_2'] == true) {
	        $footer_row_2 = $wega['mt_footer_row_2_layout'];
	        $nr2 = array("1", "2", "3", "4", "5", "6");
	        if (in_array($footer_row_2, $nr2)) {
	            for ($i=1; $i <= $footer_row_2 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_2_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_2 == 'column_half_sub_half' || $footer_row_2 == 'column_sub_half_half') {
	            $footer_row_2 = '3';
	            for ($i=1; $i <= $footer_row_2 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_2_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_2 == 'column_sub_fourth_third' || $footer_row_2 == 'column_third_sub_fourth') {
	            $footer_row_2 = '5';
	            for ($i=1; $i <= $footer_row_2 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_2_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_2 == 'column_sub_third_half' || $footer_row_2 == 'column_half_sub_third') {
	            $footer_row_2 = '4';
	            for ($i=1; $i <= $footer_row_2 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 2 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_2_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 2 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }
	    }

	    // FOOTER ROW 3
	    if ($wega['mt_footer_row_3'] == true) {
	        $footer_row_3 = $wega['mt_footer_row_3_layout'];
	        $nr3 = array("1", "2", "3", "4", "5", "6");
	        if (in_array($footer_row_3, $nr3)) {
	            for ($i=1; $i <= $footer_row_3 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ', 'wega').esc_html($i),
	                    'id'            => 'footer_row_3_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_3 == 'column_half_sub_half' || $footer_row_3 == 'column_sub_half_half') {
	            $footer_row_3 = '3';
	            for ($i=1; $i <= $footer_row_3 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_3_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_3 == 'column_sub_fourth_third' || $footer_row_3 == 'column_third_sub_fourth') {
	            $footer_row_3 = '5';
	            for ($i=1; $i <= $footer_row_3 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_3_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }elseif ($footer_row_3 == 'column_sub_third_half' || $footer_row_3 == 'column_half_sub_third') {
	            $footer_row_3 = '4';
	            for ($i=1; $i <= $footer_row_3 ; $i++) { 
	                register_sidebar( array(
	                    'name'          => esc_html__( 'Footer Row 3 - Sidebar ','wega').esc_html($i),
	                    'id'            => 'footer_row_3_'.esc_html($i),
	                    'description'   => esc_html__( 'Footer Row 3 - Sidebar ', 'wega' ) . esc_html($i),
	                    'before_widget' => '<aside id="%1$s" class="widget vc_column_vc_container %2$s">',
	                    'after_widget'  => '</aside>',
	                    'before_title'  => '<h3 class="widget-title">',
	                    'after_title'   => '</h3>',
	                ) );
	            }
	        }
	    }
    }
}
add_action( 'widgets_init', 'wega_widgets_init' );


/**
||-> Enqueue scripts and styles.
*/
function wega_scripts() {

    //STYLESHEETS
    wp_enqueue_style( "font-awesome", get_template_directory_uri()."/css/font-awesome.min.css" );
    wp_enqueue_style( "flaticon", get_template_directory_uri()."/css/flaticon.css" );
    wp_enqueue_style( "wega-responsive", get_template_directory_uri()."/css/responsive.css" );
    wp_enqueue_style( "wega-media-screens", get_template_directory_uri()."/css/media-screens.css" );
    wp_enqueue_style( "owl-carousel", get_template_directory_uri()."/css/owl.carousel.css" );
    wp_enqueue_style( "animate", get_template_directory_uri()."/css/animate.css" );
    wp_enqueue_style( "wega-styles", get_template_directory_uri()."/css/styles.css" );
    wp_enqueue_style( "wega-style", get_stylesheet_uri() );
    wp_enqueue_style( "simple-line-icons", get_template_directory_uri()."/css/simple-line-icons.css" );
    wp_enqueue_style( "js-composer", get_template_directory_uri()."/css/js_composer.css" );
    wp_enqueue_style( "wega-gutenberg-frontend", get_template_directory_uri()."/css/gutenberg-frontend.css" );

    //SCRIPTS
    wp_enqueue_script( "modernizr-custom", get_template_directory_uri() . "/js/modernizr.custom.js", array("jquery"), "2.6.2", true );
    wp_enqueue_script( "classie", get_template_directory_uri() . "/js/classie.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-form", get_template_directory_uri() . "/js/jquery.form.js", array("jquery"), "3.51.0", true );
    wp_enqueue_script( "jquery-validation", get_template_directory_uri() . "/js/jquery.validation.js", array("jquery"), "1.13.1", true );
    wp_enqueue_script( "jquery-sticky", get_template_directory_uri() . "/js/jquery.sticky.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-appear", get_template_directory_uri() . "/js/jquery.appear.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-countTo", get_template_directory_uri() . "/js/jquery.countTo.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "owl-carousel", get_template_directory_uri() . "/js/owl.carousel.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "modernizr-viewport", get_template_directory_uri() . "/js/modernizr.viewport.js", array("jquery"), "2.6.2", true );
    wp_enqueue_script( "bootstrap", get_template_directory_uri() . "/js/bootstrap.min.js", array("jquery"), "3.3.1", true );
    wp_enqueue_script( "animate", get_template_directory_uri() . "/js/animate.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "jquery-countdown", get_template_directory_uri() . "/js/jquery.countdown.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "wow", get_template_directory_uri() . "/js/wow.min.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "stickykit", get_template_directory_uri() . "/js/jquery.sticky-kit.min.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "loaders", get_template_directory_uri() . "/js/loaders.js", array("jquery"), "1.0.0", true );
    wp_enqueue_script( "wega-custom-js", get_template_directory_uri() . "/js/wega-custom.js", array("jquery"), "1.0.0", true );
    if ( is_singular() && comments_open() && get_option( "thread_comments" ) ) {
        wp_enqueue_script( "comment-reply" );
    }
}
add_action( "wp_enqueue_scripts", "wega_scripts" );


/**
||-> Enqueue admin css/js
*/
function wega_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( "wega-admin-scripts", get_template_directory_uri()."/js/wega-admin-scripts.js" , array( 'jquery' ) );
    wp_enqueue_script( "loaders", get_template_directory_uri()."/js/loaders.js" , array( 'jquery' ) );
    // CSS
    wp_enqueue_style( "wega-admin-style", get_template_directory_uri()."/css/admin-style.css" );
    wp_enqueue_style( "loaders", get_template_directory_uri()."/css/loaders.css" );
}
add_action("admin_enqueue_scripts", "wega_enqueue_admin_scripts");


/**
||-> Enqueue css to js_composer
*/
add_action( 'vc_base_register_front_css', 'wega_enqueue_front_css_foreever' );
function wega_enqueue_front_css_foreever() {
    wp_enqueue_style( "js-composer-front" );
}


/**
||-> Enqueue css to redux
*/
function wega_register_fontawesome_to_redux() {
    wp_register_style( "font-awesome", get_template_directory_uri()."/css/font-awesome.min.css", array(), time(), 'all' );  
    wp_enqueue_style( "font-awesome" );
}
add_action( 'redux/page/redux_demo/enqueue', 'wega_register_fontawesome_to_redux' );


/**
||-> Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
*/
add_action( 'vc_before_init', 'wega_vcSetAsTheme' );
function wega_vcSetAsTheme() {
    vc_set_as_theme( true );
}


/**
||-> Other required parts/files
*/
/* ========= LOAD CUSTOM FUNCTIONS ===================================== */
require_once get_template_directory() . '/inc/custom-functions.php';
require_once get_template_directory() . '/inc/custom-functions.header.php';
require_once get_template_directory() . '/inc/custom-functions.footer.php';
require_once get_template_directory() . '/inc/custom-functions.gutenberg.php';
/* ========= Customizer additions. ===================================== */
require_once get_template_directory() . '/inc/customizer.php';
/* ========= Load Jetpack compatibility file. ===================================== */
require_once get_template_directory() . '/inc/jetpack.php';
/* ========= Include the TGM_Plugin_Activation class. ===================================== */
require_once get_template_directory() . '/inc/tgm/include_plugins.php';
/* ========= LOAD - REDUX - FRAMEWORK ===================================== */
require_once get_template_directory() . '/redux-framework/modeltheme-config.php';
/* ========= CUSTOM COMMENTS ===================================== */
require_once get_template_directory() . '/inc/custom-comments.php';
/* ========= THEME DEFAULTS ===================================== */
require_once get_template_directory() . '/inc/theme-defaults.php';


/**
||-> add_image_size //Resize images
*/
/* ========= RESIZE IMAGES ===================================== */
add_image_size( 'wega_related_post_pic700x300', 700, 300, true );
add_image_size( 'wega_post_pic700x450',         700, 450, true );
add_image_size( 'wega_post_widget_pic100x100',  100, 100, true );
add_image_size( 'wega_post_pic200x200',  200, 200, true );
add_image_size( 'wega_about_625x415',           625, 415, true );
add_image_size( 'wega_listing_archive_featured_square',    600, 370, true );
add_image_size( 'wega_listing_archive_featured',    800, 500, true );
add_image_size( 'wega_listing_archive_thumbnail',   300, 180, true );
add_image_size( 'wega_listing_single_featured',     1200, 200, true );
add_image_size( 'wega_breadcrumbs',     1500, 255, true );
// Blogloop-v2
add_image_size( 'wega_blog_900x400',           900, 400, true );


/**
||-> LIMIT POST CONTENT
*/
function wega_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}


/**
||-> FUNCTION: ADD EDITOR STYLE
*/
function wega_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'wega_add_editor_styles' );



/**
||-> REMOVE PLUGINS NOTIFICATIONS and NOTICES
*/
// |---> REVOLUTION SLIDER
if(function_exists( 'set_revslider_as_theme' )){
    add_action( 'init', 'wega_disable_revslider_update_notices' );
    function wega_disable_revslider_update_notices() {
        set_revslider_as_theme();
    }
}

function wega_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url( '/' )) . '" ><input type="hidden" name="post_type" value="post"><label><input type="text" class="search-field" placeholder="'.esc_attr__('Search ...', 'wega').'" name="s" id="s" /></label>
    <button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'wega_search_form', 100 );


/* ========= SEARCH FOR POSTS ONLY ===================================== */
function wega_search_filter($query) {
    if ($query->is_search && !isset($_GET['post_type'])) {
        $query->set('post_type', 'post');
    }
    return $query;
}
if( !is_admin() ){
    add_filter('pre_get_posts','wega_search_filter');
}


// KSES ALLOWED HTML
if (!function_exists('wega_kses_allowed_html')) {
    function wega_kses_allowed_html($tags, $context) {
      switch($context) {
        case 'link': 
            $tags = array( 
                'a' => array(
                    'href' => array(),
                    'class' => array(),
                    'title' => array(),
                    'target' => array(),
                    'rel' => array(),
                    'data-commentid' => array(),
                    'data-postid' => array(),
                    'data-belowelement' => array(),
                    'data-respondelement' => array(),
                    'data-replyto' => array(),
                    'aria-label' => array(),
                )
            );
            return $tags;
        break;

        case 'image':
            $tags = array(
                'img' => array(
                    'src' => array(),
                    'alt' => array(),
                    'class' => array(),
                    'style' => array(),
                    'height' => array(),
                    'width' => array(),
                    'loading' => array(),

                )
            );
            return $tags;
        break;

        case 'icon':
            $tags = array(
                'i' => array(
                    'class' => array(),
                ),
            );
            return $tags;
        break;
        
        default: 
            return $tags;
      }
    }
    add_filter( 'wp_kses_allowed_html', 'wega_kses_allowed_html', 10, 2);
}