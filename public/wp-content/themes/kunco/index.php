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
?>

<section id="wp-main-content" class="clearfix main-page title-layout-standard">
  <?php do_action( 'kunco_before_page_content' ); ?>
  <div class="container"> 
    <div class="main-page-content row">
      
      <!-- Main content -->
      <div class="content-page col-lg-9 col-md-9 col-sm-12 col-xs-12">      
        <div id="wp-content" class="wp-content content-page-index">   
          <div class="post-items blog-grid-style">
            <div class="lg-block-grid-2 md-block-grid-2 sm-block-grid-2 xs-block-grid-1 post-masonry-style">
              <?php if ( have_posts() ) : ?>
                <?php
                   // Start the Loop.
                   while ( have_posts() ) : the_post();

                      /*
                       * Include the post format-specific template for the content. If you want to
                       * use this in a child theme, then include a file called called content-___.php
                       * (where ___ is the post format) and that will be used instead.
                       */
                      echo '<div class="item-columns item-masory">';
                        get_template_part( 'content', get_post_format() );
                      echo '</div>';  

                   endwhile;
                   // Previous/next page navigation.         

                else :
                   // If no content, include the "No posts found" template.
                   get_template_part( 'content', 'none' );

                endif;
              ?>
            </div>
          </div>  

         <div class="pagination">
            <?php echo kunco_pagination(); ?>
         </div>
        </div>  
      </div>  

      <!-- Left sidebar -->
    
       <div class="sidebar wp-sidebar sidebar-left col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <?php do_action( 'kunco_before_sidebar' ); ?>
          <div class="sidebar-inner">
            <?php get_sidebar(); ?>
          </div>
          <?php do_action( 'kunco_after_sidebar' ); ?>
       </div>
    </div>
  </div>              
  <?php do_action( 'kunco_after_page_content' ); ?>
</section>
<?php get_footer(); ?>
