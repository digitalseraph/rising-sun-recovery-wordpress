<?php
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
   $photo = wp_get_attachment_image_src($photo, 'full');
   $image = (isset($photo[0]) && $photo[0]) ? $photo[0] : '';
?>

<div class="widget gsc-our-partners <?php echo esc_attr($el_class) ?>">
   <?php if($image){ ?>
      <div class="image"><img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr($title); ?>"/></div>
   <?php } ?>
   <div class="content-inner">
      <?php if($title){ ?>
         <div class="title">
            <?php if($link){ ?><a href="<?php echo esc_url($link) ?>" <?php echo trim($target) ?>><?php } ?> 
               <?php echo esc_html($title); ?>
            <?php if($link){ echo '</a>'; } ?>
         </div>
      <?php } ?>    
      <div class="info">
         <?php if($category){ ?>
            <span class="category"><?php echo esc_attr($category) ?>,</span>
         <?php } ?>
         <?php if($address){ ?>
            <span class="address"><?php echo esc_attr($address) ?></span>
         <?php } ?>
      </div>
      <?php if($content){ ?>
         <div class="content"><?php echo esc_html($content) ?></div>
      <?php } ?>                       
   </div>
</div>

