<?php 
$title = $categories = $el_class = '';
$per_page = 4;

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
   'post_type'          => 'gva_event',
   'post_status'       => 'publish',
   'ignore_sticky_posts'  => true,
   'posts_per_page'       => $per_page,
   'orderby'           => 'date',
   'order'             => 'desc'
);



$loop = new WP_Query($args);
?>
<div class="widget vc-widget gva-event-list-small <?php echo esc_attr($el_class) ?>">
   <div class="widget-content">
      <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
         <?php 
            $address = get_post_meta(get_the_id(), 'kunco_address', true );
            $day = $month = '';
            $start_time = get_post_meta(get_the_id(), 'kunco_start_time', true );
            if($start_time){
               $start_time = date_create($start_time);
               $day = date_format($start_time, 'd');
               $month = date_format($start_time, 'F');
            } 
         ?>
         <div class="event-block-list-small clearfix">
           <div class="event-date"><span class="day"><?php echo esc_attr($day) ?></span><span class="month"><?php echo esc_attr($month) ?></span></div>
            <div class="event-content">
               <div class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
               <div class="event-address"><i class="fa fa-map-marker"></i><?php echo esc_html($address) ?></div>
            </div>  
         </div>
         <?php endwhile; 
         wp_reset_postdata();
      ?>
   </div>
</div>