<?php


/**

||-> Shortcode: Bootstrap Buttons

*/
function modeltheme_btn_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'btn_text'                 => '',
            'btn_url'                  => '',
            'btn_size'                 => '',
            'align'                    => '',
            'gradient_color_1'         => '',
            'gradient_color_2'         => '',
            'text_color'               => '',
            'text_color_hover'         => '',
            'border_color'             => '',
            'border_color_hover'       => '',
            'background_color_hover'   => '',
            'animation'                => ''
        ), $params ) ); 
    $content = '';

    $id_selector = 'btn_custom_'.uniqid();

    $content .= '<div class="'.$align.' modeltheme_button wow '.$animation.'">';
        $content .= '<a href="'.$btn_url.'" class="button-winona '.$btn_size.' '.$id_selector.'" style="color:'.$text_color.'">'.$btn_text.'</a>';
    $content .= '</div>';
    return $content;
}
add_shortcode('mt-bootstrap-button', 'modeltheme_btn_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  vc_map( array(
     "name" => esc_attr__("MT - Button", 'modeltheme'),
     "base" => "mt-bootstrap-button",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Button text", 'modeltheme' ),
            "param_name" => "btn_text",
            "value" => esc_attr__( "Hello", 'modeltheme' ),
            "description" => ""
         ),
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Button url", 'modeltheme' ),
            "param_name" => "btn_url",
            "value" => "#",
            "description" => ""
         ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Button size", 'modeltheme'),
          "param_name" => "btn_size",
          "value" => array(
            esc_attr__('Small', 'modeltheme')   => 'btn btn-sm',
            esc_attr__('Medium', 'modeltheme')   => 'btn btn-medium',
            esc_attr__('Large', 'modeltheme')   => 'btn btn-lg',
            esc_attr__('Extra-Large', 'modeltheme')   => 'extra-large'
          ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Alignment", 'modeltheme'),
          "param_name" => "align",
          "value" => array(
            esc_attr__('Left', 'modeltheme')   => 'text-left',
            esc_attr__('Center', 'modeltheme')   => 'text-center',
            esc_attr__('Right', 'modeltheme')   => 'text-right'
            ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Choose custom background color", 'modeltheme' ),
            "param_name" => "gradient_color_1",
            "value" => '#FFBA41', //Default color
            "description" => esc_attr__( "Choose background color", 'modeltheme' )
         ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Choose custom background color", 'modeltheme' ),
            "param_name" => "gradient_color_2",
            "value" => '#FFBA41', //Default color
            "description" => esc_attr__( "Choose background color", 'modeltheme' )
         ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Text color", 'modeltheme' ),
            "param_name" => "text_color",
            "description" => esc_attr__( "Choose text color", 'modeltheme' )
         ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Border color", 'modeltheme' ),
            "param_name" => "border_color",
            "value" => '#ffffff', //Default color
            "description" => esc_attr__( "Choose border color", 'modeltheme' )
         ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
     )
  ));
}