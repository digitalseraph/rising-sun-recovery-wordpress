<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
if(is_front_page()){
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
else{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args['paged'] = $paged; 
?>

<div class="widget gva-grid-posts blog-grid-style section-blog <?php echo esc_attr($el_class); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo esc_html($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
        <?php
          $query = new WP_Query($args);
          if($query->have_posts()){ 
        ?>
          <div class="posts-grids post-items <?php echo esc_attr($style) ?>">
            <div class="lg-block-grid-<?php echo esc_attr($items_lg) ?> md-block-grid-<?php echo esc_attr($items_md) ?> sm-block-grid-<?php echo esc_attr($items_sm) ?> xs-block-grid-<?php echo esc_attr($items_xs) ?>">
              <?php $i=0; while ( $query->have_posts() ) : $query->the_post();  ?>
                <div class="item-columns margin-bottom-30">
                  <?php 
                    set_query_var( 'thumbnail_size', $thumbnail_size );
                    get_template_part( 'content', get_post_format() ); 
                  ?>
                </div>
              <?php endwhile; 
                wp_reset_postdata();
              ?>
            </div>
          </div>    
        <?php } ?>   
    
    <?php if($pagination){ ?>
      <div class="pagination">
        <?php echo kunco_pagination($query); ?>
      </div>
    <?php } ?>  
    </div>
</div>
