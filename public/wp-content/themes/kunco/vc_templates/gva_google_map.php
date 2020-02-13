<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$zoom = 14;
$bubble = true;
$_id = kunco_random_id();
$style = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]';
wp_enqueue_script('map-ui');
wp_enqueue_script('map-api');
?>
<div class="gsc-map <?php echo esc_attr($el_class) ?>">
   <div id="map_canvas_<?php echo esc_attr($_id); ?>" class="map_canvas" style="width:100%; height:<?php echo esc_attr($height); ?>;"></div>
   <div class="content-inner clearfix">
      <?php if($descrption){ ?><div class="desc"><?php echo esc_html($descrption) ?></div><?php } ?>
      <?php if($content){?><div class="address info"><span class="icon gv-icon-1138"></span><?php echo esc_html($content) ?></div> <?php } ?>
      <?php if($email){?><div class="email info"><span class="icon gv-icon-226"></span><?php echo esc_html($email) ?></div> <?php } ?>
      <?php if($phone){?><div class="phone info"><span class="icon gv-icon-266"></span><?php echo esc_html($phone) ?></div> <?php } ?>
      <div class="social-inline">
         <?php if($facebook){ ?>
            <a href="<?php echo esc_url($facebook); ?>"><i class="fa fa-facebook-square"></i></a>
         <?php } ?>   
         <?php if($twitter){ ?>
            <a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-twitter-square"></i></a>
         <?php } ?>   
         <?php if($instagram){ ?>
            <a href="<?php echo esc_url($instagram); ?>"><i class="fa fa-instagram"></i></a>
         <?php } ?>
         <?php if($dribbble){ ?>
            <a href="<?php echo esc_url($dribbble); ?>"><i class="fa fa-dribbble"></i></a>
         <?php } ?>
         <?php if($linkedin){ ?>
            <a href="<?php echo esc_url($linkedin); ?>"><i class="fa fa-linkedin-square"></i></a>
         <?php } ?>
         <?php if($pinterest){ ?>
            <a href="<?php echo esc_url($pinterest); ?>"><i class="fa fa-pinterest"></i></a>
         <?php } ?>
      </div>
   </div>
</div>            
<script>
   jQuery(document).ready(function($) {
      var stmapdefault = '<?php echo esc_attr($link); ?>';
      var marker = {position:stmapdefault}
      var content = '<?php echo esc_html($content) ?>';
  
      jQuery('#map_canvas_<?php echo esc_attr($_id); ?>').gmap({
         'scrollwheel':false,
         'zoom': <?php echo esc_attr($zoom);  ?>,
         'center': stmapdefault,
         'mapTypeId':google.maps.MapTypeId.<?php echo esc_attr( $map_type ); ?>,
         'callback': function() {
            var self = this;
            self.addMarker(marker).on('click', function(){ 
               if(content){
                  self.openInfoWindow({'content': content}, self.instance.markers[0]);
               }                     
            });
         },
         panControl: true
      });
   });
</script>