<?php 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
   'post_type'          => 'testimonials',
   'post_status'       => 'publish',
   'ignore_sticky_posts'  => true,
   'posts_per_page'       => $per_page,
   'orderby'           => 'date',
   'order'             => 'desc'
);

if($testimonial_cats){
  $field_name = is_numeric($testimonial_cats)?'term_id':'slug';
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'testimonial_cat',
      'terms' => $testimonial_cats,
      'field' => $field_name,
      'include_children' => false
    )
  );
}

$loop = new WP_Query($args);
?>
<div class="widget vc-widget testimonials-grid gva-testimonials-grid <?php echo esc_attr($text_color_style) ?> <?php echo esc_attr($el_class) ?>">
  <div class="lg-block-grid-<?php echo esc_attr($items_lg) ?> md-block-grid-<?php echo esc_attr($items_md) ?> sm-block-grid-<?php echo esc_attr($items_sm) ?> xs-block-grid-<?php echo esc_attr($items_xs) ?>">
    <?php $i = 0; while ( $loop->have_posts() ) : $loop->the_post(); $i++;  
        $job = get_post_meta(get_the_ID(), 'kunco_testimonial_job', true );
    ?>
      <div class="item-columns">
        <div class="testimonials-body item-grid">
          <div class="testimonials-quote"><?php the_content(); ?> </div>
          <div class="testimonials-profile"> 
            <div class="left"><?php the_post_thumbnail('full' ); ?></div>
            <div class="right">
              <h4 class="name"><?php the_title(); ?></h4>
              <div class="job"><?php echo esc_html($job); ?></div>
            </div>
          </div> 
        </div>  
      </div>  
    <?php endwhile; wp_reset_postdata(); ?>  
  </div>  
</div>