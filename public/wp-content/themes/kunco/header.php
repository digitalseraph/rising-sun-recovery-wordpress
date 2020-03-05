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
$kunco_logo = get_template_directory_uri().'/images/logo.png';
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
  <div class="wrapper-page"> <!--page-->
    <?php do_action( 'kunco_before_header' );  ?>
    
    <header class=" header-default header-v1">
      
      <?php do_action( 'kunco_header_mobile' ); ?>

      <div class="header-top hidden-xs hidden-sm">
        <div class="container"> 
          <div class="main-header-inner clearfix">
            <div class="logo">
              <a class="logo-theme" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url($kunco_logo); ?>" alt="<?php bloginfo( 'name' ); ?>" />
              </a>
            </div>
            <div class="quick-menu">
              <?php do_action( 'kunco_my_account_menu' ); ?>
            </div>
            <div class="header-right">
              <?php 
                $has_woocommerce = '';
                if(kunco_woocommerce_activated()){ 
                  $has_woocommerce = 'has-woocommerce';
                }  
              ?>
              <div class="main-search gva-search quick-search <?php echo esc_attr($has_woocommerce) ?>">
                <div class="search-content-inner">
                  <div class="content-inner"><?php get_search_form(); ?></div>  
                </div>
              </div>
              
              <div class="mini-cart-header cart-v2">
                <?php if($has_woocommerce){ ?>
                  <?php  kunco_get_cart_contents(); ?>
                <?php } ?>  
              </div> 
            </div>
          </div>
        </div>
      </div>

      <div class="hidden-xs hidden-sm <?php echo kunco_get_option('stick_menu', '') ?>">
        <div class="header-bottom">
          <?php get_template_part('templates/parts/canvas'); ?>
          <div class="container">
            <div class="header-bottom-inner">
              <div class="main-menu-inner">
                <div class="content-innter clearfix">
                  <div id="gva-mainmenu" class="main-menu">
                    <?php do_action('kunco_main_menu'); ?>
                  </div>
                </div> 
              </div> 
              <?php if($link_quick_button = kunco_get_option('link_quick_button', '')){ ?>
                <div class="quick-button">
                  <a href="<?php echo esc_url($link_quick_button) ?>"><?php echo kunco_get_option( 'link_quick_text', 'Donate Now' ) ?></a>
                </div> 
              <?php } ?>
            </div>
          </div>  
        </div>
      </div> 

    </header>
    <?php do_action( 'kunco_after_header' );  ?>
    
    <div id="page-content"> <!--page content-->
      