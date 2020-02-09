<?php
$title = get_the_title();
$link = get_the_permalink();
$start_time = get_post_meta(get_the_id(), 'kunco_start_time', true );
$finish_time = get_post_meta(get_the_id(), 'kunco_finish_time', true );
$address = get_post_meta(get_the_id(), 'kunco_address', true );
$post_id = get_the_id();
$day = $month = '';
if($start_time){
  $start_time = date_create($start_time);
  $day = date_format($start_time, 'd');
  $month = date_i18n( 'F',  strtotime(date_format($start_time, 'Y-m-d')) );
} 
?>

<div class="event-block-list">
   <?php if ( has_post_thumbnail() ){ ?>
      <div class="event-image text-center">
         <div><a href="<?php echo esc_url($link) ?>"><?php the_post_thumbnail( 'medium' ); ?></a></div>
         <div class="event-date">
           <span class="date"><?php echo esc_attr($day) ?></span>
           <span class="month"><?php echo esc_attr($month) ?></span>
         </div>
      </div>
   <?php } ?>   

    <div class="content-inner clearfix">
      <div class="event-content-inner">
        <div class="event-content">
          <h3 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo esc_html($title); ?></a></h3>    
          <div class="event-meta">
            <span class="event-time">
            <?php 
              $date_format = ( date_format($start_time, 'H') == 0 &&  date_format($start_time, 'i') == 0) ? 'm/d/yy' : 'm/d/yy H:i';
              print date_format($start_time, $date_format);
            ?> 
            </span>
            <span class="event-address"> <?php echo esc_html($address) ?> </span> 
          </div>
          <div class="event-line"></div>  
          <div class="event-description">
            <?php echo kunco_limit_words(20, get_the_excerpt(), get_the_content()) ?>
          </div>
        </div>
      </div>
    </div>  
  </div>