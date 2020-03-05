<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if($image){
  $image = wp_get_attachment_image_src($image, 'full');
  if(isset($image[0]) && $image[0]){ $image = $image[0]; }
}
if( $target ){
    $target = 'target="_blank"';
  } else {
    $target = false;
}
$style = '';
if($height) $style .= "min-height:{$height};";
if($style) $style = "style=\"{$style}\"";
         
?>

<div class="gsc-box-hover clearfix <?php echo esc_attr($el_class); ?>" <?php if($style) echo trim($style) ?>>
  <div class="box-content">
     <div class="frontend">
        <?php if($image){ ?><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" /> <?php } ?>
        <div class="frontend-content">
           <div class="box-title">
              <a class="box-link" <?php if($link) echo ('href="' . $link . '"' . $target) ?>><?php echo esc_html($title) ?></a>                
           </div>
           <div class="box-desc"><?php echo esc_html($content) ?></div>
        </div>   
     </div>
     <div class="backend">
        <div class="content-be">
           <div class="box-title">
              <a class="box-link" <?php if($link) echo ('href="'  .$link . '"' . $target) ?>><?php echo esc_html($title) ?></a>
           </div>
           <div class="be-desc"><?php echo wp_kses( $content_backend, true ) ?></div>
           <?php if($link){ ?><div class="link-action"><a class="btn-inline" href="<?php echo esc_url($link) ?>" <?php echo trim($target) ?>><?php echo esc_html($text_link) ?></a></div><?php } ?>
        </div>
     </div>
  </div>
</div>