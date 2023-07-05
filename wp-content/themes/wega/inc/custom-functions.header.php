<?php
/**
CUSTOM HEADER FUNCTIONS
*/




/**
Function name: 				wega_current_header_template()			
Function description:		Gets the current header variant from theme options. If page has custom options, theme options will be overwritten.
*/
function wega_current_header_template(){

	global  $wega;


    // PAGE METAS
    $custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
	$sidebar_headers = array('header6', 'header7', 'header14', 'header15');

	// THEME INIT
    $theme_init = new wega_init_class;

	$html = '';

    if (is_page() && $header_v) {
        if ($custom_header_activated && $custom_header_activated == 'yes') {
			if (!in_array($header_v, $sidebar_headers)){
            	$html .= get_template_part( 'templates/template-'.esc_html($header_v) ); ?>

        	<?php }else{ ?>

        	<?php }
        }?>
    <?php }else{
    	if (isset($wega['mt_header_layout'])) {
			if (!in_array($header_v, $sidebar_headers)){
    			$html .= get_template_part( 'templates/template-'.esc_html($wega['mt_header_layout']) );
        	}
    	}else{
    		$html .= get_template_part( 'templates/template-'.esc_html($theme_init->wega_get_header_variant()) );
    	}
    }
    return $html;
}


/**
||-> FUNCTION: GET GOOGLE FONTS FROM THEME OPTIONS PANEL
*/

function wega_get_site_fonts(){
    global  $wega;
    $fonts_string = 'Yantramanav:regular,300,400,500,600,700,bold%7C';
    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	    if (isset($wega['mt_google_fonts_select'])) {
	        $i = 0;
	        $len = count($wega['mt_google_fonts_select']);
	        foreach(array_keys($wega['mt_google_fonts_select']) as $key){
	            $font_url = str_replace(' ', '+', $wega['mt_google_fonts_select'][$key]);
	            
	            if ($i == $len - 1) {
	                // last
	                $fonts_string .= $font_url;
	            }else{
	                $fonts_string .= $font_url . '|';
	            }
	            $i++;
	        }
	        // fonts url
	        $fonts_url = add_query_arg( 'family', $fonts_string, "//fonts.googleapis.com/css" );
	        // enqueue fonts
	        wp_enqueue_style( 'wega-fonts', $fonts_url, array(), '1.0.0' );
	    }
	} else {
        $font_url = str_replace(' ', '+', 'Poppins:300,regular,500,600,700,latin-ext,latin,devanagari%7CYantramanav:regular,300,400,500,600,700,bold');
        $fonts_url = add_query_arg( 'family', $font_url, "//fonts.googleapis.com/css" );
        wp_enqueue_style( 'wega-fonts-fallback', $fonts_url, array(), '1.0.0' );
    }
}
add_action('wp_enqueue_scripts', 'wega_get_site_fonts');


// Add specific CSS class by filter
if (!function_exists('wega_body_classes')) {
	add_filter( 'body_class', 'wega_body_classes' );
	function wega_body_classes( $classes ) {

		global  $wega;
		$theme_init = new wega_init_class;

	    $plugin_redux_status = '';
	    if ( !class_exists( 'ReduxFrameworkPlugin' ) ) {
	        $plugin_redux_status = 'missing-redux-framework';
	    } else {
	    	$plugin_redux_status = 'added-redux-framework';
	    }
	    $plugin_modeltheme_status = '';
	    if ( !function_exists('modeltheme_framework')) {
	        $plugin_modeltheme_status = 'missing-modeltheme-framework';
	    }

		// POST META FOOTER STATUS
	    $row1_status = get_post_meta( get_the_ID(), 'mt_footer_row1_status', true );
	    $row2_status = get_post_meta( get_the_ID(), 'mt_footer_row2_status', true );
	    $row3_status = get_post_meta( get_the_ID(), 'mt_footer_row3_status', true );
	    $footer_bottom_bar = get_post_meta( get_the_ID(), 'mt_footer_bottom_bar', true );
	    $mt_page_preloader_status = get_post_meta( get_the_ID(), 'mt_page_preloader_status', true );

		$footers_row1_status = '';
		$footers_row2_status = '';
		$footers_row3_status = '';
		$footers_status = '';
		$page_preloader_status = '';

		if (is_single() || is_page()) {
			# code...
			if ($row1_status == 'on') {
				$footers_row1_status = 'footer_row1_off';
			}
			if ($row2_status == 'on') {
				$footers_row2_status = 'footer_row2_off';
			}
			if ($row3_status == 'on') {
				$footers_row3_status = 'footer_row3_off';
			}
			if ($footer_bottom_bar == 'on') {
				$footers_status = 'footer_bottom_bar_off';
			}
			if ($mt_page_preloader_status == 'on') {
				$page_preloader_status = 'page_preloader_off';
			}
		}
		

	    // CHECK IF FEATURED IMAGE IS FALSE(Disabled)
	    $post_featured_image = '';
    	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		    if (is_singular('post')) {
		        if ($wega['mt_post_featured_image'] == false) {
		            $post_featured_image = 'hide_post_featured_image';
		        }else{
		            $post_featured_image = '';
		        }
		    }
	    }

	    // CHECK IF THE NAV IS STICKY
	    $is_nav_sticky = '';
    	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
		    if ($wega['mt_is_nav_sticky'] == true) {
		        // If is sticky
		        $is_nav_sticky = 'is_nav_sticky';
		    }else{
		        // If is not sticky
		        $is_nav_sticky = '';
		    }
	    }

	    // CHECK IF HEADER IS SEMITRANSPARENT
	    $semitransparent_header_meta = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
	    $semitransparent_header = '';
	    if ($semitransparent_header_meta == 'enabled') {
	        // If is semitransparent
	        $semitransparent_header = 'is_header_semitransparent';
	    }

	    // DIFFERENT HEADER LAYOUT TEMPLATES
	    $header_status = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
	    $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );

	    
	    $header_version = $theme_init->wega_get_header_variant();
	    if (isset($header_status) && $header_status == 'yes') {
	    	$header_version = $header_v;
	    }else{
	    	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			    if ($wega['mt_header_layout']) {
			        // Header Layout #1
			        $header_version = $wega['mt_header_layout'];
			    }
		    }
	    }


	    // HEADER NAVIGATION HOVER STYLE
		$header_nav_hover = $theme_init->wega_navstyle_variant();
		$header_nav_submenu_variant = $theme_init->wega_get_header_nav_submenu_variant();
		$sidebar_widgets_variant = $theme_init->wega_get_sidebar_widgets_variant();

	    $classes[] = esc_html($header_nav_submenu_variant) . ' ' . esc_html($sidebar_widgets_variant) . ' ' . esc_html($plugin_modeltheme_status) . ' ' . esc_html($plugin_redux_status) . ' ' . esc_html($header_nav_hover) . ' ' . esc_html($page_preloader_status) . ' ' . esc_html($footers_status) . ' ' . esc_html($footers_row1_status) . ' ' . esc_html($footers_row2_status) . ' ' . esc_html($footers_row3_status) . ' ' . esc_html($post_featured_image) . ' ' . esc_html($is_nav_sticky) . ' ' . esc_html($header_version) . ' ' . esc_html($semitransparent_header) . ' ';

	    return $classes;

	}

	/**
	||-> FUNCTION: GET DYNAMIC CSS
	*/
	add_action('wp_enqueue_scripts', 'wega_dynamic_css' );
	function wega_dynamic_css(){

	    $html = '';

	    // THEME INIT
	    $theme_init = new wega_init_class;

		// BEGIN: REVAMP SKIN COLORS ===============================================================================
		$skin_main_bg = $theme_init->wega_get_fallback_primary_color(); //Fallback primary background color
		$skin_main_bg_hover = $theme_init->wega_get_fallback_primary_color_hover(); //Fallback primary background hover color
		$skin_main_texts = $theme_init->wega_get_fallback_main_texts(); //Fallback main text color
		$skin_semitransparent_blocks = $theme_init->wega_get_fallback_semitransparent_blocks(); //Fallback semitransparent blocks


		$mt_preloader_color = '#151515';

		// CUSTOM PAGE METABOXES
		$custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
	    $mt_custom_main_color = get_post_meta( get_the_ID(), 'mt_custom_main_color', true );
	    $mt_custom_main_hover_color = get_post_meta( get_the_ID(), 'mt_custom_main_hover_color', true );

	    if($custom_header_activated == 'yes' && isset($mt_custom_main_color) && isset($mt_custom_main_hover_color) && !empty($mt_custom_main_color) && !empty($mt_custom_main_hover_color)) {
	    	$skin_main_bg = $mt_custom_main_color;
			$skin_main_bg_hover = $mt_custom_main_hover_color;

			$html .= '
			    body #navbar .menu-item.selected > a,
			    body #navbar .menu-item:hover > a,
			    body #navbar .current_page_item > a{
			        color: '.esc_html($skin_main_bg).' !important;
			    }
			    body #navbar .menu-item.free-consultation:hover > a{
			    	color: #fff !important;
			    }
			    .header-infos .header-info-group a:hover span,
			    body #navbar .menu-item.selected > a, 
			    body #navbar .menu-item:hover > a, 
			    body #navbar .current_page_item > a, 
			    .header-infos .header-info-group a:hover i{
			        color: '.esc_html($skin_main_bg).' !important;
			    }

			    ';

	    } else {
	    	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				$skin_main_bg = wega('mt_predefined_skin_custom_skin_main_bg');
				$skin_main_bg_hover = wega('mt_predefined_skin_custom_skin_main_bg_hover');
				$skin_main_texts = wega('mt_main_texts_color');
	    	}
		}
		// END: REVAMP SKIN COLORS ===============================================================================

	    //PAGE PRELOADER BACKGROUND COLOR
	    $mt_page_preloader = get_post_meta( get_the_ID(), 'mt_page_preloader', true );
	    $mt_page_preloader_bg_color = get_post_meta( get_the_ID(), 'mt_page_preloader_bg_color', true );
	    if (isset($mt_page_preloader) && $mt_page_preloader == 'enabled' && isset($mt_page_preloader_bg_color)) {
	        $html .= 'body .wega_preloader_holder{
						background-color: '.esc_html($mt_page_preloader_bg_color).';
	        		}';
	    }

		// HEADER SEMITRANSPARENT - METABOX
		$custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
		$mt_header_info_custom_color = get_post_meta( get_the_ID(), 'mt_header_info_custom_color', true );
		$mt_header_custom_bg_color = get_post_meta( get_the_ID(), 'mt_header_custom_bg_color', true );
		$mt_header_semitransparent = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
	    if (isset($mt_header_semitransparent) == 'enabled') {
			$mt_header_semitransparentr_rgba_value = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value', true );
			$mt_header_semitransparentr_rgba_value_scroll = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value_scroll', true );
			$skin_info_custom_color = $mt_header_info_custom_color;

			if (isset($mt_header_custom_bg_color)) {
				list($r, $g, $b) = sscanf($mt_header_custom_bg_color, "#%02x%02x%02x");
			}else{
				$hexa = '#04ABE9'; //Theme Options Color
				list($r, $g, $b) = sscanf($hexa, "#%02x%02x%02x");
			}

			$html .= '
				.is_header_semitransparent header {
				    background: rgba('.esc_html($r).', '.esc_html($g).', '.esc_html($b).', '.esc_html($mt_header_semitransparentr_rgba_value).') none repeat scroll 0 0;
				}
				.is_header_semitransparent .sticky-wrapper.is-sticky .navbar-default .container{
				    background: rgba('.esc_html($r).', '.esc_html($g).', '.esc_html($b).', '.esc_html($mt_header_semitransparentr_rgba_value_scroll).') none repeat scroll 0 0;
				}
				.is_header_semitransparent .header1 .header-info-group h3,
				.is_header_semitransparent .header1 .header-info-group h5,
				header.header1 .header-info-group a,
				header.header1 .header-info-group span,
				header.header1 .social-links *{
					color: '.esc_html($skin_info_custom_color).';
				}
				.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover{
					background-color: '.esc_html($skin_main_texts).';
				}';

	    }



	    // THEME OPTIONS STYLESHEET
		// SEARCH ICON - CUSTOM STYLING
		if (wega('mt_header_is_search_custom_styling') == true) {
			 $html .= 'body header .right-side-social-actions .mt-search-icon i {
							color: '.wega('mt_header_search_color').' !important;
						}
						body header .right-side-social-actions .mt-search-icon:hover i {
							color: '.wega('mt_header_search_color_hover').' !important;
						}';
		}

		// BURGER SIDEBAR MENU - CUSTOM STYLING
		if (wega('mt_header_fixed_sidebar_menu_custom_styling') == true) {
			 $html .= 'body #mt-nav-burger span {
						background: '.wega('mt_header_fixed_sidebar_menu_color').' !important;
					}
					body #mt-nav-burger:hover span {
						background: '.wega('mt_header_fixed_sidebar_menu_color_hover').' !important;
					}';
		}


		// FALLBACKS for REDUX FRAMEWORK
		$breadcrumbs_delimitator = '/';
		$logo_max_width = '200';
		$text_selection_color = '#ffffff';
		$body_global_bg = '#ffffff';


		// HEADER RIGHT BUTTON
	    $mt_button_menu_custom_color = get_post_meta( get_the_ID(), 'mt_button_menu_custom_color', true );
	    $mt_button_menu_custom_color_hover = get_post_meta( get_the_ID(), 'mt_button_menu_custom_color_hover', true );

	    if ((isset($mt_button_menu_custom_color) && !empty($mt_button_menu_custom_color)) || (isset($mt_button_menu_custom_color_hover) && !empty($mt_button_menu_custom_color_hover))) {
	    	$html .= '
	    		body #navbar .menu-item.free-consultation > a{
					background:'.esc_html($mt_button_menu_custom_color).' !important;
				}
				body #navbar .menu-item.free-consultation:hover > a{
					background:'.esc_html($mt_button_menu_custom_color_hover).' !important;
				}';
	    }



		// REDUX FRAMEWORK CONDITIONS
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			$breadcrumbs_delimitator = wega('mt_breadcrumbs_delimitator');
			$logo_max_width = wega('mt_logo_max_width');
			$body_global_bg = wega('mt_body_global_bg');
			$mt_preloader_color = wega('mt_preloader_color');

		    // BACK TO TOP - CUSTOM STYLING
			if (wega('mt_backtotop_status') == true) {
				 $html .= '.back-to-top {
								background: '.wega('mt_backtotop_bg_color').';
							}
							.back-to-top i{
								color: '.wega('mt_backtotop_text_color').';
							}
							.back-to-top:hover {
								background: '.wega('mt_backtotop_bg_color_hover').';
							}
							.back-to-top:hover i{
								color: '.wega('mt_backtotop_text_color_hover').';
							}';
			}

			$html .= 'body #navbar .menu-item.free-consultation > a {
							background: '.wega('mt_call_to_action_btn_bg_color').';
							color: '.wega('mt_call_to_action_btn_text_color').';
						}
						body #navbar .menu-item.free-consultation:hover > a {
							background: '.wega('mt_call_to_action_btn_bg_color_hover').';
							color: '.wega('mt_call_to_action_btn_text_color_hover').';
						}';

		}

		// THEME OPTIONS STYLESHEET - Responsive SmartPhones
	    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	    $html .= ' body{
	                    font-family: '.wega('mt_body_typography','font-family').';
	               }
	               h1,
	               h1 span {
	                    font-family: "'.wega('mt_heading_h1','font-family').'";
	                    font-size: '.wega('mt_heading_h1','font-size').';
	               }
	               h2 {
	                    font-family: "'.wega('mt_heading_h2','font-family').'";
	                    font-size: '.wega('mt_heading_h2','font-size').';
	               }
	               h3 {
	                    font-family: "'.wega('mt_heading_h3','font-family').'";
	                    font-size: '.wega('mt_heading_h3','font-size').';
	               }
	               h4 {
	                    font-family: "'.wega('mt_heading_h4','font-family').'";
	                    font-size: '.wega('mt_heading_h4','font-size').';
	               } 
	               h5 {
	                    font-family: "'.wega('mt_heading_h5','font-family').'";
	                    font-size: '.wega('mt_heading_h5','font-size').';
	               } 
	               h6 {
	                    font-family: "'.wega('mt_heading_h6','font-family').'";
	                    font-size: '.wega('mt_heading_h6','font-size').';
	               } 
	               input,
	               textarea {
	                    font-family: '.wega('mt_inputs_typography','font-family').';
	               }  
	               input[type="submit"] {
	                    font-family: '.wega('mt_buttons_typography','font-family').';
	               } 
	    ';
	    // THEME OPTIONS STYLESHEET - Responsive SmartPhones


	    if (wega('mt_is_mobile_font') == true) {
	    $html .= '
	    			@media only screen and (max-width: 767px) {
	    				body h1,
	    				body h1 span{
	    					font-size: '.wega('mt_heading_h1_smartphones', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h1_smartphones', 'line-height').' !important;
	    				}
	    				body h2{
	    					font-size: '.wega('mt_heading_h2_smartphones', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h2_smartphones', 'line-height').' !important;
	    				}
	    				body h3{
	    					font-size: '.wega('mt_heading_h3_smartphones', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h3_smartphones', 'line-height').' !important;
	    				}
	    				body h4{
	    					font-size: '.wega('mt_heading_h4_smartphones', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h4_smartphones', 'line-height').' !important;
	    				}
	    				body h5{
	    					font-size: '.wega('mt_heading_h5_smartphones', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h5_smartphones', 'line-height').' !important;
	    				}
	    				body h6{
	    					font-size: '.wega('mt_heading_h6_smartphones', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h6_smartphones', 'line-height').' !important;
	    				}
	    			}
	    			';
	    	}
	   	}

	    // THEME OPTIONS STYLESHEET - Responsive Tablets

	    if (wega('mt_is_mobile_font') == true) {
	    $html .= '
	    			@media only screen and (min-width: 768px) and (max-width: 1024px) {
	    				body h1,
	    				body h1 span{
	    					font-size: '.wega('mt_heading_h1_tablets', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h1_tablets', 'line-height').' !important;
	    				}
	    				body h2{
	    					font-size: '.wega('mt_heading_h2_tablets', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h2_tablets', 'line-height').' !important;
	    				}
	    				body h3{
	    					font-size: '.wega('mt_heading_h3_tablets', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h3_tablets', 'line-height').' !important;
	    				}
	    				body h4{
	    					font-size: '.wega('mt_heading_h4_tablets', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h4_tablets', 'line-height').' !important;
	    				}
	    				body h5{
	    					font-size: '.wega('mt_heading_h5_tablets', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h5_tablets', 'line-height').' !important;
	    				}
	    				body h6{
	    					font-size: '.wega('mt_heading_h6_tablets', 'font-size').' !important;
	    					line-height: '.wega('mt_heading_h6_tablets', 'line-height').' !important;
	    				}
	    			}
	    			';
	    }

	    // THEME OPTIONS STYLESHEET
	    $html .= '.breadcrumb a::after {
		        	  content: "'.esc_html($breadcrumbs_delimitator).'";
		    	}
		    	body{
			        background: '.esc_html($body_global_bg).';
		    	}
	    		.logo img,
				.navbar-header .logo img {
					max-width: '.esc_html($logo_max_width).'px;
				}
			    ::selection{
			        color: '.esc_html($text_selection_color).';
			        background: '.esc_html($skin_main_bg).';
			    }
			    ::-moz-selection { /* Code for Firefox */
			        color: '.esc_html($text_selection_color).';
			        background: '.esc_html($skin_main_bg).';
			    }

			    a,
			    a:visited{
			        color: '.esc_html($skin_main_bg).';
			    }
			    a:focus,
			    a:hover{
			        color: '.esc_html($skin_main_bg_hover).';
			    }

			    /*------------------------------------------------------------------
			        COLOR
			    ------------------------------------------------------------------*/
				a, a:hover, a:focus, .mt_car--tax-type, span.amount, .widget_popular_recent_tabs .nav-tabs li.active a, .widget_product_categories .cat-item:hover, .widget_product_categories .cat-item a:hover, .widget_archive li:hover, .widget_archive li a:hover, .widget_categories .cat-item:hover, .widget_categories li a:hover, .pricing-table.recomended .button.solid-button, .pricing-table .table-content:hover .button.solid-button, .pricing-table.Recommended .button.solid-button, .pricing-table.recommended .button.solid-button, #sync2 .owl-item.synced .post_slider_title, #sync2 .owl-item:hover .post_slider_title, #sync2 .owl-item:active .post_slider_title, .pricing-table.recomended .button.solid-button, .pricing-table .table-content:hover .button.solid-button, .testimonial-author, .testimonials-container blockquote::before, .testimonials-container blockquote::after, .post-author > a, h2 span, label.error, .author-name, .prev-next-post a:hover, .prev-text, .wpb_button.btn-filled:hover, .next-text, .social ul li a:hover i, .wpcf7-form span.wpcf7-not-valid-tip, .text-dark .statistics .stats-head *, .wpb_button.btn-filled, .widget_meta a:hover, .widget_pages a:hover, .blogloop-v1 .post-name a:hover, .blogloop-v2 .post-name a:hover, .blogloop-v3 .post-name a:hover, .blogloop-v4 .post-name a:hover, .blogloop-v5 .post-name a:hover, .post-category-comment-date span a:hover, .list-view .post-details .post-category-comment-date a:hover, .simple_sermon_content_top h4, .page_404_v1 h1, .mt_cars--single-main-pic .post-name > a, .widget_recent_comments li:hover a, .list-view .post-details .post-name a:hover, .blogloop-v5 .post-details .post-sticky-label i, header.header2 .header-info-group .header_text_title strong, .widget_recent_entries_with_thumbnail li:hover a, .widget_recent_entries li a:hover, .blogloop-v1 .post-details .post-sticky-label i, .blogloop-v2 .post-details .post-sticky-label i, .blogloop-v3 .post-details .post-sticky-label i, .blogloop-v4 .post-details .post-sticky-label i, .blogloop-v5 .post-details .post-sticky-label i, .error-404.not-found h1, .list-view .post-details .post-excerpt .more-link:hover, .header4 header .right-side-social-actions .social-links a:hover i, .sidebar-content .widget_nav_menu li a:hover,.header1 .header-info-group i,.woocommerce-info::before,.member01_social a:hover, .contact-details i, footer .social-links a:hover i, .woocommerce .star-rating span,.related.products .star-rating span, .orange_subtitle, .members_img_holder .member01_position, .woocommerce .woocommerce-message::before, footer .footer-top .menu .menu-item a:hover,
					.widget_wega_recent_entries_with_thumbnail li:hover a, .woocommerce ul.products li.product .button:hover, .wega-contact-sidebar .wpcf7-submit:hover:focus,  body .get-a-consultation-sidebar .wega-contact .wpcf7-submit:active, .wega-contact-sidebar .wpcf7-submit:hover,.fixed-sidebar-menu .left-side .social-links a:hover i, .fixed-sidebar-menu .widget_wega_address_social_icons p a:hover{
			        color: '.esc_html($skin_main_bg).';
			    }
			    .services-section .box-shadow-column .vc_column-inner:hover .button-sections a,
			    .woocommerce a.remove, .related.products ul.products li.product .button:hover, .blog-posts-shortcode.blog-posts .list-view .post-details .post-name,.mt-icon-listgroup-content-holder-button p, .mt-icon-listgroup-content-holder-button p .more-link {
			    	color: '.esc_html($skin_main_bg).' !important;
			    }
			    /* NAVIGATION */
			    .navstyle-v8.header3 #navbar .menu > .menu-item.current-menu-item > a, 
			    .navstyle-v8.header3 #navbar .menu > .menu-item:hover > a,
			    .navstyle-v1.header3 #navbar .menu > .menu-item:hover > a,
			    .navstyle-v1.header2 #navbar .menu > .menu-item:hover > a,
			    .navstyle-v4 #navbar .menu > .menu-item.current-menu-item > a,
			    .navstyle-v4 #navbar .menu > .menu-item:hover > a,
			    .navstyle-v3 #navbar .menu > .menu-item.current-menu-item > a, 
			    .navstyle-v3 #navbar .menu > .menu-item:hover > a,
			    .navstyle-v3 #navbar .menu > .menu-item > a::before, 
				.navstyle-v3 #navbar .menu > .menu-item > a::after,
				.navstyle-v2 #navbar .menu > .menu-item.current-menu-item > a,
				.navstyle-v2 #navbar .menu > .menu-item:hover > a{
			        color: '.esc_html($skin_main_bg).';
				}
				.nav-submenu-style1 #navbar .sub-menu .menu-item.selected > a, 
				.nav-submenu-style1 #navbar .sub-menu .menu-item:hover > a,
				.navstyle-v2.header3 #navbar .menu > .menu-item > a::before,
				.navstyle-v2.header3 #navbar .menu > .menu-item > a::after,
				.navstyle-v8 #navbar .menu > .menu-item > a::before,
				.navstyle-v7 #navbar .menu > .menu-item .sub-menu > .menu-item > a:hover,
				.navstyle-v7 #navbar .menu > .menu-item.current_page_item > a,
				.navstyle-v7 #navbar .menu > .menu-item.current-menu-item > a,
				.navstyle-v7 #navbar .menu > .menu-item:hover > a,
				.navstyle-v6 #navbar .menu > .menu-item.current_page_item > a,
				.navstyle-v6 #navbar .menu > .menu-item.current-menu-item > a,
				.navstyle-v6 #navbar .menu > .menu-item:hover > a,
				.navstyle-v5 #navbar .menu > .menu-item.current_page_item > a, 
				.navstyle-v5 #navbar .menu > .menu-item.current-menu-item > a,
				.navstyle-v5 #navbar .menu > .menu-item:hover > a,
				.navstyle-v2 #navbar .menu > .menu-item > a::before, 
				.navstyle-v2 #navbar .menu > .menu-item > a::after{
					background: '.esc_html($skin_main_bg).';
				}


				/* Color Dark / Hovers */
				.related-posts .post-name:hover a{
					color: '.esc_html($skin_main_bg_hover).';
				}

				.services-section .box-shadow-column .vc_column-inner:hover .button-sections a:hover, .blog-posts-shortcode.blog-posts .list-view .post-details,  .post-excerpt .more-link:hover, .list-view .post-details .post-excerpt .more-link:hover, .mt-icon-listgroup-content-holder-button p .more-link:hover,.mt-icon-listgroup-content-holder-button p:hover{
					color: '.esc_html($skin_main_bg_hover).' !important;
				}

			    /*------------------------------------------------------------------
			        BACKGROUND + BACKGROUND-COLOR
			    ------------------------------------------------------------------*/
			    .tagcloud > a:hover, .modeltheme-icon-search, .wpb_button::after, .rotate45, .latest-posts .post-date-day, .latest-posts h3, .latest-tweets h3, .latest-videos h3, .button.solid-button, button.vc_btn, .pricing-table.recomended .table-content, .pricing-table .table-content:hover, .pricing-table.Recommended .table-content, .pricing-table.recommended .table-content, .pricing-table.recomended .table-content, .pricing-table .table-content:hover, .block-triangle, .owl-theme .owl-controls .owl-page span, body .vc_btn.vc_btn-blue, body a.vc_btn.vc_btn-blue, body button.vc_btn.vc_btn-blue, .pagination .page-numbers.current, .pagination .page-numbers:hover, #subscribe > button[type=\'submit\'], .social-sharer > li:hover, .prev-next-post a:hover .rotate45, .masonry_banner.default-skin, .form-submit input, .form-submit button, .member-header::before, .member-header::after, .member-footer .social::before, .member-footer .social::after, .subscribe > button[type=\'submit\'], .no-results input[type=\'submit\'], h3#reply-title::after, .newspaper-info, header.header1 .header-nav-actions .shop_cart, .categories_shortcode .owl-controls .owl-buttons i:hover, .widget-title:after, h2.heading-bottom:after, .single .content-car-heading:after, .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active, #primary .main-content ul li:not(.rotate45)::before, .wpcf7-form .wpcf7-submit, ul.ecs-event-list li span, #contact_form2 .solid-button.button, .details-container > div.details-item .amount, .details-container > div.details-item ins, .modeltheme-search .search-submit, .pricing-table.recommended .table-content .title-pricing, .pricing-table .table-content:hover .title-pricing, .pricing-table.recommended .button.solid-button, #navbar ul.sub-menu li a:hover .blogloop-v5 .absolute-date-badge span, .post-category-date a[rel="tag"], #navbar .mt-icon-list-item:hover, .mt_car--single-gallery.mt_car--featured-single-gallery:hover, .modeltheme-pagination.pagination .page-numbers.current, .pricing-table .table-content:hover .button.solid-button, footer .footer-top .menu .menu-item a::before, .mt-car-search .submit .form-control, .blogloop-v4.list-view .post-date, .post-password-form input[type="submit"], .search-form input[type="submit"], body .btn-sticky-left, .post-password-form input[type=\'submit\'],body.woocommerce ul.products li.product .onsale,.woocommerce a.remove:hover,body .wega-contact .wpcf7-submit:focus, body .wega-contact .wpcf7-submit:active, .sidebar-menu h2.widgettitle, .consulting-broshure-sidebar a.btn.btn-download-pdf, .header-button .button-winona, .woocommerce button.button.alt.disabled, .error404 a.vc_button_404, .button-winona.btn.btn-medium, .single-post-tags > a:hover, .orange_border {
			        background: '.esc_html($skin_main_bg).';
			    }
			    .woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover, .accordion-services .vc_tta-panel.vc_active a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li a.page-numbers:hover, .cases-tabs ul.vc_tta-tabs-list li.vc_tta-tab.vc_active a {
			    	background: '.esc_html($skin_main_bg).' !important;
			    }
			    .woocommerce .product-thumbnails span.onsale,.related.products ul.products li.product .button,.woocommerce #review_form #respond .form-submit input,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce input.button,.woocommerce button.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
			        background-color: '.esc_html($skin_main_bg).';
			    }

			    body .wega-contact .wpcf7-submit:hover,.modeltheme-search.modeltheme-search-open .modeltheme-icon-search, .no-js .modeltheme-search .modeltheme-icon-search, .modeltheme-icon-search:hover, .latest-posts .post-date-month, .button.solid-button:hover, body .vc_btn.vc_btn-blue:hover, body a.vc_btn.vc_btn-blue:hover, .post-category-date a[rel="tag"]:hover,  body button.vc_btn.vc_btn-blue:hover, .blogloop-v5 .absolute-date-badge span:hover, .mt-car-search .submit .form-control:hover, #contact_form2 .solid-button.button:hover, .subscribe > button[type=\'submit\']:hover, footer .mc4wp-form-fields input[type="submit"]:hover, .no-results.not-found .search-submit:hover, .no-results input[type=\'submit\']:hover, ul.ecs-event-list li span:hover, .pricing-table.recommended .table-content .price_circle, .pricing-table .table-content:hover .price_circle, #modal-search-form .modal-content input.search-input, .wpcf7-form .wpcf7-submit:hover, .form-submit input:hover, .blogloop-v4.list-view .post-date a:hover, .pricing-table.recommended .button.solid-button:hover, .search-form input[type="submit"]:hover, .modeltheme-pagination.pagination .page-numbers.current:hover, .error-return-home.text-center > a:hover, .pricing-table .table-content:hover .button.solid-button:hover, .post-password-form input[type="submit"]:hover, .navbar-toggle .navbar-toggle:hover .icon-bar, .btn-sticky-left:hover, .post-password-form input[type=\'submit\']:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,  .list-view .post-details .post-excerpt .more-link:hover i {
			        background: '.esc_html($skin_main_bg_hover).';
			    }
			    .tagcloud > a:hover, .cases-tabs ul.vc_tta-tabs-list{
			        background: '.esc_html($skin_main_bg_hover).' !important;
			    }
			    .related.products ul.products li.product .button:hover, .woocommerce #review_form #respond .form-submit input:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .services-section .box-shadow-column .vc_column-inner:hover .button-sections a:hover .vc_btn3-icon{
			        background-color: '.esc_html($skin_main_bg_hover).';
			    }
			    .wega_preloader_holder .loader-42{
			    	color: '.esc_html($mt_preloader_color).';
			    }
			    /*------------------------------------------------------------------
			        BORDER-COLOR
			    ------------------------------------------------------------------*/
			    .button-winona, .button-winona.btn.btn-medium, .woocommerce div.product form.cart .button, .woocommerce-page .woocommerce-message .button, .woocommerce #review_form #respond .form-submit input, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce table.cart td.actions .coupon button.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order:hover, .woocommerce-page div.woocommerce .shop_table td.actions button.button, .woocommerce-page .shipping-calculator-form button.button, .woocommerce form.checkout_coupon button.button, #commentform .form-submit input[type="submit"], .woocommerce div.product .woocommerce-tabs ul.tabs li,footer .social-links a:hover, body .wega-contact .wpcf7-submit:hover, body .wega-contact .wpcf7-submit:focus, body .wega-contact .wpcf7-submit:active, .woocommerce .woocommerce-info,.comment-form input, .comment-form textarea, .author-bio, blockquote, .widget_popular_recent_tabs .nav-tabs > li.active, body .left-border, body .right-border, body .member-header, body .member-footer .social, body .button[type=\'submit\'], .navbar ul li ul.sub-menu, .wpb_content_element .wpb_tabs_nav li.ui-tabs-active, #contact-us .form-control:focus, .sale_banner_holder:hover, .testimonial-img, .wpcf7-form input:focus, .wpcf7-form textarea:focus, .header_search_form, .list-view .post-details .post-excerpt .more-link:hover, .consulting-broshure-sidebar a.btn.btn-download-pdf, .sidebar-menu .menu li.current-menu-item > a, .sidebar-menu .menu li:hover > a, .sidebar-menu .menu li:active > a, body .wega-contact .wpcf7-submit:hover, .wega-contact-sidebar .wpcf7-submit, .error404 a.vc_button_404 {
			        border-color: '.esc_html($skin_main_bg).';
			    }';

	    wp_add_inline_style( 'wega-style', $html );
	}
}