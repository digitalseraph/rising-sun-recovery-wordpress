<?php
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
   $el_class .= ' position-' . $icon_position;
   $el_class .= ' '. $text_color;
   $style = '';
   if($icon_color) $style = "color: {$icon_color};";
   if($style) $style = 'style="'.$style.'"';
?>

<?php if($icon_position == 'icon-top-2'){ ?>
   <div class="widget milestone-block <?php echo esc_attr( $el_class ); ?>">
      <div class="milestone-text"><?php echo esc_html( $title ) ?></div>
      <?php if($icon){ ?>
         <div class="milestone-icon"><span <?php echo trim($style) ?> class="<?php echo esc_attr($icon); ?>"></span></div>
      <?php } ?>   
      <div class="milestone-right">
         <div class="milestone-number-inner" <?php echo trim($style) ?>><span class="milestone-number"><?php echo esc_attr($number); ?></span><span class="symbol"><?php echo esc_html( $symbol ) ?></span></div>
         <?php if($content){ ?><div class="milestone-content"><?php echo esc_html($content); ?></div><?php } ?>
      </div>
   </div>
<?php }else{ ?>
   <div class="widget milestone-block <?php echo esc_attr( $el_class ); ?>">
      <?php if($icon){ ?>
         <div class="milestone-icon"><span <?php echo trim($style) ?> class="<?php echo esc_attr($icon); ?>"></span></div>
      <?php } ?>   
      <div class="milestone-right">
         <div class="milestone-number-inner" <?php echo trim($style) ?>><span class="milestone-number"><?php echo esc_attr($number); ?></span><span class="symbol"><?php echo esc_html( $symbol ) ?></span></div>
         <div class="milestone-text"><?php echo esc_html( $title ) ?></div>
         <?php if($content){ ?><div class="milestone-content"><?php echo esc_html($content); ?></div><?php } ?>
      </div>
   </div>
<?php } ?>
