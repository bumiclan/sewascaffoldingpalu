<?php 
/**
||-> Shortcode: BlogPos01
*/
function modeltheme_shortcode_blogpost01($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           =>'',
            'category'            => '',
            'number'              =>'',
            'blog_post_day_color' =>'',
            'columns'             =>'',
            'text_link_hover'         => ''
        ), $params ) );
    
    $html = '';
    
    $text_link_hover_title = '';
    if(!empty($text_link_hover)) {
        $text_link_hover_title = $text_link_hover;
    } else {
        $text_link_hover_title = '#60d158';
    }
    
    $html .= '<div class="blog-posts simple-posts blog-posts-shortcode wow '.$animation.'">';
    $html .= '<div class="row">';
    $args_blogposts = array(
      'posts_per_page'   => $number,
      'orderby'          => 'post_date',
      'order'            => 'DESC',
      'post_type'        => 'post',
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => $category
        )
      ),
      'post_status'      => 'publish' 
    ); 
    $blogposts = get_posts($args_blogposts);
    foreach ($blogposts as $blogpost) {
        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ),'northwest_post_pic700x450' );
        
        $content_post   = get_post($blogpost->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);
        if ($thumbnail_src) {
            $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />';
            $post_col = 'col-md-12';
        }else{
            $post_col = 'col-md-12 no-featured-image';
            $post_img = '';
        }
        $author_id = get_post_field ('post_author', $blogpost->ID);
        $display_name = get_the_author_meta( 'display_name' , $author_id ); 
      
          $html.='<div class="'.esc_attr($columns).'">
                      <article class="single-post list-view">
                        <div class="blog_custom">
                          <!-- POST THUMBNAIL -->
                          <div class="col-md-12 post-thumbnail">
                              <a class="relative" href="'.get_permalink($blogpost->ID).'">
                                <div class="featured_image_blog">'
                                  .$post_img.
                                  '<div class="flex-zone">
                                     <div class="flex-zone-inside"><i class="fa fa-plus" aria-hidden="true"></i></div>
                                  </div>
                                </div>
                              </a>
                          </div>
                          <!-- POST DETAILS -->
                          <div class="post-details '.$post_col.'">
                            <div class="post-category-comment-date">
                                <span class="post-date">'.get_the_time('F j, Y', $blogpost->ID).'</span>
                            </div>
                            <h3 class="post-name row">
                              <a href="'.get_permalink($blogpost->ID).'" title="'. $blogpost->post_title .'">'. $blogpost->post_title .'</a>
                            </h3>
                            <div class="post-excerpt row">
                                <p>'.strip_tags(modeltheme_excerpt_limit($content, 9)).'...</p>
                                <div class="text-element content-element">
                                    <p> <a class="more-link" href="'.get_permalink($blogpost->ID).'">'.esc_attr__('read more','modeltheme').'</a></p>
                                </div>
                            </div>
                          </div>                       
                        </div>
                      </article>
                    </div>';
      }
    $html .= '</div>';
    $html .= '</div>';
    return $html;
}
add_shortcode('blogpost01', 'modeltheme_shortcode_blogpost01');
/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';
	$post_category_tax = get_terms('category');
	$post_category = array();
	foreach ( $post_category_tax as $term ) {
		$post_category[$term->name] = $term->slug;
	}
    vc_map( array(
     "name" => esc_attr__("MT - Blog Posts", 'modeltheme'),
     "base" => "blogpost01",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'modeltheme' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'modeltheme' )
        ),
        array(
           "type" => "dropdown",
           "group" => "Options",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Select Blog Category"),
           "param_name" => "category",
           "description" => esc_attr__("Please select blog category"),
           "std" => 'Default value',
           "value" => $post_category
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Columns"),
           "param_name" => "columns",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('2 columns')     => 'vc_col-sm-6',
            esc_attr__('3 columns')     => 'vc_col-sm-4'
           )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Choose blog post day color", 'modeltheme' ),
          "param_name" => "blog_post_day_color",
          "value" => '', //Default color
          "description" => esc_attr__( "Choose blog post day color", 'modeltheme' )
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__("Choose title hover color", 'modeltheme'),
            "param_name" => "text_link_hover",
            "description" => "Choose hover color",
            "value" => '#60d158', //Default color
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