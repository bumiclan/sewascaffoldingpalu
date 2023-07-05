<?php
/**
||-> Defining Default datas
*/
function wega_init_function( $key = null ){
	// Variable Initialization
    $wega_init = [];
    /* Blog Variant
    Choose from: blogloop-v5 */
    $wega_init['blog_variant'] = 'blogloop-v5';
    /* Header Variant 
    Choose from: header1, header2 */
    $wega_init['header_variant'] = 'header1';
    /* Footer Variant 
    Choose from: footer1, footer2 */
    $wega_init['footer_variant'] = 'footer1';
    /* Header Navigation Hover
    Choose from: navstyle-v1, navstyle-v2, navstyle-v3, navstyle-v4, navstyle-v5, navstyle-v6, navstyle-v7, navstyle-v8 */
    $wega_init['header_nav_hover'] = 'navstyle-v1';
    /* Header Navigation Submenus Variant
    Choose from: nav-submenu-style1, nav-submenu-style2 */
    $wega_init['header_nav_submenu_variant'] = 'nav-submenu-style2';
    /* Sidebar Widgets Defaults
    Choose from: widgets_v1, widgets_v2 */
    $wega_init['sidebar_widgets_variant'] = 'widgets_v1';
    /* 404 Template Variant
    Choose from: page_404_v1_center, page_404_v2_left */
    $wega_init['page_404_template_variant'] = 'page_404_v1_center';
    /* Default Styling
    Set a HEXA Color Code */
    $wega_init['fallback_primary_color'] = '#ff5e14'; // Primary Color
    $wega_init['fallback_primary_color_hover'] = '#ff5e14'; // Primary Color - Hover
    $wega_init['fallback_main_texts'] = '#252525'; // Main Texts Color
    $wega_init['fallback_semitransparent_blocks'] = 'rgba(155, 89, 182, 0.7)'; // Semitransparent Blocks
    // The Condition
    if ( is_null($key) ){
        return $wega_init;
    } else if ( array_key_exists($key, $wega_init) ) {
        return $wega_init[$key];
    }
}
class wega_init_class{
    public function wega_get_blog_variant(){
        return wega_init_function('blog_variant');
    }
    public function wega_get_header_variant(){
        return wega_init_function('header_variant');
    }
    public function wega_get_footer_variant(){
        return wega_init_function('footer_variant');
    }
    public function wega_get_header_nav_hover(){
        return wega_init_function('header_nav_hover');
    }
    public function wega_get_header_nav_submenu_variant(){
        return wega_init_function('header_nav_submenu_variant');
    }
    public function wega_get_sidebar_widgets_variant(){
        return wega_init_function('sidebar_widgets_variant');
    }
    public function wega_get_page_404_template_variant(){
        return wega_init_function('page_404_template_variant');
    }
    public function wega_get_fallback_primary_color(){
        return wega_init_function('fallback_primary_color');
    }
    public function wega_get_fallback_primary_color_hover(){
        return wega_init_function('fallback_primary_color_hover');
    }
    public function wega_get_fallback_main_texts(){
        return wega_init_function('fallback_main_texts');
    }
    public function wega_get_fallback_semitransparent_blocks(){
        return wega_init_function('fallback_semitransparent_blocks');
    }
    // Blog Loop Variant
    public function wega_blogloop_variant(){
        if ( !class_exists( 'ReduxFrameworkPlugin' ) ) {
            $theme_init = new wega_init_class;
            return $theme_init->wega_get_blog_variant();
        }
    }
    // Navstyle Variant
    public function wega_navstyle_variant(){
    	if ( !class_exists( 'ReduxFrameworkPlugin' ) ) {
			$theme_init = new wega_init_class;
    		return $theme_init->wega_get_header_nav_hover();
    	}
    }
}
?>