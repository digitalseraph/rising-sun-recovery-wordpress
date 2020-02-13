<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
	}

    // This is your option name where all the Redux data is stored.
    $opt_name = 'kunco_theme_options';
	

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // NM: Disable tracking
		'disable_tracking' => true,
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
		    'menu_title'			=> esc_html__( 'Theme Settings', 'kunco' ),
		    'page_title'			=> esc_html__( 'Theme Settings', 'kunco' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
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
        'customizer'           => false,
        // Enable basic customizer support

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
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
        'footer_credit'     => '&nbsp;',
		    // Footer credit text

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
		    'system_info'          => false,
        // REMOVE
		
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
            )
          )
        )
    );
  Redux::setArgs( $opt_name, $args );
	
  /*
   * ---> START SECTIONS
  */
	Redux::setSection( $opt_name, array(
		'title' => esc_html__('General Options', 'kunco'),
    'desc' => '',
    'icon' => 'el-icon-wrench',
    'fields' => array(
      array(
        'id' => 'skin_color',
        'type' => 'select',
        'title' => esc_html__('Skin Color', 'kunco'),
        'desc' => '',
        'options' => array(
          '' => 'Default',
          'custom'          => 'Custom Skin(#FCC91B)',
          'blue'          => 'Blue',
          'blue-2'        => 'Blue II',
          'blue-3'        => 'Blue III',
          'brown'         => 'Brown',
          'green'         => 'Green',
          'lilac'         => 'Lilac',
          'lime-green'    => 'Lime Green',
          'orange'        => 'Orange',
          'pigad-blue'    => 'Pigad Blue',
          'pink'          => 'Pink',
          'purple'        => 'Purple',
          'red'           => 'Red',
          'turquoise'     => 'Turquoise',
          'turquoise2'    => 'Turquoise II',
          'violet-red'    => 'Violet Red',
          'yellow'        => 'Yellow'
          ),
        'default' => ''
      ),
      array(
        'id' => 'page_layout',
        'type' => 'button_set',
        'title' => esc_html__('Page Layout', 'kunco'),
        'subtitle' => esc_html__('Select the page layout type', 'kunco'),
        'desc' => '',
        'options' => array('boxed' => 'Boxed','fullwidth' => 'Fullwidth'),
        'default' => 'fullwidth'
      ),
      array(
        'id' => 'enable_backtotop',
        'type' => 'button_set',
        'title' => esc_html__('Enable Back To Top', 'kunco'),
        'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'kunco'),
        'desc' => '',
        'options' => array('1' => 'On','0' => 'Off'),
        'default' => '1'
      ),
      array(
        'id' => 'map_api_key',
        'type' => 'text',
        'title' => esc_html__('Google Map API key', 'kunco'),
        'default' => ''
      ),
      array(
        'id'  => 'breadcrumb_info',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Breadcrumb', 'kunco' ) . '</h3>'
      ),
      array(
        'id' => 'enable_breadcrumb',
        'type' => 'button_set',
        'title' => esc_html__('Enable Breadcrumb', 'kunco'),
        'subtitle' => esc_html__('Enable/Disable Breadcrumb for all Page', 'kunco'),
        'desc' => '',
        'options' => array('enable' => 'Enable','disable' => 'Disable'),
        'default' => 'enable'
      ),
      array(
        'id' => 'image_breadcumb_standard',
        'type' => 'button_set',
        'title' => esc_html__('Enable Image for Breadcumb Standard', 'kunco'),
        'desc' => '',
        'options' => array('show-bg' => 'On','hidden-bg' => 'Off'),
        'default' => 'show-bg'
      ),
      array(
        'id'  => 'breadcrumb_background_image_default',
        'type'  => 'media', 
        'url' => true,
        'title' => esc_html__( 'Background Image Default for Breadcumb', 'kunco' ),
      ),
    )
	));
	
   //Header
	Redux::setSection( $opt_name, array(
		'title' => esc_html__('Header Options', 'kunco'),
    'desc' => '',
    'icon' => 'el-icon-compass',
    'fields' => array(
      array(
        'id' => 'header_layout',
        'type' => 'select',
        'title' => esc_html__('Header Layout', 'kunco'),
        'subtitle' => esc_html__('Select a header layout option from the examples.', 'kunco'),
        'desc' => '',
        'options' => array(
          ''   => 'Default',
          'v2' => 'Header v2',
          'v3' => 'Header v3',
          'v4' => 'Header v4'
        ),
        'default' => ''
      ),
      array(
        'id' => 'stick_menu',
        'type' => 'button_set',
        'title' => esc_html__('Sticky Menu', 'kunco'),
        'subtitle' => esc_html__('Enable style menu when scoll page.', 'kunco'),
        'desc' => '',
        'options' => array('no-sticky' => 'Disable', 'gv-sticky-menu' => 'Enable'),
        'default' => 'gv-sticky-menu'
      ),
      array(
        'id' => 'header_logo', 
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Logo in header', 'kunco'), 
        'default' => ''
      ),  
      array(
        'id' => 'header_logo_mobile',
        'type' => 'media',
        'url' => true,
        'title' => esc_html__('Logo in header mobile', 'kunco'),
        'default' => ''
      ),
      array(
        'id' => 'enable_topbar',
        'type' => 'button_set',
        'title' => esc_html__('Enable Topbar', 'kunco'),
        'subtitle' => esc_html__('Enable/Disable Topbar for header Default.', 'kunco'),
        'desc' => '',
        'options' => array('disable' => 'Disable', 'enable' => 'Enable'),
        'default' => 'disable'
      ),
      array(
        'id'    => 'link_quick_text',
        'type'    => 'text',
        'title'   => esc_html__( 'Text Button Header', 'kunco' ),
        'default' => 'Donate Now',
      ),
      array(
        'id'    => 'link_quick_button',
        'type'    => 'text',
        'title'   => esc_html__( 'Link Button Header', 'kunco' ),
        'default' => '#',
      ),
    )
	) );

  //Footer
  Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer Options', 'kunco'),
    'desc' => '',
    'icon' => 'el-icon-compass',
    'fields' => array(
      array(
        'id' => 'footer_layout',
        'type' => 'select',
        'options' => kunco_get_footer(),
        'default' => 'default-option-theme'
      ),
      array(
        'id' => 'copyright_text',
        'type' => 'editor',
        'title' => esc_html__('Footer Copyright Text', 'kunco'),
        'desc' => '',
        'default' => "Copyright - 2018 - Company - All rights reserved. Powered by WordPress."
      )
    )
  ) );
  
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Styling', 'kunco' ),
		'icon'		=> 'el-icon-pencil',
		'fields'	=> array(
			array(
				'id'	=> 'colors_info_styling',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Colors', 'kunco' ) . '</h3>'
			),
			array(
				'id'			=> 'main_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Main Color', 'kunco' ),
				'desc'			=> esc_html__( 'Used for the body text.', 'kunco' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'info_background',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Background', 'kunco' ) . '</h3>'
			),
			array(
				'id'			=> 'main_background_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Background Color', 'kunco' ),
				'desc'			=> esc_html__( 'Used for the main site background.', 'kunco' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'main_background_image',
				'type'	=> 'media', 
				'url'	=> true,
				'title'	=> esc_html__( 'Background Image', 'kunco' ),
				'desc'	=> esc_html__( 'Upload a background image or specify a URL (boxed layout).', 'kunco' )
			),
			array(
				'id'		=> 'main_background_image_type',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Background Type', 'kunco' ),
				'desc'		=> esc_html__( 'Select the background-image type (fixed image or repeat pattern/texture).', 'kunco' ),
				'options'	=> array( 'fixed' => 'Fixed (Full)', 'repeat' => 'Repeat (Pattern)' ),
				'default'	=> 'fixed'
			),
			array(
				'id'	=> 'top_bar_info_styling',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Top Bar', 'kunco' ) . '</h3>'
			),
			array(
				'id'			=> 'top_bar_font_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Font Color', 'kunco' ),
				'desc'			=> esc_html__( 'Used for the top bar text.', 'kunco' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'top_bar_background_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Background Color', 'kunco' ),
				'desc'			=> esc_html__( 'Used for the top bar background.', 'kunco' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'header_info_styling',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Header', 'kunco' ) . '</h3>'
			),
			array(
				'id'		=> 'header_background_color',
				'type'		=> 'color',
				'title'		=> esc_html__( 'Background Color', 'kunco' ),
				'default'	=> '',
				'validate'	=> 'color'
			),
      array(
        'id'    => 'header_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Text Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'header_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'header_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Color Hover Link', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'  => 'menu_info_styling',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Menu', 'kunco' ) . '</h3>'
      ),
      array(
        'id'    => 'menu_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Background Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Menu Text Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Menu Link Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'menu_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Link Hover Color ', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'    => 'menu_sub_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Background Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_sub_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Color Text', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_sub_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Link Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'menu_sub_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Link Hover Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'  => 'main_content_info_styling',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Main Content', 'kunco' ) . '</h3>'
      ),
      array(
        'id'    => 'content_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Background Color', 'kunco' ),
        'desc'    => esc_html__( 'Used for the header background.', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'content_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Text Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'content_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'content_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Hover Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'  => 'footer_info_styling',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Footer', 'kunco' ) . '</h3>'
      ),
      array(
        'id'    => 'footer_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Background Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'footer_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Text Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'footer_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'footer_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Hover Color', 'kunco' ),
        'default' => '',
        'validate'  => 'color'
      ),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Typography', 'kunco' ),
		'icon'		=> 'el-icon-font',
		'fields'	=> array(
			array (
				'id'	=> 'main_font_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Main Font', 'kunco' ) . '</h3>',
			),
			array(
				'id'		=> 'main_font_source',
				'type'		=> 'radio',
				'title'		=> esc_html__( 'Font Source', 'kunco' ),
				'options'	=> array(
          '0' => '(none)',
					'1'	=> 'Standard + Google Webfonts', 
				),
				'default'	=> '1'
			),
			// Main font: Standard + Google Webfonts
			array (
				'id'			=> 'main_font',
				'type'			=> 'typography',
				'title'			=> esc_html__( 'Font Face', 'kunco' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> true,
				'font-size'		=> false,
				'color'			  => false,
        'all_styles'  => true,
				'default'		=> array (
					'font-family'	=> 'Open Sans',
					'subsets'		=> '',
				),
				'required'		=> array( 'main_font_source', '=', '1' )
			),
		
			// Secondary font
			array (
				'id'	=> 'secondary_font_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Secondary Font', 'kunco' ) . '</h3>',
			),
			array(
				'id'		=> 'secondary_font_source',
				'type'		=> 'radio',
				'title'		=> esc_html__('Font Source', 'kunco'),
				'options'	=> array(
					'0' => '(none)',
					'1'	=> 'Standard + Google Webfonts', 
				),
				'default'	=> '0'
			),
			// Secondary font: Standard + Google Webfonts
			array (
				'id'			=> 'secondary_font',
				'type'			=> 'typography',
				'title'			=> esc_html__( 'Font Face', 'kunco' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> true,
				'font-size'		=> false,
        'all_styles'  => true,
				'color'			=> false,
				'default'		=> array (
					'font-family'	=> 'Open Sans',
					'subsets'		=> '',
				),
				'required'		=> array( 'secondary_font_source', '=', '1' )
			),
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Blog', 'kunco' ),
		'icon'		=> 'el-icon-website',
		'fields'	=> array(
			array(
				'id'	=> 'blog_archive_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Archive/Listing', 'kunco' ) . '</h3>',
			),
			array(
				'id'		=> 'blog_categories_layout',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Categories Layout', 'kunco' ),
				'desc'		=> esc_html__( 'Select categories menu layout.', 'kunco' ),
				'options'	=> array( 'list' => 'List', 'grid' => 'Grid' ),
				'default'	=> 'list'
			),
			array(
				'id'			=> 'blog_categories_columns',
				'type'			=> 'slider',
				'title'			=> esc_html__( 'Category Columns', 'kunco' ),
				'desc'			=> esc_html__( 'Select the number of category columns to display.', 'kunco' ),
				'default'		=> 4,
				'min'			=> 2,
				'max'			=> 5,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'blog_categories_layout', '=', 'grid' )
			),
      array(
        'id' => 'archive_post_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Archive Page Blog Sidebar Config', 'kunco'),
        'subtitle' => "Choose single post layout.",
        'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'      => 'Right Sidebar',
           'both-sidebars'      => 'Both Sidebars'
        ),
        'desc' => '',
        'default' => 'no-sidebars'
      ),
      array(
        'id' => 'archive_post_left_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Archive Page Blog Left Sidebar', 'kunco'),
        'subtitle' => "Choose the default left sidebar for Single Post.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'blog_sidebar'
      ),
       array(
        'id' => 'archive_post_right_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Archive Page Blog Right Sidebar', 'kunco'),
        'subtitle' => "Choose the default right sidebar for Single Post.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'blog_sidebar'
      ),
			array(
        'id'    => 'blog_excerpt_limit',
        'type'    => 'text',
        'title'   => esc_html__( 'Blog Excerpt Limit', 'kunco' ),
        'default' => '30',
      ),
			array(
				'id'	=> 'blog_single_post_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Single Post', 'kunco' ) . '</h3>',
			),
      array(
        'id' => 'single_post_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Sidebar Config', 'kunco'),
        'subtitle' => "Choose single post layout.",
        'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'      => 'Right Sidebar',
           'both-sidebars'      => 'Both Sidebars'
        ),
        'desc' => '',
        'default' => 'no-sidebars'
      ),
      array(
        'id' => 'single_post_left_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Left Sidebar', 'kunco'),
        'subtitle' => "Choose the default left sidebar for Single Post.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'blog_sidebar'
      ),
       array(
        'id' => 'single_post_right_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Right Sidebar', 'kunco'),
        'subtitle' => "Choose the default right sidebar for Single Post.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'blog_sidebar'
      )
		)
	) );
	
  Redux::setSection($opt_name, array(
    'icon' => 'el-icon-th-list',
    'title' => esc_html__('Page Meta Options', 'kunco'),
    'fields' => array(
    array(
      'id' => 'default_show_page_heading',
      'type' => 'button_set',
      'title' => esc_html__('Default Show Page Heading', 'kunco'),
      'subtitle' => esc_html__('Choose the default state for the page heading, shown/hidden.', 'kunco'),
      'desc' => '',
      'options' => array('1' => 'On','0' => 'Off'),
      'default' => '1'
    ),
    array(
      'id' => 'default_sidebar_config',
      'type' => 'select',
      'title' => esc_html__('Default Page Sidebar Config', 'kunco'),
      'subtitle' => "Choose the default sidebar config for pages",
      'options' => array(
         'no-sidebars'     => 'No Sidebars',
         'left-sidebar'    => 'Left Sidebar',
         'right-sidebar'      => 'Right Sidebar',
         'both-sidebars'      => 'Both Sidebars'
      ),
      'desc' => '',
      'default' => 'no-sidebars'
    ),
    array(
      'id' => 'default_left_sidebar',
      'type' => 'select',
      'title' => esc_html__('Default Page Left Sidebar', 'kunco'),
      'subtitle' => "Choose the default left sidebar for pages",
      'data'      => 'sidebars',
      'desc' => '',
      'default' => 'sidebar-1'
    ),
    array(
      'id' => 'default_right_sidebar',
      'type' => 'select',
      'title' => esc_html__('Default Page Right Sidebar', 'kunco'),
      'subtitle' => "Choose the default right sidebar for pages",
      'data'      => 'sidebars',
      'desc' => '',
      'default' => 'sidebar-1'
    ),
    )
  ));   

	Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-shopping-cart',
    'title' => esc_html__('WooCommerce Options', 'kunco'),
    'fields' => array(
      array(
        'id'        => 'products_per_page',
        'type'      => 'text',
        'title'     => esc_html__('Products Per Page', 'kunco'),
        'subtitle'  => esc_html__('Number value.', 'kunco'),
        'desc'      => esc_html__('The amount of products you would like to show per page on shop/category pages.', 'kunco'),
        'validate'  => 'numeric',
        'default'   => '24'
      )       
    )
  ));

  Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-shopping-cart',
    'title' => esc_html__('Shop Options', 'kunco'),
    'subsection' => true,
    'fields' => array(
      array(
        'id' => 'product_display_layout',
        'type' => 'select',
        'title' => esc_html__('Default Product Display Layout', 'kunco'),
        'subtitle' => "Choose the default product display layout for WooCommerce shop/category pages.",
        'options' => array(
          'grid'      => 'Grid',
          'list'   => 'List',
        ),
        'desc' => '',
        'default' => 'standard'
      ),

      array(
        'id' => 'product_display_columns',
        'type' => 'select',
        'title' => esc_html__('Product Display Columns', 'kunco'),
        'subtitle' => "Choose the number of columns to display on shop/category pages.",
        'options' => array(
          '1'      => '1',
          '2'      => '2',
          '3'      => '3',
          '4'      => '4',
          '5'      => '5',
          '6'      => '6',
        ),
        'desc' => '',
        'default' => '4'
      ),
      array(
        'id' => 'woo_sidebar_config',
        'type' => 'select',
        'title' => esc_html__('WooCommerce Sidebar Config', 'kunco'),
        'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
        'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'      => 'Right Sidebar',
           'both-sidebars'      => 'Both Sidebars'
        ),
        'desc' => '',
        'default' => 'no-sidebars'
      ),
      array(
        'id' => 'woo_left_sidebar',
        'type' => 'select',
        'title' => esc_html__('WooCommerce Left Sidebar', 'kunco'),
        'subtitle' => "Choose the left sidebar for WooCommerce shop/category pages.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'woocommerce_sidebar'
      ),
      array(
        'id' => 'woo_right_sidebar',
        'type' => 'select',
        'title' => esc_html__('WooCommerce Right Sidebar', 'kunco'),
        'subtitle' => "Choose the right sidebar for WooCommerce shop/category pages.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'woocommerce_sidebar'
      ),
      array(
        'id' => 'woo_shop_divide_0',
        'type' => 'divide'
      ),
      array(
        'id' => 'woo_show_page_heading',
        'type' => 'button_set',
        'title' => esc_html__('Shop Category / Page Heading', 'kunco'),
        'subtitle' => esc_html__('Show page title on shop/category WooCommerce page.', 'kunco'),
        'desc' => '',
        'options' => array('1' => 'On', '0' => 'Off'),
        'default' => '1'
      ),
      array(
        'id' => 'woo_page_heading_style',
        'type' => 'select',
        'title' => esc_html__('WooCommerce Page Heading Style', 'kunco'),
        'subtitle' => "Choose the page heading style for the shop/category WooCommerce pages.",
        'options' => array(
          'standard'           => esc_html__('Standard', 'kunco'),
          'hero'               => esc_html__('Background', 'kunco')
        ),
        'desc' => '',
        'default' => 'standard'
      ),
      array(
        'id' => 'woo_page_heading_text_align',
        'type' => 'select',
        'title' => esc_html__('WooCommerce Page Heading Text Align', 'kunco'),
        'subtitle' => "Choose the page heading align for the shop/category WooCommerce pages (Standard/Fancy only).",
        'options' => array(
           'text-left'       => 'Left',
           'text-center'     => 'Center',
           'text-right'      => 'Right'
           ),
        'desc' => '',
        'default' => 'text-center',
        'required'  => array( 'woo_page_heading_style', '=', 'hero' )
      ),
      array(
        'id' => 'woo_page_heading_background_color',
        'type' => 'color',
        'title' => esc_html__('Hero Heading Overlay Color', 'kunco'),
        'desc' => '',
        'default' => '',
        'required'  => array( 'woo_page_heading_style', '=', 'hero' )
      ),
      array(
        'id'     => 'woo_page_heading_bg_opacity_title',
        'type'      => 'slider',
        'title'     => esc_html__( 'Overlay Opacity', 'kunco' ),
        'default'   => 50,
        'min'     => 1,
        'max'     => 100,
        'step'      => 1,
        'display_value' => 'text',
        'required'  => array( 'woo_page_heading_style', '=', 'hero' )
      ),
      array(
        'id' => 'woo_page_heading_image',
        'type' => 'media',
        'title' => esc_html__('WooCommerce Hero Heading Background Image', 'kunco'),
        'subtitle' => esc_html__('Upload the hero heading background image for WooCommerce page heading (Hero Heading Only).', 'kunco'),
        'desc' => '',
        'required'  => array( 'woo_page_heading_style', '=', 'hero' )
      ),

      array(
        'id' => 'woo_page_heading_text_style',
        'type' => 'select',
        'title' => esc_html__('WooCommerce Hero Heading Text Style', 'kunco'),
        'subtitle' => "Choose the text style for the WooCommerce page heading (Hero Heading Only).",
        'options' => array(
           'text-light'     => esc_html__('Light', 'kunco'),
           'text-dark'      => esc_html__('Dark', 'kunco')
           ),
        'desc' => '',
        'default' => 'text-light',
        'required'  => array( 'woo_page_heading_style', '=', 'hero' )
      ),
    ),
  ));

   Redux::setSection( $opt_name, array(
      'icon' => 'el-icon-shopping-cart',
      'title' => esc_html__('Product Options', 'kunco'),
      'subsection' => true,
      'fields' => array(
        array(
          'id' => 'product_sidebar_config',
          'type' => 'select',
          'title' => esc_html__('Default Product Sidebar Config', 'kunco'),
          'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
          'options' => array(
            'no-sidebars'     => 'No Sidebars',
            'left-sidebar'    => 'Left Sidebar',
            'right-sidebar'      => 'Right Sidebar',
            'both-sidebars'      => 'Both Sidebars'
          ),
          'desc' => '',
          'default' => 'no-sidebars'
        ),
        array(
          'id' => 'product_left_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Product Left Sidebar', 'kunco'),
          'subtitle' => "Choose the default left sidebar for WooCommerce product pages.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'woocommerce-sidebar'
        ),
        array(
          'id' => 'product_right_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Product Right Sidebar', 'kunco'),
          'subtitle' => "Choose the default right sidebar for WooCommerce product pages.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'woocommerce-sidebar'
        ),

        array(
          'id' => 'upsell_heading_text',
          'type' => 'text',
          'title' => esc_html__('Upsell Heading Text', 'kunco'),
          'subtitle' => "Heading text for the upsell products on the product page.",
          'desc' => '',
          'default' => 'Complete the look'
        ),
        array(
          'id' => 'related_heading_text',
          'type' => 'text',
          'title' => esc_html__('Related Heading Text', 'kunco'),
          'subtitle' => "Heading text for the related products on the product page.",
          'desc' => '',
          'default' => 'Related products'
          ),
        ),
   ));

  //== Give settings
  Redux::setSection( $opt_name, array(
      'icon' => 'el-icon-shopping-cart',
      'title' => esc_html__('Give Options', 'kunco'),
      'fields' => array(
          array(
            'id'    => 'give_excerpt_limit',
            'type'    => 'text',
            'title'   => esc_html__( 'Give Form Excerpt Limit', 'kunco' ),
            'default' => '30',
          ),
      ),
   ));

  Redux::setSection( $opt_name, array(
      'icon' => 'el-icon-shopping-cart',
      'title' => esc_html__('Category Page Options', 'kunco'),
      'subsection' => true,
      'fields' => array(
         array(
            'id' => 'give_display_layout',
               'type' => 'select',
               'title' => esc_html__('Default Product Display Layout', 'kunco'),
               'subtitle' => "Choose the default display layout for all gives/category pages.",
               'options' => array(
                  'grid'      => 'Grid',
                  'list'   => 'List',
               ),
               'default' => 'grid'
            ),
         array(
            'id'        => 'give_posts_per_page',
            'type'      => 'slider',
            'title'     => esc_html__('Give pages show at most', 'kunco'),
            'default'   => 6,
            'min'       => 1,
            'max'       => 30,
            'step'      => 1,
            'display_value' => 'text',
          ),

         array(
            'id' => 'give_columns_lg',
            'type' => 'select',
            'title' => esc_html__('Gives Display Columns for Large Screen', 'kunco'),
            'options' => array(
               '1'      => '1',
               '2'      => '2',
               '3'      => '3',
               '4'      => '4',
               '5'      => '5',
               '6'      => '6',
            ),
            'desc' => '',
            'default' => '4',
            'required'  => array( 'give_display_layout', '=', 'grid' )
          ),
         array(
            'id' => 'give_columns_md',
            'type' => 'select',
            'title' => esc_html__('Gives Display Columns for Medium Screen', 'kunco'),
            'options' => array(
               '1'      => '1',
               '2'      => '2',
               '3'      => '3',
               '4'      => '4',
               '5'      => '5',
               '6'      => '6',
            ),
            'desc' => '',
            'default' => '3',
            'required'  => array( 'give_display_layout', '=', 'grid' )
          ),
         array(
            'id' => 'give_columns_sm',
            'type' => 'select',
            'title' => esc_html__('Gives Display Columns for Small Screen', 'kunco'),
            'options' => array(
               '1'      => '1',
               '2'      => '2',
               '3'      => '3',
               '4'      => '4',
               '5'      => '5',
               '6'      => '6',
            ),
            'desc' => '',
            'default' => '2',
            'required'  => array( 'give_display_layout', '=', 'grid' )
          ),
         array(
            'id' => 'give_columns_xs',
            'type' => 'select',
            'title' => esc_html__('Gives Display Columns for Extra Small Screen', 'kunco'),
            'options' => array(
               '1'      => '1',
               '2'      => '2',
               '3'      => '3',
               '4'      => '4',
               '5'      => '5',
               '6'      => '6',
            ),
            'desc' => '',
            'default' => '1',
            'required'  => array( 'give_display_layout', '=', 'grid' )
          ),

         array(
            'id' => 'give_sidebar_config',
            'type' => 'select',
            'title' => esc_html__('Give Sidebar Config', 'kunco'),
            'subtitle' => "Choose the sidebar config for Give all give/category pages.",
            'options' => array(
               'no-sidebars'     => 'No Sidebars',
               'left-sidebar'    => 'Left Sidebar',
               'right-sidebar'      => 'Right Sidebar',
               'both-sidebars'      => 'Both Sidebars'
            ),
            'desc' => '',
            'default' => 'no-sidebars'
            ),
         array(
            'id' => 'give_left_sidebar',
            'type' => 'select',
            'title' => esc_html__('Give Left Sidebar', 'kunco'),
            'subtitle' => "Choose the left sidebar for Give all give/category pages.",
            'data'      => 'sidebars',
            'desc' => '',
            'default' => 'woocommerce_sidebar'
            ),
         array(
            'id' => 'give_right_sidebar',
            'type' => 'select',
            'title' => esc_html__('Give Right Sidebar', 'kunco'),
            'subtitle' => "Choose the right sidebar for Give all gives/category pages.",
            'data'      => 'sidebars',
            'desc' => '',
            'default' => 'woocommerce_sidebar'
            ),

          array(
            'id' => 'give_shop_divide_0',
            'type' => 'divide'
          ),
        
          array(
            'id' => 'give_show_page_heading',
            'type' => 'button_set',
            'title' => esc_html__('Shop Category / Page Heading', 'kunco'),
            'subtitle' => esc_html__('Show page title on all gives/category Give page.', 'kunco'),
            'desc' => '',
            'options' => array('1' => 'On', '0' => 'Off'),
            'default' => '1'
          ),

         array(
            'id' => 'give_page_heading_style',
            'type' => 'select',
            'title' => esc_html__('Give Page Heading Style', 'kunco'),
            'subtitle' => "Choose the page heading style for the all gives/category Give pages.",
            'options' => array(
              'standard'           => esc_html__('Standard', 'kunco'),
              'hero'         => esc_html__('Background', 'kunco'),
            ),
            'desc' => '',
            'default' => 'standard'
          ),
         array(
            'id' => 'give_page_heading_text_align',
            'type' => 'select',
            'title' => esc_html__('WooCommerce Page Heading Text Align', 'kunco'),
            'subtitle' => "Choose the page heading align for the shop/category WooCommerce pages (Standard/Fancy only).",
            'options' => array(
               'text-left'       => 'Left',
               'text-center'     => 'Center',
               'text-right'      => 'Right'
               ),
            'desc' => '',
            'default' => 'text-center',
            'required'  => array( 'give_page_heading_style', '=', 'hero' )
          ),

         array(
            'id' => 'give_page_heading_background_color',
            'type' => 'color',
            'title' => esc_html__('Hero Heading Overlay Color', 'kunco'),
            'desc' => '',
            'default' => '',
            'required'  => array( 'give_page_heading_style', '=', 'hero' )
          ),

         array(
          'id'     => 'give_page_heading_bg_opacity_title',
          'type'      => 'slider',
          'title'     => esc_html__( 'Overlay Opacity', 'kunco' ),
          'default'   => 50,
          'min'     => 1,
          'max'     => 100,
          'step'      => 1,
          'display_value' => 'text',
          'required'  => array( 'give_page_heading_style', '=', 'hero' )
          ),

         array(
            'id' => 'give_page_heading_image',
            'type' => 'media',
            'title' => esc_html__('Heading Background Image', 'kunco'),
            'subtitle' => esc_html__('Upload background image for WooCommerce page heading (Hero Heading Only).', 'kunco'),
            'desc' => '',
            'required'  => array( 'give_page_heading_style', '=', 'hero' )
            ),

         array(
            'id' => 'give_page_heading_text_style',
            'type' => 'select',
            'title' => esc_html__('Heading Background Text Style', 'kunco'),
            'subtitle' => "Choose the text style for the WooCommerce page heading (Hero Heading Only).",
            'options' => array(
               'text-light'     => esc_html__('Light', 'kunco'),
               'text-dark'      => esc_html__('Dark', 'kunco')
               ),
            'desc' => '',
            'default' => 'text-light',
            'required'  => array( 'give_page_heading_style', '=', 'hero' )
         ),
      ),
   ));

   Redux::setSection( $opt_name, array(
      'icon' => 'el-icon-shopping-cart',
      'title' => esc_html__('Give Single Options', 'kunco'),
      'subsection' => true,
      'fields' => array(
        array(
          'id' => 'give_single_sidebar_config',
          'type' => 'select',
          'title' => esc_html__('Default Product Sidebar Config', 'kunco'),
          'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
          'options' => array(
            'no-sidebars'     => 'No Sidebars',
            'left-sidebar'    => 'Left Sidebar',
            'right-sidebar'      => 'Right Sidebar',
            'both-sidebars'      => 'Both Sidebars'
          ),
          'desc' => '',
          'default' => 'no-sidebars'
        ),
        array(
          'id' => 'give_single_left_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Product Left Sidebar', 'kunco'),
          'subtitle' => "Choose the default left sidebar for WooCommerce product pages.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'give-sidebar'
        ),
        array(
          'id' => 'give_single_right_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Product Right Sidebar', 'kunco'),
          'subtitle' => "Choose the default right sidebar for WooCommerce product pages.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'give-sidebar'
        ),

        array(
          'id' => 'divide_1',
          'type' => 'divide'
        ),

        array(
          'id' => 'give_sharing_facebook',
          'type' => 'button_set',
          'title' => esc_html__('Share Facebook', 'kunco'),
          'subtitle' => esc_html__('Enable share facebook for single product.', 'kunco'),
          'desc' => '',
          'options' => array('off' => 'Disabled','on' => 'Enabled'),
          'default' => 'on'
        ),
        array(
          'id' => 'give_sharing_twitter',
          'type' => 'button_set',
          'title' => esc_html__('Share Twitter', 'kunco'),
          'subtitle' => esc_html__('Enable share twitter for single product.', 'kunco'),
          'desc' => '',
          'options' => array('off' => 'Disabled','on' => 'Enabled'),
          'default' => 'on'
        ),
        array(
          'id' => 'give_sharing_linkedin',
          'type' => 'button_set',
          'title' => esc_html__('Share Linkedin', 'kunco'),
          'subtitle' => esc_html__('Enable share linkedin for single product.', 'kunco'),
          'desc' => '',
          'options' => array('off' => 'Disabled','on' => 'Enabled'),
          'default' => 'on'
        ),
        array(
          'id' => 'give_sharing_tumblr',
          'type' => 'button_set',
          'title' => esc_html__('Share Tumblr', 'kunco'),
          'subtitle' => esc_html__('Enable share tumblr for single product.', 'kunco'),
          'desc' => '',
          'options' => array('off' => 'Disabled','on' => 'Enabled'),
          'default' => 'on'
        ),
        array(
          'id' => 'give_sharing_google',
          'type' => 'button_set',
          'title' => esc_html__('Share Google', 'kunco'),
          'subtitle' => esc_html__('Enable share google for single product.', 'kunco'),
          'desc' => '',
          'options' => array('off' => 'Disabled','on' => 'Enabled'),
          'default' => 'on'
        ),
        array(
          'id' => 'give_sharing_pinterest',
          'type' => 'button_set',
          'title' => esc_html__('Share Pinterest', 'kunco'),
          'subtitle' => esc_html__('Enable share pinterest for single product.', 'kunco'),
          'desc' => '',
          'options' => array('off' => 'Disabled','on' => 'Enabled'),
          'default' => 'on'
        ),
        array(
          'id' => 'give_sharing_email',
          'type' => 'button_set',
          'title' => esc_html__('Share Email', 'kunco'),
          'subtitle' => esc_html__('Enable share email for single product.', 'kunco'),
          'desc' => '',
          'options' => array('off' => 'Disabled','on' => 'Enabled'),
          'default' => 'on'
        )
        )
   ) );

  //=== Portfolio Options ===
  Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Portfolio Options', 'kunco' ),
    'icon'    => 'el-icon-website',
    'fields'  => array(
      array(
        'id'  => 'portfolio_archive_info',
        'type'  => 'info',
        'icon'  => true,
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Archive/Listing', 'kunco' ) . '</h3>',
      ),
      array(
        'id' => 'portfolio_columns_lg',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Large Screen', 'kunco'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '3'
      ),
      array(
        'id' => 'portfolio_columns_md',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Medium Screen', 'kunco'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '2'
      ),
      array(
        'id' => 'portfolio_columns_sm',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Small Screen', 'kunco'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '2'
      ),
      array(
        'id' => 'portfolio_columns_xs',
        'type' => 'select',
        'title' => esc_html__('Display Columns for Extra Small Screen', 'kunco'),
        'options' => array(
           '1'      => '1',
           '2'      => '2',
           '3'      => '3',
           '4'      => '4',
           '5'      => '5',
           '6'      => '6',
        ),
        'desc' => '',
        'default' => '1'
      ),
      array(
        'id' => 'archive_portfolio_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Archive Page Portfolio Sidebar Config', 'kunco'),
        'subtitle' => "Choose single post layout.",
        'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'      => 'Right Sidebar',
           'both-sidebars'      => 'Both Sidebars'
        ),
        'desc' => '',
        'default' => 'no-sidebars'
      ),
      array(
        'id' => 'archive_portfolio_left_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Archive Page Portfolio Left Sidebar', 'kunco'),
        'subtitle' => "Choose the default left sidebar for Single Post.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'portfolio_sidebar'
      ),
       array(
        'id' => 'archive_portfolio_right_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Archive Page Portfolio Right Sidebar', 'kunco'),
        'subtitle' => "Choose the default right sidebar for Single Post.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'portfolio_sidebar'
      ),

      array(
        'id'  => 'portfolio_single_post_info',
        'type'  => 'info',
        'icon'  => true,
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Single Portfolio', 'kunco' ) . '</h3>',
      ),
      array(
        'id' => 'single_portfolio_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Sidebar Config', 'kunco'),
        'subtitle' => "Choose single Portfolio layout.",
        'options' => array(
           'no-sidebars'     => 'No Sidebars',
           'left-sidebar'    => 'Left Sidebar',
           'right-sidebar'      => 'Right Sidebar',
           'both-sidebars'      => 'Both Sidebars'
        ),
        'desc' => '',
        'default' => 'right-sidebar'
      ),
      array(
        'id' => 'single_portfolio_left_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Left Sidebar', 'kunco'),
        'subtitle' => "Choose the default left sidebar for Single Portfolio.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'portfolio_sidebar'
      ),
       array(
        'id' => 'single_portfolio_right_sidebar',
        'type' => 'select',
        'title' => esc_html__('Default Single Right Sidebar', 'kunco'),
        'subtitle' => "Choose the default right sidebar for Single Portfolio.",
        'data'      => 'sidebars',
        'desc' => '',
        'default' => 'portfolio_sidebar'
      )
    )
  ));

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Social Profiles', 'kunco' ),
		'icon'		=> 'el-icon-share',
		'fields'	=> array(
			array(
				'id'		=> 'social_facebook',
				'type' 		=> 'text',
				'title' 	=> esc_html__( 'Facebook', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your Facebook profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_instagram',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Instagram', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your Instagram profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_twitter',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Twitter', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your Twitter profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_googleplus',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Google+', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your Google+ profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_linkedin',
				'type'		=> 'text',
				'title'		=> esc_html__( 'LinedIn', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your LinkedIn profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_pinterest',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Pinterest', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your Pinterest profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_rss',
				'type'		=> 'text',
				'title'		=> esc_html__( 'RSS', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your RSS feed URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_tumblr',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Tumblr', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your Tumblr profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_vimeo',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Vimeo', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your Vimeo profile URL.', 'kunco' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_youtube',
				'type'		=> 'text',
				'title'		=> esc_html__( 'YouTube', 'kunco' ),
				'desc'		=> esc_html__( 'Enter your YouTube profile URL.', 'kunco' ),
				'default'	=> ''
			)
		)
	) );
