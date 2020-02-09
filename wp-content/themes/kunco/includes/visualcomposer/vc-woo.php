<?php 

class kunco_Visualcomposer_Woo implements Vc_Vendor_Interface {
	public function load(){ 
      //------------------ Element products ----------------------------------
      //-----------------------------------------------------------------------
      $cats = array();
      $categories = get_terms( 'product_cat' );
      $cats['Choose Category'] = '';
      if( !is_wp_error($categories)){
         if($categories){
            foreach ($categories as $category) {
               $cats[html_entity_decode($category->name, ENT_COMPAT, 'UTF-8')] = $category->slug;
            }
         }
      }

      /*** GVA Products ***/
      //---------------------------------------
      vc_map( array(
         'name'      => esc_html__( 'GVA Products', 'kunco' ),
         'base'      => 'gva_products',
         'icon'        => 'icon-wpb-vc_icon',
         'category'  => 'Gavias Element',
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
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Product type', 'kunco' ),
               'param_name'  => 'product_type',
               'admin_label'    => true,
               'value'       => array(
                     'Recent'    => 'recent',
                     'Sale'        => 'sale',
                     'Featured'    => 'featured',
                     'Best Selling'   => 'best_selling',
                     'Top Rated'   => 'top_rated',
                  ),
               'description'    => esc_html__( 'Select type of product', 'kunco' ),
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Columns', 'kunco' ),
               'param_name'  => 'columns',
               'admin_label'    => true,
               'value'       => 5,
               'description'    => esc_html__( 'Number of Columns', 'kunco' ),
            ),
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Style','kunco'),
               'param_name' => 'style',
               'value' => array(
                  esc_html__('Gird Display', 'kunco') => 'grid',
                  esc_html__('Carousel Display', 'kunco') => 'carousel',
                  esc_html__('Stick Product v1', 'kunco') => 'stick_v1',
                  esc_html__('Stick Product v2', 'kunco') => 'stick_v2'
               ),
            ),
            //Carousel setting
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Rows for carousel display','kunco'),
               'param_name' => 'carousel_row',
               'value' => array(1, 2, 3, 4, 5),
               'description' => esc_html__('Choose row display for carousel (Main products)','kunco'),
               'group' => 'Carousel Setting'
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'kunco' ),
               'param_name'  => 'per_page',
               'admin_label'    => true,
               'value'       => 5,
               'description'    => esc_html__( 'Number of Products', 'kunco' ),
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product Categories', 'kunco' ),
               'param_name'  => 'product_cats',
               'admin_label'    => true,
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => '',
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product IDs', 'kunco' ),
               'param_name'  => 'ids',
               'admin_label'    => true,
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => esc_html__('Enter product name or slug to search', 'kunco'),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','kunco'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
            ),
         )
      ) );

      /*** GVA Products List ***/
      //---------------------------------------
      vc_map( array(
         'name'      => esc_html__( 'GVA Products List', 'kunco' ),
         'base'      => 'gva_products_list',
         'icon'        => 'icon-wpb-vc_icon',
         'category'  => 'Gavias Element',
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
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Product type', 'kunco' ),
               'param_name'  => 'product_type',
               'admin_label'    => true,
               'value'       => array(
                     'Recent'    => 'recent',
                     'Sale'        => 'sale',
                     'Featured'    => 'featured',
                     'Best Selling'   => 'best_selling',
                     'Top Rated'   => 'top_rated',
                  ),
               'description'    => esc_html__( 'Select type of product', 'kunco' ),
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'kunco' ),
               'param_name'  => 'per_page',
               'value'       => 5,
               'description'    => esc_html__( 'Number of Products', 'kunco' ),
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product Categories', 'kunco' ),
               'param_name'  => 'product_cats',
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => '',
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product IDs', 'kunco' ),
               'param_name'  => 'ids',
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => esc_html__('Enter product name or slug to search', 'kunco'),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','kunco'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
            ),
         )
      ) );

      /*** GVA Products Tabs Ajax ***/
      //---------------------------------------
      vc_map( array(
         'name' => esc_html__('GVA Products Tabs Ajax','kunco'),
         'base' => 'gva_tabs_products_ajax',
         'description' => esc_html__( 'Display BestSeller, TopRated ... Products In tabs', 'kunco' ),
         'icon'        => 'icon-wpb-vc_icon',
         'category' => esc_html__('Gavias Element','kunco'),
         'params' => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Title','kunco'),
               'param_name' => 'title',
               'value' => '',
               'admin_label' => true
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
                     'heading' => esc_html__('Name','kunco'),
                     'param_name' => 'name',
                  ),
                  array(
                     'type' => 'dropdown',
                     'heading' => esc_html__('Product Type', 'kunco'),
                     'param_name' => 'product_type',
                     'value' => array(
                        array('recent', esc_html__('Latest Products', 'kunco')),
                        array( 'featured_product', esc_html__('Featured Products', 'kunco' )),
                        array('best_selling', esc_html__('BestSeller Products', 'kunco' )),
                        array('top_rate', esc_html__('TopRated Products', 'kunco' )),
                        array('on_sale', esc_html__('Special Products', 'kunco' ))
                     )
                  ),
                  array(
                     'type'            => 'dropdown',
                     'heading'         => esc_html__( 'Product Categories', 'kunco' ),
                     'param_name'      => 'product_cats',
                     'admin_label'     => true,
                     'value'           => $cats,
                     'description'     => '',
                  ),
                  array(
                     'type' => 'dropdown',
                     'heading' => esc_html__('Style','kunco'),
                     'param_name' => 'style',
                     'value' => array(
                        esc_html__('Gird Display', 'kunco') => 'grid',
                        esc_html__('Carousel Display', 'kunco') => 'carousel'
                     ),
                  ),
               ),
            ),
           
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Number of products to show','kunco'),
               'param_name' => 'number',
               'value' => '4'
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Columns count','kunco'),
               'param_name'   => 'columns_count',
               'value'        => array(5, 4, 3, 2, 1),
               'description'  => esc_html__('Select columns count.','kunco')
            ),

            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','kunco'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
            ),

            //Carousel setting
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Rows for carousel display','kunco'),
               'param_name' => 'carousel_row',
               'value' => array(1, 2, 3, 4, 5),
               'description' => esc_html__('Choose row display for carousel (Main products)','kunco'),
               'group' => 'Carousel Setting'
            ),

         )
      ));
   
   /*** GVA Deals ***/
   //-----------------------------------
      vc_map( array(
         'name'     => esc_html__('GVA Deals','kunco'),
         'base'     => 'gva_deals',
         'icon'        => 'icon-wpb-vc_icon',
         'category' => esc_html__('Gavias Element', 'kunco'),
         'params'   => array(     
         array(
            'type'         => 'textfield',
            'heading'     => esc_html__( 'Block title', 'kunco' ),
            'param_name'  => 'title',
            'admin_label'    => true,
            'value'       => '',
            'description'    => '',
         ),
         array(
            'type'         => 'autocomplete',
            'heading'     => esc_html__( 'Product Categories', 'kunco' ),
            'param_name'  => 'product_cats',
            'admin_label'    => true,
            'value'       => '',
            'settings' => array(
               'multiple'        => true,
               'sortable'       => true,
               'unique_values'  => true,
            ),
            'description'    => '',
         ), 
         array(
            'type'       => 'textfield',
            'heading'    => esc_html__('Number of categories to show', 'kunco'),
            'param_name' => 'number',
            'value'      => '5'
         ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Columns count display','kunco'),
            'param_name' => 'columns',
            'value' => array(5, 4, 3, 2, 1),
            'description' => esc_html__('Select columns count.','kunco')
         ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Description','kunco'),
            'param_name' => 'show_desc',
            'value' =>array(
               esc_html__('Off', 'kunco')=>'off',
               esc_html__('On', 'kunco')=>'on'
            ),
         ),
         array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Extra class name','kunco'),
            'param_name'  => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','kunco')
         )
      )
   ));

   if( class_exists('Vc_Vendor_Woocommerce') ){
         $vc_woo_vendor = new Vc_Vendor_Woocommerce();

         /* autocomplete callback */
         add_filter( 'vc_autocomplete_gva_products_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
         add_filter( 'vc_autocomplete_gva_products_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
         
         $shortcode_field_cats = array();
         $shortcode_field_cats[] = array('gva_products', 'product_cats');
         $shortcode_field_cats[] = array('gva_deals', 'product_cats');
         foreach( $shortcode_field_cats as $shortcode_field ){
            add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_callback', array($vc_woo_vendor, 'productCategoryCategoryAutocompleteSuggester') );
            add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_render', array($vc_woo_vendor, 'productCategoryCategoryRenderByIdExact') );
         }
      }
	}
}

