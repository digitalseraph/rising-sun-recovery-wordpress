<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$photo = wp_get_attachment_image_src($photo, 'full');
$image = (isset($photo[0]) && $photo[0]) ? $photo[0] : '';
$style_content = $content_bg ? 'style="background-color: ' . $content_bg . '"' : '';
if( $target ){
  $target = 'target="_blank"';
 } else {
  $target = false;
 }
?>

<div class="widget gsc-box-parallax <?php echo esc_attr($el_class) ?> content-align-<?php echo esc_attr($content_align) ?>">
   <div class="clearfix">
      <div class="col-first">
         <div class="image"><img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr( $title ); ?>"/></div>   
      </div>
      <div class="col-second skrollable skrollable-between" data-bottom-top="top: -10%;" data-top-bottom="top: 30%;">
         <div class="content-inner" <?php echo trim($style_content) ?>>
            <div class="content-bg" <?php echo trim($style_content) ?>></div>
            <div class="content-inner">
               <?php if($subtitle){ ?>
                  <div class="subtitle"><span><?php echo esc_html($subtitle); ?></span></div>
               <?php } ?>  
               <?php if($title){ ?>
                  <div class="title"><h3><?php echo esc_html($title); ?></h3></div>
                <?php } ?>    
               <?php if($content){ ?>
                  <div class="desc"><?php echo do_shortcode($content); ?></div>
               <?php } ?>   
               <?php if($link){ ?>
                  <div class="readmore"><a class="btn-theme btn btn-sm" href="<?php echo esc_url($link) ?>" <?php echo trim($target) ?>><?php echo esc_html($link_title) ?></a></div>
               <?php } ?>
            </div>
         </div>
      </div> 
   </div>   
</div>
