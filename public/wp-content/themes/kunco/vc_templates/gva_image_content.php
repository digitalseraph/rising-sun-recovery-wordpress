<?php 
   $style = 'style-1';
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
   if( $target ){
      $target = 'target="_blank"';
   }
   if($background) $background = wp_get_attachment_image_src($background, 'full');
   if($style) $el_class .= ' ' . $style;
?>

<?php if($style == 'style-1'){ ?>
   <div class="gsc-image-content <?php echo esc_attr($el_class); ?>">
      <?php if($title){ ?><h4 class="title"><?php echo esc_html($title) ?></h4><?php } ?>   
      <?php if($link){ ?><a <?php echo esc_html($target) ?> href="<?php echo esc_url($link) ?>"><?php } ?>
         <?php if(isset($background[0]) && $background[0]){ ?>
            <img src="<?php echo esc_url($background[0]) ?>" alt="<?php echo esc_attr($title) ?>" />
         <?php } ?>
      <?php if($link){ ?></a><?php } ?>
      <div class="box-content">
         <div class="desc"><?php echo esc_html($content); ?></div>
         <?php if($link){ ?>
            <div class="read-more">
               <a class="btn-theme" <?php echo esc_attr($target) ?> href="<?php echo esc_url($link) ?>"><?php echo esc_html__( 'Read more', 'kunco' ); ?></a>
            </div>
         <?php } ?>
      </div>  
   </div>
<?php } ?>

<?php if($style == 'style-2'){ ?>
   <div class="gsc-image-content <?php echo esc_attr($el_class); ?>">
      <?php if($link){ ?><a <?php echo esc_html($target) ?> href="<?php echo esc_url($link) ?>"><?php } ?>
         <?php if(isset($background[0]) && $background[0]){ ?>
            <img src="<?php echo esc_url($background[0]) ?>" alt="<?php echo esc_attr($title) ?>" />
         <?php } ?>
      <?php if($link){ ?></a><?php } ?>  
      <div class="box-content">
         <?php if($title){ ?>
            <h4 class="title">
               <?php if($link){ ?><a <?php echo esc_attr($target) ?> href="<?php echo esc_url($link) ?>"><?php } ?>
                  <?php echo esc_html($title) ?>
               <?php if($link){ ?></a><?php } ?>  
            </h4>   
         <?php } ?> 
         <div class="desc"><?php echo esc_html($content); ?></div>
         <?php if($link){ ?>
            <div class="read-more">
               <a class="btn-inline" <?php echo esc_attr($target) ?> href="<?php echo esc_url($link) ?>"><?php echo esc_html__( 'Read more', 'kunco' ); ?></a>
            </div>
         <?php } ?>
      </div>  
   </div>
<?php } ?>
