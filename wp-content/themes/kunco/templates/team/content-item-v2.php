<?php
  $team_position = get_post_meta(get_the_id(), 'kunco_team_position', true );
  $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
  if(isset($team_socials[0])){
  	$team_socials = $team_socials[0];
  }
?>
<div class="team-block team-v2">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="team-image">
		 	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		 	<?php if($team_socials){ ?>
			   <div class="socials-team">
		     	<?php foreach ($team_socials as $key => $social) { ?>
		     		<?php if(isset($social['link']) && isset($social['icon'])){ ?>
				     	<a class="gva-social" href="<?php echo esc_url($social['link']) ?>">
				         <i class="<?php echo esc_attr($social['icon']) ?>"></i>
				      </a>
				   <?php } ?>   
		     	<?php } ?>
			   </div>
			<?php } ?>
		</div>
	<?php endif ?>
	<div class="team-content">
	   <div class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></div>
	   <?php if($team_position){ ?>   
	   	<div class="team-job"><?php echo esc_html( $team_position ); ?></div>
	   <?php } ?>
	   <div class="team-body"><?php echo kunco_limit_words($excerpt_words, get_the_excerpt(), get_the_content()) ?></div>
	   <?php 
	   	if($show_skills){
  				$team_skills = get_post_meta(get_the_id(), 'team_skills', false );
	   		if( is_array($team_skills) && isset($team_skills[0]) ){ 
	   ?>
	      <div class="team-skills clearfix">
	         <div class="vc_progress_bar wpb_content_element vc_progress-bar-color-bar_blue">
	           <?php foreach ($team_skills[0] as $key => $skill) { ?>
	             <?php if(isset($skill['label']) && isset($skill['volume'])){ ?>
	               <div class="vc_general vc_single_bar clearfix">
	                 <small class="vc_label"><?php echo esc_html( $skill['label'] ); ?><span class="vc_label_units"><?php echo esc_attr( $skill['volume'] ) ?>%</span></small>
	                 <span class="vc_bar" data-percentage-value="<?php echo esc_attr( $skill['volume'] ) ?>" data-value="<?php echo esc_attr( $skill['volume'] ) ?>"></span>
	               </div>
	            <?php } ?>   
	           <?php } ?>
	         </div>  
	      </div>
     <?php 
  				}
  			}
     ?>

	</div>
</div>  