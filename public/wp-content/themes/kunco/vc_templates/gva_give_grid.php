<?php 
$title = $categories = $el_class = '';
$per_page = 3;
$columns = 1;

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$carousel_attrs = array(
  'items'               => $items_lg,
  'items_lg'            => $items_lg,
  'items_md'            => $items_md,
  'items_sm'            => $items_sm,
  'items_xs'            => $items_xs,
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

if($pagination){
  $paged = get_query_var( 'paged', 1 );
  $args['paged'] = $paged; 
}

$loop = new WP_Query($args);
?>
<div class="widget vc-widget gva-grid-carousel <?php echo esc_attr($el_class) ?>">
   <div class="donation-grid">
      <div class="lg-block-grid-<?php echo esc_attr($items_lg) ?> md-block-grid-<?php echo esc_attr($items_md) ?> sm-block-grid-<?php echo esc_attr($items_sm) ?> xs-block-grid-<?php echo esc_attr($items_xs) ?>">
         <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
           <div class="item-columns margin-bottom-30">
            <?php
              set_query_var( 'excerpt_words', $excerpt_words );
              get_template_part( 'give/content', 'form' ); 
            ?>
           </div>
         <?php endwhile; ?> 
      </div>
      <?php if($pagination){ ?>
         <div class="pagination">
           <?php echo kunco_pagination($loop); ?>
         </div>
      <?php } ?>
   </div>
   <?php wp_reset_postdata(); ?>
</div>