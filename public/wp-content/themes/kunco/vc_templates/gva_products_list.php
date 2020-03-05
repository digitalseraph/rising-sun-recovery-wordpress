<?php
   $product_type = 'recent';
   $per_page = 5;
   $product_cats = $ids = $title = $el_class = '';
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
  
   $args = array(
      'post_type'          => 'product',
      'post_status'          => 'publish',
      'ignore_sticky_posts'  => 1,
      'posts_per_page'       => $per_page,
      'orderby'           => 'date',
      'order'             => 'desc',
      'meta_query' => array(
         array(
            'key' => '_visibility',
            'value' => array('catalog', 'visible'),
            'compare' => 'IN'
         )
      )
   );       

   switch( $product_type ){
      case 'sale':
         $args['meta_query'][] = array(
            'key'          => '_sale_price'
            ,'value'       =>  0
            ,'compare'     => '>'
            ,'type'        => 'NUMERIC'
         );
      break;
      case 'featured':
         $args['meta_query'][] = array(
            'key'          => '_featured'
            ,'value'       => 'yes'
         );
      break;
      case 'best_selling':
         $args['meta_key']    = 'total_sales';
         $args['orderby']  = 'meta_value_num';
         $args['order']       = 'desc';
      break;
      case 'top_rated':       
      break;
      default: /* Recent */
         $args['orderby']  = 'date';
         $args['order']       = 'desc';
      break;
   }

   $product_cats = str_replace(' ', '', $product_cats);
   if( strlen($product_cats) > 0 ){
      $product_cats = explode(',', $product_cats);
   }
   if( is_array($product_cats) && count($product_cats) > 0 ){
      $field_name = is_numeric($product_cats[0])?'term_id':'slug';
      $args['tax_query'] = array(
         array(
            'taxonomy' => 'product_cat'
            ,'terms' => $product_cats
            ,'field' => $field_name
            ,'include_children' => false
         )
      );
   }
   
   $ids = str_replace(' ', '', $ids);
   if( strlen($ids) > 0 ){
      $ids = explode(',', $ids);
      if( is_array($ids) && count($ids) > 0 ){
         $args['post__in'] = $ids;
         if( count($ids) == 1 ){
            $columns = 1;
         }
      }
   }
   
   

   if( $product_type == 'top_rated' ){
      add_filter('posts_clauses', array(WC()->query, 'order_by_rating_post_clauses')); 
   }

   $products = new WP_Query( $args );  

         
   if( $products->have_posts() ): 
   ?>
      <div class="widget gva-products-list <?php echo esc_attr($el_class) ?>">
        <?php if( strlen($title) > 0 ): ?>
            <h3 class="widget-title"><span><?php echo esc_html($title); ?></span></h3>
        <?php endif; ?>
         
        <div class="widget-content"> 
          <div class="shop-products style-products-horizontal">
            <?php while ( $products->have_posts() ) : $products->the_post(); global $product; ?>
              <?php wc_get_template_part( 'content', 'product' ); ?>
            <?php endwhile; ?>
          </div>  
        </div>
      </div>
   <?php
   endif;
   wp_reset_postdata();