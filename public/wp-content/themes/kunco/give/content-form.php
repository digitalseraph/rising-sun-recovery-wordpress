<?php
  $form_id = get_the_ID();
  $form = new Give_Donate_Form( $form_id );
  $goal = apply_filters( 'give_goal_amount_target_output', $form->goal, $form_id, $form );
  $goal_option = give_get_meta( $form_id, '_give_goal_option', true );
  $progress = 0;
  $income = apply_filters( 'give_goal_amount_raised_output', $form->get_earnings(), $form_id, $form );
  $income = empty($income) ? 0 : $income;
  if($goal_option == 'disabled' || !$goal_option){
    $goal = 'unlimited';
    $progress = 100;
    $income = give_currency_filter(give_format_amount( $income, array( 'sanitize' => false ) ));
  }
  if($goal == 'unlimited'){
    $progress_label = esc_html__( 'unlimited' , 'kunco' );
  }else{
    $progress = apply_filters( 'give_goal_amount_funded_percentage_output', round( ( $income / $goal ) * 100, 1 ), $form_id, $form );
    $progress_label = $progress . '%';
    $income = give_currency_filter(give_format_amount( $income, array( 'sanitize' => false ) ));
    $goal = give_currency_filter(give_format_amount( $goal, array( 'sanitize' => false ) ));
  }
  if(!isset($excerpt_words)){
    $excerpt_words = kunco_get_option('give_excerpt_limit', 20);
  }
?> 
<div  class="give-block" >
  <div <?php post_class(); ?>>
    <div class="form-image">
      <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
      <?php } else { ?>
       <a href="<?php the_permalink() ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/no-image.jpg'); ?>" alt="<?php echo the_title_attribute() ?>"/></a>
      <?php } ?>
      <div class="content-action"><a class="link" href="<?php the_permalink() ?>"><?php echo esc_html__( 'Donation now', 'kunco' ) ?></a></div>
      <?php get_template_part( 'give/part', 'gallery' ); ?>
      <?php get_template_part( 'give/part', 'video' ); ?>
    </div>
    <div class="form-content">
      <div class="funded">
        <div class="progress">
          <div class="progress-bar" data-progress-animation="<?php echo esc_attr($progress)?>%">
            <span class="percentage"><span></span></span>
          </div>
        </div>
      </div>
      <div class="form-content-inner">
        <?php if($goal == 'unlimited'){ ?>
          <div class="campaign-information unlimited">
            <div class="campaign-raised"> 
              <span class="c-label"><?php echo esc_html__('Raised', 'kunco') ?></span> 
              <span class="raised"><?php echo esc_html($income) ?></span>
            </div>
            <div class="campaign-goal"> 
              <span class="c-label"><?php echo esc_html__('Goal', 'kunco') ?></span> 
              <span class="goal"><?php echo esc_html($progress_label) ?></span>
            </div>
          </div>
        <?php }else{ ?>
          <div class="campaign-information">
            <div class="campaign-raised"> 
              <span class="c-label"><?php echo esc_html__('Raised', 'kunco') ?></span> 
              <span class="raised"><?php echo esc_html($income) ?></span>
            </div>
            <div class="funded">
              <span class="pie-label"><?php echo esc_attr($progress_label)?></span>
            </div>
            <div class="campaign-goal"> 
              <span class="c-label"><?php echo esc_html__('Goal', 'kunco') ?></span> 
              <span class="goal"><?php echo esc_html($goal) ?></span>
            </div>
          </div>
        <?php } ?>  

        <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <div class="desc"><?php echo kunco_limit_words( $excerpt_words, get_the_excerpt(), get_the_content() ); ?></div>
      </div>  
     </div>
  </div>
</div>

      
