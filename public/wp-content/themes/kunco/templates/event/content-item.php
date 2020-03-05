<?php
$title = get_the_title();
$link = get_the_permalink();
$start_time = date_create(get_post_meta(get_the_id(), 'kunco_start_time', true ));
$finish_time = get_post_meta(get_the_id(), 'kunco_finish_time', true );
$address = get_post_meta(get_the_id(), 'kunco_address', true );
$post_id = get_the_id();
?>
<article id="event-<?php the_ID(); ?>"> 
	<div class="event-block">
      <?php if ( has_post_thumbnail() ){ ?>
	      <div class="event-image">
	        <a href="<?php echo esc_url($link) ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
	        <div class="date"> 
	          <span class="icon"><i class="gv-icon-1103"></i></span><span class="day"><?php print date_format($start_time, 'Y-m-d') ?></span></span>
	        </div>
	      </div>
	   <?php } ?>   
      <div class="event-content">  
        	<div class="event-info">
          	<div class="title"><a href="<?php echo esc_url($link) ?>" rel="bookmark"><?php echo esc_html($title); ?></a></div>
          	<?php if($address){ ?>
            	<div class="address"><i class="fa fa-map-marker"></i><?php echo esc_html($address) ?></div>
          	<?php }  ?>
          	<div class="body"><?php echo kunco_limit_words(20, get_the_excerpt(), get_the_content()) ?></div>
        </div>
        <div class="view-node"><a class="btn-inline" href="<?php echo esc_url($link) ?>"><?php echo esc_html__('Read more', 'kunco'); ?></a></div>
      </div>  
    </div>   
</article>