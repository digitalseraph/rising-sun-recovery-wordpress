<?php
$el_class = $title = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
if(is_front_page()){
  $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}else{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args['paged'] = $paged; 
if(!isset($excerpt_words)){
  $excerpt_words = 15;
}
?>

<div class="widget gva-view-mlayout-1 <?php echo esc_attr($el_class); ?>">
  <div class="widget-content">
    <?php
      $query = new WP_Query($args);
      if($query->have_posts()){ 
    ?>
      <div class="posts-grids post-items">
        <?php $i=0; while ( $query->have_posts() ) : $query->the_post(); $i++; ?>
            <?php if($i == 1){ ?>
              <div class="item-first">
                <div class="post">
                  <div class="post-thumbnail">
                    <?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
                  </div>  
                  <div class="post-content">
                    <div class="entry-meta">
                      <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){ ?>
                        <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kunco' ) ); ?></span>
                        <span class="line"></span>
                      <?php } ?>
                      <?php kunco_posted_on(); ?>
                    </div>
                    <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                  </div>
                </div>
              </div>  
            <?php }else{ ?>
                <?php if( $i == 2 ){echo '<div class="items-second post-small-2">'; } ?>
                  <article <?php post_class(); ?>>
                    <div class="post-thumbnail">
                      <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); ?>
                    </div>  
                    <div class="post-content">
                      <div class="entry-header">
                        <div class="entry-meta">
                          <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){ ?>
                            <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kunco' ) ); ?></span>
                            <span class="line"></span>
                          <?php } ?>
                          <?php kunco_posted_on(); ?>
                        </div>
                        <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                        <div class="post-body"><?php echo kunco_limit_words( $excerpt_words, get_the_excerpt(), get_the_content() ); ?></div>
                      </div>
                    </div>  
                  </article>
                <?php if($i == $query->post_count) {echo '</div>';} ?>

            <?php }?>

         <?php endwhile; 
         wp_reset_postdata();
         ?>
      </div>
    <?php } ?>   
  </div>
</div>
