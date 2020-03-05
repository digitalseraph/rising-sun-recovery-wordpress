<?php
$el_class = $title = '';
$layout = 'grid';
$pagination = 'off';

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

<section class="widget gva-blogs-list section-blog <?php echo (($el_class!='')?' '.$el_class:''); ?>">
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
          <div class="posts-list post-small post-items">
             <?php $i=0; while ( $query->have_posts() ) : $query->the_post();  ?>
                
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sticky-post">
                    <article <?php post_class(); ?>>
                      <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); ?>
                      </div>  
                      <div class="post-content">
                        <div class="entry-header">
                          <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                          <div class="entry-meta">
                            <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){ ?>
                              <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kunco' ) ); ?></span>
                              <span class="line"></span>
                            <?php } ?>
                            <?php kunco_posted_on(); ?>
                          </div>
                        </div>
                      </div>  
                    </article>

                  </div>
                </div>

             <?php endwhile; 
             wp_reset_postdata();
             ?>
          </div>
        <?php } ?>   
    
    <?php if($pagination == 'on'){ ?>
      <div class="pagination">
        <?php echo kunco_pagination($query); ?>
      </div>
    <?php } ?>  
    </div>
</section>
