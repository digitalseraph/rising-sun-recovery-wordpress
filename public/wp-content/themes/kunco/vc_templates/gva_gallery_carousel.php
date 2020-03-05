<?php
$items = '';
$items_lg = 3;
$items_md = $items_sm  = $items_xs = 2;
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$carousel_attrs = array(
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
   'posts_per_page' => $number, 
   'post_type' => 'gallery'
);   
switch ( $mode ) {
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
  if($gallery_cats!=''){
      $gallery_cats = str_replace(' ', '', $gallery_cats);
      if( strlen($gallery_cats) > 0 ){
          $gallery_cats = explode(',', $gallery_cats);
      }
      if( is_array($gallery_cats) && count($gallery_cats) > 0 ){
          $field_name = is_numeric($gallery_cats[0])?'term_id':'slug';
          $args['tax_query'] = array(
              array(
                  'taxonomy' => 'gallery_cat',
                  'terms' => $gallery_cats,
                  'field' => $field_name,
                  'include_children' => false
              )
          );
      }
  }
$query = new WP_Query( $args );
?>
<div class="widget gva-gallery-carousel <?php echo esc_attr($el_class); ?>">
  <div class="widget-content">
    <div class="owl-carousel init-carousel-owl slider-gallery-v1" <?php echo kunco_set_carousel_attrs($carousel_attrs) ?> data-items="2" data-items_lg="2" data-items_md="2" data-items_sm="1" data-items_xs="1">
      <?php 
        $i = 0;
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); global $post; $i++;
      ?> 
            <?php if($i % 5 == 1){ ?>
              <div class="gallery-large carousel-item">
                <div class="item content"><?php get_template_part( 'templates/gallery/content', 'item-v1' ); ?></div>
              </div>
            <?php }else{ ?>
              <?php if($i % 5 == 2){ echo '<div class="galery-small-wrap">'; } ?>

                <?php if($i % 5 == 2 || $i % 5 == 4){ echo '<div class="gallery-small carousel-item">'; } ?>
                  <div class="item content gallery-small-item"><?php get_template_part( 'templates/gallery/content', 'item-v1' ); ?></div>
                <?php if($i % 5 == 3 || $i % 5 == 0 || $i == $query->found_posts){ echo '</div>'; } ?>

              <?php if($i % 5 == 0 || $i == $query->found_posts){ echo '</div>'; } ?>
            <?php } ?>  
      <?php
        endwhile; 
            wp_reset_postdata();
         endif;
         ?>
    </div>    
  </div>
</div>