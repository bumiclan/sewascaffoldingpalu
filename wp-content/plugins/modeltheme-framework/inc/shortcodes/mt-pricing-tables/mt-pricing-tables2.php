<?php


/**

||-> Shortcode: Pricing Tables

*/
function modeltheme_pricing_table_shortcode2($params, $content) {
    extract( shortcode_atts( 
        array(
            'package_recommended'                         => '',
            'package_total_period'                        => '',
            'package_currency'                            => '',
            'package_price'                               => '',
            'package_per_feature'                         => '',
            'package_discount'                            => '',
            'package_feature1'                            => '',
            'package_feature2'                            => '',
            'package_feature3'                            => '',
            'package_feature4'                            => '',
            'package_feature5'                            => '',
            'animation'                                   => '',
            'button_url'                                  => '',
            'button_text'                                 => '',
            'box_background_color'                        => '',
            'content_color'                               => '',
            'recomended_color'                            => '',
        ), $params ) );


    $package_discount_final = '';
    if($package_recommended == 'pricing__item--featured') { 
        $package_discount_final = $recomended_color;
    } else {
        $package_discount_final = $content_color;
    }

    $button_color_final = '';
    if($package_recommended == 'pricing__item--featured') { 
        $button_color_final = $recomended_color;
    } else {
        $button_color_final = $content_color;
    }

    $pricing_table = '';
    $pricing_table .= '<div class="row">';
      $pricing_table .= '<div class="pricing-section wow '.esc_attr($animation).'">';
          
          $pricing_table .= '<div class="pricing pricing--cluster">';
            $pricing_table .= '<div style="background-color: '.esc_attr($box_background_color).'" class="pricing__item '.esc_attr($package_recommended).'">';

              if($package_recommended == 'pricing__item--featured') {
                  $pricing_table .= '<div style="background-color: '.esc_attr($button_color_final).'" class="package__recommended">'.esc_html('Most popular','modeltheme').'</div>';
              }
              $pricing_table .= '<span style="color: '.esc_attr($content_color).'" class="pricing__period">'.esc_attr($package_total_period).'</span>';
              $pricing_table .= '<div style="color: '.esc_attr($content_color).'" class="pricing__price">';
                  $pricing_table .= '<span class="pricing__currency">'.esc_attr($package_currency).'</span>'.esc_attr($package_price).'';
              $pricing_table .= '</div>';
              $pricing_table .= '<p style="color: '.esc_attr($content_color).'" class="package__per__feature">'.esc_attr($package_per_feature).'</p>';
              $pricing_table .= '<p style="background-color: '.esc_attr($package_discount_final).'" class="package__discount">'.esc_attr($package_discount).'</p>';

              $pricing_table .= '<ul class="pricing__feature-list">';
                if (!empty($package_feature1)){
                  $pricing_table .= '<li style="color: '.esc_attr($content_color).'" class="pricing__feature">'.esc_attr($package_feature1).'</li>';
                }
                if (!empty($package_feature2)){
                  $pricing_table .= '<li style="color: '.esc_attr($content_color).'" class="pricing__feature">'.esc_attr($package_feature2).'</li>';
                }
                if (!empty($package_feature3)){
                  $pricing_table .= '<li style="color: '.esc_attr($content_color).'" class="pricing__feature">'.esc_attr($package_feature3).'</li>';
                }
                if (!empty($package_feature4)){
                  $pricing_table .= '<li style="color: '.esc_attr($content_color).'" class="pricing__feature">'.esc_attr($package_feature4).'</li>';
                }
                if (!empty($package_feature5)){
                  $pricing_table .= '<li style="color: '.esc_attr($content_color).'" class="pricing__feature">'.esc_attr($package_feature5).'</li>';
                }
              $pricing_table .= '</ul>';

              $pricing_table .= '<a style="background-color: '.esc_attr($button_color_final).'" class="pricing__action" href="'.esc_attr($button_url).'">'.esc_attr($button_text).'</a>';
            $pricing_table .= '</div>';
          $pricing_table .= '</div>';
      $pricing_table .= '</div>
    </div>';
    return $pricing_table;
}
add_shortcode('pricing-table2', 'modeltheme_pricing_table_shortcode2');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  vc_map( array(
     "name" => esc_attr__("MT - Pricing table v2", 'modeltheme'),
     "base" => "pricing-table2",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "dependency" => array(
           'element' => 'package_style',
           ),
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package period", 'modeltheme'),
           "param_name" => "package_total_period",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "dependency" => array(
           'element' => 'package_style',
           ),
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package Recommended"),
           "param_name" => "package_recommended",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            'Basic'           => 'pricing__item--nofeatured',
            'Recommended'     => 'pricing__item--featured'
           )
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package per feature", 'modeltheme'),
           "param_name" => "package_per_feature",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package discount", 'modeltheme'),
           "param_name" => "package_discount",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package price", 'modeltheme'),
           "param_name" => "package_price",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package currency", 'modeltheme'),
           "param_name" => "package_currency",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 1st feature", 'modeltheme'),
           "param_name" => "package_feature1",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 2nd feature", 'modeltheme'),
           "param_name" => "package_feature2",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 3rd feature", 'modeltheme'),
           "param_name" => "package_feature3",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 4th feature", 'modeltheme'),
           "param_name" => "package_feature4",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 5th feature", 'modeltheme'),
           "param_name" => "package_feature5",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package button url", 'modeltheme'),
           "param_name" => "button_url",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package button text", 'modeltheme'),
           "param_name" => "button_text",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Styling",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Box background color", 'modeltheme'),
           "param_name" => "box_background_color",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Styling",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Content color", 'modeltheme'),
           "param_name" => "content_color",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Styling",
           "type" => "colorpicker",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Recomended color", 'modeltheme'),
           "param_name" => "recomended_color",
           "value" => esc_attr__("", 'modeltheme'),
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
        )
     )
  ));
}