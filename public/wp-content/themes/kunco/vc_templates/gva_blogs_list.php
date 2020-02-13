<?php
$el_class = $title = $title_link = '';
$pagination = 'off';
$read_more = true;
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
if($read_more) $el_class .= ' show-read-more';
$title_html = $title;
if($title_link){
  $title_html = "<a href=\"{$title_link}\">".$title."</a>";
}
?>

<section class="widget gva-blogs-list section-blog <?php echo esc_attr($el_class) ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo wp_kses($title_html, true); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
        <?php
            $query = new WP_Query($args);
            if($query->have_posts()){ 
        ?>
          <div class="posts-list post-items">
             <?php $i=0; while ( $query->have_posts() ) : $query->the_post();  ?>
                
                <div class="row row-item">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sticky-post">
                    <?php 
                      set_query_var( 'excerpt_words', $excerpt_words );
                      get_template_part( 'content', get_post_format() ); 
                    ?>
                  </div>
                </div>

             <?php endwhile; 
             wp_reset_postdata();
             ?>
          </div>
        <?php } ?>   
    
    <?php if($pagination){ ?>
      <div class="pagination">
        <?php echo kunco_pagination($query); ?>
      </div>
    <?php } ?>  
    </div>
</section>
