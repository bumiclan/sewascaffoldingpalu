<?php 
/* ------------------------------------------------------------------
[Modeltheme - SHORTCODES]

[Table of contents]
    Recent Tweets
    Contact Form
    Recent Posts
    Featured Post with thumbnail
    Subscribe form
    Skill
    Pricing tables
    Jumbot
    Alert
    Progress bars
    Custom content
    Responsive video (YouTube)
    Heading With Border
    Testimonials
    List group
    Thumbnails custom content
    Section heading with title and subtitle
    Section heading with title
    Heading with bottom border
    Call to action
    Blog posts
    Social Media
    Quotes
    Banner
    Our Services
    Quotes Slider
    Courses
------------------------------------------------------------------ */



include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


include_once( 'mt-members/mt-members-slider.php' ); # Members 01
include_once( 'mt-services/mt_custom_service.php' ); # Services 03
include_once( 'mt-contact/mt-contact01.php' );
include_once( 'mt-blog-posts/mt-blogpost01.php' ); # Blog Post
include_once( 'mt-testimonials/mt-testimonials01.php' ); # Testimonials 01
include_once( 'mt-testimonials/mt-testimonials02.php' ); # Testimonials 02
include_once( 'mt-clients/mt-clients.php' ); # Clients
include_once( 'mt-title-subtitle/mt-title-subtitle.php' ); # Title Subtitle
include_once( 'mt-social-icons/mt-social-icons.php' ); # Social Icons
include_once( 'mt-featured-post/mt-featured-post.php' ); # Featured Post
include_once( 'mt-skills/mt-skills.php' ); # Skills
include_once( 'mt-skills-circle/mt-skills-circle.php' ); # Skills Cricle
include_once( 'mt-pricing-tables/mt-pricing-tables.php' ); # Pricing Tables
include_once( 'mt-pricing-tables/mt-pricing-tables2.php' ); # Pricing Tables2
include_once( 'mt-pricing-tables/mt-pricing-tables3.php' ); # Pricing Tables3
include_once( 'mt-pricing-tables/mt-pricing-tables4.php' ); # Pricing Tables4
include_once( 'mt-countdown/mt-countdown.php' ); # Countdown
include_once( 'mt-icon-list-item/mt-icon-list-item.php' ); # ICON LIST ITEM
include_once( 'mt-icon-list-item/mt-icon-listgroup.php' ); # ICON LIST ITEM GROUP
include_once( 'mt-typed-text/mt-typed-text.php' ); # Typed text
include_once( 'mt-video/mt-video.php' ); # Video
include_once( 'mt-mailchimp-subscribe-form/mt-mailchimp-subscribe-form.php' ); # Mailchimp Subscribe Form
include_once( 'mt-featured-product/mt-featured-product.php' ); # Featured Product
include_once( 'mt-sharer/mt-sharer.php' ); # Featured Product
include_once( 'mt-tabs/mt-tabs.php' ); # Featured Product
include_once( 'mt-icon/mt-icon.php' );
include_once( 'mt-icon/mt-flaticon.php' );
include_once( 'mt-map-pins/mt-map-pins.php' ); # Map Pins
include_once( 'mt-icon-services/mt-icon-services.php' ); # Icon services
include_once( 'mt-progress-bar/mt-progress-bar.php' ); # Progress bar

// BOOTSTRAP ELEMENTS
include_once( 'mt-bootstrap-alert/mt-bootstrap-alert.php' ); # Bootstrap Alerts
include_once( 'mt-bootstrap-jumbotron/mt-bootstrap-jumbotron.php' ); # Bootstrap Jumbotron
include_once( 'mt-bootstrap-panel/mt-bootstrap-panel.php' ); # Bootstrap Panel
include_once( 'mt-bootstrap-thumbnails-custom-content/mt-bootstrap-thumbnails-custom-content.php' ); # Bootstrap Thumbnails Custom Content
include_once( 'mt-bootstrap-listgroup/mt-bootstrap-listgroup.php' ); # Bootstrap List Group
include_once( 'mt-bootstrap-button/mt-bootstrap-button.php' ); # Bootstrap Buttons
include_once( 'mt-bubble-box/mt-bubble-box.php' ); # Bootstrap Buttons



/*---------------------------------------------*/
/*--- Woocommerce Categories with thumbnails ---*/
/*---------------------------------------------*/

function modeltheme_shop_categories_with_thumbnails_shortcode( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'number'                               => '',
            'number_of_products_by_category'       => '',
            'number_of_columns'                    => '',
            'hide_empty'                           => ''
        ), $params ) );

    $prod_categories = get_terms( 'product_cat', array(
        'number'        => $number,
        'hide_empty'    => $hide_empty,
        'parent' => 0
    ));

    $shortcode_content = '';
    $shortcode_content .= '<div class="woocommerce_categories">';
        $shortcode_content .= '<div class="categories categories_shortcode categories_shortcode_'.$number_of_columns.' owl-carousel owl-theme">';
        foreach( $prod_categories as $prod_cat ) {
            if ( class_exists( 'WooCommerce' ) ) {
                $cat_thumb_id   = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
            } else {
                $cat_thumb_id = '';
            }
            $cat_thumb_url  = wp_get_attachment_image_src( $cat_thumb_id, 'pic100x75' );
            $term_link      = get_term_link( $prod_cat, 'product_cat' );

            $shortcode_content .= '<div class="category item ">';
                    $shortcode_content .= '<a class="#categoryid_'.$prod_cat->term_id.'">';
                        $shortcode_content .= '<img src="'.$cat_thumb_url[0].'" alt="'.$prod_cat->name.'" />';
                        $shortcode_content .= '<span class="cat-name">'.$prod_cat->name.'</span>';                    
                    $shortcode_content .= '</a>';    
            $shortcode_content .= '</div>';
        }
        $shortcode_content .= '</div>';

            $shortcode_content .= '<div class="products_category">';
                foreach( $prod_categories as $prod_cat ) {
                        $shortcode_content .= '<div id="categoryid_'.$prod_cat->term_id.'" class="products_by_category '.$prod_cat->name.'">'.do_shortcode('[product_category columns="'.$number_of_columns.'" per_page="'.$number_of_products_by_category.'" category="'.$prod_cat->slug.'"]').'</div>';
                }
            $shortcode_content .= '</div>';
        $shortcode_content .= '</div>';

    wp_reset_postdata();

    return $shortcode_content;
}
add_shortcode('shop-categories-with-thumbnails', 'modeltheme_shop_categories_with_thumbnails_shortcode');


/*---------------------------------------------*/
/*--- Masonry Banners ---*/
/*---------------------------------------------*/
function modeltheme_shop_sale_banner_shortcode( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'banner_img'            => '',
            'banner_button_text'    => '',
            'banner_button_url'     => ''
        ), $params ) );

    $banner = wp_get_attachment_image_src($banner_img, "large");

    $shortcode_content = '';
    #SALE BANNER
    $shortcode_content .= '<div class="sale_banner relative">';
            $shortcode_content .= '<img src="'.$banner[0].'" alt="'.$banner_button_text.'" />';
            $shortcode_content .= '<div class="sale_banner_holder">';
                $shortcode_content .= '<div class="banner_holder">';
                    $shortcode_content .= '<a href="'.$banner_button_url.'" class="button-winona" title="'.$banner_button_text.'" data-text="'.$banner_button_text.'"><span>'.$banner_button_text.'</span></a>';
                $shortcode_content .= '</div>';
            $shortcode_content .= '</div>';
    $shortcode_content .= '</div>';
       
    return $shortcode_content;
}
add_shortcode('sale-banner', 'modeltheme_shop_sale_banner_shortcode');



/*---------------------------------------------*/
/*--- Masonry Banners ---*/
/*---------------------------------------------*/
function modeltheme_shop_masonry_banners_shortcode( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'default_skin_background_color'      => '',
            'dark_skin_background_color'         => '',
            'banner_1_img'                       => '',
            'banner_1_title'                     => '',
            'banner_1_count'                     => '',
            'banner_1_url'                       => '',
            'banner_2_img'                       => '',
            'banner_2_title'                     => '',
            'banner_2_count'                     => '',
            'banner_2_url'                       => '',
            'banner_3_img'                       => '',
            'banner_3_title'                     => '',
            'banner_3_count'                     => '',
            'banner_3_url'                       => '',
            'banner_4_img'                       => '',
            'banner_4_title'                     => '',
            'banner_4_count'                     => '',
            'banner_4_url'                       => ''
        ), $params ) );

    
    
    $shortcode_content = '';

    $shortcode_content .= '<style type="text/css" scoped>
        .masonry_banner.masonry_banner.default-skin {
            background-color: '.$default_skin_background_color.'!important;
        }
        .masonry_banner.masonry_banner.dark-skin {
            background-color: '.$dark_skin_background_color.'!important;
        }
    </style>';
    $shortcode_content .= '<div class="masonry_banners banners_column">';

        $img1 = wp_get_attachment_image_src($banner_1_img, "large");
        $img2 = wp_get_attachment_image_src($banner_2_img, "large");
        $img3 = wp_get_attachment_image_src($banner_3_img, "large");
        $img4 = wp_get_attachment_image_src($banner_4_img, "large");

        $shortcode_content .= '<div class="vc_col-md-6">';
            #IMG #1
            $shortcode_content .= '<div class="masonry_banner default-skin">';
                $shortcode_content .= '<a href="'.$banner_1_url.'" class="relative">';
                    $shortcode_content .= '<img src="'.$img1[0].'" alt="'.$banner_1_title.'" />';
                    $shortcode_content .= '<div class="masonry_holder">';
                        $shortcode_content .= '<h3 class="category_name">'.$banner_1_title.'</h3>';
                         $shortcode_content .= '<p class="category_count">'.$banner_1_count.'</p>';
                        $shortcode_content .= '<span class="read-more">'.esc_attr__('VIEW MORE', 'modeltheme').'</span>';
                    $shortcode_content .= '</div>';
                $shortcode_content .= '</a>';
            $shortcode_content .= '</div>';
            #IMG #2
            $shortcode_content .= '<div class="masonry_banner dark-skin">';
                $shortcode_content .= '<a href="'.$banner_2_url.'" class="relative">';
                    $shortcode_content .= '<img src="'.$img2[0].'" alt="'.$banner_2_title.'" />';
                    $shortcode_content .= '<div class="masonry_holder">';
                        $shortcode_content .= '<h3 class="category_name">'.$banner_2_title.'</h3>';
                         $shortcode_content .= '<p class="category_count">'.$banner_2_count.'</p>';
                        $shortcode_content .= '<span class="read-more">'.esc_attr__('VIEW MORE', 'modeltheme').'</span>';
                    $shortcode_content .= '</div>';
                $shortcode_content .= '</a>';
            $shortcode_content .= '</div>';
        $shortcode_content .= '</div>';

        $shortcode_content .= '<div class="vc_col-md-6">';
            #IMG #3
            $shortcode_content .= '<div class="masonry_banner dark-skin">';
                $shortcode_content .= '<a href="'.$banner_3_url.'" class="relative">';
                    $shortcode_content .= '<img src="'.$img3[0].'" alt="'.$banner_3_title.'" />';
                    $shortcode_content .= '<div class="masonry_holder">';
                        $shortcode_content .= '<h3 class="category_name">'.$banner_3_title.'</h3>';
                         $shortcode_content .= '<p class="category_count">'.$banner_3_count.'</p>';
                        $shortcode_content .= '<span class="read-more">'.esc_attr__('VIEW MORE', 'modeltheme').'</span>';
                    $shortcode_content .= '</div>';
                $shortcode_content .= '</a>';
            $shortcode_content .= '</div>';
            #IMG #4
            $shortcode_content .= '<div class="masonry_banner default-skin">';
                $shortcode_content .= '<a href="'.$banner_4_url.'" class="relative">';
                    $shortcode_content .= '<img src="'.$img4[0].'" alt="'.$banner_4_title.'" />';
                    $shortcode_content .= '<div class="masonry_holder">';
                        $shortcode_content .= '<h3 class="category_name">'.$banner_4_title.'</h3>';
                         $shortcode_content .= '<p class="category_count">'.$banner_4_count.'</p>';
                        $shortcode_content .= '<span class="read-more">'.esc_attr__('VIEW MORE', 'modeltheme').'</span>';
                    $shortcode_content .= '</div>';
                $shortcode_content .= '</a>';
            $shortcode_content .= '</div>';
        $shortcode_content .= '</div>';
    $shortcode_content .= '</div>';

    return $shortcode_content;
}
add_shortcode('shop-masonry-banners', 'modeltheme_shop_masonry_banners_shortcode');



/*---------------------------------------------*/
/*--- 27. Call to action ---*/
/*---------------------------------------------*/
function modeltheme_shop_feature_shortcode( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'heading'       => '',
            'subheading'    => '',
            'icon'          => ''
        ), $params ) );

    $shortcode_content = '<div class="shop_feature">';
        $shortcode_content .= '<div class="pull-left shop_feature_icon">';
            $shortcode_content .= '<i class="'.$icon.'"></i>';
        $shortcode_content .= '</div>';
        $shortcode_content .= '<div class="pull-left shop_feature_description">';
            $shortcode_content .= '<h4>'.$heading.'</h4>';
            $shortcode_content .= '<p>'.$subheading.'</p>';
        $shortcode_content .= '</div>';
    $shortcode_content .= '</div>';
    return $shortcode_content;
}
add_shortcode('shop-feature', 'modeltheme_shop_feature_shortcode');

/*---------------------------------------------*/
/*--- 28. Video Popup ---*/
/*---------------------------------------------*/
function wega_video_popup_shortcode($params, $content) {

  extract( shortcode_atts( 
    array(
      'video_icon'      => '',
      'video_url'       => '',
      'button_bg_color' => '',
      'button_color'    => '',
  ), $params ) );

  $html = '';    

  $html .= '<a href="#mt-video-modal" class="mt-modal_video_button" data-toggle="modal"><i class="'.esc_html__($video_icon).'"></i></a>
  <div id="mt-video-modal" class="modal fade">
      <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe id="Video" class="embed-responsive-item" width="1000px" height="520px" src="'.esc_url($video_url).'" allowfullscreen></iframe>
                </div>
              </div>
          </div>
      </div>
  </div>
  <script type="text/javascript">
      jQuery(document).ready(function(){
          /* Get iframe src attribute value i.e. YouTube video url
          and store it in a variable */
          
          /* Assign empty url value to the iframe src attribute when
          modal hide, which stop the video playing */
          jQuery("#MT-Video-Modal").on("hide.bs.modal", function(){
              jQuery("#Video").attr("src", " ");
          });
          
          /* Assign the initially stored url back to the iframe src
          attribute when modal is displayed again */
          jQuery("#MT-Video-Modal").on("show.bs.modal", function(){
              jQuery("#Video").attr("src", "'.esc_url($video_url).'");
          });
      });
  </script>

  <style type="text/css" scoped>
      a.mt-modal_video_button {
          background-color: '.esc_html($button_bg_color).'!important;
          color: '.esc_html($button_color).'!important;
      }
  </style>';
  return $html;
}
add_shortcode('wega-video-popup', 'wega_video_popup_shortcode');



if (function_exists('vc_map')) {
#30. Sale banner
vc_map( array(
   "name" => esc_attr__("Wega - SALE BANNER", 'modeltheme'),
   "base" => "sale-banner",
   "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
   "icon" => "modeltheme_shortcode",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr__("Banner Image", 'modeltheme'),
         "param_name" => "banner_img",
         "value" => esc_attr__("#", 'modeltheme')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr__("Banner button text", 'modeltheme'),
         "param_name" => "banner_button_text",
         "value" => esc_attr__("Read more", 'modeltheme')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => esc_attr__("Banner button url", 'modeltheme'),
         "param_name" => "banner_button_url",
         "value" => esc_attr__("#", 'modeltheme')
      )
   )
));  

    // $post_category_tax = get_terms('product_cat');
    $post_category_tax = get_terms( 'product_cat', array(
        'parent'      => '0'
    ));
    $post_category = array();
    if ( class_exists( 'WooCommerce' ) ) {
        if ($post_category_tax) {
            foreach ( $post_category_tax as $term ) {
               $post_category[$term->name] = $term->slug;
            }
        }
    }

    #31. Products by Category
    vc_map( array(
       "name" => esc_attr__("Wega - Products by Category", 'modeltheme'),
       "base" => "shop-categories-with-thumbnails",
       "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
       "icon" => "modeltheme_shortcode",
       "params" => array(
          array(
             "group" => "Settings",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Select Products Category", 'modeltheme'),
             "param_name" => "category",
             "description" => esc_attr__("Please select blog category", 'modeltheme'),
             "std" => 'Default value',
             "value" => $post_category
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Number of categories to show", 'modeltheme'),
             "param_name" => "number"
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Number of products to show for each category", 'modeltheme'),
             "param_name" => "number_of_products_by_category"
          ),
          array(
             "group" => "Settings",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Show categories without products?", 'modeltheme'),
             "param_name" => "hide_empty",
             "std" => 'true',
             "value" => array(
              'Yes'     => 'true',
              'No'        => 'false'
             ),
          ),
          array(
             "group" => "Settings",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Products per column", 'modeltheme'),
             "param_name" => "number_of_columns",
             "std" => '2',
             "value" => array(
              '2'        => '2',
              '3'        => '3',
              '4'        => '4'
             ),
          )
       )
    ));
    
    #29. Masonry banners
    vc_map( array(
       "name" => esc_attr__("Wega - Masonry Banners", 'modeltheme'),
       "base" => "shop-masonry-banners",
       "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
       "icon" => "modeltheme_shortcode",
       "params" => array(
          
          array(
             "group" => "Settings",
             "type" => "attach_image",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#1 Banner Image", 'modeltheme'),
             "param_name" => "banner_1_img",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#1 Banner Title", 'modeltheme'),
             "param_name" => "banner_1_title",
             "value" => esc_attr__("Sofas", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#1 Banner Subtitle", 'modeltheme'),
             "param_name" => "banner_1_count"
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#1 Banner Link", 'modeltheme'),
             "param_name" => "banner_1_url",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "attach_image",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#2 Banner Image", 'modeltheme'),
             "param_name" => "banner_2_img",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#2 Banner Title", 'modeltheme'),
             "param_name" => "banner_2_title",
             "value" => esc_attr__("Beds", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#2 Banner Subtitle", 'modeltheme'),
             "param_name" => "banner_2_count"
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#2 Banner Link", 'modeltheme'),
             "param_name" => "banner_2_url",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "attach_image",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#3 Banner Image", 'modeltheme'),
             "param_name" => "banner_3_img",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#3 Banner Title", 'modeltheme'),
             "param_name" => "banner_3_title",
             "value" => esc_attr__("Chairs", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#3 Banner Subtitle", 'modeltheme'),
             "param_name" => "banner_3_count"
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#3 Banner Link", 'modeltheme'),
             "param_name" => "banner_3_url",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "attach_image",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#4 Banner Image", 'modeltheme'),
             "param_name" => "banner_4_img",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#4 Banner Title", 'modeltheme'),
             "param_name" => "banner_4_title",
             "value" => esc_attr__("Chairs", 'modeltheme')
          ),
           array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#4 Banner Subtitle", 'modeltheme'),
             "param_name" => "banner_4_count"
          ),
          array(
             "group" => "Settings",
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("#4 Banner Link", 'modeltheme'),
             "param_name" => "banner_4_url",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Styling",
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Default skin background color", 'modeltheme'),
             "param_name" => "default_skin_background_color"
          ),
          array(
             "group" => "Styling",
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Dark skin background color", 'modeltheme'),
             "param_name" => "dark_skin_background_color"
          )
       )
    ));  
    vc_map( array(
       "name" => esc_attr__("Wega - Shop feature", 'modeltheme'),
       "base" => "shop-feature",
       "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
       "icon" => "modeltheme_shortcode",
       "params" => array(
          array(
            "type" => "dropdown",
            "heading" => esc_attr__("Icon class(FontAwesome)", 'modeltheme'),
            "param_name" => "icon",
            "std" => 'fa fa-youtube-play',
            "holder" => "div",
            "class" => "",
            "value" => $fa_list
          ),
          array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Title", 'modeltheme'),
             "param_name" => "heading"
          ),
          array(
             "type" => "textarea",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Description", 'modeltheme'),
             "param_name" => "subheading"
          )
       )
    ));
    #28. Video Popup
    vc_map( array(
       "name" => esc_attr__("Wega - Video Popup", 'modeltheme'),
       "base" => "wega-video-popup",
       "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
       "icon" => "modeltheme_shortcode",
       "params" => array(
          array(
            "type" => "dropdown",
            "heading" => esc_attr__("Icon class(FontAwesome)", 'modeltheme'),
            "param_name" => "video_icon",
            "std" => 'fa fa-youtube-play',
            "holder" => "div",
            "class" => "",
            "value" => $fa_list
          ),
          array(
             "type" => "textfield",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Button url", 'modeltheme'),
             "param_name" => "video_url",
             "value" => esc_attr__("#", 'modeltheme')
          ),
          array(
             "group" => "Styling",
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Button Color", 'modeltheme'),
             "param_name" => "button_color"
          ),
          array(
             "group" => "Styling",
             "type" => "colorpicker",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Button Background Color", 'modeltheme'),
             "param_name" => "button_bg_color"
          ),
       )
    ));  
}
?>