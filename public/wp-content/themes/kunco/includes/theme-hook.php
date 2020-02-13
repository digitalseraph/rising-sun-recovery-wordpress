<?php
add_filter( 'max_srcset_image_width', 'kunco_max_srcset_image_width' );
function kunco_max_srcset_image_width(){
  return 1;
}
/**
 * Hook to before breadcrumb
 */
function kunco_style_breadcrumb(){
  global $post;
  $post_id = kunco_id();
  $result['page_title_style'] = '';
  $result['title'] = '';
  $result['styles'] = '';
  $result['styles_overlay'] = '';
  $result['classes'] = '';

  $show_no_breadcrumbs = kunco_get_option('enable_breadcrumb', 'enable') == 'disable' ? true : false;
  if(get_post_meta($post_id, 'kunco_no_breadcrumbs', true) == true){
    $show_no_breadcrumbs = true;
  }
  $show_page_title = get_post_meta($post_id, 'kunco_page_title', true);
  $page_title_style = get_post_meta($post_id, 'kunco_page_title_style', true );
  $page_title_one = get_post_meta($post_id, 'kunco_page_title_one', true);
  $bg_color_title = get_post_meta($post_id, 'kunco_bg_color_title', true);
  $bg_opacity_title = get_post_meta($post_id, 'kunco_bg_opacity_title', true);
  $page_title_image = get_post_meta( $post_id, 'kunco_page_title_image', true );
  $page_title_text_style = get_post_meta($post_id, 'kunco_page_title_text_style', true );
  $page_title_text_align = get_post_meta($post_id, 'kunco_page_title_text_align', true);

  if ( metadata_exists( 'post', $post_id, 'kunco_page_title' ) || is_archive()) {
    $show_page_title = true;

  }

  //Breadcrumb category and tag products
  if(kunco_woocommerce_activated() && (is_product_tag() || is_product_category() || is_shop()) ){
    $show_page_title = kunco_get_option('woo_show_page_heading', true);
    $page_title_style = kunco_get_option('woo_page_heading_style', 'standard' ); 
    $bg_color_title = kunco_get_option('woo_page_heading_background_color', ''); 
    $bg_opacity_title = kunco_get_option('woo_page_heading_bg_opacity_title', 0);
    $page_title_image = kunco_get_option('woo_page_heading_image', array('id'=> 0));
    $page_title_text_style = kunco_get_option('woo_page_heading_text_style', 'text-light');
    $page_title_text_align = kunco_get_option('woo_page_heading_text_align', 'text-center');
    if(isset($page_title_image['id']) && $page_title_image['id']){
      $page_title_image = $page_title_image['id'];
    }else{
      $page_title_image = '';
    }
  }

  if(isset($_GET['hst']) && $_GET['hst']){
    $page_title_style = $_GET['hst'];
  } 


  $result = array();
  $styles = array();
  $styles_overlay = '';
  $classes = array();
  $title = '';
  if($show_no_breadcrumbs){
    $result['no_breadcrumbs'] = true;
  }

  if(isset($show_page_title) || $show_page_title){
    $title = get_the_title();
    
    if(is_archive()) $title = single_cat_title('', false);


    if(kunco_woocommerce_activated() && is_shop()){
      $title = woocommerce_page_title(false);
    }
    if($page_title_one){
       $title = $page_title_one;
    }   
  }
  if(is_home()) {
    $show_page_title = true;
    $title = esc_html__( 'Latest posts', 'kunco' );
  }

  if(empty($page_title_text_align)) $page_title_text_align = 'text-center';
  if(empty($page_title_text_style)) $page_title_text_style = 'text-light';
  if(empty($page_title_style)) $page_title_style = 'hero';

  if($page_title_style == 'hero' || $page_title_style == 'standard'){  //Style when title style hero
      if($bg_color_title){
         $rgba_color = kunco_convert_hextorgb($bg_color_title);
         $styles_overlay = 'background-color: rgba(' . esc_attr($rgba_color['r']) . ',' . esc_attr($rgba_color['g']) . ',' . esc_attr($rgba_color['b']) . ', ' . ($bg_opacity_title/100) . ')';
      }
      //Classes
      $classes[] = $page_title_style;
      $classes[] = $page_title_text_style;
      $classes[] = $page_title_text_align;
      $image_background_breadcrumb = get_template_directory_uri() . '/images/bg-header.jpg';
      if(!$page_title_image){
        $page_title_image = kunco_get_option('breadcrumb_background_image_default', array('id'=> 0));
      }
      if($page_title_image){
        if(isset($page_title_image['id']) && $page_title_image['id'] && !is_numeric($page_title_image)){
          if($page_title_image['id'] && is_numeric($page_title_image['id'])){
            $page_title_image = $page_title_image['id'];
          }
        }
        $image = wp_get_attachment_image_src( $page_title_image, 'full');
        if(isset($image[0]) && $image[0]){
          $image_background_breadcrumb = esc_url($image[0]);
        }
      }
      $styles[] = 'background-image: url(\'' . $image_background_breadcrumb . '\')';
   }

   $result['page_title_style'] = $page_title_style;
   $result['title'] = $title;
   $result['styles'] = $styles;
   $result['styles_overlay'] = $styles_overlay;
   $result['classes'] = $classes;
   $result['show_page_title'] = $show_page_title;
   return $result;

}

function kunco_breadcrumb(){
   $result = kunco_style_breadcrumb();
   extract($result);
   if(isset($no_breadcrumbs) && $no_breadcrumbs == true){
    echo '<div class="disable-breadcrumb clearfix"></div>';
    return false;
   }
    $image_breadcumb_standard = kunco_get_option('image_breadcumb_standard', 'show-bg');
    $classes[] = $image_breadcumb_standard;
   ?>
   
   <div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>
      <?php if($styles_overlay){ ?>
         <div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
      <?php } ?>
      <div class="breadcrumb-main">
        <div class="container">
          <?php if($title && $show_page_title){ 
            echo '<h2 class="heading-title">' . esc_html( $title ) . '</h2>';
          } ?>
          <?php kunco_general_breadcrumbs(); ?>
          <div class="hidden back-to-home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back To Home', 'kunco' ) ?></a></div>
        </div>   
      </div>  
   </div>
   <?php
}

add_action( 'kunco_before_page_content', 'kunco_breadcrumb', '10' );


/**
 * Hook to select header of page
 */
function kunco_get_header_layouts( $header='' ){

  $pid = kunco_id();
  $header = (get_post_meta( $pid, 'kunco_page_header', true )) ? get_post_meta( $pid, 'kunco_page_header', true ) : '';
  
  if ( $header == 'default-option-theme' || empty($header)){
    $header = kunco_get_option('header_layout', '');
  }else{
    return trim( $header );
  }

  if($header=='v__'){
    $header ='';
  }

  return $header;
} 
add_filter( 'kunco_get_header_layout', 'kunco_get_header_layouts' );

/**
 * Hook to select footer of page
 */
function kunco_get_footer_layout( $footer = '' ){
  $post = get_post();
  
  $footer = ($post && get_post_meta( $post->ID, 'kunco_page_footer', true )) ? get_post_meta( $post->ID, 'kunco_page_footer', true ) : 'default-option-theme';
  
  if ( $footer == 'default-option-theme'){
    $footer = kunco_get_option('footer_layout', '');
  }else{
    return trim( $footer );
  }
  return $footer;
} 
add_filter( 'kunco_get_footer_layout', 'kunco_get_footer_layout' );

function kunco_main_menu(){
  if(has_nav_menu( 'primary' )){
    $kunco_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-main-menu',
      'menu_class'        => 'nav navbar-nav gva-nav-menu gva-main-menu',
      'walker'            => new kunco_Walker()
    );
    wp_nav_menu($kunco_menu);
  }  
}
add_action( 'kunco_main_menu', 'kunco_main_menu', 10 );
 
function kunco_mobile_menu(){
  if(has_nav_menu( 'primary' )){
    $kunco_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-mobile-menu',
      'menu_class'        => 'nav navbar-nav gva-nav-menu gva-mobile-menu',
      'walker'            => new kunco_Walker()
    );
    wp_nav_menu($kunco_menu);
  }  
}
add_action( 'kunco_mobile_menu', 'kunco_mobile_menu', 10 );

function kunco_my_account_menu(){
  if(has_nav_menu( 'my_account' )){
    $kunco_menu = array(
      'theme_location'    => 'my_account',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-my-account-menu',
      'menu_class'        => 'nav navbar-nav gva-my-account-menu',
      'walker'            => new kunco_Walker()
    );
    wp_nav_menu($kunco_menu);
  }  
}
add_action( 'kunco_my_account_menu', 'kunco_my_account_menu', 11 );

function kunco_header_mobile(){
  get_template_part('templates/parts/header', 'mobile');
}
add_action('kunco_header_mobile', 'kunco_header_mobile', 10);


if ( !function_exists( 'kunco_style_footer' ) ) {
  function kunco_style_footer(){
    $footer = kunco_get_footer_layout(''); 
    
    if($footer!='default'){
      $shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
      if ( ! empty( $shortcodes_custom_css ) ) {
        echo '<style>
          '.$shortcodes_custom_css.'
          </style>';
      }
    }
  }
  add_action('wp_head','kunco_style_footer', 18);
}

function kunco_setup_admin_setting(){
  global $pagenow; 
  if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
    update_option( 'gaviasthemer_active_post_types', array() );
    update_option( 'thumbnail_size_w', 180 );  
    update_option( 'thumbnail_size_h', 180 );  
    update_option( 'thumbnail_crop', 1 );  
    update_option( 'medium_size_w', 750 );  
    update_option( 'medium_size_h', 510 ); 
    update_option( 'medium_crop', 1 );  
  }
}
add_action( 'init', 'kunco_setup_admin_setting'  );

if ( !function_exists( 'kunco_page_class_names' ) ) {
  function kunco_page_class_names( $classes ) {
    $class_el = get_post_meta( kunco_id(), 'kunco_extra_page_class', true  );
    if($class_el) $classes[] = $class_el;
    return $classes;
  }
}
add_filter( 'body_class', 'kunco_page_class_names' );

