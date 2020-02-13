<?php 
wp_enqueue_script('slick');
wp_enqueue_style('slick');
$title = $categories = $el_class = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
  'post_type'             => 'give_forms',
  'post_status'           => 'publish',
  'ignore_sticky_posts'   => true,
  'posts_per_page'        => $per_page,
  'orderby'               => 'date',
  'order'                 => 'desc'
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

<div class="gives-form-carousel-3">
  <div class="gsc-carousel-content"> 
     <div class="tab-lists-content">
        <div class="tab-carousel-list-here slick-slider"> 
          <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
            <div class="slick-slide">
              <?php
                set_query_var( 'excerpt_words', $excerpt_words );
                get_template_part( 'give/content', 'form-3' ); 
              ?>
            </div>
          <?php endwhile; ?>
        </div>
     </div> 
     <div class="carousel-nav">
        <div class="tab-carousel-nav slick-slider">
            <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
              <?php
                $post_category = ''; $separator = ' '; $output = '';
                $item_cats = get_the_terms( get_the_ID(), 'give_forms_category' );
                if(!empty($item_cats) && !is_wp_error($item_cats)){
                  foreach((array)$item_cats as $item_cat){
                     $output .= '<a href="'.get_category_link( $item_cat->term_id ).'" title="' . esc_attr( sprintf( esc_attr__( "View all campaign in %s", 'kunco' ), $item_cat->name ) ) . '">'.$item_cat->name.'</a>'.$separator;
                  }
                  $post_category = trim($output, $separator);
                }
              ?>
              <div class="slick-slide">
                <div class="link-service">
                  <span class="cat-links"><?php echo trim($post_category); ?></span>
                  <span class="title"><?php the_title() ?></span>
                </div>
              </div>
            <?php endwhile; ?>
        </div>
     </div>     
  </div>
</div>

<?php wp_reset_postdata(); ?>