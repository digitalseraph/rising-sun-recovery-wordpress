<?php 
$title = $categories = $el_class = '';
$per_page = 3;
$columns = 1;
$featured = false;
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
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
   'post_type'          => 'give_forms',
   'post_status'       => 'publish',
   'ignore_sticky_posts'  => true,
   'posts_per_page'       => $per_page,
   'orderby'           => 'date',
   'order'             => 'desc'
);

if($give_cats!=''){
  $give_cats = str_replace(' ', '', $give_cats);
  if( strlen($give_cats) > 0 ){
      $give_cats = explode(',', $give_cats);
  }
  if( is_array($give_cats) && count($give_cats) > 0 ){
    $field_name = is_numeric($give_cats[0])?'term_id':'slug';
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'give_forms_category',
        'terms' => $give_cats,
        'field' => $field_name,
        'include_children' => false
      )
    );
  }
}

if($featured){
  $args['meta_query'] = array(
    array(
      'key' => 'kunco_give_featured',
      'value' => true,
      'compare' => '='
    )
  );
}  

$loop = new WP_Query($args);
?>
<div class="widget vc-widget gva-grid-carousel <?php echo esc_attr($el_class) ?>">
  <div class="init-carousel-owl owl-carousel" <?php echo kunco_set_carousel_attrs($carousel_attrs) ?>>
     <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
       <div class="item">
        <?php
          set_query_var( 'excerpt_words', $excerpt_words );
          get_template_part( 'give/content', 'form' ); 
        ?>
       </div>
     <?php endwhile; 
     wp_reset_postdata();
     ?>  
  </div>
</div>