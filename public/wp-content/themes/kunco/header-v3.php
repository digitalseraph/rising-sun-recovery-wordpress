<?php
/**
 * $Desc
 *
 * @version    1.0
 * @package    basetheme
 * @author     gaviasthemes Team     
 * @copyright  Copyright (C) 2016 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */ 
$kunco_options = kunco_get_options();
$kunco_logo = get_template_directory_uri().'/images/logo-white.png';
if(isset($kunco_options['header_logo']['url']) && $kunco_options['header_logo']['url']){
  $kunco_logo = $kunco_options['header_logo']['url'];
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
  <meta name="apple-touch-fullscreen" content="yes"/>
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <div class="wrapper-page header-absolute"> <!--page-->
   <?php do_action( 'kunco_before_header' );  ?>
    
    <header class="header-default header-v3">
      <div class="<?php echo kunco_get_option('stick_menu', '') ?>">
        <?php do_action( 'kunco_header_mobile' ); ?>
        <div class="header-mainmenu hidden-xs hidden-sm">
          
          <?php get_template_part('templates/parts/canvas'); ?>

          <div class="container prelative">
              
            <div class="prelative">
              <div class="row">
              
                <div class="logo col-lg-2 col-md-2">
                  <a class="logo-theme" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url($kunco_logo); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                  </a>
                </div>

                <div class="col-lg-10 col-md-10 pstatic">
                  <div class="header-right">  
                    <div class="content-innter clearfix">
                      <div id="gva-mainmenu" class="pstatic main-menu header-bottom">
                        <?php do_action('kunco_main_menu'); ?>
                      </div>
                    </div>

                    <div class="main-search gva-search">
                      <a class="control-search"><i class="fa fa-search"></i></a>
                      <div class="gva-search-content search-content">
                        <div class="search-content-inner">
                          <div class="content-inner"><?php get_search_form(); ?></div>  
                        </div>  
                      </div>
                    </div> 
                    
                    <div class="mini-cart-header cart-v2">
                      <?php if(kunco_woocommerce_activated()){ ?>
                        <?php  kunco_get_cart_contents(); ?>
                      <?php } ?>  
                    </div>
                  </div>  
                </div> 
          
              </div>  
            </div>  
          </div>
        </div> 
      </div>
    </header>

    <?php do_action( 'kunco_after_header' );  ?>
    <div id="page-content"> <!--page content--> 