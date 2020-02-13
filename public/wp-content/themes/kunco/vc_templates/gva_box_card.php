<?php
  $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
  extract( $atts );
?>

<div class="widget box-card box-card-<?php echo esc_attr($icon_position) ?> <?php echo esc_attr($el_class) ?>">
  <div class="highlight-icon"><span class="icon <?php echo esc_attr($icon) ?>"></span></div>
    <div class="highlight_content">
      <?php if($link){ ?> <a href="<?php echo esc_url($link) ?>"> <?php } ?>   
        <h4 class="title"><?php echo esc_html($title) ?></h4>
      <?php if($link){ ?> </a> <?php } ?>
      <div class="desc"><?php echo esc_html($content) ?></div>
  </div>
</div>