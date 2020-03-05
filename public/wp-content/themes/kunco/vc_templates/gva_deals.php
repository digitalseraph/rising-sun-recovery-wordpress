<?php
$title = $product_cats = $el_class = '';
$show_desc = 'off';
$number = 4;
$columns = 3;

$carousel_nav = 'true';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$deals_loop = kunco_woocommerce_query('deals', $number, $product_cats);
?>
<div class="widget no-gutter gva-deals <?php echo esc_attr($el_class) ?>">
   <?php if($title){ ?>
      <div class="widget-heading">
        <div class="widget-title">
            <img src="<?php echo get_template_directory_uri() . '/images/icon-deal.png' ?>"/>&nbsp;&nbsp;<?php echo esc_html( $title ); ?>
         </div>   
      </div>   
   <?php } ?>   
   <div class="products-deals carousel-view widget-content">
      <div class="init-carousel-owl owl-carousel" data-items="<?php echo esc_attr($columns) ?>" data-nav="<?php echo esc_attr($carousel_nav) ?>">
         <?php if($deals_loop->have_posts()){ 
             while ( $deals_loop->have_posts() ) : $deals_loop->the_post(); global $product; 
                  wc_get_template( 'content-product-deals.php', array('product'=>$product, 'show_desc' => $show_desc));
            endwhile;      
         } ?>
         <?php  wp_reset_postdata(); ?>
      </div>  
   </div>   
</div>    