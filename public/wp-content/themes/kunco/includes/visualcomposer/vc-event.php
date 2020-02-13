<?php 
class Kunco_Visualcomposer_Event implements Vc_Vendor_Interface {
	public function load(){ 
    $event_cats = array();
    if(function_exists('gaviasthemer_get_select_term')){
      $event_cats = gaviasthemer_get_select_term('gva_event_cat');
    };
    //===== Event Carousel =====
    $gva_events_carousel = array(
      'name'      => esc_html__( 'GVA Events Carousel', 'kunco' ),
      'base'      => 'gva_events_carousel',
      'class'  => '',
      'category'  => 'Gavias Element',
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
          'heading'     => esc_html__( 'Limit', 'kunco' ),
          'param_name'  => 'per_page',
          'value'       => '5',
          'description'    => esc_html__('Number of Posts', 'kunco')
        ),
        array(
          "type" => "dropdown",
          'heading' => esc_html__( 'Mode', 'kunco' ),
          "param_name" => "mode",
          "value" => array(
             esc_html__('Lastest Courses', 'kunco') => 'most_recent',
             esc_html__('Randown Courses', 'kunco') => 'random'
          )
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Events Categories', 'kunco' ),
          'param_name'      => 'event_cats',
          'admin_label'     => true,
          'value'           =>  $event_cats,
          'description'     => '',
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
       $gva_events_carousel['params'][] = $setting;
    }
    foreach (kunco_carousel_settings() as $key => $setting) {
       $gva_events_carousel['params'][] = $setting;
    }
    vc_map($gva_events_carousel);

    //===== Event List =====
    $gva_events_list = array(
      'name'      => esc_html__( 'GVA Events List', 'kunco' ),
      'base'      => 'gva_events_list',
      'class'  => '',
      'category'  => 'Gavias Element',
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
          'heading'     => esc_html__( 'Limit', 'kunco' ),
          'param_name'  => 'per_page',
          'value'       => '5',
          'description'    => esc_html__('Number of Posts', 'kunco')
        ),
        array(
          "type" => "dropdown",
          'heading' => esc_html__( 'Mode', 'kunco' ),
          "param_name" => "mode",
          "value" => array(
             esc_html__('Lastest Courses', 'kunco') => 'most_recent',
             esc_html__('Randown Courses', 'kunco') => 'random'
          )
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Events Categories', 'kunco' ),
          'param_name'      => 'event_cats',
          'admin_label'     => true,
          'value'           =>  $event_cats,
          'description'     => '',
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Enable Pagination', 'kunco' ),
          'param_name'      => 'pagination',
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name','kunco'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    vc_map($gva_events_list);

    //===== Event List =====
    $gva_events_list = array(
      'name'      => esc_html__( 'GVA Events List Small', 'kunco' ),
      'base'      => 'gva_events_list_small',
      'class'  => '',
      'category'  => 'Gavias Element',
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
          'heading'     => esc_html__( 'Limit', 'kunco' ),
          'param_name'  => 'per_page',
          'value'       => '5',
          'description'    => esc_html__('Number of Posts', 'kunco')
        ),
        array(
          "type" => "dropdown",
          'heading' => esc_html__( 'Mode', 'kunco' ),
          "param_name" => "mode",
          "value" => array(
             esc_html__('Lastest Courses', 'kunco') => 'most_recent',
             esc_html__('Randown Courses', 'kunco') => 'random'
          )
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Events Categories', 'kunco' ),
          'param_name'      => 'event_cats',
          'admin_label'     => true,
          'value'           =>  $event_cats,
          'description'     => '',
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__('Extra class name','kunco'),
          'param_name' => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    vc_map($gva_events_list);
  }
}