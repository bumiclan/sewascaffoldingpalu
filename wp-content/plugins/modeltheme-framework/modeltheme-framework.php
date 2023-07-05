<?php
/**
* Plugin Name: ModelTheme Framework
* Plugin URI: http://modeltheme.com/
* Description: ModelTheme Framework required by Wega Theme.
* Version: 1.2
* Author: ModelTheme
* Author http://modeltheme.com/
* Text Domain: modeltheme
*/


$plugin_dir = plugin_dir_path( __FILE__ );



/**
||-> Function: require_once() plugin necessary parts
*/
require "inc/demo-importer/extensions/mt_activator/MTA_API.php";
require_once('inc/post-types/post-types.php'); // POST TYPES
require_once('inc/shortcodes/shortcodes.php'); // SHORTCODES
require_once('inc/widgets/widgets.php'); // WIDGETS
require_once('inc/widgets/widgets-theme.php'); // WIDGETS
require_once('inc/metaboxes/metaboxes.php'); // METABOXES
require_once('inc/metaboxes/metaboxes-taxonomy.php'); // METABOXES FOR TAX's
require_once('inc/demo-importer/wbc907-plugin-example.php'); // DEMO IMPORTER
require_once('inc/mega-menu/modeltheme-mega-menu.php'); // MEGA MENU
require_once('inc/sb-google-maps-vc-addon/sb-google-maps-vc-addon.php'); // GMAPS
require_once('inc/custom-functions.php'); // CUSTOM FUNCTIONS




/**

||-> Function: LOAD PLUGIN TEXTDOMAIN

*/
function modeltheme_load_textdomain(){
    $domain = 'modeltheme';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

    load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
    load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'modeltheme_load_textdomain' );




/**

||-> Function: modeltheme_framework()

*/
function modeltheme_framework() {
    // CSS
    wp_register_style( 'mt-shortcodes',  plugin_dir_url( __FILE__ ) . 'inc/shortcodes/shortcodes.css' );
    wp_enqueue_style( 'mt-shortcodes' );
    wp_register_style( 'animations',  plugin_dir_url( __FILE__ ) . 'css/animations.css' );
    wp_enqueue_style( 'animations' );
    
    // SCRIPTS
    wp_enqueue_script( 'classie', plugin_dir_url( __FILE__ ) . 'js/classie.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'typed', plugin_dir_url( __FILE__ ) . 'js/typed.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'percircle', plugin_dir_url( __FILE__ ) . 'js/mt-skills-circle/percircle.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-modeltheme-custom', plugin_dir_url( __FILE__ ) . 'js/modeltheme-custom.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', plugin_dir_url( __FILE__ ) . 'js/mt-video/jquery.magnific-popup.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'modeltheme_framework' );

/**

||-> Function: modeltheme_enqueue_admin_scripts()

*/
function modeltheme_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( 'js-modeltheme-admin-custom', plugin_dir_url( __FILE__ ) . 'js/modeltheme-custom-admin.js', array(), '1.0.0', true );
    // CSS
    wp_register_style( 'css-modeltheme-custom',  plugin_dir_url( __FILE__ ) . 'css/modeltheme-custom.css' );
    wp_enqueue_style( 'css-modeltheme-custom' );
    wp_register_style( 'css-fontawesome-icons',  plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css' );
    wp_enqueue_style( 'css-fontawesome-icons' );
    wp_register_style( 'css-simple-line-icons',  plugin_dir_url( __FILE__ ) . 'css/simple-line-icons.css' );
    wp_enqueue_style( 'css-simple-line-icons' );
    wp_register_style( 'css-flaticon',  plugin_dir_url( __FILE__ ) . 'css/flaticon.css' );
    wp_enqueue_style( 'css-flaticon' );
}
add_action('admin_enqueue_scripts', 'modeltheme_enqueue_admin_scripts');




    
    

add_image_size( 'mt_1250x700', 1250, 700, true );
add_image_size( 'mt_320x480', 320, 480, true );
add_image_size( 'mt_900x550', 900, 550, true );




/**

||-> Function: modeltheme_cmb_initialize_cmb_meta_boxes

*/
function modeltheme_cmb_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once ('init.php');
}
add_action( 'init', 'modeltheme_cmb_initialize_cmb_meta_boxes', 9999 );



/**

||-> Function: modeltheme_cmb_initialize_cmb_meta_boxes

*/
function modeltheme_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}

// |---> REDUX FRAMEWORK
function modeltheme_RemoveDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'modeltheme_RemoveDemoModeLink');

