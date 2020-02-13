<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
$carousel_attrs = array(
  'items'               => $items_lg,
  'items_lg'            => $items_lg,
  'items_md'            => $items_md,
  'items_sm'            => $items_sm,
  'items_xs'            => $items_xs,
  'loop'                => $ca_loop,
  'speed'               => $ca_speed,
  'auto_play'           => $ca_auto_play,
  'auto_play_speed'     => $ca_auto_play_speed,
  'auto_play_timeout'   => $ca_auto_play_timeout,
  'auto_play_hover'     => $ca_play_hover,
  'navigation'          => $ca_navigation,
  'rewind_nav'          => $ca_rewind_nav,
  'pagination'          => $ca_pagination,
  'mouse_drag'          => $ca_mouse_drag,
  'touch_drag'          => $ca_touch_drag
);
?>

<div class="widget gva-blogs-carousel blog-grid-style section-blog <?php echo esc_attr($post_style) ?> <?php echo esc_attr($el_class) ?>">
  <?php if( $title ) { ?>
    <h3 class="widget-title visual-title">
      <span><?php echo esc_html($title); ?></span>
    </h3>
  <?php } ?>

  <div class="widget-content">
    <?php $query = new WP_Query($args);
      if($query->have_posts()){ 
    ?>
    <div class="init-carousel-owl owl-carousel" <?php echo kunco_set_carousel_attrs($carousel_attrs) ?>>
      <?php $i=0; while ( $query->have_posts() ) : $query->the_post(); $i++; ?>
        <article class="post">
          <?php if($post_style != 'style-2'){ ?>
            <?php if ( has_post_thumbnail() ) { ?>
              <div class="entry-thumb">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( 'kunco_medium' ); ?>
                </a>
              </div>
            <?php } ?>
          <?php } ?>
          <div class="entry-content">
            <div class="content-inner">
              <div class="content-top entry-meta">
                <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){ ?>
                  <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kunco' ) ); ?></span>
                  <span class="line"></span>
               <?php } ?>
               <?php kunco_posted_on(); ?>
              </div>  
              <?php if (get_the_title()) { ?>
                <h5 class="entry-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h5>
              <?php  } ?>
              
              <?php if($show_excerpt){ ?>
                <div class="entry-body">
                  <?php echo kunco_limit_words( $excerpt_words, get_the_excerpt(), get_the_content() ); ?>
                </div>
              <?php } ?>
            </div>  
          </div>
        </article>
      <?php endwhile; 
      wp_reset_postdata();
      ?>
    </div>
    <?php } ?>   
  </div>
</div>
