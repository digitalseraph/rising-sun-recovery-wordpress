<?php
$align = 'align-center';
$style_text = 'text-dark';
$style = 'style-default';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$class = array();
$class[] = $el_class;
$class[] = $align;
$class[] = $style;
$class[] = $style_text;
?>

<div class="widget gsc-heading <?php echo implode($class, ' ') ?>">
   <div class="heading-top">
      <?php if($subtitle){ ?><div class="sub-title"><span><?php echo esc_html($subtitle); ?></span></div><?php } ?>
      <?php if($title){ ?><h2 class="title"><span><?php echo esc_html($title); ?></span></h2><?php } ?>
   </div>   
   <?php if($content){ ?><div class="title-desc"><?php echo wp_kses($content, true); ?></div><?php } ?>
</div>
