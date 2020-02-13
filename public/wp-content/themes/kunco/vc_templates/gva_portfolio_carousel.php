<?php
$style_display = 'item-v1';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script( 'isotope' );
$carousel_attrs = array(
  'items'               => $items_lg,
  'items_lg'            => $items_lg,
  'items_md'            => $items_md,
  'items_sm'            => $items_sm,
  'items_xs'            => $items_xs,
  'loop'                => $ca_loop,
  'speed'               => $ca_speed,
  'auto_play'           => $ca_auto_play,
  'auto_play_speed'     => $ca_auto_play_speed,
  'auto_play_timeout'   => $ca_auto_play_timeout,
  'auto_play_hover'     => $ca_play_hover,
  'navigation'          => $ca_navigation,
  'rewind_nav'          => $ca_rewind_nav,
  'pagination'          => $ca_pagination,
  'mouse_drag'          => $ca_mouse_drag,
  'touch_drag'          => $ca_touch_drag
);
$args = array(
  'post_type' => 'portfolio',
  'posts_per_page' => $per_page
);
$ids = str_replace(' ', '', $ids);
if( strlen($ids) > 0 ){
  $ids = explode(',', $ids);
  if( is_array($ids) && count($ids) > 0 ){
    $args['post__in'] = $ids;
  }
}

if($pagination == 'on'){
  $paged = get_query_var( 'paged', 1 );
  $args['paged'] = $paged; 
}
if($remove_padding) $el_class .= 'remove-padding';
$loop = new WP_Query($args);

?>
<div class="gsc-portfolio-carousel clearfix <?php echo esc_attr($el_class) ?>">
   <?php if( $loop->have_posts()): ?>
      <div class="gva-portfolio-items no-gutter clearfix">
         <div class="init-carousel-owl owl-carousel" <?php echo kunco_set_carousel_attrs($carousel_attrs) ?>>
            <?php while($loop->have_posts()): $loop->the_post(); ?>
              <?php get_template_part( 'templates/portfolio/content', $style_display ); ?>
            <?php endwhile; ?>
         </div>
      </div> 
      <?php if($pagination){ ?>
         <div class="pagination">
           <?php echo kunco_pagination($loop); ?>
         </div>
      <?php } ?>
      <?php wp_reset_postdata(); ?>
   <?php endif; ?>  
</div>