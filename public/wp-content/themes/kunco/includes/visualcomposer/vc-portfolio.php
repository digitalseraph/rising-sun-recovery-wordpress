<?php 
class Kunco_Visualcomposer_Portfolio implements Vc_Vendor_Interface {
	public function load(){ 
    //=== Element Portfolio Grid ===
    $gva_portfolio_grid =  array(
      'name'        => esc_html__("GVA Portfolio Grid", 'kunco'),
      'base'        => 'gva_portfolio_grid',
      'icon'        => 'icon-wpb-vc_icon',
      'category'    => 'Gavias Element',
      'params'      => array(
        array(
          'type'           => 'textfield',
          'heading'        => esc_html__( 'Title Admin', 'kunco' ),
          'param_name'     => 'title',
          'admin_label'    => true,
          'description'    => esc_html__('Title of element', 'kunco')
        ),
        array(
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Porfolio IDs', 'kunco' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'        => true,
            'sortable'       => true,
            'unique_values'  => true,
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__( 'Use Custom Categories ID', 'kunco' ),
          'param_name'   => 'categories',
          'value'        => '',
          'description'  => esc_html__('Element only display custom categories & portfolio in custom categories, ex: 201, 202, 203', 'kunco')
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__( 'Limit', 'kunco' ),
          'param_name'   => 'per_page',
          'value'        => '6',
          'description'  => esc_html__('Number of Posts', 'kunco')
        ),
        array(
          'type'          => 'dropdown',
          'heading'       => esc_html__( 'Style display', 'kunco' ),
          'param_name'    => 'style_display',
          'value'         => array(
            esc_html__('Style #1', 'kunco') => 'item-v1',
            esc_html__('Style #2', 'kunco') => 'item-v2'
          )
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Enable Filter', 'kunco' ),
          'param_name'      => 'filter',
          'std'  => true
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Remove Padding', 'kunco' ),
          'param_name'      => 'remove_padding',
          'std'  => true
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Enable Pagination', 'kunco' ),
          'param_name'      => 'pagination',
        ),
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__( 'Link All Portfolio', 'kunco' ),
          'param_name'      => 'link_all'
        ),
        array(
          'type'            => 'textfield',
          'heading'         => esc_html__('Extra class name','kunco'),
          'param_name'      => 'el_class',
          'description'     => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
       $gva_portfolio_grid['params'][] = $setting;
    }
    vc_map($gva_portfolio_grid);

    $gva_portfolio_slideset =  array(
      'name'        => esc_html__("GVA Portfolio Slideset", 'kunco'),
      'base'        => 'gva_portfolio_slideset',
      'icon'        => 'icon-wpb-vc_icon',
      'category'    => 'Gavias Element',
      'params'      => array(
        array(
          'type'           => 'textfield',
          'heading'        => esc_html__( 'Title Admin', 'kunco' ),
          'param_name'     => 'title',
          'admin_label'    => true,
          'description'    => esc_html__('Title of element', 'kunco')
        ),
        array(
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Porfolio IDs', 'kunco' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'        => true,
            'sortable'       => true,
            'unique_values'  => true,
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__( 'Limit', 'kunco' ),
          'param_name'   => 'per_page',
          'value'        => '6',
          'description'  => esc_html__('Number of Posts', 'kunco')
        ),
        array(
          'type'            => 'checkbox',
          'heading'         => __( 'Enable Filter', 'kunco' ),
          'param_name'      => 'filter',
          'std'  => true
        ),
        array(
          'type'           => 'checkbox',
          'heading'        => __( 'Remove Padding', 'kunco' ),
          'param_name'     => 'remove_padding',
          'std'  => true
        ),
        array(
          'type'           => 'checkbox',
          'heading'        => __( 'Enable Pagination', 'kunco' ),
          'param_name'     => 'pagination',
        ),
        array(
          'type'          => 'textfield',
          'heading'       => esc_html__( 'Link All Portfolio', 'kunco' ),
          'param_name'    => 'link_all'
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
       $gva_portfolio_slideset['params'][] = $setting;
    }
    vc_map($gva_portfolio_slideset);

    //=== Element Portfolio Carousel ===
    $gva_portfolio_carousel =  array(
      'name'        => esc_html__("GVA Portfolio Carousel", 'kunco'),
      'base'        => 'gva_portfolio_carousel',
      'icon'        => 'icon-wpb-vc_icon',
      'category'    => 'Gavias Element',
      'params'      => array(
        array(
          'type'           => 'textfield',
          'heading'        => esc_html__( 'Title Admin', 'kunco' ),
          'param_name'     => 'title',
          'admin_label'    => true,
          'description'    => esc_html__('Title of element', 'kunco')
        ),
        array(
          'type'        => 'autocomplete',
          'heading'     => __( 'Select Porfolio IDs', 'kunco' ),
          'param_name'  => 'ids',
          'settings' => array(
            'multiple'       => true,
            'sortable'       => true,
            'unique_values'  => true,
          )
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__( 'Limit', 'kunco' ),
          'param_name'   => 'per_page',
          'value'        => '6',
          'description'  => esc_html__('Number of Posts', 'kunco')
        ),
        array(
          'type'        => 'dropdown',
          'heading'     => esc_html__( 'Style display', 'kunco' ),
          'param_name'  => 'style_display',
          'value'       => array(
              esc_html__('Style #1', 'kunco') => 'item-v1',
              esc_html__('Style #2', 'kunco') => 'item-v2'
            ),
        ),
        array(
          'type'          => 'checkbox',
          'heading'       => __( 'Remove Padding', 'kunco' ),
          'param_name'    => 'remove_padding',
          'std'  => true
        ),
        array(
          'type'         => 'checkbox',
          'heading'      => __( 'Enable Pagination', 'kunco' ),
          'param_name'   => 'pagination',
        ),
        array(
          'type'         => 'textfield',
          'heading'      => esc_html__('Extra class name','kunco'),
          'param_name'   => 'el_class',
          'description'  => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
        )
      )
    );
    foreach (kunco_responsive_settings() as $key => $setting) {
      $gva_portfolio_carousel['params'][] = $setting;
    }
    foreach (kunco_carousel_settings() as $key => $setting) {
      $gva_portfolio_carousel['params'][] = $setting;
    }
    vc_map($gva_portfolio_carousel);

    add_filter( 'vc_autocomplete_gva_portfolio_carousel_ids_callback', array( $this, 'portfolioIdsAutocompleteSuggester'), 10, 1 ); 
    add_filter( 'vc_autocomplete_gva_portfolio_carousel_ids_render', array(&$this, 'portfolioIdsAutocompleteRender' ), 10, 1 ); 

    add_filter( 'vc_autocomplete_gva_portfolio_grid_ids_callback', array( $this, 'portfolioIdsAutocompleteSuggester'), 10, 1 ); 
    add_filter( 'vc_autocomplete_gva_portfolio_grid_ids_render', array(&$this, 'portfolioIdsAutocompleteRender' ), 10, 1 ); 

    add_filter( 'vc_autocomplete_gva_portfolio_slideset_ids_callback', array( $this, 'portfolioIdsAutocompleteSuggester'), 10, 1 ); 
    add_filter( 'vc_autocomplete_gva_portfolio_slideset_ids_render', array(&$this, 'portfolioIdsAutocompleteRender' ), 10, 1 ); 

	}

  function portfolioIdsAutocompleteRender($value){
    return gaviasframeworkPortfolioAutocompleteRender($value);
  }
  function portfolioIdsAutocompleteSuggester($query){
    return gaviasframeworkPortfolioAutocompleteSuggester($query);
  }

}