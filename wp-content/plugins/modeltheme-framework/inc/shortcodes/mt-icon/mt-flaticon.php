<?php

/**

||-> Shortcode: Icon List Item

*/
function modeltheme_flaticon_icon($params, $content) {
  extract( shortcode_atts( 
      array(
          'list_icon'               => '',
          'list_icon_size'          => '',
          'list_icon_margin'        => '',
          'list_icon_color'         => ''
      ), $params ) );


  $html = '';
  $html .= '<div class="glyph">
                      <i style="font-size:'.esc_attr($list_icon_size).'px; color:'.esc_attr($list_icon_color).'" class="glyph-icon '.esc_attr($list_icon).'"></i>
                </div>';
  return $html;
}
add_shortcode('mt_flaticon', 'modeltheme_flaticon_icon');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  vc_map( array(
     "name" => esc_attr__("MT - Icon (Flaticon)", 'modeltheme'),
     "base" => "mt_flaticon",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Icon Setup",
          "type" => "dropdown",
          "heading" => esc_attr__("Icon", 'modeltheme'),
          "param_name" => "list_icon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $flaticon_font_i
        ),
        array(
          "group" => "Icon Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Size (px)", 'modeltheme'),
          "param_name" => "list_icon_size",
          "value" => "",
          "description" => "Default: 18(px)"
        ),
        array(
          "group" => "Icon Setup",
          "type" => "colorpicker",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Color", 'modeltheme'),
          "param_name" => "list_icon_color",
          "value" => "",
          "description" => ""
        ), 
     )
  ));
}