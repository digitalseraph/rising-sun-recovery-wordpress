<?php 
$title = $categories = $el_class = '';
$per_page = 4;

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
   'post_type'          => 'gva_event',
   'post_status'       => 'publish',
   'ignore_sticky_posts'  => true,
   'posts_per_page'       => $per_page,
   'meta_key'           => 'kunco_start_time',
   'orderby'            => 'meta_value',
   'order'             => 'ASC',
   'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
    array(
        'key' => 'kunco_start_time', // Check the start date field
        'value' => date("Y-m-d"), // Set today's date (note the similar format)
        'compare' => '>=', // Return the ones greater than today's date
        'type' => 'DATE' // Let WordPress know we're working with date
        )
    ),
);

if($event_cats){
  $event_cats = str_replace(' ', '', $event_cats);
  if( strlen($event_cats) > 0 ){
      $event_cats = explode(',', $event_cats);
  }
  if( is_array($event_cats) && count($event_cats) > 0 ){
    $field_name = is_numeric($event_cats[0])?'term_id':'slug';
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'gva_event_cat',
        'terms' => $event_cats,
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
<div class="widget vc-widget gva-event-list <?php echo esc_attr($el_class) ?>">
   <div class="widget-content">
      <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
         <?php get_template_part( 'templates/event/content', 'item-v1' ); ?>
      <?php endwhile; 
      wp_reset_postdata();
      ?>

      <?php if($pagination){ ?>
          <div class="pagination">
           <?php echo kunco_pagination($loop); ?>
         </div>
      <?php } ?>

   </div>
</div>