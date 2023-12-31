<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**

||-> Shortcode: Title and Subtitle

*/

function modeltheme_heading_title_subtitle_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           => '',
            'title'               => '',
            'subtitle'            => '',
            'title_color'         => '',
            'subtitle_color'      => '',
            'border_color'        => '',
            'align_title'         => '',
        ), $params ) ); 

    $content = '<div class="title-subtile-holder wow '.$animation.' '.$align_title.'">';
        $content .= '<div class="subtitle-wrapper">';
            $content .= '<span class="section-border left '.$border_color.'"></span>';
            $content .= '<span class="section-subtitle '.$subtitle_color.'">'.$subtitle.'</span>';
            $content .= '<span class="section-border right '.$border_color.'"></span>';
        $content .= '</div>';
        $content .= '<h2 class="section-title '.$title_color.'">'.$title.'</h2>';
    $content .= '</div>';

    return $content;

}
add_shortcode('heading_title_subtitle', 'modeltheme_heading_title_subtitle_shortcode');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    vc_map( 
        array(
            "name" => esc_attr__("MT - Heading with Title and Subtitle", 'modeltheme'),
            "base" => "heading_title_subtitle",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Section title", 'modeltheme' ),
                    "param_name" => "title",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Section subtitle", 'modeltheme'),
                    "param_name" => "subtitle",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "group" => "Options",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Subtitle Color", 'modeltheme'),
                    "param_name" => "align_title",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Align elements center', 'modeltheme')     => 'text_center',
                        esc_attr__('Align elements right', 'modeltheme')     => 'text_right',
                        esc_attr__('Align elements left', 'modeltheme')     => 'text_left',
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Title Color", 'modeltheme'),
                    "param_name" => "title_color",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Light color title for dark section', 'modeltheme')     => 'light_title',
                        esc_attr__('Dark color title for light section', 'modeltheme')     => 'dark_title'
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Border Section Color", 'modeltheme'),
                    "param_name" => "border_color",
                    "std" => '',
                    "description" => "",
                    "value" => array(
                        esc_attr__('Light border for dark section', 'modeltheme')     => 'light_border',
                        esc_attr__('Dark border for light section', 'modeltheme')     => 'dark_border',
                        esc_attr__('Orange border', 'modeltheme')                     => 'orange_border'
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Subtitle Color", 'modeltheme'),
                    "param_name" => "subtitle_color",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Light color subtitle for dark section', 'modeltheme')              => 'light_subtitle',
                        esc_attr__('Dark color subtitle for light section', 'modeltheme')              => 'dark_subtitle',
                        esc_attr__('Theme default color subtitle for light section', 'modeltheme')     => 'orange_subtitle'
                    )
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
        )
    );
}
?>