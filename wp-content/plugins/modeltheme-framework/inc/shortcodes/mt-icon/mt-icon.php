<?php

/**

||-> Shortcode: Icon List Item

*/
function modeltheme_icon($params, $content) {
  extract( shortcode_atts( 
      array(
          'list_icon'               => '',
          'list_icon_size'          => '',
          'list_icon_margin'        => '',
          'list_icon_color'         => '',
          'list_icon__shadow_color' => '',
          'list_icon_url'           => '',
          'list_icon_margin_top'    => ''
      ), $params ) );


  $html = '';
/*  $html .= '<style type="text/css" scoped>
                .mt-icon-list-item:hover i, .mt-icon-list-item:hover {
                    color: '.$list_icon__shadow_color.' !important;
                }
              </style>';*/

  $html .= '<div class="mt-icon-list-item mt-icon-list-item-shadow skin_color_'.esc_attr($list_icon__shadow_color).'" style="margin-top:'.$list_icon_margin_top.'">';

              if (!empty($list_icon_url)) {
                $html .= '<a href="'.$list_icon_url.'">';
              }

      $html .= '<div class="mt-icon-list-icon-holder">
                  <div class="mt-icon-list-icon-holder-inner clearfix">
                    <div style="font-size:'.esc_attr($list_icon_size).'px" class="flat-icon">
                      <i style="color:'.esc_attr($list_icon_color).'" class="'.esc_attr($list_icon).'"></i>
                    </div>
                  </div>
                </div>';
              
              if (!empty($list_icon_url)) {
                $html .= '</a>';
              }

            $html .= '</div>';

  return $html;
}
add_shortcode('mt_icon', 'modeltheme_icon');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  vc_map( array(
     "name" => esc_attr__("MT - Icon", 'modeltheme'),
     "base" => "mt_icon",
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
          "value" => $fa_list
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
        array(
          "group" => "Icon Setup",
          "type" => "colorpicker",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Shadow Color", 'modeltheme'),
          "param_name" => "list_icon__shadow_color",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/Icon URL", 'modeltheme'),
          "param_name" => "list_icon_url",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Eg: http://modeltheme.com"
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/margin-top", 'modeltheme'),
          "param_name" => "list_icon_margin_top",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
     )
  ));
}