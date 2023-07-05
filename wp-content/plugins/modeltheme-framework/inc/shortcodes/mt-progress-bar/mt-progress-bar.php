<?php 



/**



||-> Shortcode: Progress Bar



*/

function modeltheme_progress_bar_shortcode($params, $content) {

    extract( shortcode_atts( 

        array(

            'bar_scope'  => '', // success/info/warning/danger

            'bar_style'  => '', // normal/progress-bar-striped

            'bar_label_text'  => '', // optional,

            'bar_label_text_color'  => '',

            'bar_label_percentage'  => '', // optional

            'bar_label_percentage_color'  => '',

            'bar_value'  => '',

            'animation'  => ''

        ), $params ) );

        $content = '';

        if(!isset($bar_label_text) && !isset($bar_label_percentage)){

            $content .= '<div class="label_text_percentange">

                             <span class="sr-only">'.

                                '<span class="label_text" style="color: '.esc_attr($bar_label_text_color).'">'.$bar_label_text.'</span>'.

                                '<span class="label_percentage" style="color: '.esc_attr($bar_label_percentage_color).'">'.$bar_label_percentage.'</span>'.

                            '</span>

                         </div>';

        }else{ 

            $content .= '<div class="label_text_percentange">

                             <span class="label_text" style="color: '.esc_attr($bar_label_text_color).'">'.$bar_label_text.'</span>'.

                            '<span class="label_percentage" style="color: '.esc_attr($bar_label_percentage_color).'">'.$bar_label_percentage.'</span>

                        </div>';

        }

        $content .= '<div class="progress wow '.$animation.'">';

        $content .= '<div class="progress-bar progress-bar-'.$bar_scope . ' ' . $bar_style.'" role="progressbar" aria-valuenow="'.$bar_value.'" aria-valuemin="0" 

        aria-valuemax="100" style="width:'.$bar_value.'%">';

        $content .= '</div>';

    $content .= '</div>';

    return $content;

}

add_shortcode('progress_bar', 'modeltheme_progress_bar_shortcode');



/**



||-> Map Shortcode in Visual Composer with: vc_map();



*/

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {



   require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';



   vc_map( 

        array(

        "name" => esc_attr__("MT - Progress bar", 'modeltheme'),

        "base" => "progress_bar",

        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),

        "icon" => "smartowl_shortcode",

        "params" => array(

            array(

                "group" => "Options",

                "type" => "dropdown",

                "holder" => "div",

                "class" => "",

                "heading" => esc_attr__("Progress bar tooltip", 'modeltheme'),

                "param_name" => "tooltip_option",

                "std" => '',

                "description" => "",

                "value" => array(

                    esc_attr__('Tooltip on', 'modeltheme')     => 'tooltip_on',

                    esc_attr__('Tooltip off', 'modeltheme')    => 'tooltip_off'

                )

            ),

            array(

                "group" => "Options",

                "type" => "dropdown",

                "holder" => "div",

                "class" => "",

                "heading" => esc_attr__("Progress bar scope", 'modeltheme'),

                "param_name" => "bar_scope",

                "std" => '',

                "description" => "",

                "value" => array(

                    esc_attr__('Success', 'modeltheme')     => 'success',

                    esc_attr__('Info', 'modeltheme')        => 'info',

                    esc_attr__('Warning', 'modeltheme')     => 'warning',

                    esc_attr__('Danger', 'modeltheme')      => 'danger'

                )

            ),

            array(

                "group" => "Options",

                "type" => "dropdown",

                "holder" => "div",

                "class" => "",

                "heading" => esc_attr__("Progress bar style", 'modeltheme'),

                "param_name" => "bar_style",

                "std" => '',

                "description" => "",

                "value" => array(

                    esc_attr__('Simple', 'modeltheme')     => 'simple',

                    esc_attr__('Striped', 'modeltheme')    => 'progress-bar-striped'

                )

            ),

            array(

                "group" => "Options",

                "type" => "textfield",

                "holder" => "div",

                "class" => "",

                "heading" => esc_attr__("Progress bar value (1-100)", 'modeltheme'),

                "param_name" => "bar_value",

                "value" => "40",

                "description" => ""

            ),

            array(

                "group" => "Options",

                "type" => "textarea",

                "holder" => "div",

                "class" => "",

                "heading" => esc_attr__("Progress bar text", 'modeltheme'),

                "param_name" => "bar_label_text",

                "value" => esc_attr__("Complete", 'modeltheme'),

                "description" => ""

            ),

            array(

                "group" => "Options",

                "type" => "textarea",

                "holder" => "div",

                "class" => "",

                "heading" => esc_attr__("Progress bar percentage", 'modeltheme'),

                "param_name" => "bar_label_percentage",

                "value" => esc_attr__("40%", 'modeltheme'),

                "description" => ""

            ),

            array(

                "group" => "Styling",

                "type" => "colorpicker",

                "class" => "",

                "heading" => esc_attr__( "Text color", 'modeltheme' ),

                "param_name" => "bar_label_text_color",

                "value" => "#ffffff", //Default color

                "description" => esc_attr__( "Choose text color", 'modeltheme' )

            ),

            array(

                "group" => "Styling",

                "type" => "colorpicker",

                "class" => "",

                "heading" => esc_attr__( "Percentage Color", 'modeltheme' ),

                "param_name" => "bar_label_percentage_color",

                "value" => "#ffffff", //Default color

                "description" => esc_attr__( "Choose text color", 'modeltheme' )

            ),

            array(

              "group" => "Animation",

              "type" => "dropdown",

              "heading" => esc_attr__("Animation"),

              "param_name" => "animation",

              "std" => 'fadeInLeft',

              "holder" => "div",

              "class" => "",

              "description" => esc_attr__(""),

              "value" => $animations_list

            )

        )

    ));

}