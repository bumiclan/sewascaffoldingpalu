<?php


//GET HEADER TITLE/BREADCRUMBS AREA
if (!function_exists('wega_header_title_breadcrumbs')) {
    function wega_header_title_breadcrumbs(){

        $css_inline = '';
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'wega_breadcrumbs' );
        if ( is_single() || is_search() || is_category() || is_tag() || is_author() || is_archive() || is_home() ) {
            $css_inline = 'background-image:url('.get_template_directory_uri().'/images/breadcumbs-section.jpg);';
        } else {
            if ( is_page() ) {
                if (!empty($thumbnail_src[0])) {
                    $css_inline = 'background-image:url('.esc_url($thumbnail_src[0]).');';
                } else {
                    $css_inline = 'background-image:url('.get_template_directory_uri().'/images/breadcumbs-section.jpg);';
                }
            }
        }

        echo '<div class="header-title-breadcrumb relative">';
            echo '<div class="header-title-breadcrumb-overlay text-center" style="'.esc_attr($css_inline).'">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-left">';
                                        if (class_exists( 'WooCommerce' ) && is_product()) {
                                            echo '<h1>'.esc_html__( 'Shop', 'wega' ) . get_search_query().'</h1>';
                                        }elseif (class_exists( 'WooCommerce' ) && is_shop()) {
                                            echo '<h1>'.esc_html__( 'Shop', 'wega' ) . get_search_query().'</h1>';
                                        }elseif (is_single()) {
                                            echo '<h1>'.get_the_title().'</h1>';
                                        }elseif (is_page()) {
                                            echo '<h1>'.get_the_title().'</h1>';
                                        }elseif (is_search()) {
                                            echo '<h1>'.esc_html__( 'Search Results for: ', 'wega' ) . get_search_query().'</h1>';
                                        }elseif (is_category()) {
                                            echo '<h1>'.esc_html__( 'Category: ', 'wega' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                                        }elseif (is_tag()) {
                                            echo '<h1>'.esc_html__( 'Tag Archives: ', 'wega' ) . single_tag_title( '', false ).'</h1>';
                                        }elseif (is_author() || is_archive()) {
                                            echo '<h1>'.get_the_archive_title() . get_the_archive_description().'</h1>';
                                        }elseif (is_home()) {
                                            echo '<h1>'.esc_html__( 'From the Blog', 'wega' ).'</h1>';
                                        }else {
                                            echo '<h1>'.get_the_title().'</h1>';
                                        }
                          echo '</div>';
                                    if(function_exists('bcn_display')){
                                    echo '<div class="col-md-12">';
                                        echo '<div class="breadcrumbs breadcrumbs-navxt" typeof="BreadcrumbList" vocab="https://schema.org/">';
                                            echo bcn_display();
                                        echo '</div>
                                        </div>';
                                    }
                                echo '</div>
                            </div>
                        </div>';

        echo'</div>';
        echo '<div class="clearfix"></div>';

    }
}

// always display rating stars
if (!function_exists('wega_woocommerce_product_get_rating_html')) {
    function wega_woocommerce_product_get_rating_html( $rating_html, $rating, $count ) { 
        $rating_html  = '<div class="star-rating">';
        $rating_html .= wc_get_star_rating_html( $rating, $count );
        $rating_html .= '</div>';

        return $rating_html; 
    };  
}
add_filter( 'woocommerce_product_get_rating_html', 'wega_woocommerce_product_get_rating_html', 10, 3 );


// Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'wega_new_loop_shop_per_page', 20 );

if (!function_exists('wega_new_loop_shop_per_page')) {
    function wega_new_loop_shop_per_page( $cols ) {
      $cols = 8;
      return $cols;
    }
}


// Header Group Info Blocks
function wega_header_group_info_blocks() {
    echo '<div class="header-infos">';

        if(wega('mt_divider_header_info_1_status') == true){
           // HEADER INFO 1 //
            echo '<div class="pull-left header-info-group">';
                echo '<div class="header-info-icon pull-left text-center">';
                    if(wega('mt_divider_header_info_1_media_type') == true){
                        echo '<i class="'.esc_attr(wega('mt_divider_header_info_1_faicon')).'"></i>';
                    }else{
                        echo '<img src="'.esc_url(wega('mt_divider_header_info_1_image_icon','url')).'" alt="image_icon" />';
                    }
                echo '</div>';
                echo '<div class="header-info-labels pull-left">';
                    echo '<h3>'.esc_attr(wega('mt_divider_header_info_1_heading1')).'</h3>';
                echo '<div class="clearfix"></div>';
                    echo '<h5>'.esc_attr(wega('mt_divider_header_info_1_heading3')).'</h5>';
                echo '</div>';
            echo '</div>';
        }

        if(wega('mt_divider_header_info_2_status') == true){
            // HEADER INFO 2 //
            echo '<div class="pull-left header-info-group">';
                echo '<div class="header-info-icon pull-left text-center">';
                    if(wega('mt_divider_header_info_2_media_type') == true){
                        echo '<i class="'.esc_attr(wega('mt_divider_header_info_2_faicon')).'"></i>';
                    }else{
                        echo '<img src="'.esc_url(wega('mt_divider_header_info_2_image_icon','url')).'" alt="image_icon" />';
                    }
                echo '</div>';
                echo '<div class="header-info-labels pull-left">'; 
                    echo '<h3><a href="tel:'.esc_attr(str_replace(' ', '', esc_attr(wega('mt_divider_header_info_2_heading1')))).'">'.esc_attr(wega('mt_divider_header_info_2_heading1')).'</a></h3>';
                    echo '<div class="clearfix"></div>';
                    echo '<h5><a href="mailto:'.esc_attr(wega('mt_divider_header_info_2_heading3')).'">'.esc_attr(wega('mt_divider_header_info_2_heading3')).'</a></h5>';
                echo '</div>';
            echo '</div>';
        }

        if(wega('mt_divider_header_info_3_status') == true){
            // HEADER INFO 3 //
            echo '<div class="pull-left header-info-group">';
                echo '<div class="header-info-icon pull-left text-center">';
                    if(wega('mt_divider_header_info_3_media_type') == true){
                        echo '<i class="'.esc_attr(wega('mt_divider_header_info_3_faicon')).'"></i>';
                    }else{
                        echo '<img src="'.esc_url(wega('mt_divider_header_info_3_image_icon','url')).'" alt="image_icon" />';
                    }
                echo '</div>';
                echo '<div class="header-info-labels pull-left">';
                    echo '<h3>'.esc_attr(wega('mt_divider_header_info_3_heading1')).'</h3>';
                    echo '<div class="clearfix"></div>';
                    echo '<h5>'.esc_attr(wega('mt_divider_header_info_3_heading3')).'</h5>';
                echo '</div>';
            echo '</div>';
        }

        if(wega('mt_header_button_status') == true){

            $header_link_btn_value = '';
            $header_link_url = '#';
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                $header_link_url = wega('mt_header_button_url');
                $header_link_btn_text = wega('mt_header_button_text');
            }

            if ( class_exists( 'WooCommerce' ) ) {
                if (is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page()) {
                    $header_link_url = wc_get_cart_url();
                    $header_link_btn_text = esc_html__('My Cart', 'wega');
                    $header_link_btn_value = '<span class="cart-number">('.sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'wega' ), WC()->cart->get_cart_contents_count() ).')</span>';
                }
            }

            // HEADER BUTTON //
            echo '<div class="pull-left header-info-group header-button">';
                echo '<div class="header-button-labels pull-left">';
                    echo '<a href="'.esc_url($header_link_url).'" class="button-winona btn btn-medium">'.esc_html($header_link_btn_text).$header_link_btn_value.'</a>';
                echo '</div>';
            echo '</div>';
        }

    echo '</div>';
}
add_action( 'wega_header_group_info_blocks', 'wega_header_group_info_blocks' );


if (!function_exists('wega_woocommerce_header_add_to_cart_fragment_qty_only')) {
    function wega_woocommerce_header_add_to_cart_fragment_qty_only( $fragments ) {
        ob_start();
        ?>
         <span class="cart-number">(<?php echo sprintf ( esc_html__('%d', 'wega'), WC()->cart->get_cart_contents_count() ); ?>)</span>
        <?php
        $fragments['span.cart-number'] = ob_get_clean();
        return $fragments;
    } 
    add_filter( 'woocommerce_add_to_cart_fragments', 'wega_woocommerce_header_add_to_cart_fragment_qty_only', 30, 1 );
}