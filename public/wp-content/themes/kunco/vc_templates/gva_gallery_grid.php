<?php
$items = '';
$items_lg = 3;
$items_md = $items_sm  = $items_xs = 2;
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

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

if($pagination){
  $paged = get_query_var( 'paged', 1 );
  $args['paged'] = $paged; 
}

$query = new WP_Query( $args );
?>
<div class="widget gva-gallery-grid <?php echo esc_attr($el_class); ?>">
   <div class="widget-content">
     <div class="lg-block-grid-<?php echo esc_attr($items_lg) ?> md-block-grid-<?php echo esc_attr($items_md) ?> sm-block-grid-<?php echo esc_attr($items_sm) ?> xs-block-grid-<?php echo esc_attr($items_xs) ?>">
      <?php 
         if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); global $post;
          ?>       
             <div class="item-columns"><?php get_template_part( 'templates/gallery/content', 'item-v1' ); ?></div>
            <?php
             endwhile; 
            wp_reset_postdata();
         endif;
         ?>
     </div>    
   </div>
</div>