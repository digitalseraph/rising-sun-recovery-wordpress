<?php
wp_enqueue_script('uikit');
wp_enqueue_script('uikit-slideset');

$link_all = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$args = array(
  'post_type' => 'portfolio',
  'posts_per_page' => $per_page
);
$ids = str_replace(' ', '', $ids);
if( strlen($ids) > 0 ){
  $ids = explode(',', $ids);
  if( is_array($ids) && count($ids) > 0 ){
    $args['post__in'] = $ids;
  }
}
if($remove_padding) $el_class .= 'no-gutter';
if($pagination){
   $paged = get_query_var( 'paged', 1 );
   $args['paged'] = $paged; 
}

$loop = new WP_Query($args);

?>
<div class="gsc-portfolio portfolio-sideset clearfix <?php echo esc_attr($el_class) ?>">
  <?php if( $loop->have_posts()): ?>
    <div class="uk-slideset-init" data-uk-slideset="{animation: 'scale',xlarge:<?php echo esc_attr($items_lg) ?>, large:<?php echo esc_attr($items_md) ?>, medium:<?php echo esc_attr($items_sm) ?>, small:<?php echo esc_attr($items_xs) ?>}">
      <?php if($filter){ ?>
        <?php $terms = get_terms('category_portfolio',array('orderby'=>'id')); ?>
        <div class="portfolio-filter clearfix">
          <ul class="uk-subnav uk-subnav-pill nav nav-tabs">
            <li data-uk-filter="" class="uk-active"><a data-uk-filter='' href="#"><?php echo esc_html__( 'All', 'kunco' ); ?></a></li>
            <?php 
              if ( !empty($terms) && !is_wp_error($terms) ){ 
                foreach ( $terms as $term ) {
            ?>
               <li><a href="#" class="btn-filter" data-uk-filter="<?php echo esc_attr($term->slug) ?>"><span><?php echo esc_html($term->name) ?></span></a></li>
            <?php 
                }
              } 
            ?>
          </ul> 
        </div>  
      <?php } ?>    
      <div class="uk-slidenav-position uk-margin clearfix">
        <ul class="uk-grid uk-slideset">
          <?php while($loop->have_posts()): $loop->the_post(); ?>
            <?php get_template_part( 'templates/portfolio/content', 'item-v3' ); ?>
          <?php endwhile; ?>
        </ul>
        <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
        <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
        <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
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