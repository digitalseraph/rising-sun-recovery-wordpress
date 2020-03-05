<?php
$style_display = 'item-v1';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script( 'isotope' );

$class_column = 'lg-block-grid-'.$items_lg.' md-block-grid-'.$items_md.' sm-block-grid-'.$items_sm.' xs-block-grid-'.$items_xs;
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
         <div class="<?php echo esc_attr($class_column) ?>">
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