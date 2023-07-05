<?php 
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');
/**
||-> Shortcode: Pricing tables
*/
function mt_shortcode_pricing_table($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
            'package_recommended'                         => '',
            'package_currency'                            => '',
            'package_price'                               => '',
            'package_per_feature'                         => '',
            'button_url'                                  => '',
            'button_text'                                 => '',
            
            'box_background_color'                        => '',
            'content_color'                               => '',
            'recomended_color'                            => '',
            'animation'           => '',
            'el_class'              => ''
        ), $params ) );
    $button_color_final = '';
    if($package_recommended == 'pricing__item--premium') { 
        $button_color_final = $recomended_color;
    } else {
        $button_color_final = $content_color;
    }
    $pricing_table = '';
    $pricing_table .= '<div class="row">';
        $pricing_table .= '<div class="pricing-section-v3 pricing-section wow '.esc_attr($animation).'">';
            $pricing_table .= '<div class="pricing pricing--cluster">';
                $pricing_table .= '<div style="background-color: '.esc_attr($box_background_color).'" class="pricing__item '.esc_attr($package_recommended).'">';
                if($package_recommended == 'pricing__item--simple') {
                    $pricing_table .= '<div style="background-color: '.esc_attr($content_color).'" class="package__recommended">'.esc_html('Simple','modeltheme').'</div>';
                } elseif($package_recommended == 'pricing__item--premium') {
                    $pricing_table .= '<div style="background-color: '.esc_attr($recomended_color).'" class="package__recommended">'.esc_html('Premium','modeltheme').'</div>';
                } elseif($package_recommended == 'pricing__item--business') {
                    $pricing_table .= '<div style="background-color: '.esc_attr($content_color).'" class="package__recommended">'.esc_html('Business','modeltheme').'</div>';
                }
                $pricing_table .= '<div style="color: '.esc_attr($content_color).'" class="pricing__price">';
                    $pricing_table .= '<span class="pricing__currency">'.esc_attr($package_currency).'</span>'.esc_attr($package_price).'';
                $pricing_table .= '</div>';
                $pricing_table .= '<p style="color: '.esc_attr($content_color).'" class="package__per__feature">'.esc_attr($package_per_feature).'</p>';
                $pricing_table .= '<ul class="pricing__feature-list">';
                     $pricing_table .= do_shortcode($content);
                $pricing_table .= '</ul>';
                $pricing_table .= '<a style="background-color: '.esc_attr($button_color_final).'" class="pricing__action" href="'.esc_attr($button_url).'">'.esc_attr($button_text).'</a>';
                $pricing_table .= '</div>';
            $pricing_table .= '</div>';
        $pricing_table .= '</div>
    </div>';          
    return $pricing_table;
}
add_shortcode('mt_pricing_table_short', 'mt_shortcode_pricing_table');
/**
||-> Shortcode: Child Shortcode v1
*/
function mt_shortcode_pricing_table_items($params, $content = NULL) {
    extract( shortcode_atts( 
        array(
            'package_feature'                            => '',
            'package_feature_icon'                       => '',
        ), $params ) );
        $pricing_table = '';
        $pricing_table .= '<li class="pricing__feature">'.esc_attr($package_feature).'
          <i class="'.esc_attr($package_feature_icon).'"></i>
        </li>';
    return $pricing_table;
}
add_shortcode('mt_pricing_table_short_item', 'mt_shortcode_pricing_table_items');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');
    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map( array(
        "name" => esc_attr__("MT - Pricing tables v3", 'modeltheme'),
        "base" => "mt_pricing_table_short",
        "as_parent" => array('only' => 'mt_pricing_table_short_item'), 
        "content_element" => true,
        "show_settings_on_create" => true,
        "icon" => "smartowl_shortcode",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "is_container" => true,
        "params" => array(
            // add params same as with any other content element
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
                    'Simple'           => 'pricing__item--simple',
                    'Premium'          => 'pricing__item--premium',
                    'Business'         => 'pricing__item--business'
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
        ),
        "js_view" => 'VcColumnView'
    ) );
    vc_map( array(
        "name" => esc_attr__("Pricing tables Item", 'modeltheme'),
        "base" => "mt_pricing_table_short_item",
        "content_element" => true,
        "as_child" => array('only' => 'mt_pricing_table_short'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element
            array(
              "group" => "Options",
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Package's feature", 'modeltheme'),
              "param_name" => "package_feature",
              "value" => esc_attr__("", 'modeltheme'),
              "description" => ""
            ),
            array(
              "group" => "Options",
              "type" => "dropdown",
              "heading" => esc_attr__("Package's feature icon", 'modeltheme'),
              "param_name" => "package_feature_icon",
              "std" => '',
              "holder" => "div",
              "class" => "",
              "description" => "",
              "value" => $fa_list
            ),
        )
    ) );
    //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_mt_pricing_table_short extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_mt_pricing_table_short_item extends WPBakeryShortCode {
        }
    }
}
?>