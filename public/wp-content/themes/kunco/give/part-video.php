<?php 
  $video = get_post_meta( get_the_ID(), 'kunco_give_video_url' , true ); 
?>
<?php if($video){ ?>
  <div class="give-video">
    <a class="video-link popup-video" href="<?php echo esc_url($video) ?>"><i class="fa fa-video-camera"></i></a>
  </div>
<?php } ?>
