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
  'post_type' => 'service',
  'posts_per_page' => $per_page
);

if(empty($ids)){
  switch ( $mode) {
    case 'most_recent' : 
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
    break;
    case 'random' : 
      $args['orderby'] = 'rand';
     break;
    default : 
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
    break;
  }
}else{
  $args['orderby'] = 'post__in';
}

$ids = str_replace(' ', '', $ids);
if( strlen($ids) > 0 ){
  $ids = explode(',', $ids);
  if( is_array($ids) && count($ids) > 0 ){
    $args['post__in'] = $ids;
  }
}

if($cats!=''){
  $cats = str_replace(' ', '', $cats);
  if( strlen($cats) > 0 ){
      $cats = explode(',', $cats);
  }
  if( is_array($cats) && count($cats) > 0 ){
      $field_name = is_numeric($cats[0])?'term_id':'slug';
      $args['tax_query'] = array(
          array(
              'taxonomy' => 'category_service',
              'terms' => $cats,
              'field' => $field_name,
              'include_children' => false
          )
      );
  }
}
$loop = new WP_Query($args);

?>
<div class="gsc-service-carousel <?php echo esc_attr($el_class) ?>">
   <?php if( $loop->have_posts()): ?>
      <div class="gva-service-items services-1 clearfix">
         <div class="init-carousel-owl owl-carousel" <?php echo kunco_set_carousel_attrs($carousel_attrs) ?>>
            <?php while($loop->have_posts()): $loop->the_post(); ?>
              <?php 
                set_query_var( 'excerpt_words', $excerpt_words );
                get_template_part( 'templates/service/content', 'item-v1' ); 
              ?>
            <?php endwhile; ?>
         </div>
      </div> 
      <?php wp_reset_postdata(); ?>
   <?php endif; ?>  
</div>