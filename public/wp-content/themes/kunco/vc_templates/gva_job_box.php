<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if($image){
  $image = wp_get_attachment_image_src($image, 'full');
  if(isset($image[0]) && $image[0]){ $image = $image[0]; }
}
?>

<div class="gsc-job-box <?php echo esc_attr($el_class) ?>"> 
  <div class="box-content">
    <div class="icon-inner"><span class="icon"><img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr($title) ?>"/></span></div>
    <div class="content-inner">
      <div class="job-type"><?php echo esc_html($job_type) ?></div>
      <div class="title">
        <?php if($link){ ?><a href="<?php echo esc_url($link) ?>"><?php } ?>
          <?php echo esc_html($title) ?>
        <?php if($link){ ?></a><?php } ?>
      </div>
      <div class="information">
        <ul>
          <li><i class="fa fa-suitcase"></i><span><?php echo esc_html($company) ?></span></li>
          <li><i class="fa fa-map-marker"></i><span><?php echo esc_html($address) ?></span></li>
        </ul>
      </div>  
    </div>
  </div>
</div>  