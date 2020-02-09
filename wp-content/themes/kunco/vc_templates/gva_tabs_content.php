<?php
wp_enqueue_script('slick');
wp_enqueue_style('slick');
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$line_data = array();
$items = (array) vc_param_group_parse_atts( $items );
foreach ( $items as $data ) {
  $new_line = $data;
  $new_line['title'] = isset( $data['title'] ) ? $data['title'] : '';
  $new_line['icon'] = isset( $data['icon'] ) ? $data['icon'] : '';
  $new_line['content'] = isset( $data['content'] ) ? $data['content'] : '';
  $new_line['photo'] = isset( $data['photo'] ) ? $data['photo'] : '';
  $line_data[] = $new_line;
}
$_id = kunco_random_id();
?>

<div class="gsc-tabs-content <?php echo esc_attr($el_class) ?> slick-tabs" data-slick-id = "<?php echo esc_attr($_id) ?>"> 
  <div class="carousel-nav">
    <div class="tab-carousel-nav slick-slider nav-<?php echo esc_attr($_id) ?>">
      <?php foreach( $line_data as $data ): ?>
        <div class="slick-slide">
          <div class="item">
            <a>
              <?php if($data['icon']){ ?><i class="<?php echo esc_attr($data['icon']) ?>"></i><?php } ?>
              <?php echo esc_html($data['title']) ?>
            </a>
          </div>
        </div>
      <?php endforeach;  ?>  
    </div>
  </div>

  <div class="tab-lists-content">
    <div class="tab-carousel-list-here slick-slider tab-<?php echo esc_attr($_id) ?>"> 
      <?php foreach( $line_data as $data ): ?>
        <div class="slick-slide">
           <div class="item">
              <?php if($data['photo']){ ?>
              <?php 
                $image = wp_get_attachment_image_src($data['photo'], 'full');
                $image = (isset($image[0]) && $image[0]) ? $image[0] : '';
              ?> 
                <div class="images"><img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr($data['title']) ?>"></div>
              <?php } ?>
              <div class="content-inner"><?php echo wp_kses($data['content'], true) ?></div>
           </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>      
</div>  