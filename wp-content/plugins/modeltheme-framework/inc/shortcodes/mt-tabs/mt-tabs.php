<?php 
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: tabs
*/
function mt_shortcode_tabs($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
            'el_class'              => ''
        ), $params ) );
    $html = '';
    $counter_parent = 0;

    $html .= '<div class="tabs-shortcode parent-'.$counter_parent.' naccs '.$el_class.'">';
        $html .= '<div class="grid-div">';
            $html .= do_shortcode($content);
        $html .= '</div>';
    $html .= '</div>';
    ++$counter_parent;
    
    return $html;
}
add_shortcode('mt_tabs_short', 'mt_shortcode_tabs');
/**
||-> Shortcode: Child Shortcode v1
*/
function mt_shortcode_tabs_items($params, $content = NULL) {
    static $counter = 0;
    extract( shortcode_atts( 
        array(
            'tabs_item_title'                 => '',
            'tabs_item_image'                 => '',
            'tabs_item_content'               => '',
            'el_class_active'                 => '',
            'custom_service_button_link'      => '',
            'custom_service_button_text'      => ''
        ), $params ) );
    $thumb      = wp_get_attachment_image_src($tabs_item_image, "full");
    $thumb_src  = $thumb[0];

    $html = '';

    $html .= '<div class="gc gc--1-of-3 '.$el_class_active.'">';
        $html .= '<div class="menu">';
    
            $html .= '<div class="'.$el_class_active.'" data-tab="tab-'.$counter.'">';
                $html .= '<span class="light"></span><span>'.$tabs_item_title.'</span>';
            $html .= '</div>';
    
        $html .= '</div>';
    $html .='</div>';
    $html .= '<div class="gc gc--2-of-3 '.$el_class_active.'">';
        $html .= '<ul class="nacc">';
            $html .= '<li class="'.$el_class_active.'" id="tab-'.$counter.'">';
            	 if (isset($thumb_src)) {
            		$html .= '<img src="'.esc_attr($thumb_src).'" data-src="'.esc_attr($thumb_src).'" alt="" width="100%">';
            	}
                $html .= '<div class="tabs_item_content">';
                    $html .= '<p>'.$tabs_item_content.'</p>';

                    if (isset($thumb_src)) {
                    $html .= '<a class="more-link" href="'.esc_attr($custom_service_button_link).'">'.esc_attr($custom_service_button_text).'</a>';
                	}
                $html .= '</div>';
            $html .= '</li>';
        $html .= '</ul>';
    $html .= '</div>';
    $counter++;
    return $html;
}
add_shortcode('mt_tabs_short_item', 'mt_shortcode_tabs_items');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');
    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("MT - Tabs", 'modeltheme'),
        "base" => "mt_tabs_short",
        "as_parent" => array('only' => 'mt_tabs_short_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "icon" => "smartowl_shortcode",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "is_container" => true,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "modeltheme"),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
            ),
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Tabs Item", 'modeltheme'),
        "base" => "mt_tabs_short_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_tabs_short'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element
            array(
                "group"        => "General Options",
                "type"         => "textfield",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_title",
                "heading"      => esc_attr__("Single item tabs Title", 'modeltheme'),
                "description"  => esc_attr__("Enter title for current tabs item.", 'modeltheme'),
            ),
            array(
                "group"        => "General Options",
                "type"         => "attach_images",
                "holder"       => "div",
                "class"        => "",
                "heading"      => esc_attr__( "Choose image", 'modeltheme' ),
                "param_name"   => "tabs_item_image",
                "value" => "",
                "description" => esc_attr__( "Choose image for tabs item", 'modeltheme' ),
            ),
            array(
                "group"        => "General Options",
                "type"         => "textarea_html",
                "holder"       => "div",
                "class"        => "",
                "param_name"   => "tabs_item_content",
                "heading"      => esc_attr__("Single item tabs Description", 'modeltheme'),
                "description"  => esc_attr__("Enter the description for current tabs item.", 'modeltheme'),
            ),
            array(
            	"group" => "General Options",
            	"type" => "textfield",
            	"holder" => "div",
            	"class" => "",
            	"heading" => esc_attr__("Enter the button link", 'modeltheme'),
            	"param_name" => "custom_service_button_link",
            	"value" => esc_attr__("", 'modeltheme'),
            	"description" => ""
        	),
        	array(
            	"group" => "General Options",
            	"type" => "textfield",
            	"holder" => "div",
            	"class" => "",
            	"heading" => esc_attr__("Enter the button text", 'modeltheme'),
            	"param_name" => "custom_service_button_text",
            	"value" => esc_attr__("", 'modeltheme'),
            	"description" => ""
        	),
            array(
                "group"        => "General Options",
                "type" => "textfield",
                "heading" => __("Add class active for first element", "modeltheme"),
                "param_name" => "el_class_active",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "modeltheme")
            ),
        )
    ) );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_Mt_tabs_Short extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_Mt_tabs_Short_Item extends WPBakeryShortCode {
        }
    }
}
?>