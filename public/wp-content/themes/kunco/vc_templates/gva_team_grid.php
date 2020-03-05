<?php
wp_enqueue_script( 'waypoints' );
$style = 'item-v1';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
   'post_type'          => 'gva_team',
   'post_status'       => 'publish',
   'ignore_sticky_posts'  => true,
   'posts_per_page'       => $per_page,
   'orderby'           => 'date',
   'order'             => 'desc'
);

$ids = str_replace(' ', '', $ids);
if( strlen($ids) > 0 ){
  $ids = explode(',', $ids);
  if( is_array($ids) && count($ids) > 0 ){
    $args['post__in'] = $ids;
    $args['orderby'] = 'post__in';
  }
}

if($show_pagination){
  $paged = get_query_var( 'paged', 1 );
  $args['paged'] = $paged; 
}
$loop = new WP_Query($args);
?>
<div class="gsc-team-grid <?php echo esc_attr($el_class) ?>">
  <div class="lg-block-grid-<?php echo esc_attr($items_lg) ?> md-block-grid-<?php echo esc_attr($items_md) ?> sm-block-grid-<?php echo esc_attr($items_sm) ?> xs-block-grid-<?php echo esc_attr($items_xs) ?>">
    <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
      <div class="item-columns margin-bottom-30">
        <?php 
          set_query_var( 'excerpt_words', $excerpt_words ); 
          set_query_var( 'show_skills', $show_skills ); 
          get_template_part( 'templates/team/content', $style ); 
        ?>
      </div>
    <?php endwhile; ?>
  </div>
  <?php if($show_pagination){ ?> 
    <div class="pagination">
      <?php echo kunco_pagination($loop); ?>
    </div>
  <?php } ?>
  <?php wp_reset_postdata(); ?>
</div>  