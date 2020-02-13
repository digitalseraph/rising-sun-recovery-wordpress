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
   get_header(apply_filters('kunco_get_header_layout', null ));
   
    $default_sidebar_config = kunco_get_option('single_post_sidebar', 'right-sidebar'); 
    $default_left_sidebar = kunco_get_option('single_post_left_sidebar', 'default_sidebar');
    $default_right_sidebar = kunco_get_option('single_post_right_sidebar', 'default_sidebar');

    $sidebar_layout_config = get_post_meta($page_id, 'kunco_sidebar_config', true);
    $left_sidebar = get_post_meta($page_id, 'kunco_left_sidebar', true);
    $right_sidebar = get_post_meta($page_id, 'kunco_right_sidebar', true);

    if ($sidebar_layout_config == "") {
        $sidebar_layout_config = $default_sidebar_config;
    }
    if ($left_sidebar == "") {
        $left_sidebar = $default_left_sidebar;
    }
    if ($right_sidebar == "") {
        $right_sidebar = $default_right_sidebar;
    }

   $left_sidebar_config  = array('active' => false);
   $right_sidebar_config = array('active' => false);
   $main_content_config  = array('class' => 'col-lg-12 col-xs-12');
    
   $sidebar_config = kunco_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
    extract($sidebar_config);
     if(!$left_sidebar_config['active'] && !$right_sidebar_config['active']){
        $main_content_config['class'] = 'col-lg-9 col-md-9 col-sm-9 col-xs-12';
    }
?>

<section id="wp-main-content" class="clearfix main-page title-layout-standard">
    <?php do_action( 'kunco_before_page_content' ); ?>
    <div class="container">
        <div class="row">
            <div class="clearfix">
                <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>"> 
                    <div id="wp-content" class="wp-content">
                        <?php  if ( have_posts() ) : ?>
                            <div class="post-area results-search clearfix blog-grid-style post-items">
                                <div class="lg-block-grid-2 md-block-grid-2 sm-block-grid-2 xs-block-grid-1 post-masonry-style">
                                    <?php  while ( have_posts() ) : the_post(); ?>
                                        <div class="item-columns item-masory margin-bottom-30">
                                            <div class="post post-block">

                                                <?php if(has_post_thumbnail()){ ?>
                                                    <div class="post-thumbnail">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                <?php } ?>    

                                                <div class="entry-content">
                                                    <div class="content-inner">
                                                        <div class="content-top entry-meta">
                                                           <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){ ?>
                                                              <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kunco' ) ); ?></span>
                                                              <span class="line"></span>
                                                           <?php } ?>
                                                           <?php kunco_posted_on(); ?>
                                                        </div> 
                                                        <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
                                                        <?php echo kunco_limit_words( 16, get_the_excerpt(), '' );?>
                                                    </div>
                                                    <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
                                                  <div class="read-more hidden"><a class="btn-theme" href="<?php echo esc_url( get_permalink() ) ?>"><?php echo esc_html__( 'Read more ', 'kunco' ) ?></a></div>
                                                  
                                                </div><!-- .entry-content -->   
                                            </div>
                                        </div>    
                                    <?php endwhile; ?> 
                                </div>       
                            </div>                    
                        <?php else: ?>
                            <div class="alert alert-danger"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kunco' ); ?></div>
                        <?php endif ?>
                        <div class="pagination">
                            <?php echo kunco_pagination(); ?>
                         </div>
                    </div>
                </div>


                <?php if(!$left_sidebar_config['active'] && !$right_sidebar_config['active']): ?>
                 <div class="sidebar wp-sidebar sidebar-right col-lg-3 col-md-3 col-xs-12 pull-right">
                    <?php do_action( 'kunco_before_sidebar' ); ?>
                    <div class="sidebar-inner">
                       <?php get_sidebar(); ?>
                    </div>
                    <?php do_action( 'kunco_after_sidebar' ); ?>
                 </div>
                <?php endif ?>

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
    </div>
    <?php do_action( 'kunco_after_page_content' ); ?>
</section>
<?php get_footer(); ?>
