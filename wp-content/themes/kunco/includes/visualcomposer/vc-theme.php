<?php 
class kunco_Visualcomposer_Theme implements Vc_Vendor_Interface {
	public function load(){ 
    $testimonial_cats = array();
    if(function_exists('gaviasthemer_get_select_term')){
      $testimonial_cats = gaviasthemer_get_select_term('testimonial_cat');
    };
    //=== Testimonial ===
    $gva_testimonial_carousel = array(
       'name'      => esc_html__( 'GVA Testimonial Carousel', 'kunco' ),
       'base'      => 'gva_testimonial',
       'class'     => '',
       'category'  => 'Gavias Element',
       'icon'      => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'      => esc_html__( 'Title', 'kunco' ),
             'param_name'   => 'title',
             'admin_label'  => true,
             'value'        => '',
             'description'  => esc_html__('Title of element', 'kunco')
          ),
          array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Show Avatar', 'kunco' ),
            'param_name'    => 'show_avatar',
            'value'       => array(
              esc_html__('Show', 'kunco') => 'show',
              esc_html__('Hide', 'kunco') => 'hide'
            )
          ),
          array(
             'type'         => 'textfield',
             'heading'      => esc_html__( 'Limit', 'kunco' ),
             'param_name'   => 'per_page',
             'value'        => '4',
             'description'  => esc_html__('Number of Posts', 'kunco')
          ),
          array(
            'type'            => 'dropdown',
            'heading'         => esc_html__( 'Categories', 'kunco' ),
            'param_name'      => 'testimonial_cats',
            'value'           =>  $testimonial_cats,
            'description'     => '',
          ),
          array(
             'type'         => 'dropdown',
             'heading'      => esc_html__( 'Style display', 'kunco' ),
             'param_name'   => 'style_display',
             'value'        => array(
                esc_html__('Default', 'kunco')   => 'default',
                esc_html__('Style 2', 'kunco')   => 'style-v2',
              ),
          ),
          array(
             'type'         => 'dropdown',
             'heading'      => esc_html__( 'Text Color Style', 'kunco' ),
             'param_name'   => 'text_color_style',
             'value'        => array(
                      esc_html__('Default', 'kunco')  => 'text-default',
                      esc_html__('Light', 'kunco')=> 'text-light',
             ),
          ),
          array(
             'type'         => 'textfield',
             'heading'      => esc_html__('Extra class name','kunco'),
             'param_name'   => 'el_class',
             'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    );
   
    foreach (kunco_responsive_settings() as $key => $setting) {
       $gva_testimonial_carousel['params'][] = $setting;
    }
    foreach (kunco_carousel_settings() as $key => $setting) {
       $gva_testimonial_carousel['params'][] = $setting;
    }
    vc_map($gva_testimonial_carousel);

    //=== Testimonial ===
    $gva_testimonial_grid = array(
       'name'      => esc_html__( 'GVA Testimonial Grid', 'kunco' ),
       'base'      => 'gva_testimonial_grid',
       'category'  => 'Gavias Element',
       'icon'      => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Title', 'kunco' ),
            'param_name'    => 'title',
            'admin_label'   => true,
            'value'         => '',
            'description'   => esc_html__('Title of element', 'kunco')
          ),
          array(
            'type'          => 'textfield',
            'heading'       => esc_html__( 'Limit', 'kunco' ),
            'param_name'    => 'per_page',
            'value'         => '4',
            'description'   => esc_html__('Number of Posts', 'kunco')
          ),
          array(
            'type'            => 'dropdown',
            'heading'         => esc_html__( 'Categories', 'kunco' ),
            'param_name'      => 'testimonial_cats',
            'value'           =>  $testimonial_cats,
            'description'     => '',
          ),
          array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Text Color Style', 'kunco' ),
            'param_name'    => 'text_color_style',
            'value'         => array(
                esc_html__('Default', 'kunco')  => 'text-default',
                esc_html__('Light', 'kunco')=> 'text-light',
             ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','kunco'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    );
   
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_testimonial_grid['params'][] = $setting;
    }
      
    vc_map($gva_testimonial_grid);

    $gva_brands = array(
      'name'      => esc_html__( 'GVA Brands', 'kunco' ),
      'base'      => 'gva_brands',
      'category'  => 'Gavias Element',
      'icon'      => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Title', 'kunco' ),
          'param_name'    => 'title',
          'admin_label'   => true,
          'value'         => '',
          'description'   => esc_html__('Title of element', 'kunco')
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Limit', 'kunco' ),
          'param_name'    => 'per_page',
          'admin_label'   => false,
          'value'         => '6',
          'description'   => esc_html__('Number of Brands', 'kunco')
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Style', 'kunco' ),
          'param_name'   => 'style',
          'value'        => array(
            esc_html__('Style 1', 'kunco')  => 'style-1',
            esc_html__('Style 2','kunco')   => 'style-2'
          )
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name','kunco'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_brands['params'][] = $setting;
    }
    foreach (kunco_carousel_settings() as $key => $setting) {
      $gva_brands['params'][] = $setting;
    }
    vc_map($gva_brands);

    //Team Carousel
    $el_team_carousel = array(
      'name'          => esc_html__('Team Carousel','kunco'),
      'base'          => 'gva_team_carousel',
      'description'   => 'Show Team Carousel',
      'icon'          => 'icon-wpb-vc_icon',
      'category'      => esc_html__('Gavias Element', 'kunco'),
      'params' => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__('Title Administrator', 'kunco'),
          'param_name'  => 'title',
          'value'       => '',
          'admin_label' => true
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Number', 'kunco' ),
          'param_name'  => 'per_page',
          'value'       => '6'
        ),
        array(
          'type'        => 'checkbox',
          'heading'     => esc_html__( 'Show Skills', 'kunco' ),
          'param_name'  => 'show_skills',
          'value'       => true
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Number of words in excerpt', 'kunco' ),
          'param_name'    => 'excerpt_words',
          'value'         => '12'
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Style', 'kunco' ),
          'param_name'   => 'style',
          'value'        => array(
            esc_html__('Style 1', 'kunco')  => 'item-v1',
            esc_html__('Style 2','kunco')   => 'item-v2'
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__('Extra class name', 'kunco'),
          'param_name'  => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $el_team_carousel['params'][] = $setting;
    }
    foreach (kunco_carousel_settings() as $key => $setting) {
      $el_team_carousel['params'][] = $setting;
    }
    vc_map($el_team_carousel);

    //Team Grid
    $el_team_grid = array(
      'name'         => esc_html__('Team Grid','kunco'),
      'base'         => 'gva_team_grid',
      'description'  => 'Show Team Grid',
      'category'     => esc_html__('Gavias Element', 'kunco'),
      'icon'        => 'icon-wpb-vc_icon',
      'params' => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__('Title Administrator', 'kunco'),
          'param_name'  => 'title',
          'value'       => '',
          'admin_label' => true
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Comma separated list of post ids like 1,2,3,4', 'kunco' ),
          'param_name'    => 'ids',
          'value'         => ''
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Number', 'kunco' ),
          'param_name'    => 'per_page',
          'value'         => '6'
        ),
        array(
          'type'          => 'checkbox',
          'heading'       => esc_html__( 'Show Skills', 'kunco' ),
          'param_name'    => 'show_skills',
          'value'         => true
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__( 'Number of words in excerpt', 'kunco' ),
          'param_name'   => 'excerpt_words',
          'value'        => '12'
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Style', 'kunco' ),
          'param_name'   => 'style',
          'value'        => array(
            esc_html__('Style 1', 'kunco')  => 'item-v1',
            esc_html__('Style 2','kunco')   => 'item-v2'
          )
        ),
        array(
          'type'        => 'checkbox',
          'heading'     => esc_html__( 'Show pagination', 'kunco' ),
          'param_name'  => 'show_pagination',
          'value'       => true
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__('Extra class name', 'kunco'),
          'param_name'  => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $el_team_grid['params'][] = $setting;
    }
    vc_map($el_team_grid);

    vc_map( array(
      'name'        => esc_html__( 'GVA Team', 'kunco' ),
      'base'        => 'gva_team',
      'category'    => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'  => array(
      array(
        'type'       => 'textfield',
        'heading'    => esc_html__( 'Team name', 'kunco' ),
        'param_name' => 'name',
        'admin_label'=> true,
        'value'      => ''
      ),
      array(
        'type'       => 'textfield',
        'heading'    => esc_html__( 'Team job', 'kunco' ),
        'param_name' => 'job',
        'value'      => ''
      ),
      array(
        'type'       => 'attach_image',
        'heading'    => esc_html__( 'Team Photo', 'kunco' ),
        'param_name' => 'photo',
        'value'      => ''
      ),
      array(
        'type'      => 'textarea',
        'heading'   => esc_html__( 'Content', 'kunco' ),
        'param_name'=> 'content',
        'value'     => ''
      ),
      array(
        'type'         => 'textfield',
        'heading'      => esc_html__("Link", 'kunco'),
        'param_name'   => "link",
        'value'        => '',
      ),
      array(
        'type'         => 'textfield',
        'heading'      => esc_html__("Google Plus", 'kunco'),
        'param_name'   => "google",
        'value'        => '',
      ),
      array(
        'type'         => 'textfield',
        'heading'      => esc_html__("Facebook", 'kunco'),
        'param_name'   => "facebook",
        'value'        => '',
        ),

      array(
        'type'          => 'textfield',
        'heading'       => esc_html__("Twitter", 'kunco'),
        'param_name'    => "twitter",
        'value'         => '',
        ),

      array(
        'type'          => 'textfield',
        'heading'       => esc_html__("Pinterest", 'kunco'),
        'param_name'    => "pinterest",
        'value'         => '',
        ),

      array(
        'type'          => 'textfield',
        'heading'       => esc_html__("Linked In", 'kunco'),
        'param_name'    => "linkedin",
        'value'         => '',
        ),
      array(
        'type'         => 'dropdown',
        'heading'      => esc_html__('Style', 'kunco' ),
        'param_name'   => 'style',
        'value'        => array(
          esc_html__('Vertical','kunco') => 'vertical',
          esc_html__('Vertical avatar small','kunco')   => 'vertical-small',
          esc_html__('Horizontal','kunco')  => 'horizontal',
          esc_html__('Circle','kunco')      => 'circle',
        )
      ),
      array(
       'type'       => 'textfield',
       'heading'    => esc_html__('Extra class name','kunco'),
       'param_name' => 'el_class',
       'description'=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
       ),
      )
    ));

    //== Gallery ===========================
    $kunco_gallery_cat = array();
    if(function_exists('gaviasthemer_get_select_term')){
      $kunco_gallery_cat = gaviasthemer_get_select_term('gallery_cat');
    }
    $gva_gallery_grid = array(
      'name'        => esc_html__('GVA Gallery Grid','kunco'),
      'base'        => 'gva_gallery_grid',
      'description' => 'Display Gallery Grid',
      'category'    => esc_html__('Gavias Element', 'kunco'),
      'icon'        => 'icon-wpb-vc_icon',
      'params'     => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Title', 'kunco'),
          'param_name' => 'title',
          'value' => '',
          'admin_label' => true
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Number', 'kunco' ),
          'param_name' => 'number',
          'value' => ''
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Mode', 'kunco' ),
            'param_name' => 'mode',
            'value' => array(
               esc_html__('Lastest Gallery', 'kunco') => 'most_recent',
               esc_html__('Randown Gallery', 'kunco') => 'random'
            )
        ),
        array(
           'type'            => 'dropdown',
           'heading'         => esc_html__( 'Gallery Categories', 'kunco' ),
           'param_name'      => 'gallery_cats',
           'admin_label'     => true,
           'value'           =>  $kunco_gallery_cat,
           'description'     => '',
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name', 'kunco'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_gallery_grid['params'][] = $setting;
    }
    vc_map($gva_gallery_grid);

    // == Gallery Carousel == 
    $gva_gallery_carousel = array(
      'name'        => esc_html__('GVA Gallery Carousel','kunco'),
      'base'        => 'gva_gallery_carousel',
      'description' => 'Display Gallery Carousel',
      'category'    => esc_html__('Gavias Element', 'kunco'),
      'icon'        => 'icon-wpb-vc_icon',
      'params'      => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__('Title', 'kunco'),
          'param_name'  => 'title',
          'value'       => '',
          'admin_label' => true
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Number', 'kunco' ),
          'param_name'  => 'number',
          'value'       => ''
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Mode', 'kunco' ),
            'param_name'  => 'mode',
            'value' => array(
               esc_html__('Lastest Gallery', 'kunco') => 'most_recent',
               esc_html__('Randown Gallery', 'kunco') => 'random'
            )
        ),
        array(
           'type'            => 'dropdown',
           'heading'         => esc_html__( 'Gallery Categories', 'kunco' ),
           'param_name'      => 'gallery_cats',
           'admin_label'     => true,
           'value'           =>  $kunco_gallery_cat,
           'description'     => '',
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name', 'kunco'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'kunco')
        )
      )
    );
    foreach (kunco_carousel_settings() as $key => $setting) {
      $gva_gallery_carousel['params'][] = $setting;
    }
    vc_map($gva_gallery_carousel);

    //== GVA Contact Info ==
    vc_map( array(
      'name'      => esc_html__( 'GVA Contact info', 'kunco' ),
      'base'      => 'gva_contact_info',
      'category'  => 'Gavias Element',
      'icon'      => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Title', 'kunco' ),
          'param_name'    => 'title',
          'admin_label'   => true,
          'value'         => ''
        ),
        array(
           'type'         => 'textarea',
           'heading'      => esc_html__( 'Description', 'kunco' ),
           'param_name'   => 'description',
           'value'        => ''
        ),
        array(
           'type'         => 'attach_image',
           'heading'      => esc_html__( 'Contact Photo', 'kunco' ),
           'param_name'   => 'photo',
           'value'        => ''
        ),
        array(
           'type'           => 'textfield',
           'heading'        => esc_html__('Address', 'kunco'),
           'param_name'     => 'address',
           'value'          => '',
        ),
        array(
           'type'         => 'textfield',
           'heading'      => esc_html__('Phone', 'kunco'),
           'param_name'   => 'phone',
           'value'        => '',
        ),

        array(
           'type'       => 'textfield',
           'heading'    => esc_html__('Email', 'kunco'),
           'param_name' => 'email',
           'value'      => '',
        ),

        array(
           'type'         => 'textfield',
           'heading'      => esc_html__('Website', 'kunco'),
           'param_name'   => 'website',
           'value'        => '',
        ),

        array(
           'type'         => 'textfield',
           'heading'      => esc_html__('Extra class name','kunco'),
           'param_name'   => 'el_class',
           'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    vc_map( array(
      'name'      => esc_html__( 'GVA Icon Box', 'kunco' ),
      'base'      => 'gva_icon_box',
      'category'  => 'Gavias Element',
      'icon'      => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'           => 'textfield',
          'heading'        => esc_html__( 'Title', 'kunco' ),
          'param_name'     => 'title',
          'admin_label'    => true,
          'value'          => '',
          'description'    => esc_html__('Title of element', 'kunco')
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__( 'Icon', 'kunco' ),
          'param_name'   => 'icon',
          'admin_label'  => false,
          'value'        => '',
        ),
        array(
          'param_name'   => 'image',
          'type'         => 'attach_image',
          'heading'      => esc_html__('Image Icon', 'kunco' ),
        ),
        array(
          'type'         => 'textarea',
          'heading'      => esc_html__( 'Description', 'kunco' ),
          'param_name'   => 'description',
          'admin_label'  => false,
          'value'        => '',
        ),
        array(
          'param_name'   => 'hidden_desc',
          'type'         => 'checkbox',
          'heading'      => esc_html__('Hidden Description on tablet, mobile device', 'kunco' )
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Position', 'kunco' ),
          'param_name'   => 'icon_position',
          'value'        => array(
            esc_html__('Top Center','kunco') => 'top-center',
            esc_html__('Top Center 2','kunco') => 'top-center v2',
            esc_html__('Top Left','kunco')   => 'top-left',
            esc_html__('Top Right','kunco')  => 'top-right',
            esc_html__('Right','kunco')      => 'right',
            esc_html__('Left','kunco')       => 'left',
            esc_html__('Top Left Title','kunco')   => 'top-left-title',
            esc_html__('Top Right Title','kunco')  => 'top-right-title'
          )
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Background Box', 'kunco' ),
          'param_name'    => 'background_box',
          'value'         => '',
          'description'   => 'Background for box, e.g: #f5f5f5'
        ),
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link',
          'admin_label'    => false,
          'value'       => '',
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Background icon', 'kunco' ),
          'param_name'   => 'icon_background',
          'description'  => 'Background for icon, e.g: #f5f5f5'
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Icon Color', 'kunco' ),
          'param_name'   => 'icon_color',
          'description'  => 'Color for icon, e.g: #f5f5f5'
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Width', 'kunco' ),
          'param_name'   => 'icon_width',
          'value'        => array(
            esc_html__('Fa 1x small','kunco') => 'fa-1x',
            esc_html__('Fa 2x','kunco')=> 'fa-2x',
            esc_html__('Fa 3x','kunco')=> 'fa-3x',
            esc_html__('Fa 4x','kunco')=> 'fa-4x'
          )
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Border', 'kunco' ),
          'param_name'   => 'icon_border',
          'value'        => array(
            esc_html__('-- None --','kunco') => '',
            esc_html__('Border 1px','kunco') => 'border-1',
            esc_html__('Border 2px','kunco') => 'border-2',
            esc_html__('Border 3px','kunco') => 'border-3',
            esc_html__('Border 4px','kunco') => 'border-4',
            esc_html__('Border 5px','kunco') => 'border-5'
          )
        ),
         array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Icon Radius', 'kunco' ),
          'param_name'   => 'icon_radius',
          'value'        => array(
            esc_html__('-- None --','kunco') => '',
            esc_html__('Radius 1x','kunco') => 'radius-1x',
            esc_html__('Radius 2x','kunco') => 'radius-2x',
            esc_html__('Radius 5x','kunco') => 'radius-5x',
          )
        ),
         array(
          'type'         => 'checkbox',
          'heading'      => esc_html__('Icon Box Shadow', 'kunco' ),
          'param_name'   => 'icon_shadown',
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Skin Text for box', 'kunco' ),
          'param_name'   => 'skin_text',
          'value'        => array(
            esc_html__('Text Dark','kunco') => 'text-dark',
            esc_html__('Text Light','kunco') => 'text-light' 
           )
        ),
        array(
          'param_name'   => 'target',
          'type'         => 'checkbox',
          'heading'      => esc_html__('Open in new window', 'kunco' )
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name','kunco'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
       )
    ));

    vc_map( array(
     'name'      => esc_html__( 'GVA Hover Box', 'kunco' ),
     'base'      => 'gva_hover_box',
     'category'  => 'Gavias Element',
     'icon'        => 'icon-wpb-vc_icon',
     'params'    => array(
        array(
           'type'           => 'textfield',
           'heading'        => esc_html__( 'Title', 'kunco' ),
           'param_name'     => 'title',
           'admin_label'    => true,
           'value'          => '',
           'description'    => esc_html__('Title of element', 'kunco')
        ),
       
        array(
              'param_name'   => 'image',
              'type'         => 'attach_image',
              'heading'      => esc_html__('Image', 'kunco' ),
           ),
        array(
           'type'         => 'textarea',
           'heading'      => esc_html__( 'Content', 'kunco' ),
           'param_name'   => 'content',
        ),
        array(
           'type'         => 'textarea',
           'heading'      => esc_html__( 'Content Backend', 'kunco' ),
           'param_name'   => 'content_backend',
        ),
        array(
          'type'         => 'textfield',
          'heading'      =>  esc_html__( 'Link', 'kunco' ),
          'param_name'   =>  'link',
        ),
        array(
          'type'         => 'textfield',
          'heading'      =>  esc_html__( 'Text Link', 'kunco' ),
          'param_name'   =>  'text_link',
          'std'          =>  'Read more'
        ),
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Min-height of Box', 'kunco' ),
          'param_name'  => 'height',
          'std'         => '220px',
          'desciption'  => 'e.g: 220px'
        ),
        array(
           'param_name'   => 'target',
           'type'         => 'checkbox',
           'heading'      => esc_html__('Open in new window', 'kunco' )
        ),
        array(
           'type' => 'textfield',
           'heading' => esc_html__('Extra class name','kunco'),
           'param_name' => 'el_class',
           'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    ));

    //=== Block Heading ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Block Heading', 'kunco' ),
       'base'      => 'gva_block_heading',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Title', 'kunco' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => esc_html__('Title of element', 'kunco')
          ),
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Sub Title', 'kunco' ),
             'param_name'  => 'subtitle',
          ),
          array(
             'type'         => 'textarea_html',
             'heading'     => esc_html__( 'Description', 'kunco' ),
             'param_name'  => 'content',
          ),
          array(
            'type'         => 'textfield',
            'heading'      => esc_html__( 'Icon', 'kunco' ),
            'param_name'   => 'icon',
            'admin_label'  => false,
            'value'        => '',
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Style', 'kunco' ),
             'param_name'  => 'style',
             'value'     => array(
                esc_html__( 'Style Default', 'kunco' )  =>  'style-default',
                esc_html__( 'Style 2', 'kunco' )        =>  'style-2',
                esc_html__( 'Style 3', 'kunco' )        => 'style-3',
                esc_html__( 'Style 4', 'kunco' )        => 'style-4'
             ),
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Align', 'kunco' ),
             'param_name'  => 'align',
             'value'     => array(
                esc_html__( 'Center', 'kunco' )    =>  'align-center',
                esc_html__( 'Left', 'kunco' )      =>  'align-left',
                esc_html__( 'Left - Description Right', 'kunco' )  =>  'align-left-2',
                esc_html__( 'Right', 'kunco' )     =>  'align-right',
             ),
          ),
           array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Skin Text for box', 'kunco' ),
             'param_name'  => 'style_text',
             'value'     => array(
                esc_html__( 'Text dark', 'kunco' )    =>  'text-dark',
                esc_html__( 'Text light', 'kunco' )   =>  'text-light'
             )
          ),
          array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kunco'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    ));

    //=== GVA_Social_Links ===
    vc_map(array(
       'name'      => esc_html__( 'GVA Social Links', 'kunco' ),
       'base'      => 'gva_social_links',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'      => esc_html__( 'Title', 'kunco' ),
             'param_name'   => 'title',
             'value'        => '',
             'description'  => esc_html__('This element display link socials media for theme setting', 'kunco'),
          ),
          array(
             'type'         => 'textarea',
             'heading'      => esc_html__( 'Content', 'kunco' ),
             'param_name'   => 'desc',
             'value'        => '',
          ),
          array(
             'type'         => 'dropdown',
             'heading'      => esc_html__( 'Style display', 'kunco' ),
             'param_name'   => 'style',
             'value'     => array(
                   esc_html__( 'Default - Align right', 'kunco' )    =>  'default',
                   esc_html__( 'Version 2 - Color White, Align center', 'kunco' )  => 'style-v2',
                   esc_html__( 'Version 3 - Align center', 'kunco' )  => 'style-v3',
                   esc_html__( 'Version 4 - Align right', 'kunco' )  => 'style-v4',
             ),
          ),
          array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kunco'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       ),   
    ));

    //=== GVA Blogs Carousel ===
    $gva_blogs_carousel = array(
      'name'      => esc_html__( 'GVA Blogs Carousel', 'kunco' ),
      'base'      => 'gva_blogs_carousel',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Block title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label'    => true,
          'value'       => '',
          'description'    => '',
        ),
        array(
          'type' => 'loop',
          'heading' =>esc_html__( 'Grids content', 'kunco' ),
          'param_name' => 'loop',
          'settings' => array(
            'size' => array( 'hidden' => false, 'value' => 4 ),
            'order_by' => array( 'value' => 'date' ),
          ),
          'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kunco' )
        ),
        array(
          'type'         => 'checkbox',
          'heading'     => esc_html__( 'Show post excerpt', 'kunco' ),
          'param_name'  => 'show_excerpt',
        ),
        array(
          'type'         => 'textfield',
          'heading'     => esc_html__( 'Number of words in excerpt', 'kunco' ),
          'param_name'  => 'excerpt_words',
          'admin_label'    => false,
          'value'       => '16',
          'description'    => '',
        ),
        array(
          'type'         => 'dropdown',
          'heading'     => esc_html__( 'Post style', 'kunco' ),
          'param_name'  => 'post_style',
          'value'       => array(
            esc_html__('Style #1', 'kunco')  => 'style-1',
            esc_html__('Style #2', 'kunco')  => 'style-2',
          ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name','kunco'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_blogs_carousel['params'][] = $setting;
    }
    foreach (kunco_carousel_settings() as $key => $setting) {
      $gva_blogs_carousel['params'][] = $setting;
    }
    vc_map($gva_blogs_carousel);

    //=== GVA Blogs Masonry ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs Masonry', 'kunco' ),
       'base'      => 'gva_blogs_masonry',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kunco' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kunco' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kunco' )
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Columns', 'kunco' ),
             'param_name'  => 'columns',
             'admin_label'    => true,
             'value'       => array(1, 2, 3, 4, 5, 6),
             'description'    => esc_html__( 'Number of Columns', 'kunco' ),
          ),
          array(
             'type'         => 'dropdown',
             'heading'     => esc_html__( 'Show Pagination', 'kunco' ),
             'param_name'  => 'pagination',
             'admin_label'    => true,
             'value'       => array(
                   esc_html__('Off', 'kunco')  => 'off',
                   esc_html__('On', 'kunco')        => 'on',
                ),
             'description'    => esc_html__( 'Show pagination on bottom element', 'kunco' ),
          ),
           array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kunco'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    ));

    //==== GVA Blogs Grid ===
    $gva_blogs_grid = array(
       'name'      => esc_html__( 'GVA Blogs Grid', 'kunco' ),
       'base'      => 'gva_blogs_grid',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kunco' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kunco' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kunco' )
          ),
          array(
             'type'         => 'checkbox',
             'heading'     => esc_html__( 'Show Pagination', 'kunco' ),
             'param_name'  => 'pagination',
             'description'    => esc_html__( 'Show pagination on bottom element', 'kunco' ),
          ),
          array(
            'type'         => 'dropdown',
            'heading'      => esc_html__( 'Style of Post', 'kunco' ),
            'param_name'   => 'style',
            'value'        => array(
              esc_html__('Default', 'kunco')  => 'posts-default'
            )
          ),
          
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Image size','kunco'),
            'param_name' => 'thumbnail_size',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Default = post-thumbnail','kunco')
          ),
           array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','kunco'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    );
    
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_blogs_grid['params'][] = $setting;
    }
    vc_map($gva_blogs_grid);
      
    //=== GVA Blogs Grid ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs Stick List', 'kunco' ),
       'base'      => 'gva_blogs_stick_list',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kunco' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kunco' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kunco' )
          ),
           array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kunco'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    ));

    //=== GVA Blogs List ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs List', 'kunco' ),
       'base'      => 'gva_blogs_list',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kunco' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kunco' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'kunco' )
          ),
          array(
            'type'         => 'textfield',
            'heading'      => esc_html__( 'Excerpt Words', 'kunco' ),
            'param_name'   => 'excerpt_words',
            'value'        => 20,
          ),
          array(
            'type'         => 'checkbox',
            'heading'      => esc_html__( 'Show Read more button', 'kunco' ),
            'param_name'   => 'read_more',
            'value'        => true,
          ),
          array(
            'type'         => 'checkbox',
            'heading'     => esc_html__( 'Show Pagination', 'kunco' ),
            'param_name'  => 'pagination',
            'value'    => false,
            'description'    => esc_html__( 'Show pagination on bottom element', 'kunco' ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Title Link','kunco'),
            'param_name' => 'title_link',
            'default'     => ''
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','kunco'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    ));

    //=== Blogs Small List ===
    vc_map( array(
       'name'      => esc_html__( 'GVA Blogs Small List', 'kunco' ),
       'base'      => 'gva_blogs_small_list',
       'category'  => 'Gavias Element',
       'icon'        => 'icon-wpb-vc_icon',
       'params'    => array(
          array(
             'type'         => 'textfield',
             'heading'     => esc_html__( 'Block title', 'kunco' ),
             'param_name'  => 'title',
             'admin_label'    => true,
             'value'       => '',
             'description'    => '',
          ),
          array(
             'type' => 'loop',
             'heading' =>esc_html__( 'Grids content', 'kunco' ),
             'param_name' => 'loop',
             'settings' => array(
                'size' => array( 'hidden' => false, 'value' => 4 ),
                'order_by' => array( 'value' => 'date' ),
             ),
             'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'kunco' )
          ),
          array(
             'type'         => 'checkbox',
             'heading'     => esc_html__( 'Show Excerpt', 'kunco' ),
             'param_name'  => 'excerpt',
             'value'    => true,
          ),
           array(
             'type' => 'textfield',
             'heading' => esc_html__('Extra class name','kunco'),
             'param_name' => 'el_class',
             'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
          ),
       )
    ));

    //=== Counter ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Counter', 'kunco' ),
      'base'      => 'gva_counter',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Class of Icon', 'kunco' ),
          'param_name'  => 'icon',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Number', 'kunco' ),
          'param_name'  => 'number',
          'value'       => '1200'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Symbol', 'kunco' ),
          'param_name'  => 'symbol',
          'value'       => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kunco' ),
          'param_name'  => 'content',
          'value'       => ''
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__( 'Icon Position', 'kunco' ),
          'param_name'   => 'icon_position',
          'value'        => array(
            esc_html__('Icon left', 'kunco')    => 'icon-left',
            esc_html__('Icon top', 'kunco')     => 'icon-top',
            esc_html__('Icon top 2', 'kunco')   => 'icon-top-2',
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Color of Icon', 'kunco' ),
          'param_name'  => 'icon_color',
          'value'       => ''
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__( 'Text color', 'kunco' ),
          'param_name'   => 'text_color',
          'value'        => array(
            esc_html__('Text dark', 'kunco')    => 'text-dark',
            esc_html__('Text light', 'kunco')   => 'text-light'
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Image Content ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Image width Content', 'kunco' ),
      'base'      => 'gva_image_content',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'attach_image',
          'heading'     => esc_html__( 'Background', 'kunco' ),
          'param_name'  => 'background',
          'value'       => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kunco' ),
          'param_name'  => 'content',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link'
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Style', 'kunco' ),
          'param_name'  => 'style',
          'value'       => array(
              esc_html__('Style 1', 'kunco')   => 'style-1',
              esc_html__('Style 2', 'kunco')   => 'style-2'
          )
        ),
        array(
          'type'         => 'checkbox',
          'heading'      => esc_html__( 'Open in new window', 'kunco' ),
          'param_name'   => 'target',
          'value'        => true,
          'description'   => 'Adds a target="_blank" attribute to the link'
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Pricing ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Pricing', 'kunco' ),
      'base'      => 'gva_pricing',
      'category'  => 'Gavias Element',
      'icon'        => 'icon-wpb-vc_icon',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Price', 'kunco' ),
          'param_name'  => 'price',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Currency', 'kunco' ),
          'param_name'  => 'currency',
          'value'       => '$'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Period', 'kunco' ),
          'param_name'  => 'period',
          'value'       => 'month'
        ),
        array(
          'type'        => 'textarea_html',
          'heading'     => esc_html__( 'Content', 'kunco' ),
          'param_name'  => 'content',
          'value'       => '<ul><li>Clean Design</li><li>Visual Page Builder</li><li>50+ Shortcode Modules</li><li class="disable">Stunning Portfolio Styles</li><li class="disable">Free Iconmind</li></ul>'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link',
          'value'       => '#'
        ),
         array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link Title', 'kunco' ),
          'param_name'  => 'link_title',
          'value'       => 'Read more'
        ),
        array(
          'type'         => 'checkbox',
          'heading'      => esc_html__( 'Featured', 'kunco' ),
          'param_name'   => 'featured',
          'value'        => false
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Box Card ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Box Card', 'kunco' ),
      'base'      => 'gva_box_card',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kunco' ),
          'param_name'  => 'content'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Icon Class', 'kunco' ),
          'param_name'  => 'icon'
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Icon Position', 'kunco' ),
          'param_name'  => 'icon_position',
          'value'       => array(
              esc_html__('Icon Left', 'kunco')   => 'left',
              esc_html__('Icon Right', 'kunco')   => 'right'
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link',
          'value'       => '#'
        ),
         array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Min Height', 'kunco' ),
          'param_name'  => 'height'
        ),
        
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Call to Action ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Call To Action', 'kunco' ),
      'base'      => 'gva_call_to_action',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textarea_html',
          'heading'     => esc_html__( 'Content', 'kunco' ),
          'param_name'  => 'content'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Text of Button', 'kunco' ),
          'param_name'  => 'text_link'
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Button Align', 'kunco' ),
          'param_name'  => 'button_align',
          'value'       => array(
            esc_html__('Button Left', 'kunco')            => 'button-left',
            esc_html__('Button Right', 'kunco')           => 'button-right',
            esc_html__('Button Right 2', 'kunco')         => 'button-right-2',
            esc_html__('Button Bottom Left', 'kunco')     => 'button-bottom',
            esc_html__('Button Bottom Center', 'kunco')   => 'button-center'
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Box Background', 'kunco' ),
          'param_name'  => 'box_background'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Set Max width for content', 'kunco' ),
          'param_name'  => 'width',
          'description' => esc_html__('e.g 660px', 'kunco')
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'style_text',
          'heading'     => esc_html__('Skin Text for box', 'kunco' ),
          'value'   => array(
              esc_html__('Text light', 'kunco')  => 'text-light',
              esc_html__('Text dark', 'kunco')   => 'text-dark'
          ),
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'style_button',
          'heading'     => esc_html__('Style Button', 'kunco' ),
          'value'   => array(
              esc_html__('Button default of theme', 'kunco')  => 'btn-theme',
              esc_html__('Button white', 'kunco')             => 'btn-white'
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link Video', 'kunco' ),
          'param_name'  => 'video',
          'description' => esc_html__('e.g: https://www.youtube.com/watch?v=4g7zRxRN1Xk', 'kunco')
        ),
        array(
          'type'           => 'checkbox',
          'param_name'     => 'target',
          'heading'        => esc_html__('Open in new window', 'kunco' ),
          'description'    => esc_html__('Adds a target="_blank" attribute to the link','kunco'),
        ),
              
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Work Quotes Rotator ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Quotes Rotator', 'kunco' ),
      'base'      => 'gva_quotes_rotator',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type' => 'param_group',
          'heading' => esc_html__('Items', 'kunco' ),
          'param_name' => 'items',
          'description' => '',
          'value' => urlencode( json_encode( array(
            
          ) ) ),
          'params' => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__('Title','kunco'),
              'param_name' => 'title',
              'admin_label' => true
            ),
            array(
              'type'        => 'textarea',
              'heading'     => esc_html__( 'Content', 'kunco' ),
              'param_name'  => 'content'
            ),
            array(
              'type'        => 'textfield',
              'heading'     => esc_html__( 'Link', 'kunco' ),
              'param_name'  => 'link'
            ),
          ),
        ),
        array(
          'type'         => 'dropdown',
          'heading'      => esc_html__('Skin Text', 'kunco' ),
          'param_name'   => 'skin_text',
          'value'        => array(
            esc_html__('Text Dark','kunco') => 'text-dark',
            esc_html__('Text Light','kunco') => 'text-light' 
          )
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Max Width', 'kunco' ),
          'param_name'    => 'max_width',
          'description'   => 'e.g: 600px'
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Min Height', 'kunco' ),
          'param_name'    => 'min_height',
          'description'   => 'e.g: 300px'
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));
  
    //=== Google Map ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Google Map', 'kunco' ),
      'base'      => 'gva_google_map',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'map_type',
          'heading'     => esc_html__('Map Type', 'kunco' ),
          'value'   => array(
              esc_html__('ROADMAP', 'kunco')  => 'ROADMAP',
              esc_html__('HYBRID', 'kunco')   => 'HYBRID',
              esc_html__('SATELLITE', 'kunco')   => 'SATELLITE',
              esc_html__('TERRAIN', 'kunco')   => 'TERRAIN'
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Latitude, Longitude for map', 'kunco' ),
          'param_name'  => 'link',
          'value'       => '',
          'description' => esc_html__( 'eg: 21.0173222,105.78405279999993', 'kunco' )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Map height', 'kunco' ),
          'param_name'  => 'height',
          'value'       => '',
          'description' => esc_html__( 'Enter map height (in pixels or leave empty for responsive map), eg: 400px', 'kunco' )
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Text Address', 'kunco' ),
          'param_name'  => 'content',
          'value'       => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Descption', 'kunco' ),
          'param_name'  => 'descrption',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Email', 'kunco' ),
          'param_name'  => 'email',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Phone', 'kunco' ),
          'param_name'  => 'phone',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Facebook Link', 'kunco' ),
          'param_name'  => 'facebook',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Twitter Link', 'kunco' ),
          'param_name'  => 'twitter',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Instagram Link', 'kunco' ),
          'param_name'  => 'instagram',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Dribbble Link', 'kunco' ),
          'param_name'  => 'dribbble',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Linkedin Link', 'kunco' ),
          'param_name'  => 'linkedin',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Pinterest Link', 'kunco' ),
          'param_name'  => 'pinterest',
          'value'       => ''
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Box Parallax ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Box Parallax', 'kunco' ),
      'base'      => 'gva_box_parallax',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true,
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'SubTitle', 'kunco' ),
          'param_name'  => 'subtitle',
          'value'       => ''
        ),
        array(
          'type'       => 'attach_image',
          'heading'    => esc_html__( 'Photo', 'kunco' ),
          'param_name' => 'photo',
          'value'      => ''
        ),
        array(
          'type'        => 'textarea',
          'heading'     => esc_html__( 'Content', 'kunco' ),
          'param_name'  => 'content',
          'value'       => ''
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'content_align',
          'heading'     => esc_html__('Content Align', 'kunco' ),
          'value'   => array(
              esc_html__('Left', 'kunco')    => 'left',
              esc_html__('Right', 'kunco')   => 'right',
          ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Background content', 'kunco' ),
          'param_name'  => 'content_bg',
          'value'       => '',
          'description' => esc_html__( 'ackground color for content. e.g. #f5f5f5', 'kunco' )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Content color', 'kunco' ),
          'param_name'  => 'content_color',
          'value'       => '',
          'description' => esc_html__( 'Color for content. e.g. #f5f5f5. default color-text for theme', 'kunco' )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link',
          'value'       => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link Title', 'kunco' ),
          'param_name'  => 'link_title',
          'value'       => ''
        ),
        array(
          'type'        => 'checkbox',
          'heading'     => esc_html__( 'Open in new window', 'kunco' ),
          'param_name'  => 'target',
          'description' => esc_html__( 'Adds a target="_blank" attribute to the link', 'kunco' )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Video Box ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Video Box', 'kunco' ),
      'base'      => 'gva_box_video',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Url Video (Youtube/Vimeo)', 'kunco' ),
          'param_name'  => 'content',
          'value'       => 'https://www.youtube.com/watch?v=4g7zRxRN1Xk',
        ),
        array(
          'type'       => 'attach_image',
          'heading'    => esc_html__( 'Image Preview', 'kunco' ),
          'param_name' => 'photo',
          'value'      => ''
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    //=== Partners ===
    vc_map( array(
      'name'      => esc_html__( 'GVA Partners', 'kunco' ),
      'base'      => 'gva_partners',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'       => 'attach_image',
          'heading'    => esc_html__( 'Image', 'kunco' ),
          'param_name' => 'photo',
          'value'      => ''
        ),
        array(
          'type'       => 'textarea',
          'heading'    => esc_html__( 'Content', 'kunco' ),
          'param_name' => 'content',
          'value'      => ''
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Category', 'kunco' ),
          'param_name'  => 'category',
          'value'       => '',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Address', 'kunco' ),
          'param_name'  => 'address',
          'value'       => '',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link',
          'value'       => '',
        ),
        array(
          'type'         => 'dropdown',
          'heading'     => esc_html__( 'Open in new window', 'kunco' ),
          'param_name'  => 'target',
          'value'       => array(
            esc_html__('No', 'kunco') => 'off',
            esc_html__('Yes', 'kunco') => 'on'
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    ));

    vc_map( array(
      'name'      => esc_html__( 'GVA Tabs Content', 'kunco' ),
      'base'      => 'gva_tabs_content',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title for Administrator', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'content_align',
          'heading'     => esc_html__('Content Align', 'kunco' ),
          'value'   => array(
              esc_html__('Default', 'kunco')      => '',
              esc_html__('Text Light', 'kunco')   => 'text-light'
          ),
        ),
        array(
          'type' => 'param_group',
          'heading' => esc_html__('Items', 'kunco' ),
          'param_name' => 'items',
          'description' => '',
          'value' => urlencode( json_encode( array(
            
          ) ) ),
          'params' => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__('Icon Class','kunco'),
              'param_name' => 'icon',
              'description' => 'Use class icon font <a target="_blank" href="http://fontawesome.io/icons/">Icon Awesome</a> or <a target="_blank" href="gaviasthemes.com/icons">Custom icon</a>'
            ),
            array(
              'type'        => 'textfield',
              'heading'     => esc_html__( 'Title', 'kunco' ),
              'param_name'  => 'title',
              'admin_label' => true
            ),
            array(
              'type'        => 'textarea',
              'heading'     => esc_html__( 'Content', 'kunco' ),
              'param_name'  => 'content',
              'settings'    => array('rows' => 20)
            ),
            array(
              'type'       => 'attach_image',
              'heading'    => esc_html__( 'Image Preview', 'kunco' ),
              'param_name' => 'photo',
              'value'      => ''
            )
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    vc_map( array(
      'name'      => esc_html__( 'GVA Service Box', 'kunco' ),
      'base'      => 'gva_service_box',
      'icon'      => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Icon', 'kunco' ),
          'param_name'  => 'icon'
        ),
        array(
          'type' => 'param_group',
          'heading' => esc_html__('Features', 'kunco' ),
          'param_name' => 'items',
          'description' => '',
          'value' => urlencode( json_encode( array(
            
          ) ) ),
          'params' => array(
            array(
              'type'        => 'textfield',
              'heading'     => esc_html__( 'Title', 'kunco' ),
              'param_name'  => 'title',
              'admin_label' => true
            )
          )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Text Link', 'kunco' ),
          'param_name'  => 'text_link'
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    vc_map( array(
      'name'      => esc_html__( 'GVA Job Box', 'kunco' ),
      'base'      => 'gva_job_box',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'param_name'   => 'image',
          'type'         => 'attach_image',
          'heading'      => esc_html__('Image Icon', 'kunco' ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Job Type', 'kunco' ),
          'param_name'  => 'job_type'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Company', 'kunco' ),
          'param_name'  => 'company'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Address', 'kunco' ),
          'param_name'  => 'address'
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));
    
    vc_map( array(
      'name'      => esc_html__( 'GVA Box Color', 'kunco' ),
      'base'      => 'gva_box_color',
      'icon'        => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Title', 'kunco' ),
          'param_name'  => 'title',
          'admin_label' => true
        ),
        array(
          'type'        => 'textarea_html',
          'heading'     => esc_html__( 'Content', 'kunco' ),
          'param_name'  => 'content'
        ),
        array(
          'param_name'   => 'image',
          'type'         => 'attach_image',
          'heading'      => esc_html__('Image Icon', 'kunco' ),
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Link', 'kunco' ),
          'param_name'  => 'link'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Text Link', 'kunco' ),
          'param_name'  => 'text_link',
          'default'     => esc_html__('Read More', 'kunco')
        ),
        array(
          'type'        => 'colorpicker',
          'heading'     => esc_html__( 'Background color', 'kunco' ),
          'param_name'  => 'color',
          'desc'        => esc_html__('Background color fox box. e.g: #ccc', 'kunco')
        ),
        array(
          'type'        => 'dropdown',
          'param_name'  => 'text_style',
          'heading'     => esc_html__('Text Style', 'kunco' ),
          'value'   => array(
              esc_html__('Default', 'kunco')      => '',
              esc_html__('Text Light', 'kunco')   => 'white'
          ),
        ),
        array(
          'type'        => 'checkbox',
          'param_name'  => 'target',
          'heading'     => esc_html__('Open in new window', 'kunco' ),
          'desc'        => esc_html__( 'Adds a target="_blank" attribute to the link', 'kunco' )
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__( 'Height', 'kunco' ),
          'param_name'  => 'height',
          'desc'        => esc_html__('Set Min Height for box', 'kunco')
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        ),
      )
    ));

    vc_map( array(
    'name'        => esc_html__( 'GVA Facebook Box', 'kunco'),
    'base'        => 'gva_facebook_box',
    "class"       => "",
    "category"    => esc_html__('Gavias Element', 'kunco'),
    'description' => esc_html__( 'Create title for one block', 'kunco' ),
    "params"      => array(
      array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Widget', 'kunco' ),
        'param_name'  => 'title',
        'value'       => esc_html__( 'Find us on Facebook', 'kunco' ),
        'description' => esc_html__( 'Enter heading title.', 'kunco' ),
        "admin_label" => true
      ),
      array(
        "type"          => "textfield",
        "heading"       => esc_html__("Facebook Page URL", 'kunco'),
        "param_name"    => "page_url",
        "value"         => "#"
      ),
      array(
        "type"        => "textfield",
        "heading"     => esc_html__("Width", 'kunco'),
        "param_name"  => "width",
        "value"       => "300",
        "description" => "Example: 300"
      ),  
      array(
        "type"        => "textfield",
        "heading"     => esc_html__("Height", 'kunco'),
        "param_name"  => "height",
        "value"       => "300",
        "description" => "Example: 300"
      ),  
      array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Color Scheme', 'kunco' ),
        'param_name'  => 'color_scheme',
        'value' => array(
          esc_html__( 'Light', 'kunco' ) => 'light',
          esc_html__( 'Dark', 'kunco' ) => 'dark'
        ),
        'description' => esc_html__( 'Select Color Scheme.', 'kunco' )
      ),
      array(
        "type"        => "checkbox",
        "heading"     => esc_html__("Show faces", 'kunco'),
        "param_name"  => "show_faces",
        "value" => array(
            'Yes, please' => true
        )
      ),
      array(
        "type"        => "checkbox",
        "heading"     => esc_html__("Show stream", 'kunco'),
        "param_name"  => "show_stream",
        "value" => array(
            'Yes, please' => true
        )
      ),
      array(
        "type"            => "checkbox",
        "heading"         => esc_html__("Show facebook header", 'kunco'),
        "param_name"      => "show_header",
        "value" => array(
            'Yes, please' => true
        )
      ),  
      array(
        "type"          => "textfield",
        "heading"       => esc_html__("Extra class name", 'kunco'),
        "param_name"    => "el_class",
        "value" => ''
      ),                  
    ),
  ));

	}
}