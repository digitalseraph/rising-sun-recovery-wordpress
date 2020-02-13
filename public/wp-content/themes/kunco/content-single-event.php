<?php
	$event_id = get_the_ID();
	$start_time = get_post_meta($event_id, 'kunco_start_time', true );
	$finish_time = get_post_meta($event_id, 'kunco_finish_time', true );
	$address = get_post_meta($event_id, 'kunco_address', true );
	$event_speakers = get_post_meta( $event_id, 'event_speakers', false );
	$speakers = array();
	if(isset($event_speakers[0]) && $event_speakers[0]){
		$speakers = $event_speakers[0];
	}
	if($start_time){
	  $start_time = date_create($start_time);
	} 
	if($finish_time){
	  $finish_time = date_create($finish_time);
	} 
?>

<article id="event-<?php the_ID(); ?>" <?php post_class( 'event-single' ); ?>>
	<div class="content-top entry-meta">
     	<?php if(get_the_term_list($post->ID, 'gva_event_cat', ' ', ', ' )){ ?>
	      <span class="cat-links"><?php echo get_the_term_list($post->ID, 'gva_event_cat', ' ', ', ' ); ?></span>
	      <span class="line"></span>
     	<?php } ?>
      <?php kunco_posted_on(); ?>
   </div> 
	<h1 class="entry-title"><?php echo the_title() ?></h1>
	<?php if ( has_post_thumbnail() ){ ?>
		<div class=" event-thumbnail">
			<?php the_post_thumbnail('full'); ?>
			<?php get_template_part( 'templates/other/sharebox_course' ); ?>
		</div>
	<?php } ?>
	<div class="event-content entry-content">
		<div class="meta-block info">
			<div class="block-content">
				<?php if($start_time){ ?>
					<div class="info-item">
	              	<div class="icon"><i class="gv-icon-23"></i></div>
	              	<div class="content">
	                	<span class="lab"><?php echo esc_html__( 'Start time', 'kunco' ); ?></span>
	                	<span class="val">
	                		<?php 
				              $date_format = ( date_format($start_time, 'H') == 0 &&  date_format($start_time, 'i') == 0) ? 'F d, Y' : 'F d, Y H:i';
				              print date_format($start_time, $date_format);
				            ?> 
				        	</span>
	              </div>
					</div>
				<?php } ?>

				<?php if($finish_time){ ?>
					<div class="info-item">
	              	<div class="icon"><i class="gv-icon-1106"></i></div>
	              	<div class="content">
	                	<span class="lab"><?php echo esc_html__( 'Finished Time', 'kunco' ); ?></span>
	                	<span class="val">
	                		<?php 
				              $date_format = ( date_format($finish_time, 'H') == 0 &&  date_format($finish_time, 'i') == 0) ? 'F d, Y' : 'F d, Y H:i';
				              print date_format($finish_time, $date_format);
				            ?> 
				        	</span>
	              </div>
					</div>
				<?php } ?>

				<?php if($address){ ?>
					<div class="info-item">
	              	<div class="icon"><i class="gv-icon-1134"></i></div>
	              	<div class="content">
	                	<span class="lab"><?php echo esc_html__( 'Address', 'kunco' ); ?></span>
	                	<span class="val">
	                		<?php echo esc_html( $address ); ?>
				        	</span>
	              </div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<?php if($speakers){ ?>
			<div class="meta-block speakers">
				<div class="block-title"><?php echo esc_html__( 'Speakers', 'kunco' ); ?></div>
				<div class="block-content">
					<div class="init-carousel-owl owl-carousel" data-items="4" data-items_lg="4" data-items_md="3" data-items_sm="2" data-items_xs="2" data-loop="0" data-speed="1000" data-auto_play="1" data-auto_play_speed="1000" data-auto_play_timeout="3000" data-auto_play_hover="1" data-navigation="1" data-rewind_nav="1" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
						<?php foreach ($speakers as $speaker) { ?>
							<div class="item">
								<div class="speaker-item">
									<?php if(isset($speaker['avatar']) && $speaker){ ?>
										<div class="avatar">
											<img src="<?php echo esc_url($speaker['avatar']); ?>" />
										</div>
									<?php } ?>
									<?php if(isset($speaker['name']) && $speaker){ ?>
										<div class="name"><?php echo esc_html($speaker['name']); ?></div>
									<?php } ?>
									<?php if(isset($speaker['job']) && $speaker){ ?>
										<div class="job"><?php echo esc_html($speaker['job']); ?></div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="meta-block">
			<div class="block-title"><?php echo esc_html__( 'Content', 'kunco' ); ?></div>
			<div class="block-content"><?php the_content(); ?></div>
		</div>
	</div>

	<?php if($address){ ?>
	<div class="event-map">
		<?php
			$args = array(
			   'type'         => 'map',
			   'width'        => '100%', 
			   'height'       => '380px', 
			   'zoom'         => 14,  
			   'marker'       => true, 
			   'marker_title' => '',
			   'info_window'  => '<h3>Info Window Title</h3>Info window content. HTML <strong>allowed</strong>', 
			   'api_key'		=> 'AIzaSyCXErJYvTfNiAkq_2kKeMr7wKa100i2Yqs',
			   'geo' => true
			);
			echo rwmb_meta( 'kunco_map', $args, $event_id ); 
		?>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-xs-12">
			<?php 
			 	if( comments_open() || get_comments_number() ) {
               comments_template();
            }
         ?>
		</div>
	</div>


</article>
