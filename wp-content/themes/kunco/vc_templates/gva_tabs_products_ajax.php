<?php
$title = $icon = $product_cats = $el_class = $items ='';
$show_desc = 'off';
$show_tabs = 'recent, featured_product, best_selling';
$style = 'grid';
$number = 4;
$columns_count = 3;
$carousel_row = 1; 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$_id = kunco_random_id();
$class_column = kunco_calc_class_grid($columns_count);
$line_data = array();
$items = (array) vc_param_group_parse_atts( $items );

foreach ( $items as $data ) {
  $new_line = $data;
  $new_line['type'] = isset( $data['product_type'] ) ? $data['product_type'] : '';
  $new_line['category'] = isset( $data['product_cats'] ) ? $data['product_cats'] : '';
  $new_line['style'] = isset( $data['style'] ) ? $data['style'] : '';

  $term = get_term_by( 'slug', $new_line['category'], 'product_cat' );
  if($term && isset($term->name) && $term->name){
      $new_line['name'] = $term->name;
  }else{
    $new_line['name'] = isset( $data['name'] ) ? $data['name'] : '';
  }

  $line_data[] = $new_line;
}

?>

<div class="widget gva-tabs-products-ajax">
  <?php if($title){ ?>
    <div class="widget-heading">
      <div class="widget-title">
        <?php echo esc_html( $title ); ?>
      </div>
    </div>  
  <?php } ?>  

   <div class="clearfix widget-content">
      <div class="tabs-list clearfix">
        <ul data-load="ajax" class="nav nav-tabs col-xs-12">
           <?php $i = 0; ?>
           <?php foreach ($line_data as $key => $value): $i++; ?>
                <li <?php if($i==1) echo 'class="active"'; ?>>
                  <a href="#<?php echo esc_attr($key.'-'.$_id); ?>" data-toggle="tab" ><?php echo esc_attr($value['name']) ?></a>
                </li>
           <?php endforeach; ?>
        </ul>
      </div>

      <div class="tabs-container clearfix">
         <div class="tab-content">
             <?php $i = 0; ?>
             <?php foreach ($line_data as $key => $value): $i++; ?>
                <div class="tab-pane <?php if($i==1) echo 'active'; ?>" id="<?php echo esc_attr($key).'-'.$_id; ?>" data-loaded="false" data-number="<?php echo esc_attr($number) ?>" data-style="<?php echo esc_attr($value['style']) ?>" data-type="<?php echo esc_attr($value['type']) ?>" data-columns="<?php echo esc_attr($columns_count) ?>" data-categories="<?php echo esc_attr($value['category']) ?>" data-row="<?php echo esc_attr($carousel_row) ?>" data-nonce="<?php echo wp_create_nonce('kunco_tabs_product_ajax') ?>">
                  <div class="shop-products">
                    <div class="tab-content-products">
                      <?php if($i==1){ 
                        $loop = kunco_woocommerce_query($value['type'], $number, $value['category']);
                        if($loop->have_posts()){
                           wc_get_template( 'display/'.$value['style'].'.php' , array( 'loop'=>$loop, 'columns_count'=>$columns_count, 'class_column'=>$class_column, 'posts_per_page'=>$number, 'carousel_row' => $carousel_row  ) );
                        }
                       }else{ ?>
                        <div class="ajax-loading"></div>
                      <?php } ?>  
                    </div>
                  </div>
                </div> 
             <?php endforeach; ?> 
             <?php wp_reset_postdata(); ?>
         </div>
      </div>
   </div>
</div>
