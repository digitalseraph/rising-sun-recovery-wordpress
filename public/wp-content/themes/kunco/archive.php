<?php
/**
 *
 * @version    1.0
 * @package    basetheme
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2016 Gaviasthemess. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

	get_header(apply_filters('kunco_get_header_layout', null )); 

	$sidebar_layout_config = kunco_get_option('archive_post_sidebar', ''); 
  $left_sidebar = kunco_get_option('archive_post_left_sidebar', '');  
  $right_sidebar = kunco_get_option('archive_post_right_sidebar', ''); 
  	
	$left_sidebar_config  = array('active' => false);
	$right_sidebar_config = array('active' => false);
	$main_content_config  = array('class' => 'col-lg-12 col-xs-12');

	$sidebar_config = kunco_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
	extract($sidebar_config);
  global $query;
?>

<section id="wp-main-content" class="clearfix main-page title-layout-hero">
	<?php do_action( 'kunco_before_page_content' ); ?>
	<div class="container">	
   	<div class="main-page-content row">
      	
      	<!-- Main content -->
      	<div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">      
  			  <div id="wp-content" class="wp-content">	
					 <?php get_template_part('templates/layout/archive') ?>
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
<?php do_action( 'kunco_after_page_content' ); ?>
</section>
<?php get_footer(); ?>
