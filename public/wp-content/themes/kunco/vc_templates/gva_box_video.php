<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$photo = wp_get_attachment_image_src($photo, 'full');
$image = (isset($photo[0]) && $photo[0]) ? $photo[0] : '';
?>
<div class="widget gsc-video-box clearfix <?php echo esc_attr($el_class) ?>">
  <div class="video-inner">
    <div class="image"><img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr( $title ); ?>"/></div>
    <div class="video-body">
      <a class="popup-video gsc-video-link" href="<?php echo esc_url($content) ?>">
        <span class="icon-play"><i class="fa fa-play space-40"></i></span>
      </a>
    </div>
  </div>   
</div>