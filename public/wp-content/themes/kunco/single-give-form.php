<?php
  get_header(apply_filters('kunco_get_header_layout', null ));

  $page_title_style = kunco_get_option('give_page_heading_style', 'standard' ); 
  $page_id = kunco_id();
  if(isset($_GET['hst']) && $_GET['hst']){
    $page_title_style = $_GET['hst'];
  } 
  
  $default_sidebar_config = kunco_get_option('give_single_sidebar_config', '');
  $default_left_sidebar = kunco_get_option('give_single_left_sidebar', '');
  $default_right_sidebar = kunco_get_option('give_single_right_sidebar', '');

  if(get_post_meta($page_id, 'kunco_page_title_style', true )){
    $page_title_style = get_post_meta($page_id, 'kunco_page_title_style', true ); 
  }

  $sidebar_layout_config = get_post_meta($page_id, 'kunco_sidebar_config', true);
  $left_sidebar = get_post_meta($page_id, 'kunco_left_sidebar', true);
  $right_sidebar = get_post_meta($page_id, 'kunco_right_sidebar', true); 

  $sidebar_layout_config = (empty($sidebar_layout_config) ? $default_sidebar_config : $sidebar_layout_config);
  $left_sidebar = (empty($left_sidebar) ? $default_left_sidebar : $left_sidebar);
  $right_sidebar = (empty($right_sidebar) ? $default_right_sidebar : $right_sidebar);

  $left_sidebar_config  = array('active' => false);
  $right_sidebar_config = array('active' => false);
  $main_content_config  = array('class' => 'col-lg-12 col-xs-12');

  $sidebar_config = kunco_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
  extract($sidebar_config);
  global $query;
 ?>

<section id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
  <?php do_action( 'kunco_give_before_main_content' ); ?>
  <div class="container">  
    <div class="main-page-content row">
      
      <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">    
        <div id="wp-content" class="wp-content clearfix">  
          <?php while ( have_posts() ) : the_post(); ?>
            <?php give_get_template_part( 'single-give-form/content', 'single-give-form' ); ?>
          <?php endwhile; ?>

          <?php 
              if( comments_open() || get_comments_number() ) {
                  comments_template();
              }
          ?>
          <?php kunco_post_nav(); ?>
    	 </div>
      </div>      
     
      <!-- Left sidebar -->
      <?php if($left_sidebar_config['active']): ?>
        <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
          <?php do_action( 'kunco_before_sidebar' ); ?>
          <div class="sidebar-inner">
             <?php dynamic_sidebar($left_sidebar_config['name'] ); ?>
          </div>
          <?php do_action( 'kunco_after_sidebar' ); ?>
        </div>
      <?php endif ?>

       <!-- Right Sidebar -->
      <?php if($right_sidebar_config['active']): ?>
        <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
          <?php do_action( 'kunco_before_sidebar' ); ?>
             <div class="sidebar-inner">
                <?php dynamic_sidebar($right_sidebar_config['name'] ); ?>
             </div>
          <?php do_action( 'kunco_after_sidebar' ); ?>
        </div>
      <?php endif ?>

    </div>   
  </div>
  <?php do_action( 'kunco_give_after_main_content' ); ?>
</section>

<?php get_footer(); ?>
