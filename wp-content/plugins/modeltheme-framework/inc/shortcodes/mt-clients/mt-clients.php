<?php
/**
||-> Shortcode: Clients
*/
function modeltheme_shortcode_clients01($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'               =>'',
            'visible_items_clients'   =>'',
            'order'                   =>'',
            'number'                  =>'',
            'background_color_overlay'=>''
        ), $params ) );
      $html = '';
    
	    $args_clients = array(
        'posts_per_page'   => $number,
        'orderby'          => 'post_date',
        'order'            => $order,
        'post_type'        => 'clients',
        'post_status'      => 'publish' 
      );
      
	    $html .= '<div class="row">';
		    $html .= '<div class="wow '.$animation.' mt_clients_slider clients_container_shortcode-'.$visible_items_clients.' owl-carousel owl-theme">';
			    $clients = get_posts($args_clients);
			        foreach ($clients as $client) {
		            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $client->ID ),'full' );
		            $html .= '<div class="clients_image_holder post">';
  		            $html .= '<div class="item col-md-12">';
                    $html .= '<div class="clients_image_holder_inside post">';
    	                if($thumbnail_src) { 
                        $html .= '<img class="client_image" src="'. $thumbnail_src[0] . '" alt="'. $client->post_title .'" />';
    	                }else{ 
                        $html .= '<img src="http://placehold.it/160x100" alt="'. $client->post_title .'" />'; 
                      }
                    $html .= '</div>';
  		            $html .= '</div>';
					    $html .= '</div>';
			        }
		    $html .= '</div>';
	    $html .= '</div>';
	    
    return $html;
}
add_shortcode('clients01', 'modeltheme_shortcode_clients01');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
vc_map( array(
     "name" => esc_attr__("MT - Clients (Slider)", 'modeltheme'),
     "base" => "clients01",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number of clients", 'modeltheme' ),
            "param_name" => "number",
            "value" => "",
            "description" => esc_attr__( "Enter number of clients to show.", 'modeltheme' )
         ),
         array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Visible Clients per slide", 'modeltheme'),
          "param_name" => "visible_items_clients",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => array(
            '1'   => '1',
            '2'   => '2',
            '3'   => '3',
            '4'   => '4',
            '5'   => '5',
            '6'   => '6'
          )
        ),
        array(
          "group" => "Options",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Logo Background Overlay", 'modeltheme' ),
          "param_name" => "background_color_overlay",
          "value" => "", //Default color
          "description" => esc_attr__( "Client Logo Background Overlay", 'modeltheme' )
        ),
        array(
          "group" => "Slider Options",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "param_name" => "order",
          "std"          => '',
          "heading" => esc_attr__( "Order options", 'modeltheme' ),
          "description" => esc_attr__( "Order ascending or descending by date", 'modeltheme' ),
          "value"        => array(
              esc_attr__('Ascending', 'modeltheme') => 'asc',
              esc_attr__('Descending', 'modeltheme') => 'desc',
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
        )
     )
  ));
}
require_once('mt-clients-no-slider.php');
?>