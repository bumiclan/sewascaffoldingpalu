<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Panel', 'wega' ),
        'page_title'           => esc_html__( 'Theme Panel', 'wega' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'wega',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.WordPress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon' => get_template_directory_uri().'/images/svg/theme-panel-menu-icon.svg', // Specify a custom URL to an icon
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__( 'Theme Support', 'wega'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://themeforest.net/downloads'),
        'title' => esc_html__( 'Rate this theme', 'wega'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.com'),
        'title' => esc_html__( 'ModelTheme.com', 'wega'),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => esc_url('https://www.facebook.com/modeltheme'),
        'title' => esc_html__('Like us on Facebook', 'wega'),
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://twitter.com/modeltheme'),
        'title' => esc_html__('Follow us on Twitter', 'wega'),
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__('Submit a Ticket', 'wega'),
        'icon'  => 'el el-cog'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.com/'),
        'title' => esc_html__('ModelTheme Website', 'wega'),
        'icon'  => 'el el-globe'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'wega' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'wega' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'wega' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'wega' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'wega' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'wega' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'wega' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'wega' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    include_once(get_template_directory(). '/redux-framework/modeltheme-config.arrays.php');
    include_once(get_template_directory(). '/redux-framework/modeltheme-config.responsive.php');
    /**
    ||-> SECTION: General Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General Settings', 'wega' ),
        'id'    => 'mt_general',
        'icon'  => 'el el-icon-wrench'
    ));
    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'wega' ),
        'id'         => 'mt_general_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_breadcrumbs',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Breadcrumbs', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_breadcrumbs_delimitator',
                'type'     => 'text',
                'title'    => esc_html__('Breadcrumbs delimitator', 'wega'),
                'subtitle' => esc_html__('Set a breadcrumbs delimitator.', 'wega'),
                'desc'     => esc_html__('For example: "/", "-" or "->"', 'wega'),
                'default'  => '/'
            ),
            array(
                'id'       => 'mt_body_global_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Global Background', 'wega' ),
                'subtitle' => esc_html__( 'Default: #ffffff', 'wega' ),
                'default'  => '#ffffff',
            ),
        ),
    ));
    // Back to Top
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Back to Top Button', 'wega' ),
        'id'         => 'mt_general_back_to_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_backtotop_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Back to Top Button Status', 'wega'),
                'subtitle' => esc_html__('Enable or disable "Back to Top Button"', 'wega'),
                'default'  => false,
            ),
            array(
                'id'       => 'mt_backtotop_bg_color',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Backgrond', 'wega'),
                'validate' => 'color',
                'default' => '#FF5E15',
                'required' => array( 'mt_backtotop_status', '=', true ),
            ),
            array(
                'id'       => 'mt_backtotop_bg_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Backgrond - Hover', 'wega'), 
                'validate' => 'color',
                'default' => '#FF5E15',
                'required' => array( 'mt_backtotop_status', '=', true ),
            ),
            array(
                'id'       => 'mt_backtotop_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Icon Color', 'wega'), 
                'validate' => 'color',
                'default' => '#ffffff',
                'required' => array( 'mt_backtotop_status', '=', true ),
            ),
            array(
                'id'       => 'mt_backtotop_text_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Back to Top Button Icon Color - Hover', 'wega'), 
                'validate' => 'color',
                'default' => '#ffffff',
                'required' => array( 'mt_backtotop_status', '=', true ),
            ),

        ),
    ));
        // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Preloader', 'wega' ),
        'id' => 'mt_general_preloader',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'mt_divider_preloader_status',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Page Preloader Status', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_preloader_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Enable Page Preloader', 'wega'),
                'subtitle' => esc_html__('Enable or disable page preloader', 'wega'),
                'default'  => false,
            ),
            array(
                'id'   => 'mt_divider_preloader_styling',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Page Preloader Styling', 'wega').'</h3>',
                'required' => array( 'mt_preloader_status', '=', true ),
            ),
            array(         
                'id'       => 'mt_preloader_bg_color',
                'type'     => 'background',
                'title'    => esc_html__('Page Preloader Backgrond', 'wega'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'wega'),
                'default'  => array(
                    'background-color' => '#FF5E15',
                ),
                'output' => array(
                    'body .wega_preloader_holder'
                ),
                'required' => array( 'mt_preloader_status', '=', true ),
            ),
            array(
                'id'       => 'mt_preloader_color',
                'type'     => 'color',
                'title'    => esc_html__('Preloader color:', 'wega'), 
                'subtitle' => esc_html__('Default: #FFFFFF', 'wega'),
                'default'  => '#FFFFFF',
                'validate' => 'color',
                'required' => array( 'mt_preloader_status', '=', true ),
            ),
        ),
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebars', 'wega' ),
        'id'         => 'mt_general_sidebars',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_sidebars',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Generate Infinite Number of Sidebars', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_dynamic_sidebars',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Sidebars', 'wega' ),
                'subtitle' => esc_html__( 'Use the "Add More" button to create unlimited sidebars.', 'wega' ),
                'add_text' => esc_html__( 'Add one more Sidebar', 'wega' ),
                'options'   => array(
                    'Burger Navigation'
                ),
            ),
        ),
    ));
    

    /**
    ||-> SECTION: Styling Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Styling Settings', 'wega' ),
        'id'    => 'mt_styling',
        'icon'  => 'el el-icon-magic'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Global Fonts', 'wega' ),
        'id'         => 'mt_styling_global_fonts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_googlefonts',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Import Infinite Google Fonts', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_google_fonts_select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => esc_html__('Import Google Font Globally', 'wega'), 
                'subtitle' => esc_html__('Select one or multiple fonts', 'wega'),
                'desc'     => esc_html__('Importing fonts made easy', 'wega'),
                'options'  => $google_fonts_list,
                'default'  => array(
                    'Poppins:300,regular,500,600,700,latin-ext,latin,devanagari',
                    'Yantramanav:300,regular,500,600,700,latin-ext,latin,devanagari'
                ),
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Skin color', 'wega' ),
        'id'         => 'mt_styling_skin_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_predefined_skin_custom_skin_main_bg',
                'type'     => 'color',
                'title'    => esc_html__('Skin Main Color', 'wega'), 
                'default'  => '#FF5E15',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_predefined_skin_custom_skin_main_bg_hover',
                'type'     => 'color',
                'title'    => esc_html__('Skin Main Color - Hover', 'wega'), 
                'default'  => '#FF5E15',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_main_texts_color',
                'type'     => 'color',
                'title'    => esc_html__('Main Texts Color', 'wega'), 
                'default'  => '#252525',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_predefined_skin_custom_skin_semitransparent_blocks',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Semitransparent blocks background', 'wega' ),
                'default'  => array(
                    'color' => '#FF5E15',
                    'alpha' => '.70'
                ),
                'mode'     => 'background',
                'output' => array(
                    'background' => '.flickr_badge_image a::after,
                                     .portfolio-hover,
                                     .pastor-image-content .details-holder,
                                     .item-description .holder-top,
                                     blockquote::before',
                )
            )
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Nav Menu', 'wega' ),
        'id'         => 'mt_styling_nav_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_nav_menu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Menus Styling', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_nav_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Text Color', 'wega'), 
                'subtitle' => esc_html__('Default: #252525', 'wega'),
                'default'  => '#252525',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar .menu-item > a,
                                .navbar-nav .search_products a,
                                .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus,
                                .navbar-default .navbar-nav > li > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_hover_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Hover+Active Text Color', 'wega'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'wega'),
                'default'  => '#FF5E15',
                'validate' => 'color',
                'output' => array(
                    'color' => 'body #navbar .menu-item.selected > a, body:not(.is_header_semitransparent) #navbar .menu-item:hover > a, body #navbar ul.sub-menu .menu-item:hover > a, body:not(.is_header_semitransparent) #navbar .current_page_item > a, .header-infos .header-info-group a:hover i',
                    'background-color' => '#navbar .sub-menu .menu-item > a::before',
                )
            ),
            array(
                'id'   => 'mt_divider_nav_submenu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Submenus Styling', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_nav_submenu_background',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Background Color', 'wega'), 
                'subtitle' => esc_html__('Default: #ffffff', 'wega'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar .sub-menu, .navbar ul li ul.sub-menu',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Background Color - Hover', 'wega'), 
                'subtitle' => esc_html__('Default: transparent', 'wega'),
                'default'  => 'transparent',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Links Color', 'wega'), 
                'subtitle' => esc_html__('Default: #252525', 'wega'),
                'default'  => '#252525',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Links Color - Hover', 'wega'), 
                'subtitle' => esc_html__('Default: Inherit from Predefined Skin', 'wega'),
                'validate' => 'color',
                'output' => array(
                    'color' => 'body #navbar ul.sub-menu li a:hover',
                )
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'wega' ),
        'id'         => 'mt_styling_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_4',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Body Font family', 'wega').'</h3>'
            ),
            array(
                'id'          => 'mt_body_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Body Font family', 'wega'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'line-height'  => false,
                'font-weight'  => false,
                'font-size'   => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array(
                    'body'
                ),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Yantramanav', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_5',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Headings', 'wega').'</h3>'
            ),
            array(
                'id'          => 'mt_heading_h1',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H1 Font family', 'wega'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => true,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h1', 'h1 span'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins', 
                    'font-size' => '43px', 
                    'font-weight' => '700',
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h2',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H2 Font family', 'wega'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => true,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h2', 'h2 span'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins', 
                    'font-size' => '30px', 
                    'font-weight' => '700',
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h3',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H3 Font family', 'wega'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => true,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h3','h3 span'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins', 
                    'font-size' => '24px', 
                    'font-weight' => '700',
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h4',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H4 Font family', 'wega'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h4'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins', 
                    'font-size' => '18px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h5',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H5 Font family', 'wega'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h5'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins', 
                    'font-size' => '14px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h6',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H6 Font family', 'wega'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h6'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins', 
                    'font-size' => '12px', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_6',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Inputs & Textareas Font family', 'wega').'</h3>'
            ),
            array(
                'id'                => 'mt_inputs_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Inputs Font family', 'wega'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array('input', 'textarea'),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for inputs and textareas', 'wega'),
                'default'           => array(
                    'font-family'       => 'Yantramanav', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_7',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Buttons Font family', 'wega').'</h3>'
            ),
            array(
                'id'                => 'mt_buttons_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Buttons Font family', 'wega'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array(
                    'input[type="submit"]'
                ),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for buttons', 'wega'),
                'default'           => array(
                    'font-family'       => 'Yantramanav', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_17',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Mobile Font family', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_is_mobile_font',
                'type'     => 'switch', 
                'title'    => esc_html__('Overwrite Mobile Font', 'wega'),
                'subtitle' => esc_html__('Enable or disable "Overwrite Mobile Font" with Desktop font size and line-height.', 'wega'),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'wega' ),
                'off'      => esc_html__( 'Disabled', 'wega' )
            ),

        ),
    ));

    /*
       SECTION: Responsive Typography
    */
    Redux::setSection( $opt_name, $responsive_headings);
    

    /**
    ||-> SECTION: Header Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Header Settings', 'wega'),
        'id'    => 'mt_header',
        'icon'  => 'el el-icon-arrow-up'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header - General', 'wega'),
        'id'         => 'mt_header_general',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_generalheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Global Header Options', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_header_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Header layout', 'wega'),
                'options'  => array(
                    'header1' => array(
                        'alt' => esc_html__('Header #1', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/1.png'
                    ),
                    'header2' => array(
                        'alt' => esc_html__('Header #2', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/2.png'
                    ),
                ),
                'default'  => 'header1'
            ),
            array(         
                'id'       => 'mt_header_main_background',
                'type'     => 'background',
                'title'    => esc_html__('Header (main-header) - background', 'wega'),
                'subtitle' => esc_html__('Default color: #ffffff', 'wega'),
                'output'      => array('.navbar-default'),
                'default'  => array(
                    'background-color' => '#ffffff',
                )
            ),
            array(         
                'id'       => 'mt_header_top_main_background',
                'type'     => 'background',
                'title'    => esc_html__('Header top (main-header) - background', 'wega'),
                'subtitle' => esc_html__('Default color: #252525', 'wega'),
                'output'      => array('header .top-header'),
                'default'  => array(
                    'background-color' => '#252525',
                )
            ),
            array(
                'id'       => 'mt_is_nav_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Navigation Menu?', 'wega'),
                'subtitle' => esc_html__('Enable or disable "sticky positioned navigation menu".', 'wega'),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'wega' ),
                'off'      => esc_html__( 'Disabled', 'wega' )
            ),
            array(
                'id'   => 'mt_divider_header_stat',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Search Icon Settings(from header)', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_header_is_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon Status', 'wega'),
                'subtitle' => esc_html__('Enable or Disable Search Icon".', 'wega'),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'wega' ),
                'off'      => esc_html__( 'Disabled', 'wega' )
            ),
            array(
                'id'       => 'mt_header_is_search_custom_styling',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon - Custom Styling?', 'wega'),
                'subtitle' => esc_html__('Enable or Disable Custom Styling for Search Icon".', 'wega'),
                'default'  => false,
                'on'       => esc_html__( 'Yes - Add Custom Colors', 'wega' ),
                'off'      => esc_html__( 'No - Keep Predefined Colors', 'wega' )
            ),
            array(
                'id'       => 'mt_header_search_color',
                'type'     => 'color',
                'title'    => esc_html__('Search Icon Color', 'wega'), 
                'default'  => '#252525',
                'validate' => 'color',
                'required' => array( 'mt_header_is_search_custom_styling', '=', true ),
            ),
            array(
                'id'       => 'mt_header_search_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Search Icon Color - Hover', 'wega'), 
                'default'  => '#252525',
                'validate' => 'color',
                'required' => array( 'mt_header_is_search_custom_styling', '=', true ),
            ),
            array(
                'id'   => 'mt_divider_header_info_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info Links</h3>', 'wega' )
            ),
            array(
                'id'       => 'mt_divider_header_info_links_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Info Links Status', 'wega' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Links', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_link_phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Header Link phone', 'wega' ),
                'subtitle' => esc_html__( 'Paste phone link here', 'wega' ),
                'default'  => '#',
                'required' => array( 'mt_divider_header_info_links_status', '=', '1' ),
            ),




             array(
                'id'   => 'mt_divider_header_info_1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info First</h3>', 'wega' )
            ),
            array(
                'id'       => 'mt_divider_header_info_1_status',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Header Info 1 Status', 'wega' ),
                'subtitle' => esc_attr__( 'Enable/Disable Header Info 1', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_1_media_type',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Media Type', 'wega' ),
                'subtitle' => esc_attr__( 'Choose to upload an image icon or select a font icon', 'wega' ),
                'default'  => 1,
                'on'       => 'FontAwesome Icon',
                'off'      => 'Image Icon',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_1_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_attr__('Icon for Header Info 1', 'wega'),
                'options'  => $icons,
                'default'  => '',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','1') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_1_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Upload Image Icon', 'wega'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_1_status', '=', '1'), 
                    array('mt_divider_header_info_1_media_type','=','0') 
                ),
                'default' => '',
            ),
            array(
                'id' => 'mt_divider_header_info_1_heading1',
                'type' => 'text',
                'title' => esc_attr__('Header Info first - Title', 'wega'),
                'subtitle' => esc_attr__('Type header info first title', 'wega'),
                'default' => '',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_1_heading3',
                'type' => 'text',
                'title' => esc_attr__('Header Info first - Subtitle', 'wega'),
                'subtitle' => esc_attr__('Type header info first subtitle', 'wega'),
                'default' => '',
                'required' => array( 'mt_divider_header_info_1_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info Second</h3>', 'wega' )
            ),
            array(
                'id'       => 'mt_divider_header_info_2_status',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Header Info 2 Status', 'wega' ),
                'subtitle' => esc_attr__( 'Enable/Disable Header Info 2', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_2_media_type',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Media Type', 'wega' ),
                'subtitle' => esc_attr__( 'Choose to upload an image icon or select a font icon', 'wega' ),
                'default'  => 1,
                'on'       => 'FontAwesome Icon',
                'off'      => 'Image Icon',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_2_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_attr__('Icon for Header Info 2', 'wega'),
                'options'  => $icons,
                'default'  => '',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','1') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_2_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Upload Image Icon', 'wega'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_2_status', '=', '1'), 
                    array('mt_divider_header_info_2_media_type','=','0') 
                ),
                'default' => '',
            ),
            array(
                'id' => 'mt_divider_header_info_2_heading1',
                'type' => 'text',
                'title' => esc_attr__('Header Info Second - Title', 'wega'),
                'subtitle' => esc_attr__('Type header info Second title', 'wega'),
                'default' => '',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_2_heading3',
                'type' => 'text',
                'title' => esc_attr__('Header Info Second - Subtitle', 'wega'),
                'subtitle' => esc_attr__('Type header info Second subtitle', 'wega'),
                'default' => '',
                'required' => array( 'mt_divider_header_info_2_status', '=', '1' ),
            ),
            array(
                'id'   => 'mt_divider_header_info_3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => __( '<h3>Header Info Third</h3>', 'wega' )
            ),
            array(
                'id'       => 'mt_divider_header_info_3_status',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Header Info 3 Status', 'wega' ),
                'subtitle' => esc_attr__( 'Enable/Disable Header Info 3', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_divider_header_info_3_media_type',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Media Type', 'wega' ),
                'subtitle' => esc_attr__( 'Choose to upload an image icon or select a font icon', 'wega' ),
                'default'  => 1,
                'on'       => 'FontAwesome Icon',
                'off'      => 'Image Icon',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
            array(
                'id'       => 'mt_divider_header_info_3_faicon',
                'type'     => 'select',
                'select2'  => array( 'containerCssClass' => 'fa' ),
                'title'    => esc_attr__('Icon for Header Info 3', 'wega'),
                'options'  => $icons,
                'default'  => '',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','1') 
                ),
            ),
            array(
                'id' => 'mt_divider_header_info_3_image_icon',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Upload Image Icon', 'wega'),
                'compiler' => 'true',
                'required' => array( 
                    array('mt_divider_header_info_3_status', '=', '1'), 
                    array('mt_divider_header_info_3_media_type','=','0') 
                ),
                'default' => '',
            ),
            array(
                'id' => 'mt_divider_header_info_3_heading1',
                'type' => 'text',
                'title' => esc_attr__('Header Info Third - Title', 'wega'),
                'subtitle' => esc_attr__('Type header info Third title', 'wega'),
                'default' => '',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_divider_header_info_3_heading3',
                'type' => 'text',
                'title' => esc_attr__('Header Info Third - Subtitle', 'wega'),
                'subtitle' => esc_attr__('Type header info Third subtitle', 'wega'),
                'default' => '',
                'required' => array( 'mt_divider_header_info_3_status', '=', '1' ),
            ),
                        array(
                'id'   => 'mt_header_button',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => sprintf (esc_html__( '%1$s Header Button %2$s', 'wega' ),'<h3>','</h3>')
            ),
            array(
                'id'       => 'mt_header_button_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Button Status', 'wega' ),
                'subtitle' => esc_html__( 'Enable/Disable Header Button', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),

            array(
                'id' => 'mt_header_button_text',
                'type' => 'text',
                'title' => esc_attr__('Header Button Text', 'wega'),
                'subtitle' => esc_attr__('Type Header Button Status value', 'wega'),
                'default' => 'Rental',
                'required' => array( 'mt_header_button_status', '=', '1' ),
            ),
            array(
                'id' => 'mt_header_button_url',
                'type' => 'text',
                'title' => esc_html__('Header Button URL', 'wega'),
                'subtitle' => esc_html__('Type your Header Button url.', 'wega'),
                'validate' => 'url',
                'default' => '',
                'required' => array( 'mt_header_button_status', '=', '1' )
            )

        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Call to Action Button', 'wega'),
        'id'         => 'mt_header_general_cta',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_general_call_to_action',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => esc_html__('Call to Action Button', 'wega'),
            ),
            array(
                'id'    => 'mt_divider_general_call_to_action_info',
                'type'  => 'info',
                'style' => 'success',
                'title' => __('Note:', 'wega'),
                'icon'  => 'el-icon-info-sign',
                'desc'  => __( 'In order to add a CTA button, you need to add a navigation menu with the following css class "free-consultation". (<a href="https://i.imgur.com/IuOP8kW.png">Step 1</a>, <a href="https://i.imgur.com/nvLaWYX.png">Step 2</a>)', 'wega')
            ),
            array(
                'id'       => 'mt_call_to_action_btn_bg_color',
                'type'     => 'color',
                'title'    => esc_html__('Call to action Button Backgrond', 'wega'),
                'validate' => 'color',
                'default' => '#FF5E15',
            ),
            array(
                'id'       => 'mt_call_to_action_btn_bg_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Call to action Button Backgrond - Hover', 'wega'), 
                'validate' => 'color',
                'default' => '#FF5E15',
            ),
            array(
                'id'       => 'mt_call_to_action_btn_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Call to action Button Color', 'wega'), 
                'validate' => 'color',
                'default' => '#ffffff',
            ),
            array(
                'id'       => 'mt_call_to_action_btn_text_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Call to action Button Color - Hover', 'wega'), 
                'validate' => 'color',
                'default' => '#ffffff',
            ),
        )
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo &amp; Favicon', 'wega' ),
        'id'         => 'mt_header_logo',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_logo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Logo Settings', 'wega').'</h3>'
            ),
            array(
                'id' => 'mt_logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo image', 'wega'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/logo-dark.svg'),
            ),
            array(
                'id'        => 'mt_logo_max_width',
                'type'      => 'slider',
                'title'     => esc_html__('Logo Max Width', 'wega'),
                'subtitle'  => esc_html__('Use the slider to increase/decrease max size of the logo.', 'wega'),
                'desc'      => esc_html__('Min: 1px, max: 500px, step: 1px, default value: 169px', 'wega'),
                "default"   => 169,
                "min"       => 1,
                "step"      => 1,
                "max"       => 500,
                'display_value' => 'label'
            ),
            array(
                'id'   => 'mt_divider_favicon',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Favicon Settings', 'wega').'</h3>'
            ),
            array(
                'id' => 'mt_favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Favicon url', 'wega'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Use the upload button to import media.', 'wega'),
                'default' => array('url' => get_template_directory_uri().'/images/favicon-1.png'),
            )
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Fixed Sidebar Menu', 'wega' ),
        'id'         => 'mt_header_fixed_sidebar_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_fixed_headerstatus',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Status', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Burger Sidebar Menu Status', 'wega' ),
                'subtitle' => esc_html__( 'Enable/Disable Burger Sidebar Menu Status', 'wega' ),
                'desc'     => esc_html__( 'This Option Will Enable/Disable The Navigation Burger + Sidebar Menu triggered by the burger menu', 'wega' ),
                'default'  => 0,
                'on'       => esc_html__( 'Enabled', 'wega' ),
                'off'      => esc_html__( 'Disabled', 'wega' ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_custom_styling',
                'type'     => 'switch', 
                'title'    => esc_html__('Burger Sidebar Menu - Custom Styling?', 'wega'),
                'subtitle' => esc_html__('Enable or Disable Custom Styling for Burger Sidebar Menu Icon".', 'wega'),
                'default'  => false,
                'on'       => esc_html__( 'Yes - Add Custom Colors', 'wega' ),
                'off'      => esc_html__( 'No - Keep Predefined Colors', 'wega' ),
                'required' => array( 'mt_header_fixed_sidebar_menu_status', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Burger Sidebar Menu Color', 'wega'), 
                'default'  => '#252525',
                'validate' => 'color',
                'required' => array( 'mt_header_fixed_sidebar_menu_custom_styling', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Burger Sidebar Menu Color - Hover', 'wega'), 
                'default'  => '#252525',
                'validate' => 'color',
                'required' => array( 'mt_header_fixed_sidebar_menu_custom_styling', '=', true ),
            ),
            array(
                'id'   => 'mt_divider_fixed_header',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Other Options', 'wega').'</h3>',
                'required' => array( 'mt_header_fixed_sidebar_menu_status', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_bgs',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sidebar Menu Background', 'wega' ),
                'subtitle' => esc_html__( 'Default: rgba(255, 255, 255, 1) - #ffffff - Opacity: 1', 'wega' ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => '1'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu'
                ),
                // These options display a fully functional color palette.  Omit this argument
                // for the minimal color picker, and change as desired.
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
                'required' => array( 'mt_header_fixed_sidebar_menu_status', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Texts Color', 'wega'), 
                'default'  => '#000000',
                'validate' => 'color',
                'required' => array( 'mt_header_fixed_sidebar_menu_status', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_site_title_status',
                'type'     => 'radio',
                'title'    => esc_html__( 'Show Title or Logo', 'wega' ),
                'subtitle' => esc_html__( 'Choose what to show on fixed sidebar', 'wega' ),
                'desc'     => esc_html__( 'Choose Between Site Title or Site Logo', 'wega' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'site_title' => 'Title',
                    'site_logo' => 'Logo',
                    'site_nothing' => 'Disable This Feature'
                ),
                'default'  => 'site_title',
                'required' => array( 'mt_header_fixed_sidebar_menu_status', '=', true ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Fixed Sidebar Menu - Sidebar', 'wega' ),
                'subtitle' => esc_html__( 'Select Sidebar.', 'wega' ),
                'default'   => 'burgernavigation',
                'required' => array( 'mt_header_fixed_sidebar_menu_status', '=', true ),

            ),
            

        ),
    ) );

    /**

    ||-> SECTION: Footer Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer Settings', 'wega' ),
        'id'    => 'mt_footer',
        'icon'  => 'el el-icon-arrow-down'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Top Rows', 'wega' ),
        'id'         => 'mt_footer_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_footer_top',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Footer Top Rows', 'wega').'</h3>'
            ),
            array(         
                'id'       => 'mt_footer_top_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (top) - background', 'wega'),
                'subtitle' => esc_html__('Footer background with image or color.', 'wega'),
                'output'      => array('footer .footer-top'),
                'default'  => array(
                    'background-color' => '#232323',
                )
            ),
            array(
                'id'        => 'mt_footer_top_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Top Text Color', 'wega' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'wega' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'wega' ),
                'output'    => array('color' => 'footer .footer-top h1.widget-title, footer .footer-top h3.widget-title, footer .footer-top .widget-title, footer .footer-top h1.widget-title a'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'   => 'mt_divider_footer_row1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Footer Rows - Row #1', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_footer_row_1',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #1 - Status', 'wega' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 1', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_1_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'wega' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'wega'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                ),
                'default'  => '3',
                'required' => array( 'mt_footer_row_1', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_1_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Padding', 'wega'),
                'subtitle'       => esc_html__('Choose the spacing for the first row from footer.', 'wega'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '90px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_1margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Margin', 'wega'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'wega'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_1border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #1 - Borders', 'wega'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'wega'),
                'output'   => array('.footer-row-1'),
                'all'      => false,
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '0', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Footer Rows - Row #2', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_footer_row_2',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #2 - Status', 'wega' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 2', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_2_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'wega' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_2', '=', '1' ),
            ),
            array(
                'id'             => 'footer_row_2_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Padding', 'wega'),
                'subtitle'       => esc_html__('Choose the spacing for the second row from footer.', 'wega'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '90px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_2margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Margin', 'wega'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'wega'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_2border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #2 - Borders', 'wega'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'wega'),
                'output'   => array('.footer-row-2'),
                'all'      => false,
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Footer Rows - Row #3', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_footer_row_3',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #3 - Status', 'wega' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 3', 'wega' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_3_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #3 - Layout', 'wega' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_3', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_3_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Padding', 'wega'),
                'subtitle'       => esc_html__('Choose the spacing for the third row from footer.', 'wega'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_3margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Margin', 'wega'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'wega'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '20px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_3border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #3 - Borders', 'wega'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'wega'),
                'output'   => array('.footer-row-3'),
                'all'      => false,
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            )
        ),
    ));



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Bottom Bar', 'wega' ),
        'id'         => 'mt_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_footer_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Text', 'wega'),
                'default' => '<a href="https://wega.modeltheme.com/">Construction WordPress Theme</a> by ModelTheme <span style="float: right;">Elite Author on ThemeForest</span>',
            ),
            array(         
                'id'       => 'mt_footer_bottom_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (bottom) - background', 'wega'),
                'subtitle' => esc_html__('Footer background with image or color.', 'wega'),
                'output'      => array(
                    'footer.footer1 .footer',
                    'footer.footer2 .footer-div-parent',
                ),
                'default'  => array(
                    'background-color' => '#232323',
                )
            ),
            array(
                'id'        => 'mt_footer_bottom_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Bottom Text Color', 'wega' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'wega' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'wega' ),
                'output'    => array('color' => 'footer .footer h1.widget-title, footer .footer h3.widget-title, footer .footer .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
        ),
    ));



    /**

    ||-> SECTION: Contact Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Contact Settings', 'wega' ),
        'id'    => 'mt_contact',
        'icon'  => 'el el-icon-map-marker-alt'
    ));
    // GENERAL
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Contact', 'wega' ),
        'id'         => 'mt_contact_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_contact_phone',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'wega'),
                'subtitle' => esc_html__('Contact phone number displayed on the contact us page.', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_contact_email',
                'type' => 'text',
                'title' => esc_html__('Email', 'wega'),
                'subtitle' => esc_html__('Contact email displayed on the contact us page., additional info is good in here.', 'wega'),
                'validate' => 'email',
                'msg' => 'custom error message',
                'default' => ''
            ),
            array(
                'id' => 'mt_contact_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'wega'),
                'subtitle' => esc_html__('Enter your contact address', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_working_hours',
                'type' => 'text',
                'title' => esc_html__('Working hours', 'wega'),
                'subtitle' => esc_html__('Enter your working hours', 'wega'),
                'default' => ''
            )
        ),
    ));
    
    // MAILCHIMP
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Mailchimp', 'wega' ),
        'id'         => 'mt_contact_mailchimp',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_mailchimp_apikey',
                'type' => 'text',
                'title' => esc_html__('Mailchimp apiKey', 'wega'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your apiKey', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_mailchimp_listid',
                'type' => 'text',
                'title' => esc_html__('Mailchimp listId', 'wega'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your listId', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_mailchimp_data_center',
                'type' => 'text',
                'title' => esc_html__('Mailchimp form datacenter', 'wega'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your form datacenter', 'wega'),
                'default' => ''
            )
        ),
    ));



    /**
    ||-> SECTION: Blog Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog Settings', 'wega' ),
        'id'    => 'mt_blog',
        'icon'  => 'el el-icon-comment'
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Archive', 'wega' ),
        'id'         => 'mt_blog_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Blog List Layout', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Blog List Layout', 'wega' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'wega' ),
                'options'  => array(
                    'mt_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_blog_left_sidebar'
            ),
            array(
                'id'       => 'mt_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Blog List Sidebar', 'wega' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'wega' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_blog_layout', '!=', 'mt_blog_fullwidth'),
            )
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Post', 'wega'),
        'id'         => 'mt_blog_single_pos',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_single_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Single Blog List Layout', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_single_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Single Blog List Layout', 'wega'),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'wega'),
                'options'  => array(
                    'mt_single_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_single_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_single_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'wega' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_single_blog_left_sidebar'
            ),
            array(
                'id'       => 'mt_single_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Single Blog List Sidebar', 'wega' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'wega' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_single_blog_layout', '!=', 'mt_single_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_single_blog_typo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Single Blog Post Font family', 'wega').'</h3>'
            ),
            array(
                'id'          => 'mt_single_post_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Blog Post Font family', 'wega'),
                'subtitle'    => esc_html__( 'Default color: #666666; Font-size: 18px; Line-height: 31px;', 'wega'),
                'google'      => true, 
                'font-size'   => true,
                'line-height' => true,
                'color'       => true,
                'font-backup' => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'font-weight'  => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array(
                    '.single article .article-content p',
                    'p',
                    '.post-excerpt',

                ),
                'units'       =>'px',
                'default'     => array(
                    'color' => '#666666', 
                    'font-size' => '18px',
                    'font-weight' => '400', 
                    'line-height' => '26px', 
                    'font-family' => 'Yantramanav', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_single_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Other Single Post Elements', 'wega').'</h3>'
            ),
            array(
                'id'       => 'mt_post_featured_image',
                'type'     => 'switch', 
                'title'    => esc_html__('Single post featured image.', 'wega'),
                'subtitle' => esc_html__('Show or Hide the featured image from blog post page.".', 'wega'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_related_posts',
                'type'     => 'switch', 
                'title'    => esc_html__('Related Posts', 'wega'),
                'subtitle' => esc_html__('Enable or disable related posts', 'wega'),
                'default'  => false,
            ),
            array(
                'id'       => 'mt_enable_authorbio',
                'type'     => 'switch', 
                'title'    => esc_html__('About Author', 'wega'),
                'subtitle' => esc_html__('Enable or disable "About author" section on single post', 'wega'),
                'default'  => false,
            ),
        ),
    ));
    
    /**
    ||-> SECTION: Social Media Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Social Media Settings', 'wega' ),
        'id'    => 'mt_social_media',
        'icon'  => 'el el-icon-myspace'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'wega' ),
        'id'         => 'mt_social_media_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Global Social Links', 'wega').'</h3>'
            ),
            array(
                'id' => 'mt_social_fb',
                'type' => 'text',
                'title' => esc_html__('Facebook URL', 'wega'),
                'subtitle' => esc_html__('Type your Facebook url.', 'wega'),
                'validate' => 'url',
                'default' => 'http://facebook.com'
            ),
            array(
                'id' => 'mt_social_tw',
                'type' => 'text',
                'title' => esc_html__('Twitter username', 'wega'),
                'subtitle' => esc_html__('Type your Twitter username.', 'wega'),
                'default' => 'https://twitter.com/'
            ),
            array(
                'id' => 'mt_social_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest URL', 'wega'),
                'subtitle' => esc_html__('Type your Pinterest url.', 'wega'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_skype',
                'type' => 'text',
                'title' => esc_html__('Skype Name', 'wega'),
                'subtitle' => esc_html__('Type your Skype username.', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_social_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram URL', 'wega'),
                'subtitle' => esc_html__('Type your Instagram url.', 'wega'),
                'validate' => 'url',
                'default' => 'https://www.instagram.com'
            ),
            array(
                'id' => 'mt_social_youtube',
                'type' => 'text',
                'title' => esc_html__('YouTube URL', 'wega'),
                'subtitle' => esc_html__('Type your YouTube url.', 'wega'),
                'validate' => 'url',
                'default' => 'https://www.youtube.com'
            ),
            array(
                'id' => 'mt_social_dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble URL', 'wega'),
                'subtitle' => esc_html__('Type your Dribbble url.', 'wega'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_linkedin',
                'type' => 'text',
                'title' => esc_html__('LinkedIn URL', 'wega'),
                'subtitle' => esc_html__('Type your LinkedIn url.', 'wega'),
                'validate' => 'url',
                'default' => 'https://www.linkedin.com/'
            ),
            array(
                'id' => 'mt_social_deviantart',
                'type' => 'text',
                'title' => esc_html__('Deviant Art URL', 'wega'),
                'subtitle' => esc_html__('Type your Deviant Art url.', 'wega'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_digg',
                'type' => 'text',
                'title' => esc_html__('Digg URL', 'wega'),
                'subtitle' => esc_html__('Type your Digg url.', 'wega'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_flickr',
                'type' => 'text',
                'title' => esc_html__('Flickr URL', 'wega'),
                'subtitle' => esc_html__('Type your Flickr url.', 'wega'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_stumbleupon',
                'type' => 'text',
                'title' => esc_html__('Stumbleupon URL', 'wega'),
                'subtitle' => esc_html__('Type your Stumbleupon url.', 'wega'),
                'validate' => 'url',
                'default' => 'https://www.stumbleupon.com'
            ),
            array(
                'id' => 'mt_social_tumblr',
                'type' => 'text',
                'title' => esc_html__('Tumblr URL', 'wega'),
                'subtitle' => esc_html__('Type your Tumblr url.', 'wega'),
                'validate' => 'url',
                'default' => 'https://www.tumblr.com'
            ),
            array(
                'id' => 'mt_social_vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo URL', 'wega'),
                'subtitle' => esc_html__('Type your Vimeo url.', 'wega'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id'   => 'mt_divider_twitter_keys',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => '<h3>'.esc_html__('Twitter Keys - Necessary for Tweets Feed Shortcode', 'wega').'</h3>'
            ),
            array(
                'id' => 'mt_tw_consumer_key',
                'type' => 'text',
                'title' => esc_html__('Twitter Consumer Key', 'wega'),
                'subtitle' => esc_html__('Type your Twitter Consumer key.', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_tw_consumer_secret',
                'type' => 'text',
                'title' => esc_html__('Twitter Consumer Secret key', 'wega'),
                'subtitle' => esc_html__('Type your Twitter Consumer Secret key.', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_tw_access_token',
                'type' => 'text',
                'title' => esc_html__('Twitter Access Token', 'wega'),
                'subtitle' => esc_html__('Type your Access Token.', 'wega'),
                'default' => ''
            ),
            array(
                'id' => 'mt_tw_access_token_secret',
                'type' => 'text',
                'title' => esc_html__('Twitter Access Token Secret', 'wega'),
                'subtitle' => esc_html__('Type your Twitter Access Token Secret.', 'wega'),
                'default' => ''
            )
        ),
    ));
    /*
     * <--- END SECTIONS
     */
