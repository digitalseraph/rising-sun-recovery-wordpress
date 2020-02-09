<?php
function kunco_register_meta_boxes(){

   $prefix = 'kunco_';
   global $meta_boxes, $wp_registered_sidebars;;
   $sidebar = array();
   $sidebar[""] = ' --Default-- ';
   foreach($wp_registered_sidebars as $key => $value){
      $sidebar[$value['id']] = $value['name'];
   }
   $default_options = get_option('kunco_options');
   
   $meta_boxes = array();

   /* Thumbnail Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_post_thumbnail',
      'title' => esc_html__('Thumbnail', 'kunco'),
      'pages' => array( 'post' ),
      'context' => 'normal',
      'fields' => array(
         
         // THUMBNAIL IMAGE
         array(
            'name'  => esc_html__('Thumbnail image', 'kunco'),
            'desc'  => esc_html__('The image that will be used as the thumbnail image.', 'kunco'),
            'id'    => "{$prefix}thumbnail_image",
            'type'  => 'image_advanced',
            'max_file_uploads' => 1
         ),

         // THUMBNAIL VIDEO
         array(
            'name' => esc_html__('Thumbnail video URL', 'kunco'),
            'id' => $prefix . 'thumbnail_video_url',
            'desc' => esc_html__('Enter the video url for the thumbnail. Only links from Vimeo & YouTube are supported.', 'kunco'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL AUDIO
         array(
            'name' => esc_html__('Thumbnail audio URL', 'kunco'),
            'id' => "{$prefix}thumbnail_audio_url",
            'desc' => esc_html__('Enter the audio url for the thumbnail.', 'kunco'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL GALLERY
         array(
            'name'             => esc_html__('Thumbnail gallery', 'kunco'),
            'desc'             => esc_html__('The images that will be used in the thumbnail gallery.', 'kunco'),
            'id'               => "{$prefix}thumbnail_gallery",
            'type'             => 'image_advanced',
            'max_file_uploads' => 50,
         ),

         // THUMBNAIL LINK TYPE
         array(
            'name' => esc_html__('Thumbnail link type', 'kunco'),
            'id'   => "{$prefix}thumbnail_link_type",
            'type' => 'select',
            'options' => array(
               'link_to_post'    => esc_html__('Link to item', 'kunco'),
               'link_to_url'     => esc_html__('Link to URL', 'kunco'),
               'link_to_url_nw'  => esc_html__('Link to URL (New Window)', 'kunco'),
               'lightbox_thumb'  => esc_html__('Lightbox to the thumbnail image', 'kunco'),
               'lightbox_image'  => esc_html__('Lightbox to image (select below)', 'kunco'),
               'lightbox_video'  => esc_html__('Fullscreen Video Overlay (input below)', 'kunco')
            ),
            'multiple' => false,
            'std'  => 'link-to-post',
            'desc' => esc_html__('Choose what link will be used for the image(s) and title of the item.', 'kunco')
         ),

         // THUMBNAIL LINK URL
         array(
            'name' => esc_html__('Thumbnail link URL', 'kunco'),
            'id' => $prefix . 'thumbnail_link_url',
            'desc' => esc_html__('Enter the url for the thumbnail link.', 'kunco'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),

         // THUMBNAIL LINK LIGHTBOX IMAGE
         array(
            'name'  => esc_html__('Thumbnail link lightbox image', 'kunco'),
            'desc'  => esc_html__('The image that will be used as the lightbox image.', 'kunco'),
            'id'    => "{$prefix}thumbnail_link_image",
            'type'  => 'thickbox_image'
         ),
      )
   );

   /* Page Title Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_page_heading',
      'title' => esc_html__('Page Title', 'kunco'),
      'pages' => array( 'post', 'page', 'product', 'portfolio', 'gallery', 'give_forms', 'gva_event', 'gva_team'),
      'context' => 'normal',
      'fields' => array(

        array(
          'name' => esc_html__('Remove Title of Page', 'kunco'),   
          'id'   => "{$prefix}disable_page_title",
          'type' => 'checkbox',
          'std'  => 0,
        ),

         // SHOW PAGE TITLE
        array(
          'name' => esc_html__('Show page title in the breadcrumbs', 'kunco'),   
          'id'   => "{$prefix}page_title",
          'type' => 'checkbox',
          'std'  => 1,
        ),

         // PAGE TITLE STYLE
        array(
          'name' => esc_html__('Page Title Style', 'kunco'),
          'id'   => "{$prefix}page_title_style",
          'type' => 'select',
          'options' => array(
             'standard'           => esc_html__('Standard', 'kunco'),
             'hero'               => esc_html__('Background', 'kunco'),
          ),
          'multiple' => false,
          'std'  => 'hero',
          'desc' => esc_html__('Choose the heading style.', 'kunco')
        ),

         // PAGE TITLE LINE 1
        array(
          'name' => esc_html__('Page Title', 'kunco'),
          'id' => $prefix . 'page_title_one',
          'desc' => esc_html__("Enter a custom page title if you'd like.", 'kunco'),
          'type'  => 'text',
          'std' => '',
        ),

         // PAGE TITLE BACKGROUND COLOR
        array(
          'name' => esc_html__( 'Hero Overlay Color', 'kunco' ),
          'id'   => "{$prefix}bg_color_title",
          'desc' => esc_html__( "Set an overlay color for hero heading image.", 'kunco' ),
          'type' => 'color',
          'std'  => '',
        ),
            
        // Overlay Opacity Value
        array(
          'name'       => esc_html__( 'Overlay Opacity', 'kunco' ),
          'id'         => "{$prefix}bg_opacity_title",
          'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'kunco' ),
          'clone'      => false,
          'type'       => 'slider',
          'prefix'     => '',
          'js_options' => array(
              'min'  => 0,
              'max'  => 100,
              'step' => 1,
          ),
          'std'   => '50'
        ),

        // HERO HEADING IMAGE UPLOAD
        array(
          'name'  => esc_html__('Hero Heading Background Image', 'kunco'),
          'desc'  => esc_html__('The image that will be used as the background for the hero header.', 'kunco'),
          'id'    => "{$prefix}page_title_image",
          'type'  => 'image_advanced',
          'max_file_uploads' => 1
        ),

        // HERO HEADING TEXT STYLE
        array(
          'name' => esc_html__('Hero Heading Text Style', 'kunco'),
          'id'   => "{$prefix}page_title_text_style",
          'type' => 'select',
          'options' => array(
             'text-light'     => esc_html__('Light', 'kunco'),
             'text-dark'      => esc_html__('Dark', 'kunco')
          ),
          'multiple' => false,
          'std'  => 'text-light',
          'desc' => esc_html__('If you uploaded an image in the option above, choose light/dark styling for the text heading text here.', 'kunco')
        ),

        // HERO HEADING TEXT ALIGN
        array(
          'name' => esc_html__('Hero Heading Text Align', 'kunco'),
          'id'   => "{$prefix}page_title_text_align",
          'type' => 'select',
          'options' => array(
             'text-left'      => esc_html__('Left', 'kunco'),
             'text-center'    => esc_html__('Center', 'kunco'),
             'text-right'     => esc_html__('Right', 'kunco')
          ),
          'multiple' => false,
          'std'  => 'text-center',
          'desc' => esc_html__('Choose the text alignment for the hero heading.', 'kunco')
        ),

        // REMOVE BREADCRUMBS
        array(
          'name' => esc_html__('Remove breadcrumbs', 'kunco'),
          'id'   => "{$prefix}no_breadcrumbs",
          'type' => 'checkbox',
          'desc' => esc_html__('Remove the breadcrumbs from under the page title on this page.', 'kunco'),
          'std' => 0,
        )
      )
   );

   /* Testimonials Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_testimonials',
      'title' => esc_html__('Testimonial Meta', 'kunco'),
      'pages' => array( 'testimonials' ),
      'fields' => array(
        array(
          'name' => esc_html__('Testimonial Job', 'kunco'),
          'id' => $prefix . 'testimonial_job',
          'desc' => esc_html__("Enter the job for the testimonial.", 'kunco'),
          'type'  => 'text',
          'std' => ''
        ),
        array(
          'name' => esc_html__('Video Preview', 'kunco'),
          'id' => $prefix . 'testimonial_video',
          'desc' => esc_html__("Put link video preview, use youtube or vimeo video.", 'kunco'),
          'type'  => 'text',
          'std' => ''
        ),
        array(
          'name' => esc_html__('Image Preview', 'kunco'),
          'id' => $prefix . 'testimonial_image',
          'type'             => 'image_advanced',
          'max_file_uploads' => 1,
        ),
      )
   );

   /* Page Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_page',
      'title' => esc_html__('Page Meta', 'kunco'),
      'pages' => array( 'page', 'portfolio', 'product', 'post', 'give_forms' ),
      'fields' => array(
         // Extra Page Class
         array(
            'name' => esc_html__('Header', 'kunco'),
            'id' => $prefix . 'page_header',
            'desc' => esc_html__("You can change header for page if you like's.", 'kunco'),
            'type'  => 'select',
            'options'   => kunco_get_headers(),
            'std' => 'default-option-theme',
         ),
         array(
            'name'      => esc_html__('Footer', 'kunco'),
            'id'        => $prefix . 'page_footer',
            'desc'      => esc_html__("You can change footer for page if you like's",'kunco'),
            'type'      => 'select',
            'options'   =>  kunco_get_footer(),
            'std'       => 'default-option-theme'
         ),
         // Extra Page Class
         array(
            'name' => esc_html__('Extra page class', 'kunco'),
            'id' => $prefix . 'extra_page_class',
            'desc' => esc_html__("If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.", 'kunco'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),
         // Full width
         array(
            'name' => esc_html__('Full Width', 'kunco'),
            'id'   => "{$prefix}page_full_width",
            'type' => 'checkbox',
            'desc' => esc_html__('Remove class container wrapper for page.', 'kunco'),
            'std' => 0,
         ),
      )
   );

   /* Brands Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_brands_options',
      'title' => esc_html__('Brands Options', 'kunco'),
      'pages' => array( 'brands'),
      'priority' => 'low',
      'fields' => array(
         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Url Link', 'kunco'),
             'id'    => "{$prefix}url_link",
             'type' => 'text',
             'std'   => ''
         ),
      )
   );

   /* Sidebar Meta Box Page
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_sidebar_page',
      'title' => esc_html__('Sidebar Options', 'kunco'),
      'pages' => array( 'post', 'page', 'product', 'portfolio', 'gallery', 'give_forms', 'gva_event' ),
      'priority' => 'low',
      'fields' => array(

         // SIDEBAR CONFIG
         array(
            'name' => esc_html__('Sidebar configuration', 'kunco'),
            'id'   => "{$prefix}sidebar_config",
            'type' => 'select',
            'options' => array(
               ''                   => esc_html__('--Default--', 'kunco'),
               'no-sidebars'        => esc_html__('No Sidebars', 'kunco'),
               'left-sidebar'       => esc_html__('Left Sidebar', 'kunco'),
               'right-sidebar'      => esc_html__('Right Sidebar', 'kunco'),
               'both-sidebars'      => esc_html__('Both Sidebars', 'kunco')
            ),
            'multiple' => false,
            'std'  => '',
            'desc' => esc_html__('Choose the sidebar configuration for the detail page of this page.', 'kunco'),
         ),

         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Left Sidebar', 'kunco'),
             'id'    => "{$prefix}left_sidebar",
             'type' => 'select',
             'options'  => $sidebar,
             'std'   => ''
         ),

         // RIGHT SIDEBAR
         array (
            'name'   => esc_html__('Right Sidebar', 'kunco'),
            'id'    => "{$prefix}right_sidebar",
            'type' => 'select',
            'options'  => $sidebar,
            'std'   => ''
         ),
      )
   );

  /* Gallery Meta Box 
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'metaboxes_gallery_page',
      'title' => esc_html__('Gallery Settings', 'kunco'),
      'pages' => array( 'gallery', 'portfolio' ),
      'priority' => 'low',
      'fields' => array(
        array (
          'name'   => esc_html__('Gallery Images', 'kunco'),
          'id'    => "{$prefix}gallery_images",
          'type'             => 'image_advanced',
          'max_file_uploads' => 50,
        ),
      )
   );

   $map_api_key = kunco_get_option('map_api_key', 'AIzaSyChkvQkXo_61RR7u-XJOj-rLF9ekk9eRYc'); 
    /* Event Meta Box 
   ================================================== */
   $meta_boxes[] = array(
      'id'            => 'metaboxes_event_page',
      'title'         => esc_html__('Event Settings', 'kunco'),
      'pages'         => array( 'gva_event' ),
      'priority'      => 'low',
      'fields'        => array(
        array (
          'name'    => esc_html__('Start Time', 'kunco'),
          'id'      => "{$prefix}start_time",
          'type'    => 'datetime'
        ),
        array (
          'name'    => esc_html__('Finished Time', 'kunco'),
          'id'      => "{$prefix}finish_time",
          'type'    => 'datetime'
        ),
        array (
          'name'    => esc_html__('Address', 'kunco'),
          'id'      => "{$prefix}address",
          'type'    => 'text'
        ),
        array (
          'name'    => esc_html__('Google Map', 'kunco'),
          'id'      => "{$prefix}map",
          'type'    => 'map',
          'address_field' => "{$prefix}address",
          'api_key'   => $map_api_key
        ),
        
      ),
   );

  $meta_boxes[] = array(
    'id'    => 'metaboxes_team_page',
    'title' => esc_html__('Team Settings', 'kunco'),
    'pages' => array( 'gva_team' ),
    'priority' => 'low',
    'fields' => array(
      array (
        'name'   => esc_html__('Position', 'kunco'),
        'id'    => "{$prefix}team_position",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Quote', 'kunco'),
        'id'    => "{$prefix}team_quote",
        'type' => 'textarea',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Email', 'kunco'),
        'id'    => "{$prefix}team_email",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Phone', 'kunco'),
        'id'    => "{$prefix}team_phone",
        'type' => 'text',
        'std'   => ''
      ),
      array (
        'name'   => esc_html__('Address', 'kunco'),
        'id'    => "{$prefix}team_address",
        'type' => 'text',
        'std'   => ''
      ),
    )
  );

  $meta_boxes[] = array(
    'id'    => 'metaboxes_give_forms',
    'title' => esc_html__('Give Forms Settings', 'kunco'),
    'pages' => array( 'give_forms' ),
    'priority' => 'high',
    'fields' => array(
     array (
        'name'   => esc_html__('Gallery Images', 'kunco'),
        'id'    => "{$prefix}give_gallery_images",
        'type'             => 'image_advanced',
        'max_file_uploads' => 50,
      ),
      array(
        'name' => esc_html__('Video URL', 'kunco'),
        'id' => $prefix . 'give_video_url',
        'type' => 'text'
      ),
      array(
        'name' => esc_html__('Featured', 'kunco'),   
        'id'   => "{$prefix}give_featured",
        'type' => 'checkbox',
        'std'  => 0,
      )
    )
  );

   return $meta_boxes;
 }  
  /********************* META BOX REGISTERING ***********************/
  add_filter( 'rwmb_meta_boxes', 'kunco_register_meta_boxes' , 99 );
