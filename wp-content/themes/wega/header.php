<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="shortcut icon" href="<?php echo esc_url(wega('mt_favicon', 'url')); ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php 
        if ( function_exists( 'wp_body_open' ) ) {
            wp_body_open();
        }
   
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            if (wega('mt_preloader_status') == true) {
                echo '<div class="wega_preloader_holder"><div class="preloader-wrapper">
                          <div class="circle-loader">
                              <div class="circle circle_four"></div>
                              <div class="circle circle_three"></div>
                              <div class="circle circle_two"></div>
                              <div class="circle circle_one"></div>
                          </div>
                        </div>
                     </div>';
            }
        }
    
        $below_slider_headers = array('header5', 'header6', 'header7', 'header8');
        $normal_headers = array('header1', 'header2', 'header3', 'header4');
        $custom_header_options_status = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
        $header_custom_variant = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
        $header_layout = wega('mt_header_layout');
        if (isset($custom_header_options_status) && $custom_header_options_status == 'yes') {
            $header_layout = $header_custom_variant;
        }
    ?>

    <?php /* SEARCH BLOCK */ ?>
    <?php if(wega('mt_header_is_search') == true){ ?>
        <!-- Fixed Search Form -->
        <div class="fixed-search-overlay">
            <!-- Close Sidebar Menu + Close Overlay -->
            <i class="icon-close icons"></i>
            <!-- INSIDE SEARCH OVERLAY -->
            <div class="fixed-search-inside">
                <div class="modeltheme-search">
                    <form method="GET" action="<?php echo esc_url(home_url('/')); ?>">
                        <input class="search-input" placeholder="<?php echo esc_attr__('Enter search term...', 'wega'); ?>" type="search" value="" name="s" id="search" />
                        <i class="fa fa-search"></i>
                        <input type="hidden" name="post_type" value="post" />
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php /* BURGER MENU */ ?>
    <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
        <?php if(wega('mt_header_fixed_sidebar_menu_status') == true){ ?>
            <!-- Fixed Sidebar Overlay -->
            <div class="fixed-sidebar-menu-overlay"></div>
            <!-- Fixed Sidebar Menu -->
            <div class="relative fixed-sidebar-menu-holder header7">
                <div class="fixed-sidebar-menu">
                    <!-- Sidebar Menu Holder -->
                    <div class="header7 sidebar-content">
                        <!-- RIGHT SIDE -->
                        <div class="left-side">
                            <?php if (is_active_sidebar( wega('mt_header_fixed_sidebar') )) {
                                dynamic_sidebar( wega('mt_header_fixed_sidebar') ); 
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>


    <!-- PAGE #page -->
    <div id="page" class="hfeed site">
        <?php
            $page_slider = get_post_meta( get_the_ID(), 'select_revslider_shortcode', true );
            if (in_array($header_layout, $below_slider_headers)){
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.esc_html($page_slider).']');
                    echo '</div>';
                }

                // Header template variant
                echo wega_current_header_template();
            }elseif (in_array($header_layout, $normal_headers)){
                // Header template variant
                echo wega_current_header_template();
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.esc_html($page_slider).']');
                    echo '</div>';
                }
            }else{
                echo wega_current_header_template();
            }