<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "bufet";

    $theme_dir = get_template_directory_uri();

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';

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
        'menu_title'           => __( 'Theme Options', 'bufet' ),
        'page_title'           => __( 'Theme Options', 'bufet' ),
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
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 2,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
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
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

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

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf('<p>%s <strong>%s</strong></p>', esc_html( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable:', 'buffet' ), $v );
    } else {
        $args['intro_text'] = sprintf('<p>%s</p>',  __( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'bufet' ) );
    }

    // Add content after the form.
    $args['footer_text'] = sprintf('<p>%s</p>', __( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'bufet' ) );

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
            'title'   => esc_html__( 'Theme Information 1', 'bufet' ),
            'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'bufet' ) . '</p>'
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'bufet' ),
            'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'bufet' ) . '</p>'
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content =  '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'bufet' ) . '</p>';
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */


     Redux::setSection( $opt_name, array(
         'title'            => esc_html__( 'General Settings', 'bufet' ),
         'id'               => 'general_settings',
         'class'            => 'option-page-layout',
         'customizer_width' => '450px',
         'fields'           => array(
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'bufet' ),
                'subtitle' => esc_html__( 'Show or hide preloader', 'bufet' ),
                'default'  => true
            ),
            array(
                'id'       => 'preloader_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Preloader background', 'bufet' ),
                'subtitle' => esc_html__( 'Choose preloader background color', 'bufet' ),
                'output'    => array('.preloader-wrapper'),
                'required'   => array( 'preloader', 'equals', true ),
                'default'   => array(
                    'background-color' => '#00c9fd',
                )
            ),


            array(
                'id'       => 'scrolltotop',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable scroll to top.', 'bufet' ),
                'subtitle' => esc_html__( 'Show or hide scroll to top button.', 'bufet' ),
                'default'  => true
            ),
            array(
                'id'       => 'scrolltotop_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Scroll to top background', 'bufet' ),
                'subtitle' => esc_html__( 'Choose scroll to top background color', 'bufet' ),
                'output'    => array('.scrolltotop'),
                'required'   => array( 'scrolltotop', 'equals', true ),
                'default'   => array(
                    'background-color' => '#39A0F5',
                )
            ),
            array(
                'id'       => 'scrolltotop_bg_hover',
                'type'     => 'background',
                'title'    => esc_html__( 'Scroll to top hover background', 'bufet' ),
                'subtitle' => esc_html__( 'Choose scroll to top hover background color', 'bufet' ),
                'output'    => array('.scrolltotop:hover'),
                'required'   => array( 'scrolltotop', 'equals', true ),
                'default'   => array(
                    'background-color' => '#5783EB',
                )
            ),
         )
     ) );


     Redux::setSection( $opt_name, array(
         'title'            => esc_html__( 'Header', 'bufet' ),
         'id'               => 'header_settings',
         'class'            => 'option-page-layout',
         'customizer_width' => '450px',
         'fields'           => array(
             array(
                 'id'       => 'menu_scheme',
                 'type'     => 'image_select',
                 'title'    => esc_html__( 'Header Variations', 'bufet' ),
                 'subtitle'    => esc_html__( 'Select the header color variations.', 'bufet' ),
                 'options'  => array(
                    'homepage-1' => $theme_dir . '/assets/img/headers/header-style1.png',
                    'homepage-2' => $theme_dir . '/assets/img/headers/header-style2.png',
                    'homepage-3' => $theme_dir . '/assets/img/headers/header-style3.png',
                    'homepage-4' => $theme_dir . '/assets/img/headers/header-style4.png',
                    'custom-header' => $theme_dir . '/assets/img/headers/Custom-Header-Color.png'
                ),
                 'default'     => 'homepage-1',
             ),


             array(
                 'id'       => 'header_stay_up',
                 'type'     => 'switch',
                 'title'    => esc_html__( 'Make header stay up while scrolling.', 'bufet' ),
                 'subtitle'    => esc_html__( 'Turn on this to make the header stay up on top while scrolling.', 'bufet' ),
                 'default'     => false,
             ),



              array(
                  'id'    => 'before_scroll',
                  'type'  => 'info',
                  'style' => 'success',
                  'title' => __('Header!', 'bufet'),
                  'icon'  => 'el-icon-info-sign',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
                  'desc'  => __( 'Header - Before Scroll', 'bufet')
              ),

              array(
                  'id'          => 'header_nav_background_before_scroll',
                  'type'        => 'color_gradient',
                  'title'       => esc_html__('Navbar Background', 'bufet'),
                  'output'      => array('header.custom-header.header-top.headroom.headroom--not-bottom.headroom--pinned.headroom--top'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
                  'subtitle'    => esc_html__('Set your preferred gradient backgrond  for Navigation.', 'bufet'),
                  'default'  => array(
                      'from' => '#fff',
                      'to'   => '#fff',
                  ),
              ),

              array(
                  'id'          => 'menu_item_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Menu Item Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--top ul li a'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),

              array(
                  'id'          => 'menu_item_hover_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Menu Item Hover Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--top ul li a:hover'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),

              array(
                  'id'          => 'menu_item_dropdown_bg_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Dropdown Background Color', 'bufet'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),


              array(
                  'id'          => 'menu_item_dropdown_font_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Dropdown Menu Item Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--top #mainmenu .sub-menu  li a'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),

              array(
                  'id'          => 'menu_item_dropdown_hover_font_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Dropdown Menu Item Hover Font Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--top #mainmenu .sub-menu li a:hover'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),


              array(
                   'id'    => 'after_scroll',
                   'type'  => 'info',
                   'style' => 'success',
                   'title' => __('Header!', 'bufet'),
                   'icon'  => 'el-icon-info-sign',
                   'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
                   'desc'  => __( 'Header - After Scroll', 'bufet')
              ),
              array(
                  'id'          => 'header_nav_background_after_scroll',
                  'type'        => 'color_gradient',
                  'title'       => esc_html__('Navbar Background', 'bufet'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
                  'subtitle'    => esc_html__('Set your preferred gradient backgrond  for Navigation.', 'bufet'),
                  'default'  => array(
                      'from' => '#3281D9',
                      'to'   => '#3281D9',
                  ),
              ),

              array(
                  'id'          => 'after_scroll_menu_item_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Menu Item Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--not-top ul li a'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),

              array(
                  'id'          => 'after_scroll_menu_item_hover_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Menu Item Hover Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--not-top ul li a:hover'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),

              array(
                  'id'          => 'after_scroll_menu_item_dropdown_bg_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Dropdown Background Color', 'bufet'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),


              array(
                  'id'          => 'after_scroll_menu_item_dropdown_font_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Dropdown Menu Item Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--not-top #mainmenu .sub-menu  li a'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),

              array(
                  'id'          => 'after_scroll_menu_item_dropdown_hover_font_color',
                  'type'        => 'color',
                  'title'       => esc_html__('Dropdown Menu Item Hover Font Color', 'bufet'),
                  'output'      => array('header.custom-header.headroom--not-top #mainmenu .sub-menu li a:hover'),
                  'units'       =>'px',
                  'required'   => array( 'menu_scheme', 'equals', 'custom-header' ),
              ),



         )
     ) );




    Redux::setSection( $opt_name, array(
        'title'            => __( 'Logo', 'bufet' ),
        'id'               => 'logo_settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Logo', 'bufet' ),
                'subtitle' => esc_html__( 'Choose the site logo', 'bufet' ),
                'default'  => array(
                    'url'=>  get_template_directory_uri() . '/assets/img/logo/logo.png'
                ),
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Breadcrumbs', 'bufet' ),
        'id'               => 'breadcrumb_settings',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'breadcrumb_on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumb On/Off ', 'bufet' ),
                'subtitle'    => esc_html__( 'Show/hide the breadcrumb.', 'bufet' ),
                'desc'      => esc_html__( 'This setting can be override by page breatdcrumb settings.', 'bufet' ),
                'default'     => true,
            ),
            array(
                'id'       => 'breadcrumb_sep',
                'type'     => 'text',
                'title'    => __( 'Breadcrumb Seperator ', 'bufet' ),
                'default'     => '-',
                'required'   => array( 'breadcrumb_on', 'equals', true ),
            ),
            array(
                'id'        => 'breadcrumb_background',
                'type'      => 'background',
                'output'    => array('.blog-full-page-area.breadcrumb-area'),
                'title'     => esc_html__( 'Breadcrumb Background', 'bufet' ),
                'subtitle'  => esc_html__( 'Customize your breadcrumb background area.', 'bufet' ),
                'desc'      => esc_html__( 'This setting can be override by page breatdcrumb settings.', 'bufet' ),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
                'default'   => array(
                    'background-color' => '#EFEFEE',
                )
            ),
            array(
                'id'                => 'breadcrumb_spacing',
                'type'              => 'spacing',
                'output'            => array('.blog-full-page-area.breadcrumb-area'),
                'mode'              => 'padding',
                'units'             => array('em', 'px'),
                'units_extended'    => 'false',
                'title'             => esc_html__('Breadcrumb Area Padding', 'bufet'),
                'subtitle'          => esc_html__('Please specify breadcrumb area padding.', 'bufet'),
                'required'          => array( 'breadcrumb_on', 'equals', true ),
            ),
            array(
                'id'          => 'breadcrumb_typography',
                'type'        => 'typography',
                'title'       => esc_html__('Breadcrumb Typography', 'bufet'),
                'google'      => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'output'      => array('.breadcrumb-area .breadcrumb_title'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for breadcrumb title', 'bufet'),
                'required'   => array( 'breadcrumb_on', 'equals', true ),
            ),
        )
    ) );




    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'bufet' ),
        'id'               => 'body_typography',
        'customizer_width' => '450px',
        'fields'           => array(
             array(
                 'id'       => 'bdy_typography',
                'type'        => 'typography',
                'title'       => esc_html__('Body Typography', 'bufet'),
                'google'      => true,
                'font-backup' => true,
                'line-height' => true,
                'letter-spacing' => true,
                'output'      => array('body'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for body', 'bufet'),

            ),
             array(
                 'id'       => 'h1_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H1 Typography', 'bufet'),
                'google'      => true,
                'font-backup' => true,
                'line-height' => true,
                'letter-spacing' => true,
                'output'      => array('h1, .h1, body h1, body .h1'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h1', 'bufet'),

            ),
             array(
                 'id'       => 'h2_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H2 Typography', 'bufet'),
                'google'      => true,
                'font-backup' => true,
                'line-height' => true,
                'letter-spacing' => true,
                'output'      => array('h2, .h2, body h2, body .h2'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h2', 'bufet'),

            ),
             array(
                 'id'       => 'h3_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H3 Typography', 'bufet'),
                'google'      => true,
                'font-backup' => true,
                'line-height' => true,
                'letter-spacing' => true,
                'output'      => array('h3, .h3, body h3, body .h3'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h3', 'bufet'),

            ),
             array(
                 'id'       => 'h4_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H4 Typography', 'bufet'),
                'google'      => true,
                'font-backup' => true,
                'line-height' => true,
                'letter-spacing' => true,
                'output'      => array('h4, .h4, body h4, body .h4'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h4', 'bufet'),

            ),
             array(
                 'id'       => 'h5_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H5 Typography', 'bufet'),
                'google'      => true,
                'line-height' => true,
                'font-backup' => true,
                'letter-spacing' => true,
                'output'      => array('h5, .h5, body h5, body .h5'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h5', 'bufet'),

            ),
             array(
                 'id'       => 'h6_typography',
                'type'        => 'typography',
                'title'       => esc_html__('H6 Typography', 'bufet'),
                'google'      => true,
                'font-backup' => true,
                'line-height' => true,
                'letter-spacing' => true,
                'output'      => array('h6, .h6, body h6, body .h6'),
                'units'       =>'px',
                'subtitle'    => esc_html__('Set typography for header h6', 'bufet'),

            )
        )
    ) );





    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Settings', 'bufet' ),
        'id'               => 'page_setings',
        'desc'             => esc_html__( 'Buffet blog settings!', 'bufet' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
    ) );




    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Page', 'bufet' ),
        'id'               => 'blog_settings',
        'customizer_width' => '450px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'bp_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Blog Page Title', 'bufet' ),
                'subtitle'    => esc_html__( 'Give any breadcrumb page title for the blog page.', 'bufet' ),
                'default'     => esc_html__('Latest Blog', 'bufet'),
            ),
            array(
                'id'       => 'blog_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Layout', 'bufet' ),
                'subtitle' => esc_html__( 'Choose the layout you want in blog pages', 'bufet' ),
                'options'          => array(
                    'fullpage' => get_template_directory_uri() .'/assets/img/layouts/fullpage.png"',
                    'left-sidebar' => get_template_directory_uri() .'/assets/img/layouts/left-sidebar.jpg"',
                    'right-sidebar' => get_template_directory_uri() .'/assets/img/layouts/right-sidebar.jpg"',
                ),
                'default'  => 'right-sidebar',
            ),
            array(
                'id'       => 'blog_grid',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Grid', 'bufet' ),
                'subtitle' => esc_html__( 'Choose the number of column you want in blog pages', 'bufet' ),
                'options'          => array(
                    'one-column' => get_template_directory_uri() .'/assets/img/layouts/1-col.png"',
                    'two-column' => get_template_directory_uri() .'/assets/img/layouts/2-col.png"',
                    'three-column' => get_template_directory_uri() .'/assets/img/layouts/3-col.png"',
                ),
                'default'  => 'one-column',
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Page', 'bufet' ),
        'id'               => 'single_page_settings',
        'customizer_width' => '450px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'sp_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Single Page Title', 'bufet' ),
                'subtitle'    => esc_html__( 'Give any breadcrumb page title for the single article page.', 'bufet' ),
                'default'     => 'Blog Details',
            ),
            array(
                'id'       => 'single_page_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Single Page Layout', 'bufet' ),
                'subtitle' => esc_html__( 'Choose the layout you want in single pages', 'bufet' ),
                'options'          => array(
                    'fullpage' => get_template_directory_uri() .'/assets/img/layouts/fullpage.png"',
                    'left-sidebar' => get_template_directory_uri() .'/assets/img/layouts/left-sidebar.jpg"',
                    'right-sidebar' => get_template_directory_uri() .'/assets/img/layouts/right-sidebar.jpg"',
                ),
                'default'  => 'right-sidebar',
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Google Apps', 'bufet' ),
        'id'               => 'google_apps',
        'desc'             => esc_html__( 'Google Apps', 'bufet' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Google Api', 'bufet' ),
        'id'               => 'google_api',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'google-map-api-key',
                'type'     => 'text',
                'title'    => esc_html__( 'Google JavaScript Map API key', 'bufet' ),
                'description' => esc_html__('Add your google javascript api key. Read the theme documentation to learn more about google javascript api key.', 'bufet'),
            ),
        )
    ) );



     Redux::setSection( $opt_name, array(
         'title'            => esc_html__( 'Coming Soon', 'bufet' ),
         'id'               => 'coming_soon_settings',
         'class'            => 'option-page-layout',
         'customizer_width' => '450px',
         'fields'           => array(
            array(
                'id'       => 'coming_soon_mode',
                'type'     => 'switch',
                'title'    => esc_html__( 'Coming Soon Mode', 'bufet' ),
                'subtitle' => esc_html__( 'Enable or Disable Coming Soon Mode', 'bufet' ),
                'default'  => false
            ),
            array(
                'id'    => 'coming_soon_page',
                'type'  => 'select',
                'title' => __( 'Select Coming Soon Page', 'bufet' ),
                'description' => __( 'Select the coming soon template.', 'bufet' ),
                'data'  => 'posts',
                'args'  => array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
                'required'   => array( 'coming_soon_mode', 'equals', true ),

            ),
         )
     ) );



    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'bufet' ),
        'id'               => 'footer',
        'desc'             => esc_html__( 'Buffet footer settings!', 'bufet' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'           => array(

            array(
                'id'       => 'use_custom_footer_template',
                'type'     => 'switch',
                'title'    => esc_html__( 'Use Custom Footer Template', 'bufet' ),
                'description' => esc_html__('Wish to use any custom footer template?', 'bufet'),
            ),
            array(
                'id'    => 'footer_section',
                'type'  => 'select',
                'title' => __( 'Select Footer Template', 'bufet' ),
                'description' => __( 'You can build your footer with King Composer Sections manager and select that template section here so that your selected footer template will show all over the site.', 'bufet' ),
                'data'  => 'posts',
                'args'  => array(
                    'post_type'      => 'kc-section',
                    'posts_per_page' => -1,
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ),
                'required'   => array( 'use_custom_footer_template', 'equals', true ),

            ),


        )
    ) );




    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'bufet' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'bufet' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }
