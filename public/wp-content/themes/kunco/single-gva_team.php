<?php 
  get_header(apply_filters('kunco_get_header_layout', null )); 
  wp_enqueue_script( 'waypoints' );
  
  $page_id = kunco_id();
  $page_title_style = get_post_meta($page_id, 'kunco_page_title_style', true );
  if(empty($page_title_style)) $page_title_style = 'standard';
?>

<section id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
  <?php do_action( 'kunco_before_page_content' ); ?>
  <div class="container">  
    <div class="main-page-content row">
      <!-- Main content -->
      <div class="content-page col-xs-12">      
        <?php while ( have_posts() ) : the_post(); ?>
          <?php
            $team_position = get_post_meta(get_the_id(), 'kunco_team_position', true );
            $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
            $team_skills = get_post_meta(get_the_id(), 'team_skills', false );
            $team_educations = get_post_meta(get_the_id(), 'team_educations', false );
            $team_quote = get_post_meta(get_the_id(), 'kunco_team_quote', true );
            $team_email = get_post_meta(get_the_id(), 'kunco_team_email', true );
            $team_phone = get_post_meta(get_the_id(), 'kunco_team_phone', true );
            $team_address = get_post_meta(get_the_id(), 'kunco_team_address', true );

            if(isset($team_socials[0])){
              $team_socials = $team_socials[0];
            }
            if(isset($team_skills[0])){
              $team_skills = $team_skills[0];
            }
            if(isset($team_educations[0])){
              $team_educations = $team_educations[0];
            }
          ?>
          <div class="team-block-single clearfix single">
            <div class="col-md-3 col-sm-3 col-xs-12 team-image">
              <div class=" team-thumbnail">
                <?php the_post_thumbnail('full'); ?>
                <div class="heading"><?php echo esc_html__('Contact Info', 'kunco') ?></div>
                <div class="team-email"><?php echo esc_html__('Email: ', 'kunco') ?><?php echo esc_html( $team_email ) ?></div>
                <div class="team-phone"><?php echo esc_html__('Phone: ', 'kunco') ?><?php echo esc_html( $team_phone ) ?></div>
                <?php if($team_socials){ ?>
                  <div class="socials">
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
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <div class="team-name clearfix"><?php the_title() ?></div>
              <div class="team-job"><?php echo esc_html( $team_position ); ?></div>
              
              <?php if( is_array($team_educations) && isset($team_educations[1]) ){ ?>
                <div class="team-educations">
                  <div class="heading"><?php echo esc_html__('Educations', 'kunco') ?></div>
                  <?php if($team_educations){ ?>
                    <div class="educations">
                      <?php 
                      foreach ($team_educations as $key => $education) { 
                        if(isset($education['title'])){ 
                          echo '<div class="education">' . esc_html($education['title']) . '</div>';
                        }
                      } 
                      ?>
                    </div>
                  <?php } ?> 
                </div>
                <?php } ?>

              <?php if( is_array($team_skills) && isset($team_skills[1]) ){ ?>
                <div class="team-skills clearfix">
                  <div class="heading"><?php echo esc_html__('Skills', 'kunco') ?></div>
                  <div class="vc_progress_bar wpb_content_element vc_progress-bar-color-bar_blue">
                    <?php foreach ($team_skills as $key => $skill) { ?>
                      <?php if(isset($skill['label']) && isset($skill['volume'])){ ?>
                        <div class="vc_general vc_single_bar clearfix">
                          <small class="vc_label"><?php echo esc_html( $skill['label'] ); ?><span class="vc_label_units"><?php echo esc_attr( $skill['volume'] ) ?></span></small>
                          <span class="vc_bar" data-percentage-value="<?php echo esc_attr( $skill['volume'] ) ?>" data-value="<?php echo esc_attr( $skill['volume'] ) ?>"></span>
                        </div>
                     <?php } ?>   
                    <?php } ?>
                  </div>  
                </div>
              <?php } ?>  

              <div class="team-content"><?php the_content() ?></div>
              <div class="team-quote"><?php echo wp_kses( $team_quote, true ) ?></div>
            </div>
          </div>
        <?php endwhile; ?> 
      </div>      
    </div>   
  <?php do_action( 'kunco_after_page_content' ); ?>
</section>

<?php get_footer(); ?>