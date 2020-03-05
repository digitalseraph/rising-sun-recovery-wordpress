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

define( 'KUNCO_THEMER_DIR', get_template_directory() );
define( 'KUNCO_THEME_URL', get_template_directory_uri() );

/*
 * Include list of files from Gavias Framework.
 */
require_once(KUNCO_THEMER_DIR . '/includes/theme-functions.php'); 
require_once(KUNCO_THEMER_DIR . '/includes/template.php'); 
require_once(KUNCO_THEMER_DIR . '/includes/theme-hook.php'); 
require_once(KUNCO_THEMER_DIR . '/includes/theme-layout.php'); 
require_once(KUNCO_THEMER_DIR . '/includes/metaboxes.php'); 
require_once(KUNCO_THEMER_DIR . '/includes/custom-styles.php'); 
require_once(KUNCO_THEMER_DIR . '/includes/menu/megamenu.php'); 
require_once(KUNCO_THEMER_DIR . '/includes/sample/init.php');
// Load visual composer
if( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && class_exists( 'Vc_Manager' ) ){ 
  require_once(KUNCO_THEMER_DIR . '/includes/visualcomposer/vc-register.php'); 
  require_once(KUNCO_THEMER_DIR . '/includes/visualcomposer/vc-theme.php');
  require_once(KUNCO_THEMER_DIR . '/includes/visualcomposer/vc-woo.php'); 
  require_once(KUNCO_THEMER_DIR . '/includes/visualcomposer/vc-portfolio.php'); 
  require_once(KUNCO_THEMER_DIR . '/includes/visualcomposer/vc-give.php'); 
  require_once(KUNCO_THEMER_DIR . '/includes/visualcomposer/vc-event.php');
  require_once(KUNCO_THEMER_DIR . '/includes/visualcomposer/vc-override.php'); 
   
}
//Load Woocommerce
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
  add_theme_support( "woocommerce" );
  require_once(KUNCO_THEMER_DIR . '/includes/woocommerce/functions.php'); 
  require_once(KUNCO_THEMER_DIR . '/includes/woocommerce/hooks.php'); 
}
//Load Give
if( in_array( 'give/give.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
  require_once(KUNCO_THEMER_DIR . '/includes/give/hooks.php'); 
}
// Load Redux - Theme options framework
if( class_exists( 'Redux' ) ){
  require( KUNCO_THEMER_DIR . '/includes/options/options-config.php' ); 
}
// TGM plugin activation
if ( is_admin() ) {
   require( KUNCO_THEMER_DIR . '/includes/tgmpa/config.php' );
}
load_theme_textdomain( 'kunco', get_template_directory() . '/languages' );

//-------- Register sidebar default in theme -----------
//------------------------------------------------------
function kunco_widgets_init() {
    
    register_sidebar( array(
        'name' => esc_html__( 'Default Sidebar', 'kunco' ),
        'id' => 'default_sidebar',
        'description' => esc_html__( 'Appears in the Default Sidebar section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Newsletter Sidebar', 'kunco' ),
        'id' => 'newsletter_sidebar',
        'description' => esc_html__( 'Appears in the Newsletter Sidebar section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Instagram Sidebar', 'kunco' ),
        'id' => 'instagram_sidebar',
        'description' => esc_html__( 'Appears in the Newsletter Sidebar section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Plugin| WooCommerce Sidebar', 'kunco' ),
        'id' => 'woocommerce_sidebar',
        'description' => esc_html__( 'Appears in the Plugin WooCommerce section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Plugin| WooCommerce Single', 'kunco' ),
        'id' => 'woocommerce_single_summary',
        'description' => esc_html__( 'Appears in the WooCommerce Single Page like social, description text ...', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Plugin| Give Sidebar', 'kunco' ),
        'id' => 'give_sidebar',
        'description' => esc_html__( 'Appears in the Give Form Page like social, description text ...', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Portfolio Sidebar', 'kunco' ),
        'id' => 'portfolio_sidebar',
        'description' => esc_html__( 'Appears in the Portfolio Page section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'After Offcanvas Mobile', 'kunco' ),
        'id' => 'offcanvas_sidebar_mobile',
        'description' => esc_html__( 'Appears in the Offcanvas section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Offcanvas Sidebar', 'kunco' ),
        'id' => 'offcanvas_sidebar',
        'description' => esc_html__( 'Appears in the Offcanvas section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'kunco' ),
        'id' => 'blog_sidebar',
        'description' => esc_html__( 'Appears in the Blog sidebar section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Page Sidebar', 'kunco' ),
        'id' => 'other_sidebar',
        'description' => esc_html__( 'Appears in the Page Sidebar section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer first', 'kunco' ),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__( 'Appears in the Footer first section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer second', 'kunco' ),
        'id' => 'footer-sidebar-2',
        'description' => esc_html__( 'Appears in the Footer second section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer third', 'kunco' ),
        'id' => 'footer-sidebar-3',
        'description' => esc_html__( 'Appears in the Footer third section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer four', 'kunco' ),
        'id' => 'footer-sidebar-4',
        'description' => esc_html__( 'Appears in the Footer four section of the site.', 'kunco' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
}
add_action( 'widgets_init', 'kunco_widgets_init' );


if ( ! function_exists( 'kunco_fonts_url' ) ) :
/**
 *
 * @return string Google fonts URL for the theme.
 */
function kunco_fonts_url() {
  $fonts_url = '';
  $fonts     = array();
  $subsets   = '';
  $protocol = is_ssl() ? 'https' : 'http';
  /*
   * Translators: If there are characters in your language that are not supported
   * by Noto Sans, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'kunco' ) ) {
    $fonts[] = 'Open+Sans:400,700';
  }

   if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'kunco' ) ) {
    $fonts[] = 'Poppins:400,500,600,700';
  }
  
  /*
   * Translators: To add an additional character subset specific to your language,
   * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
   */
  $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'kunco' );

  if ( 'cyrillic' == $subset ) {
    $subsets .= ',cyrillic,cyrillic-ext';
  } elseif ( 'greek' == $subset ) {
    $subsets .= ',greek,greek-ext';
  } elseif ( 'devanagari' == $subset ) {
    $subsets .= ',devanagari';
  } elseif ( 'vietnamese' == $subset ) {
    $subsets .= ',vietnamese';
  }

  if ( $fonts ) {
    $fonts_url = add_query_arg( array(
      'family' => ( implode( '%7C', $fonts ) ),
      'subset' => ( $subsets ),
    ),  $protocol.'://fonts.googleapis.com/css' );
  }

  return $fonts_url;
}
endif;

function kunco_custom_styles() {
  $custom_css = get_option( 'kunco_theme_custom_styles' );
  if($custom_css){
    wp_enqueue_style(
      'gva-custom-style',
      get_template_directory_uri() . '/css/custom_script.css'
    );
    wp_add_inline_style( 'gva-custom-style', $custom_css );
  }
}
add_action( 'wp_enqueue_scripts', 'kunco_custom_styles', 9999 );

function kunco_init_scripts(){
  global $post;
  $protocol = is_ssl() ? 'https' : 'http';
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
    wp_enqueue_script( 'comment-reply' );
  }
  $map_api_key = kunco_get_option('map_api_key', ''); 
  $map_scrip_api = $protocol . '://maps.google.com/maps/api/js?key&libraries=places%2Cweather%2Cpanoramio&language=en&ver=4.9.3';
  if($map_api_key){
    $map_scrip_api = $protocol . '://maps.google.com/maps/api/js?key=' . esc_attr($map_api_key);
  }

  wp_enqueue_style( 'kunco-fonts', kunco_fonts_url(), array(), null );
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array('jquery') );
  wp_enqueue_script('countdown', get_template_directory_uri() . '/js/countdown.js' );
  wp_enqueue_script('count-to', get_template_directory_uri() . '/js/count-to.js' ); 
  wp_enqueue_script('appear', get_template_directory_uri() . '/js/jquery.appear.js' );
  wp_enqueue_script('scrollbar', get_template_directory_uri() . '/js/perfect-scrollbar.jquery.min.js');
  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js');
  wp_enqueue_script('magnific', get_template_directory_uri() .'/js/magnific/jquery.magnific-popup.min.js');
  wp_enqueue_script('scroll-to', get_template_directory_uri() . '/js/scroll/jquery.scrollto.js' );
  wp_enqueue_script('waypoint', get_template_directory_uri() . '/js/waypoint.js' );
  wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js' );
  wp_enqueue_script('cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'));
  wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js' );
  wp_enqueue_script('typer', get_template_directory_uri() . '/js/jquery.typer.js' );
  wp_enqueue_script('easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.min.js' );

  wp_enqueue_script('lightgallery', get_template_directory_uri() . '/js/lightgallery/js/lightgallery.min.js' );
  wp_enqueue_style('lightgallery', get_template_directory_uri() . '/js/lightgallery/css/lightgallery.min.css');
  wp_enqueue_style('lightgallery', get_template_directory_uri() . '/js/lightgallery/css/lg-transitions.min.css');

  wp_enqueue_script('kunco-main', get_template_directory_uri() . '/js/main.js');
  wp_enqueue_script('woocommerce-theme', get_template_directory_uri() . '/js/woocommerce.js' );
  wp_register_script('map-ui', get_template_directory_uri() . '/js/jquery.ui.map.min.js');
  wp_register_script('map-api', esc_url($map_scrip_api));

  wp_register_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', array(), '1.0.0');
  wp_register_style('slick', get_template_directory_uri() . '/js/slick/slick.css');

  wp_register_script('uikit', get_template_directory_uri() . '/js/uikit/uikit.js');
  wp_register_script('uikit-slideset', get_template_directory_uri() . '/js/uikit/components/slideset.min.js');

  wp_register_script('modernizr_custom', get_template_directory_uri() . '/js/quotes_rotator/js/modernizr.custom.js');
  wp_register_script('quotes_rotator', get_template_directory_uri() . '/js/quotes_rotator/js/jquery.cbpQTRotator.min.js');

  if(kunco_woocommerce_activated() ){
    wp_dequeue_script('wc-add-to-cart');
    wp_register_script( 'wc-add-to-cart', KUNCO_THEME_URL . '/js/add-to-cart.js' , array( 'jquery' ) );
    wp_enqueue_script('wc-add-to-cart');
  }

  wp_enqueue_style('kunco-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('magnific', get_template_directory_uri() .'/js/magnific/magnific-popup.css');
  wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/js/owl-carousel/assets/owl.carousel.css');
  wp_enqueue_style('icon-custom', get_template_directory_uri() . '/css/icon-custom.css');
  wp_enqueue_style('icon-fontawesome', get_template_directory_uri() . '/css/fontawesome/css/font-awesome.min.css');

  $skin = kunco_get_option('skin_color', '');
  if(isset($_GET['gskin']) && $_GET['gskin']){
      $skin = $_GET['gskin'];
  }
  if(!empty($skin)){
      $skin = 'skins/' . $skin . '/'; 
  }
  wp_enqueue_style('kunco-bootstrap', get_template_directory_uri(). '/css/' . $skin . 'bootstrap.css', array(), '1.0.13' , 'all'); 
  wp_enqueue_style('kunco-woocoomerce', get_template_directory_uri(). '/css/' . $skin . 'woocommerce.css', array(), '1.0.13' , 'all'); 
  wp_enqueue_style('kunco-template', get_template_directory_uri().'/css/' . $skin . 'template.css', array(), '1.0.13' , 'all');
}
add_action('wp_enqueue_scripts', 'kunco_init_scripts', 999);


