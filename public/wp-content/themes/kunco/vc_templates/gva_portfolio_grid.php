<?php
$style_display = 'item-v1';
$link_all = '';
$categories = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'isotope' );
$class_column = 'lg-block-grid-'.$items_lg.' md-block-grid-'.$items_md.' sm-block-grid-'.$items_sm.' xs-block-grid-'.$items_xs;

$args = array(
  'post_type' => 'portfolio',
  'posts_per_page' => $per_page,
  'orderby' => 'id',
   'order' => 'asc'
);

$ids = str_replace(' ', '', $ids);
if( strlen($ids) > 0 ){
  $ids = explode(',', $ids);
  if( is_array($ids) && count($ids) > 0 ){
    $args['post__in'] = $ids;
  }
} 

if($categories){
  $categories = str_replace(' ', '', $categories);
  $categories = explode(',', $categories);
  if(is_array($categories) && count($categories) > 0){
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'category_portfolio',
        'field'    => 'term_id',
        'terms'    => $categories
      )
    );
  }
}

if($remove_padding) $el_class .= 'no-gutter';
if($pagination){
   $paged = get_query_var( 'paged', 1 );
   $args['paged'] = $paged; 
}

$loop = new WP_Query($args);

?>
<div class="gsc-portfolio <?php echo esc_attr($el_class) ?>">
   <?php if( $loop->have_posts()): ?>
      <?php if($filter){ ?>
        <?php 
          $terms = get_terms('category_portfolio', array('orderby'=>'id'));
          if(is_array($categories) && count($categories) > 0){
            $terms = get_terms( array(
              'taxonomy' => 'category_portfolio',
              'include' => $categories,
              'hide_empty'  => false, 
              'orderby'  => 'include',
            ) );
          }  
        ?>
         <nav class="portfolio-filter">
            <ul class="nav nav-tabs">
               <li><a class="btn-filter all active" href="javascript:void(0)" data-filter="*"><span><?php echo esc_html__( 'All', 'kunco' ); ?></span></a></li>
               <?php 
               if ( !empty($terms) && !is_wp_error($terms) ){ 
                  foreach ( $terms as $term ) {
               ?>
                 <li><a href="javascript:void(0)" class="btn-filter" data-filter=".<?php echo esc_attr($term->slug) ?>"><span><?php echo esc_html($term->name) ?></span></a></li>
               <?php 
                  }
               }
               ?>
            </ul> 
            <?php if($link_all){ ?>
              <div class="view-all"><a class="btn-theme" href="<?php echo esc_html($link_all) ?>"><?php echo esc_html__( 'View All', 'kunco' ) ?></a></div>
            <?php } ?>
         </nav> 
      <?php } ?>   

      <div class="gva-portfolio-items clearfix">
         <div class="isotope-items view-portfolio <?php echo esc_attr( $class_column ); ?>">
            <?php while($loop->have_posts()): $loop->the_post(); ?>
               <?php get_template_part( 'templates/portfolio/content', $style_display ); ?>
            <?php endwhile; ?>
         </div>
      </div> 
      <?php if($pagination){ ?>
         <div class="pagination">
           <?php echo kunco_pagination($loop); ?>
         </div>
      <?php } ?>
      <?php wp_reset_postdata(); ?>
   <?php endif; ?>  
</div>