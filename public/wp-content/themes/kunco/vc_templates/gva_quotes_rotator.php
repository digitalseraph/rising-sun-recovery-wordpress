<?php
wp_enqueue_script('modernizr_custom');
wp_enqueue_script('quotes_rotator');
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$line_data = array();
$items = (array) vc_param_group_parse_atts( $items );
foreach ( $items as $data ) {
  $new_line = $data;
  $new_line['title'] = isset( $data['title'] ) ? $data['title'] : '';
  $new_line['content'] = isset( $data['content'] ) ? $data['content'] : '';
  $new_line['link'] = isset( $data['link'] ) ? $data['link'] : '';
  $line_data[] = $new_line;

  $style = '';
  if($max_width) $style .= "max-width:{$max_width};";
  if($min_height) $style .= "min-height:{$min_height};";
  if($style) $style = " style=\"{$style}\"";
}
?>
<div class="gsc-quotes-rotator <?php echo esc_attr($skin_text) ?> <?php echo esc_attr($el_class) ?>">
    <div class="cbp-qtrotator" <?php echo trim($style) ?>>
      <?php foreach( $line_data as $data ): ?>
        <div class="cbp-qtcontent">
          <div class="content-title"><?php echo esc_html($data['title']) ?></div>
          <div class="content-inner">
            <?php echo wp_kses($data['content'], true) ?>
            <?php if($data['link']){ ?>
             <div class="action"><a class="btn-theme" href="<?php echo esc_url($data['link'])?>"><?php echo esc_html__( 'Read More', 'kunco' ) ?></a></div>
            <?php } ?>
          </div>
        </div>
      <?php endforeach;  ?>  
   </div>
</div>  