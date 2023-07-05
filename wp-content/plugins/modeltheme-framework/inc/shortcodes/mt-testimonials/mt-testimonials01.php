<?php



require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');



/**



||-> Shortcode: Testimonials



*/



function modeltheme_shortcode_testimonials($params, $content) {

    extract( shortcode_atts( 

        array(

            'animation'             =>'',

            'number'                =>'',

            'visible_items'         =>''

        ), $params ) );









    $html = '';

    $html .= '<div class="vc_row">';

        $html .= '<div class="wow '.$animation.' testimonials-container-'.$visible_items.' owl-carousel owl-theme">';

        $args_testimonials = array(

                'posts_per_page'   => $number,

                'orderby'          => 'post_date',

                'order'            => 'DESC',

                'post_type'        => 'testimonial',

                'post_status'      => 'publish' 

                ); 

        $testimonials = get_posts($args_testimonials);

            foreach ($testimonials as $testimonial) {

                #metaboxes

                $metabox_background_color = get_post_meta( $testimonial->ID, 'testimonial_bg_color', true );

                $metabox_content_color = get_post_meta( $testimonial->ID, 'testimonial_color', true );

                $metabox_job_position = get_post_meta( $testimonial->ID, 'job-position', true );

                $metabox_company = get_post_meta( $testimonial->ID, 'company', true );

                $testimonial_id = $testimonial->ID;

                $content_post   = get_post($testimonial_id);

                $content        = $content_post->post_content;

                $content        = apply_filters('the_content', $content);

                $content        = str_replace(']]>', ']]&gt;', $content);

                #thumbnail

                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ),'connection_testimonials_150x150' );

                

                $html.='

                	<div class="item vc_col-md-12 relative">

	                	<div class="testimonial01_item">        	

		                	<div class="testimonial01-img-holder pull-left">

                        <div class="testimonail01-content" style="color:'.$metabox_content_color.';"><p>'.strip_tags(modeltheme_excerpt_limit($content,60)).'</p></div>

                        <h5 class="name-test" style="color:'.$metabox_content_color.';">'. $testimonial->post_title .'</h5>

                        <p class="position-test" style="color:'.$metabox_content_color.';">'. $metabox_job_position .'</p>

                      </div>

		                </div>

	                </div>';



            }

    $html .= '</div>

    	</div>';



    return $html;



}

add_shortcode('testimonials01', 'modeltheme_shortcode_testimonials');







/**



||-> Map Shortcode in Visual Composer with: vc_map();



*/

if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {



    vc_map( array(

     "name" => esc_attr__("MT - Testimonials Box", 'modeltheme'),

     "base" => "testimonials01",

     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),

     "icon" => "smartowl_shortcode",

     "params" => array(

        array(

          "group" => "Options",

          "type" => "textfield",

          "holder" => "div",

          "class" => "",

          "heading" => esc_attr__( "Number of testimonials", 'modeltheme' ),

          "param_name" => "number",

          "value" => "",

          "description" => esc_attr__( "Enter number of testimonials to show.", 'modeltheme' )

        ),

        array(

          "group" => "Options",

          "type" => "dropdown",

          "heading" => esc_attr__("Visible Testimonials per slide", 'modeltheme'),

          "param_name" => "visible_items",

          "std" => '',

          "holder" => "div",

          "class" => "",

          "description" => "",

          "value" => array(

            '1'   => '1',

            '2'   => '2',

            '3'   => '3'

            )

        ),

        array(

          "group" => "Animation",

          "type" => "dropdown",

          "heading" => esc_attr__("Animation", 'modeltheme'),

          "param_name" => "animation",

          "std" => 'fadeInLeft',

          "holder" => "div",

          "class" => "",

          "description" => "",

          "value" => $animations_list

        )

      )

  ));

}



?>