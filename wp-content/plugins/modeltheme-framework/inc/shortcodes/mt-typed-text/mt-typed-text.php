<?php

/**

||-> Shortcode: Typed

*/
function modeltheme_mt_typed_text_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'texts'          => '',
            'aftertext'      => '',
            'beforetext'     => '',
            'animation'      => '',
            'typespeed'          => '',
            'backdelay'          => '',
        ), $params ) );

    $typed_unique_id = 'mt_typed_text_'.uniqid();

    $skill = '';
    $skill .= '<script>
                jQuery(function(){
                    jQuery(".'.esc_attr($typed_unique_id).'").typed({
                      strings: ['.$texts.'],
                      typeSpeed: '.$typespeed.',
                      backDelay: '.$backdelay.',
                      loop: true
                    });
                });
              </script>';
    $skill .= '<div class="parent-typed-text wow '.$animation.'">';
      $skill .= '<span class="mt_typed-beforetext">'.$beforetext.' </span>';
      $skill .= '<span class="mt_typed_text '.esc_attr($typed_unique_id).'"></span>';
      $skill .= '<span class="mt_typed-aftertext"> '.$aftertext.'</span>';
    $skill .= '</div>';

    return $skill;
}
add_shortcode('mt_typed_text', 'modeltheme_mt_typed_text_shortcode');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  vc_map( array(
     "name" => esc_attr__("MT - Typed Text", 'modeltheme'),
     "base" => "mt_typed_text",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "textarea",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Texts", 'modeltheme'),
           "param_name" => "texts",
           "value" => "",
           "description" => "Eg: 'String Text 1', 'String Text 2', 'String Text 3'"
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Before text", 'modeltheme'),
           "param_name" => "beforetext",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("After text", 'modeltheme'),
           "param_name" => "aftertext",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Type Speed", 'modeltheme'),
           "param_name" => "typespeed",
           "value" => "0",
           "description" => "Default: 0"
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Time Before Backspacing", 'modeltheme'),
           "param_name" => "backdelay",
           "value" => "500",
           "description" => "Default: 500 (Which is 0.5s)"
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