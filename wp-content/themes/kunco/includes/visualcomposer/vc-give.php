<?php 
class Kunco_VisualComposer_Give implements Vc_Vendor_Interface {
	public function load(){ 
    $kunco_give_catgories = array();
    if(function_exists('gaviasthemer_get_select_term')){
      $kunco_give_catgories = gaviasthemer_get_select_term('give_forms_category');
    }
    //--- Give Form Gird ---
    $gva_give_form_grid = array(
      'name'      => esc_html__( 'GVA Causes/Gives Grid', 'kunco' ),
      'base'      => 'gva_give_grid',
      'icon'      => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__( 'Block title', 'kunco' ),
          'param_name'      => 'title',
          'admin_label'     => true,
          'value'           => '',
        ),
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__( 'Limit', 'kunco' ),
          'param_name'      => 'per_page',
          'admin_label'     => true,
          'value'           => '5'
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Course Categories', 'kunco' ),
          'param_name'      => 'give_cats',
          'multiselect'     => true,          
          'value'           =>  $kunco_give_catgories,
          'description'     => '',
        ),
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__( 'Number of words in excerpt', 'kunco' ),
          'param_name'      => 'excerpt_words',
          'admin_label'     => false,
          'value'           => '16',
          'description'     => '',
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Enable Pagination', 'kunco' ),
          'param_name'      => 'pagination',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__('Extra class name','kunco'),
          'param_name'    => 'el_class',
          'description'   => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_give_form_grid['params'][] = $setting;
    }
    vc_map($gva_give_form_grid);

    //--- Give Form Carousel ---
    $gva_give_form_carousel = array(
      'name'      => esc_html__( 'GVA Causes/Gives Carousel', 'kunco' ),
      'base'      => 'gva_give_carousel',
      'icon'      => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__( 'Block title', 'kunco' ),
          'param_name'      => 'title',
          'admin_label'     => true,
          'value'           => '',
          'description'     => '',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Limit', 'kunco' ),
          'param_name'    => 'per_page',
          'admin_label'   => true,
          'value'         => '5'
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Causes/Gives Categories', 'kunco' ),
          'param_name'      => 'give_cats',
          'multiselect'     => true,          
          'value'           =>  $kunco_give_catgories,
          'description'     => '',
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Featured Causes/Gives', 'kunco' ),
          'param_name'      => 'featured',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Number of words in excerpt', 'kunco' ),
          'param_name'    => 'excerpt_words',
          'admin_label'   => false,
          'value'         => '16',
          'description'   => '',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__('Extra class name','kunco'),
          'param_name'    => 'el_class',
          'description'   => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_give_form_carousel['params'][] = $setting;
    }
    foreach (kunco_carousel_settings() as $key => $setting) {
      $gva_give_form_carousel['params'][] = $setting;
    }
    vc_map($gva_give_form_carousel);

    //--- Give Form Carousel 2 ---
    $gva_give_form_carousel_2 = array(
      'name'      => esc_html__( 'GVA Causes/Gives Carousel 2', 'kunco' ),
      'base'      => 'gva_give_carousel_2',
      'icon'      => 'icon-wpb-vc_icon',
      'category'  => 'Gavias Element',
      'params'    => array(
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Block title', 'kunco' ),
          'param_name'    => 'title',
          'admin_label'   => true,
          'value'         => '',
          'description'   => '',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Limit', 'kunco' ),
          'param_name'    => 'per_page',
          'admin_label'   => true,
          'value'         => '5'
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Course Categories', 'kunco' ),
          'param_name'      => 'give_cats',
          'multiselect'     => true,          
          'value'           =>  $kunco_give_catgories,
          'description'     => '',
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Featured Causes/Gives', 'kunco' ),
          'param_name'      => 'featured',
        ),
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__( 'Number of words in excerpt', 'kunco' ),
          'param_name'      => 'excerpt_words',
          'admin_label'     => false,
          'value'           => '16',
          'description'     => '',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__('Extra class name','kunco'),
          'param_name'    => 'el_class',
          'description'   => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    vc_map($gva_give_form_carousel_2);

    //--- Give Form Carousel 3---
    $gva_give_carousel_3 = array(
      'name'        => esc_html__( 'GVA Causes/Gives Carousel 3', 'kunco' ),
      'base'        => 'gva_give_carousel_3',
      'icon'        => 'icon-wpb-vc_icon',
      'category'    => 'Gavias Element',
      'params'      => array(
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Block title', 'kunco' ),
          'param_name'    => 'title',
          'admin_label'   => true,
          'value'         => '',
          'description'   => '',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Limit', 'kunco' ),
          'param_name'    => 'per_page',
          'admin_label'   => true,
          'value'         => '5'
        ),
        array(
          'type'            => 'dropdown',
          'heading'         => esc_html__( 'Course Categories', 'kunco' ),
          'param_name'      => 'give_cats',
          'multiselect'     => true,          
          'value'           =>  $kunco_give_catgories,
          'description'     => '',
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Featured Causes/Gives', 'kunco' ),
          'param_name'      => 'featured',
        ),
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__( 'Number of words in excerpt', 'kunco' ),
          'param_name'      => 'excerpt_words',
          'admin_label'     => false,
          'value'           => '16',
          'description'     => '',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => esc_html__('Extra class name','kunco'),
          'param_name'  => 'el_class',
          'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    vc_map($gva_give_carousel_3);

	}
}