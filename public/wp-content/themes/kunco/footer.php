<?php
/**
 * $Desc
 *
 * @version    1.0
 * @package    basetheme
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2016 Gaviasthemess. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

	?>
	</div><!--end page content-->
	
</div><!-- End page -->

	<footer id="wp-footer" class="clearfix">
		<?php $footer = apply_filters('kunco_get_footer_layout', null ); ?>
		<?php if(!empty($footer) && $footer != 'disable-footer'){
			if($footer != 'default' && $post = get_post( $footer )){
				echo '<div class="footer-main">' . do_shortcode( $post->post_content ) . '</div>'; 
			}else{
				$sidebars_count = 0;
				for( $i = 1; $i <= 4; $i++ ){
					if ( is_active_sidebar( 'footer-sidebar-'. $i ) ) $sidebars_count++;
				}
				
				if( $sidebars_count > 0 ){
					echo '<div class="widgets_wrapper">';
						echo '<div class="container">';
						
							$sidebar_class = '';
							switch( $sidebars_count ){
								case 2: $sidebar_class = 'footer-second col-lg-6 col-md-6 col-md-6 col-xs-12'; break;
								case 3: $sidebar_class = 'footer-third col-lg-4 col-md-4 col-md-1 col-xs-12'; break;
								case 4: $sidebar_class = 'footer-fourth col-lg-3 col-md-3 col-md-6 col-xs-12'; break;
								default: $sidebar_class = 'footer-one col-xs-12';break;
							}
							
							for( $i = 1; $i <= 4; $i++ ){
								if ( is_active_sidebar( 'footer-sidebar-'. $i ) ){
									echo '<div class="'. $sidebar_class .' column">';
										dynamic_sidebar( 'footer-sidebar-'. $i );
									echo '</div>';
								}
							}
						
						echo '</div>';
					echo '</div>';
				}
			} 
		}?>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<?php echo kunco_get_option('copyright_text', esc_html__('Copyright ', 'kunco') . date('Y') . ' - ' . esc_html__('Company - All rights reserved. Powered by WordPress.', 'kunco') ); ?>
					</div>
				</div>	
			</div>
		</div>
		<div class="return-top default"><i class="gv-icon-194"></i></div>

	</footer>
	
	<div id="gva-overlay"></div>
	<div id="gva-quickview" class="clearfix"></div>
	<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="blur-svg">
	   <defs>
	      <filter id="blur-filter">
	         <feGaussianBlur stdDeviation="3"></feGaussianBlur>
	      </filter>
	    </defs>
	</svg>
<?php wp_footer(); ?>
</body>
</html>