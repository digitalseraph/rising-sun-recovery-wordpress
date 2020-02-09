<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$line_data = array();
$items = (array) vc_param_group_parse_atts( $items );
foreach ( $items as $data ) {
  $new_line = $data;
  $new_line['title'] = isset( $data['title'] ) ? $data['title'] : '';
  $line_data[] = $new_line;
}
$_id = kunco_random_id();
?>

<div class="gsc-service-box <?php echo esc_attr($el_class) ?>"> 
  <div class="box-content">
    <div class="icon-inner"><span class="icon"><i class="<?php echo esc_attr($icon) ?>"></i></span></div>
    <div class="content-inner">
      <div class="title"><?php echo esc_html($title) ?></div>
      <div class="features">
        <ul>
          <?php foreach( $line_data as $data ): ?>
            <li class="item">
              <?php echo esc_html($data['title']) ?>
            </li>
          <?php endforeach;  ?>  
        </ul>
      </div>  
      <?php if($link){ ?>
        <div class="action"><a href="<?php echo esc_url($link) ?>"><?php print esc_html($text_link); ?> »</a></div>
      <?php } ?>
    </div>
  </div>
</div>  