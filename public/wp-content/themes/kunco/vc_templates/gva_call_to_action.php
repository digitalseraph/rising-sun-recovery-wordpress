<?php
  $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
  extract( $atts );
   if( $target ){
      $target = 'target="_blank"';
   } else {
      $target = false;
   }
   $class = array();
   $class[] = $el_class;
   $class[] = $button_align;
   $class[] = $style_text;
   if($box_background) $class[] = 'has-background';
   $style = '';
   if($width) $style .= "max-width: {$width};";
   if($box_background) $style .= "background: {$box_background};";
   $style = "style=\"".$style ."\"";
?>

<div class="widget gsc-call-to-action <?php echo implode($class, ' ') ?>" <?php echo trim($style) ?>>
   <div class="content-inner clearfix" >
      <div class="content">
         <h2 class="title"><span><?php echo wp_kses( $title, true ); ?></span></h2>
         <?php if($content){ ?><div class="desc"><?php echo wp_kses($content, true); ?></div><?php } ?>
      </div>
      <?php if(!empty($video)){ ?>
         <div class="video-body">
            <a class="popup-video gsc-video-link" href="<?php echo esc_url($video) ?>">
               <span class="icon-play"><i class="fa fa-play space-40"></i></span>
            </a>
         </div>
      <?php } ?>
      <?php if($link){?>
         <div class="button-action">
            <a href="<?php echo esc_url($link) ?>" class="<?php echo esc_attr($style_button) ?>" <?php echo trim($target) ?>><?php echo esc_html( $text_link ) ?></a>   
         </div>
      <?php } ?>
   </div>
</div>

