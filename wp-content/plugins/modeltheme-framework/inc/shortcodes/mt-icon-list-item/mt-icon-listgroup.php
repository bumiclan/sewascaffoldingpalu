<?php
/**
||-> Shortcode: Icon List Item
*/
function modeltheme_icon_listgroup_shortcode($params, $content) {
  extract( shortcode_atts( 
      array(
          'list_fontawesome'        => '',
          'list_flaticon'           => '',
          'list_image'              => '',
          'flat_or_font'            => '',
          'list_image_max_width'    => '',
          'list_image_margin'       => '',
          'list_icon_size'          => '',
          'list_icon_margin'        => '',
          'list_icon_color'         => '',
          'list_icon__hover_color'  => '',
          'list_icon_title'         => '',
          'list_icon_url'           => '',
          'list_icon_title_size'    => '',
          'list_icon_title_color'   => '',
          'list_icon_subtitle'                => '',
          'list_icon_subtitle_size'      => '',
          'list_icon_subtitle_color'          => '',
          'animation'               => '',
      ), $params ) );
  $thumb      = wp_get_attachment_image_src($list_image, "full");
  $thumb_src = '';
  if ($thumb) {
    $thumb_src  = $thumb[0];
  }
  $html = '';

  $html .= '<div class="mt-icon-listgroup-item wow '.$animation.'">';
              if (!empty($list_icon_url)) {
                $html .= '<a href="'.$list_icon_url.'">';
              }
      $html .= '<div class="mt-icon-listgroup-holder">
                  <div class="mt-icon-listgroup-icon-holder-inner">';
                    if(empty($list_image)) {
                      if($flat_or_font == 'fontawesome'){
                        $html .= '<i style="margin-right:'.esc_attr($list_icon_margin).'px; color:'.esc_attr($list_icon_color).';font-size:'.esc_attr($list_icon_size).'px" class="'.esc_attr($list_fontawesome).'"></i>';
                      } elseif($flat_or_font == 'flaticon') {
                        $html .= '<i style="margin-right:'.esc_attr($list_icon_margin).'px; color:'.esc_attr($list_icon_color).';font-size:'.esc_attr($list_icon_size).'px" class="'.esc_attr($list_flaticon).'"></i>';
                      }
                    } else {
                      $html .='<img alt="list-image" style="margin-right:'.esc_attr($list_image_margin).'px; max-width:'.esc_attr($list_image_max_width).'px;" class="mt-image-list" src="'.esc_attr($thumb_src).'">';
                    }
                  $html .= '</div>
                <div class="mt-icon-listgroup-content-holder-inner">
                  <h3 class="mt-icon-listgroup-title" style="font-size: '.esc_attr($list_icon_title_size).'px; color: '.esc_attr($list_icon_title_color).'">'.esc_attr($list_icon_title).'</h3>
                  <p class="mt-icon-listgroup-text" style="font-size: '.esc_attr($list_icon_subtitle_size).'px; color: '.esc_attr($list_icon_subtitle_color).'">'.esc_attr($list_icon_subtitle).'</p>                  
                </div>
                <div class="mt-icon-listgroup-content-holder-button">
                  <p> <a class="more-link" href="'.$list_icon_url.'">'.esc_html__('read more','modeltheme').'</a></p>
                </div>
              </div>';
              if (!empty($list_icon_url)) {
                $html .= '</a>';
              }
            $html .= '</div>';
  return $html;
}
add_shortcode('mt_list_group', 'modeltheme_icon_listgroup_shortcode');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
  vc_map( array(
     "name" => esc_attr__("MT - Icon ListGroup Item", 'modeltheme'),
     "base" => "mt_list_group",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Icon Setup",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Select Font Style",'modeltheme'),
          "param_name" => "flat_or_font",
          "std" => '',
          "description" => esc_attr__("Choose font style", 'modeltheme'),
          "value" => array(
            'FontAwesome'   => 'fontawesome',
            'FlatIcon'      => 'flaticon'
          )
        ),
        array(
          "group" => "Icon Setup",
          "dependency" => array(
            'element' => 'flat_or_font',
            'value' => array( 'fontawesome' ),
          ),
          "type" => "dropdown",
          "heading" => esc_attr__("Icon class", 'modeltheme'),
          "param_name" => "list_fontawesome",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $fa_list
        ),
        array(
          "group" => "Icon Setup",
          "dependency" => array(
            'element' => 'flat_or_font',
            'value' => array( 'flaticon' ),
          ),
          "type" => "dropdown",
          "heading" => esc_attr__("Icon class", 'modeltheme'),
          "param_name" => "list_flaticon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $flaticon_font_i
        ),
        array(
          "group" => "Image Setup",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "list_image",
          "value" => "",
          "description" => esc_attr__( "If you set this, will overwrite the icon setup.", 'modeltheme' )
        ),
        array(
          "group" => "Image Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Image max width", 'modeltheme'),
          "param_name" => "list_image_max_width",
          "value" => "50",
          "description" => "Default: 50(px)"
        ),
        array(
          "group" => "Image Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Image Margin right (px)", 'modeltheme'),
          "param_name" => "list_image_margin",
          "value" => "",
          "description" => ""
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
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Margin right (px)", 'modeltheme'),
          "param_name" => "list_icon_margin",
          "value" => "",
          "description" => ""
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
          "heading" => esc_attr__("Icon Hover Color", 'modeltheme'),
          "param_name" => "list_icon__hover_color",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/Title", 'modeltheme'),
          "param_name" => "list_icon_title",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Eg: This is a label"
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/SubTitle", 'modeltheme'),
          "param_name" => "list_icon_subtitle",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Eg: This is a label"
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
          "heading" => esc_attr__("Title Font Size", 'modeltheme'),
          "param_name" => "list_icon_title_size",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "colorpicker",
          "heading" => esc_attr__("Title Color", 'modeltheme'),
          "param_name" => "list_icon_title_color",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("SubTitle Font Size", 'modeltheme'),
          "param_name" => "list_icon_subtitle_size",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "colorpicker",
          "heading" => esc_attr__("SubTitle Color", 'modeltheme'),
          "param_name" => "list_icon_subtitle_color",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
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
        ), 
     )
  ));
}