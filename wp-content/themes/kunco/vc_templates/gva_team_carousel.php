<?php
wp_enqueue_script( 'waypoints' );
$style = 'item-v1';
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
   'post_type'          => 'gva_team',
   'post_status'       => 'publish',
   'ignore_sticky_posts'  => true,
   'posts_per_page'       => $per_page,
   'orderby'           => 'date',
   'order'             => 'desc'
);
$loop = new WP_Query($args);
?>
<div class="gsc-team-grid <?php echo esc_attr($el_class) ?>">
  <div class="init-carousel-owl owl-carousel" <?php echo kunco_set_carousel_attrs($carousel_attrs) ?>>
    <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++;  ?>
      <div class="item">
        <?php 
          set_query_var( 'excerpt_words', $excerpt_words ); 
          set_query_var( 'show_skills', $show_skills ); 
          get_template_part( 'templates/team/content', $style ); 
        ?>
      </div>
    <?php
      endwhile; 
      wp_reset_postdata();
    ?>
  </div>
</div>