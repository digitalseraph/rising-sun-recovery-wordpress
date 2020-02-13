<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if($image){
  $image = wp_get_attachment_image_src($image, 'full');
  if(isset($image[0]) && $image[0]){ $image = $image[0]; }
}
$el_class .= ' text-' . $text_style;

$css = '';
$css .= !empty($color) ? "background-color: {$color};" : "";
$css .= !empty($height) ? "min-height: {$height};" : "";
if(!empty($css)){
  $css = "style=\"{$css}\"";
}
if( $target ){
  $target = 'target="_blank"';
} else {
  $target = false;
}
?>

<div class="widget gsc-box-color clearfix <?php echo esc_attr($el_class); ?>" <?php echo trim($css) ?>>
  <div class="box-content">
     <?php if($image){ ?><div class="image"><img src="<?php echo esc_url($image) ?>" alt="<?php echo strip_tags($title) ?>"/></div> <?php } ?>
     <div class="content-inner">
        <?php if($title){ ?>
          <h3 class="box-title"><?php echo esc_html($title) ?></h3>
        <?php } ?>  
        <?php if($content){ ?>
          <div class="box-body"><?php echo wp_kses($content, false) ?></div>   
        <?php } ?>
        <?php if($link){ ?>
          <div class="action">
            <a class="link" href="<?php echo esc_url($link) ?>" <?php echo esc_attr($target) ?>><span class="text"><?php echo esc_html($text_link); ?></span></a>
          </div>
        <?php } ?>
     </div>
  </div>   
</div>