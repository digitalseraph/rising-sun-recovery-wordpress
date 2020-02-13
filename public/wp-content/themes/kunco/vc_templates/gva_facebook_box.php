<?php
$output = $title = $page_url = $width = $size = $show_faces = $show_stream = $show_header = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

	$show_faces 	= ($show_faces) ? 'true' : 'false';	
	$show_stream 	= ($show_stream) ? 'true' : 'false';	
	$show_header 	= ($show_header) ? 'true' : 'false';	

?>
<div class="widget gsc-facebook-box <?php echo esc_attr($el_class) ?>">
	
	<?php if($page_url): ?>
		<iframe src="http<?php echo (is_ssl())? 's' : ''; ?>://www.facebook.com/plugins/likebox.php?href=<?php echo esc_url($page_url); ?>&amp;width=<?php echo esc_attr( $width ); ?>&amp;colorscheme=<?php echo esc_attr( $color_scheme ); ?>&amp;show_faces=<?php echo esc_attr( $show_faces ); ?>&amp;stream=<?php echo esc_attr( $show_stream ); ?>&amp;header=<?php echo esc_attr( $show_header ); ?>&amp;height=<?php echo esc_attr( $height ); ?>&amp;width=<?php echo esc_attr( $width ); ?>&amp;force_wall=true<?php if($show_faces == 'true'): ?>&amp;connections=8<?php endif; ?>" 
			style="border:none; overflow:hidden; height: <?php echo esc_attr( $height ); ?>px;">
		</iframe>
	<?php endif;?>
</div>