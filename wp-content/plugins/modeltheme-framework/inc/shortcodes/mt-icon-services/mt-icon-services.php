<?php 


class MT_Icon_Services {

    protected $mt_shortcode_columns;
    
    public function __construct() {
        add_shortcode('mt_icon_services', array($this, 'mt_shortcode_icon_services'));
        add_shortcode('mt_icon_services_item', array($this, 'mt_shortcode_icon_services_items'));
        add_action('init', array($this, 'mt_icon_services_vc_element'));
        add_action('init', array($this, 'mt_shortcode_icon_services_items_vc_element'));
    }




	/*************************************************************************************************************************/
	// PARENT SHORTCODE
	/*************************************************************************************************************************/
	public function mt_shortcode_icon_services($params,  $content = NULL) {
	    extract( shortcode_atts( 
	        array(
	            'style'                 => '',
	            'text_align'            => '',
                'columns'      			=> '',
	        ), $params ) );

        $this->mt_shortcode_columns = $columns;

	    $html = '';
	        
	    $html .= '<div class="mt_services-shortcode row '.$text_align.' '.$style.'">';
	        $html .= do_shortcode($content);
	    $html .= '</div>';
	    return $html;
	}
	// add_shortcode('mt_icon_services', 'mt_shortcode_icon_services');







	/*************************************************************************************************************************/
	// CHILD SHORTCODE
	/*************************************************************************************************************************/
	public function mt_shortcode_icon_services_items($params, $content = NULL) {
	    extract( shortcode_atts( 
	        array(
	            'menu_item_title'           	=> '',
	            'menu_item_title_color'         => '',
	            'menu_item_content'         	=> '',
	            'menu_item_content_color'       => '',
	            'menu_item_image'           	=> '',
	            'type'           				=> '',
	            'icon_fontawesome'           	=> '',
	            'icon_openiconic'           	=> '',
	            'icon_typicons'           		=> '',
	            'icon_entypo'           		=> '',
	            'icon_linecons'           		=> '',
	            'icon_monosocial'           	=> '',
	            'icon_material'          		=> '',
	            'color'           				=> '',
	            'custom_color'           		=> '',
	            'custom_color_hover'           	=> '',
	            'background_style'           	=> '',
	            'background_color'           	=> '',
	            'custom_background_color'       => '',
	            'custom_background_color_hover' => '',
	            'size'           				=> '',
	            'align'           				=> '',
	            'link'           				=> '',
	        ), $params ) );


	    vc_icon_element_fonts_enqueue( $type );

	    $has_style = false;
	    if ( strlen( $background_style ) > 0 ) {
	        $has_style = true;
	        if ( false !== strpos( $background_style, 'outline' ) ) {
	            $background_style .= ' vc_icon_element-outline'; // if we use outline style it is border in css
	        } else {
	            $background_style .= ' vc_icon_element-background';
	        }
	    }

	    $style = '';
	    if ( 'custom' === $background_color ) {
	        if ( false !== strpos( $background_style, 'outline' ) ) {
	            $style = 'border-color:' . $custom_background_color;
	        } else {
	            $style = 'background-color:' . $custom_background_color;
	        }
	    }
	    $style = $style ? 'style="' . esc_attr( $style ) . '"' : '';

	    $has_style_vc_icon_element = '';
		if ( $has_style ) { 
			$has_style_vc_icon_element = 'vc_icon_element-have-style'; 
		}


	    $has_style_vc_icon_element_inner = '';
		if ( $has_style ) { 
			$has_style_vc_icon_element_inner = 'vc_icon_element-have-style-inner'; 
		}


		$menu_item_title_color_style = '';
		if ($menu_item_title_color) {
			$menu_item_title_color_style = 'color: '.$menu_item_title_color.';';
		}
		$menu_item_content_color_style = '';
		if ($menu_item_content_color) {
			$menu_item_content_color_style = 'color: '.$menu_item_content_color.';';
		}

		// ICON HOVER
		$custom_color_hover_style = '';
		if ($custom_color_hover) {
			$custom_color_hover_style = 'color: '.$custom_color_hover.' !important;';
		}
		$custom_background_color_hover_style = '';
		if ($custom_background_color_hover) {
			$custom_background_color_hover_style = 'background: '.$custom_background_color_hover.' !important; 
													box-shadow: 0 0 15px '.$custom_background_color_hover.';
	        										-webkit-box-shadow: 0 0 15px '.$custom_background_color_hover.';';
		}



	    $html = '';
		$unique_class = 'mt_icon_services_item_'.uniqid();

	    $html .= '<div class="mt_icon_services_item style_v1 '.$this->mt_shortcode_columns.' '.$unique_class.'">';

	        $img = wp_get_attachment_image_src($menu_item_image, 'full'); 
	        if (!empty($img[0])) {
	            $html .= '<img class="menu_item_image" src="'.$img[0].'" alt="" />';
	        }

	        $html .= '<style>
	        			.'.$unique_class.'.mt_icon_services_item .vc_icon_element:hover .vc_icon_element-inner{
	        				'.$custom_background_color_hover_style.'
	        			}
	        			.'.$unique_class.'.mt_icon_services_item .vc_icon_element:hover .vc_icon_element-inner .vc_icon_element-icon{
	        				'.$custom_color_hover_style.'
	        			}
	        		  </style>';

	        $html .= '<div
						    class="vc_icon_element vc_icon_element-outer vc_icon_element-align-'.esc_attr( $align ).'">
						    <div
						        class="vc_icon_element-inner vc_icon_element-inner vc_icon_element-color-'.esc_attr( $color ).' '.esc_attr($has_style_vc_icon_element_inner).' vc_icon_element-size-'.esc_attr( $size ).'  vc_icon_element-style-'.esc_attr( $background_style ).' vc_icon_element-background-color-'.esc_attr( $background_color ).'" '.$style.'><span
						            class="vc_icon_element-icon '.esc_attr( ${'icon_' . $type} ).'" '.( 'custom' === $color ? 'style="color:' . esc_attr( $custom_color ) . ';"' : '' ).'></span>';

						            if ( strlen( $link ) > 0 ) {
						                $html .= '<' . $link . '></a>';
						            }

					$html .= '</div>
						</div>';



	        $html .= '<h3 class="menu_item_title" style="'.$menu_item_title_color_style.'">'.$menu_item_title.'</h3>';
	        $html .= '<p class="menu_item_content" style="'.$menu_item_content_color_style.'">'.$menu_item_content.'</p>';
	    $html .= '</div>';

	    return $html;
	}
	// add_shortcode('mt_icon_services_item', 'mt_shortcode_icon_services_items');






	/*************************************************************************************************************************/
	// VC_MAP THE PARENT SHORTCODE
	/*************************************************************************************************************************/
	function mt_icon_services_vc_element() {
		if (function_exists('vc_map')) {
		    vc_map( array(
		        "name" => esc_attr__("MT - Icon Services", 'modeltheme'),
		        "base" => "mt_icon_services",
		        "as_parent" => array('only' => 'mt_icon_services_item, mt_icon_services_item_v2'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
				'content_element' => true,
		        'allowed_container_element' => 'vc_row',
				'show_settings_on_create' => true,
		        "icon" => "smartowl_shortcode",
		        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
		        "params" => array(
		            // add params same as with any other content element
		            array(
		                "type" => "dropdown",
		                "heading" => esc_attr__("Text Align", 'modeltheme'),
		                "param_name" => "text_align",
		                "std" => '',
		                "holder" => "div",
		                "class" => "",
		                "description" => "",
		                "value" => array(
		                    esc_attr__('Left', 'modeltheme')  => 'text-left',
		                    esc_attr__('Center', 'modeltheme')  => 'text-center',
		                    esc_attr__('Right', 'modeltheme')  => 'text-right',
		                )
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_attr__("Style", 'modeltheme'),
		                "param_name" => "style",
		                "std" => '',
		                "holder" => "div",
		                "class" => "",
		                "description" => "",
		                "value" => array(
		                    esc_attr__('Light (For dark background)', 'modeltheme')  => 'skin_light',
		                    esc_attr__('Dark (For light background)', 'modeltheme') => 'skin_dark',
		                )
		            ),
                    // add params same as with any other content element
                    array(
                        "type" => "dropdown",
                        "heading" => esc_attr__("Columns", 'modeltheme'),
                        "param_name" => "columns",
                        "std" => '',
                        "holder" => "div",
                        "class" => "",
                        "description" => "",
                        "value" => array(
                            esc_attr__('2 Columns', 'modeltheme')  => 'col-md-6',
                            esc_attr__('3 Columns', 'modeltheme')  => 'col-md-4',
                            esc_attr__('4 Columns', 'modeltheme')  => 'col-md-3',
                            esc_attr__('6 Columns', 'modeltheme')  => 'col-md-2',
                        )
                    ),
		        ),
		        "js_view" => 'VcColumnView'
		    ) );
		}
	}



	/*************************************************************************************************************************/
	// VC_MAP THE CHILD SHORTCODE
	/*************************************************************************************************************************/
	function mt_shortcode_icon_services_items_vc_element() {

		if (function_exists('vc_map')) {
		    vc_map( array(
		        "name" => esc_attr__("Icon Services Item v1", 'modeltheme'),
		        "base" => "mt_icon_services_item",
		        "content_element" => true,
		        "as_child" => array('only' => 'mt_icon_services'), // Use only|except attributes to limit parent (separate multiple values with comma)
		        "params" => array(
		            // add params same as with any other content element
		            array(
		                "group"         => "Icon",
		                'type' => 'dropdown',
		                'heading' => __( 'Icon library', 'modeltheme' ),
		                'value' => array(
		                    __( 'Font Awesome', 'modeltheme' ) => 'fontawesome',
		                    __( 'Open Iconic', 'modeltheme' ) => 'openiconic',
		                    __( 'Typicons', 'modeltheme' ) => 'typicons',
		                    __( 'Entypo', 'modeltheme' ) => 'entypo',
		                    __( 'Linecons', 'modeltheme' ) => 'linecons',
		                    __( 'Mono Social', 'modeltheme' ) => 'monosocial',
		                    __( 'Material', 'modeltheme' ) => 'material',
		                ),
		                'admin_label' => true,
		                'param_name' => 'type',
		                'description' => __( 'Select icon library.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'iconpicker',
		                'heading' => __( 'Icon', 'modeltheme' ),
		                'param_name' => 'icon_fontawesome',
		                'value' => 'fa fa-adjust',
		                // default value to backend editor admin_label
		                'settings' => array(
		                    'emptyIcon' => false,
		                    // default true, display an "EMPTY" icon?
		                    'iconsPerPage' => 4000,
		                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
		                ),
		                'dependency' => array(
		                    'element' => 'type',
		                    'value' => 'fontawesome',
		                ),
		                'description' => __( 'Select icon from library.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'iconpicker',
		                'heading' => __( 'Icon', 'modeltheme' ),
		                'param_name' => 'icon_openiconic',
		                'value' => 'vc-oi vc-oi-dial',
		                // default value to backend editor admin_label
		                'settings' => array(
		                    'emptyIcon' => false,
		                    // default true, display an "EMPTY" icon?
		                    'type' => 'openiconic',
		                    'iconsPerPage' => 4000,
		                    // default 100, how many icons per/page to display
		                ),
		                'dependency' => array(
		                    'element' => 'type',
		                    'value' => 'openiconic',
		                ),
		                'description' => __( 'Select icon from library.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'iconpicker',
		                'heading' => __( 'Icon', 'modeltheme' ),
		                'param_name' => 'icon_typicons',
		                'value' => 'typcn typcn-adjust-brightness',
		                // default value to backend editor admin_label
		                'settings' => array(
		                    'emptyIcon' => false,
		                    // default true, display an "EMPTY" icon?
		                    'type' => 'typicons',
		                    'iconsPerPage' => 4000,
		                    // default 100, how many icons per/page to display
		                ),
		                'dependency' => array(
		                    'element' => 'type',
		                    'value' => 'typicons',
		                ),
		                'description' => __( 'Select icon from library.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'iconpicker',
		                'heading' => __( 'Icon', 'modeltheme' ),
		                'param_name' => 'icon_entypo',
		                'value' => 'entypo-icon entypo-icon-note',
		                // default value to backend editor admin_label
		                'settings' => array(
		                    'emptyIcon' => false,
		                    // default true, display an "EMPTY" icon?
		                    'type' => 'entypo',
		                    'iconsPerPage' => 4000,
		                    // default 100, how many icons per/page to display
		                ),
		                'dependency' => array(
		                    'element' => 'type',
		                    'value' => 'entypo',
		                ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'iconpicker',
		                'heading' => __( 'Icon', 'modeltheme' ),
		                'param_name' => 'icon_linecons',
		                'value' => 'vc_li vc_li-heart',
		                // default value to backend editor admin_label
		                'settings' => array(
		                    'emptyIcon' => false,
		                    // default true, display an "EMPTY" icon?
		                    'type' => 'linecons',
		                    'iconsPerPage' => 4000,
		                    // default 100, how many icons per/page to display
		                ),
		                'dependency' => array(
		                    'element' => 'type',
		                    'value' => 'linecons',
		                ),
		                'description' => __( 'Select icon from library.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'iconpicker',
		                'heading' => __( 'Icon', 'modeltheme' ),
		                'param_name' => 'icon_monosocial',
		                'value' => 'vc-mono vc-mono-fivehundredpx',
		                // default value to backend editor admin_label
		                'settings' => array(
		                    'emptyIcon' => false,
		                    // default true, display an "EMPTY" icon?
		                    'type' => 'monosocial',
		                    'iconsPerPage' => 4000,
		                    // default 100, how many icons per/page to display
		                ),
		                'dependency' => array(
		                    'element' => 'type',
		                    'value' => 'monosocial',
		                ),
		                'description' => __( 'Select icon from library.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'iconpicker',
		                'heading' => __( 'Icon', 'modeltheme' ),
		                'param_name' => 'icon_material',
		                'value' => 'vc-material vc-material-cake',
		                // default value to backend editor admin_label
		                'settings' => array(
		                    'emptyIcon' => false,
		                    // default true, display an "EMPTY" icon?
		                    'type' => 'material',
		                    'iconsPerPage' => 4000,
		                    // default 100, how many icons per/page to display
		                ),
		                'dependency' => array(
		                    'element' => 'type',
		                    'value' => 'material',
		                ),
		                'description' => __( 'Select icon from library.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'dropdown',
		                'heading' => __( 'Icon color', 'modeltheme' ),
		                'param_name' => 'color',
		                'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'modeltheme' ) => 'custom' ) ),
		                'description' => __( 'Select icon color.', 'modeltheme' ),
		                'param_holder_class' => 'vc_colored-dropdown',
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'colorpicker',
		                'heading' => __( 'Custom color', 'modeltheme' ),
		                'param_name' => 'custom_color',
		                'description' => __( 'Select custom icon color.', 'modeltheme' ),
		                'dependency' => array(
		                    'element' => 'color',
		                    'value' => 'custom',
		                ),
		            ),		            
		            array(
		                "group"         => "Icon",
		                'type' => 'colorpicker',
		                'heading' => __( 'Custom color - HOVER', 'modeltheme' ),
		                'param_name' => 'custom_color_hover',
		                'description' => __( 'Select custom icon color for HOVER state.', 'modeltheme' ),
		            ),

		            array(
		                "group"         => "Icon",
		                'type' => 'dropdown',
		                'heading' => __( 'Background shape', 'modeltheme' ),
		                'param_name' => 'background_style',
		                'value' => array(
		                    __( 'None', 'modeltheme' ) => '',
		                    __( 'Circle', 'modeltheme' ) => 'rounded',
		                    __( 'Square', 'modeltheme' ) => 'boxed',
		                    __( 'Rounded', 'modeltheme' ) => 'rounded-less',
		                    __( 'Outline Circle', 'modeltheme' ) => 'rounded-outline',
		                    __( 'Outline Square', 'modeltheme' ) => 'boxed-outline',
		                    __( 'Outline Rounded', 'modeltheme' ) => 'rounded-less-outline',
		                ),
		                'description' => __( 'Select background shape and style for icon.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'dropdown',
		                'heading' => __( 'Background color', 'modeltheme' ),
		                'param_name' => 'background_color',
		                'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'modeltheme' ) => 'custom' ) ),
		                'std' => 'grey',
		                'description' => __( 'Select background color for icon.', 'modeltheme' ),
		                'param_holder_class' => 'vc_colored-dropdown',
		                'dependency' => array(
		                    'element' => 'background_style',
		                    'not_empty' => true,
		                ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'colorpicker',
		                'heading' => __( 'Custom background color', 'modeltheme' ),
		                'param_name' => 'custom_background_color',
		                'description' => __( 'Select custom icon background color.', 'modeltheme' ),
		                'dependency' => array(
		                    'element' => 'background_color',
		                    'value' => 'custom',
		                ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'colorpicker',
		                'heading' => __( 'Custom background color - HOVER', 'modeltheme' ),
		                'param_name' => 'custom_background_color_hover',
		                'description' => __( 'Select custom icon background color for HOVER state.', 'modeltheme' ),
		            ),

		            array(
		                "group"         => "Icon",
		                'type' => 'dropdown',
		                'heading' => __( 'Size', 'modeltheme' ),
		                'param_name' => 'size',
		                'value' => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
		                'std' => 'md',
		                'description' => __( 'Icon size.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'dropdown',
		                'heading' => __( 'Icon alignment', 'modeltheme' ),
		                'param_name' => 'align',
		                'value' => array(
		                    __( 'Left', 'modeltheme' ) => 'left',
		                    __( 'Right', 'modeltheme' ) => 'right',
		                    __( 'Center', 'modeltheme' ) => 'center',
		                ),
		                'description' => __( 'Select icon alignment.', 'modeltheme' ),
		            ),
		            array(
		                "group"         => "Icon",
		                'type' => 'vc_link',
		                'heading' => __( 'URL (Link)', 'modeltheme' ),
		                'param_name' => 'link',
		                'description' => __( 'Add link to icon.', 'modeltheme' ),
		            ),



		            // VC_MAP FOR ICON as image TAB
		            array(
		                "group"         => "Icon",
		                "type"          => "attach_image",
		                "holder"        => "div",
		                "class"         => "",
		                "heading"       => esc_attr__( "Thumbnail", 'modeltheme' ),
		                "param_name"    => "menu_item_image",
		                "description"   => ""
		            ),



		            // VC_MAP FOR TITLE TAB
		            array(
		                "group"        => "Title",
		                "type"         => "textfield",
		                "holder"       => "div",
		                "class"        => "",
		                "param_name"   => "menu_item_title",
		                "heading"      => esc_attr__("Title", 'modeltheme'),
		                "description"  => esc_attr__("Enter title for current menu item(Eg: Italian Pizza)", 'modeltheme'),
		            ),
		            array(
		                "group"         => "Title",
		                'type' => 'colorpicker',
		                'heading' => __( 'Custom color', 'modeltheme' ),
		                'param_name' => 'menu_item_title_color',
		                'description' => __( 'Select custom icon color.', 'modeltheme' ),
		            ),



		            // VC_MAP FOR SUBTITLE TAB
		            array(
		                "group"        => "Subtitle",
		                "type"         => "textarea",
		                "holder"       => "div",
		                "class"        => "",
		                "param_name"   => "menu_item_content",
		                "heading"      => esc_attr__("Subtitle", 'modeltheme'),
		                "description"  => esc_attr__("Enter title for current menu item(Eg: 30x30cm with cheese, onion rings, olives and tomatoes)", 'modeltheme'),
		            ),
		            array(
		                "group"         => "Subtitle",
		                'type' => 'colorpicker',
		                'heading' => __( 'Custom color', 'modeltheme' ),
		                'param_name' => 'menu_item_content_color',
		                'description' => __( 'Select custom icon color.', 'modeltheme' ),
		            ),
		        )
		    ) );
	 	}
 	}

}



new MT_Icon_Services();

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_mt_icon_services extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_mt_icon_services_Item extends WPBakeryShortCode {
    }
}



?>