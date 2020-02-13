<?php
if(!function_exists('kunco_give_breadcrumb')){
   function kunco_give_breadcrumb(){
      $result = kunco_style_breadcrumb();
      extract($result);
      if(isset($no_breadcrumbs) && $no_breadcrumbs == true){
         echo '<div class="disable-breadcrumb clearfix"></div>';
         return false;
      }
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
   add_action( 'kunco_give_before_main_content', 'kunco_give_breadcrumb', 20 );
}

function kunco_give_change_posts_per_page( $query ) {
   if ( is_admin() || ! $query->is_main_query() ) {
      return;
   }
   $posts_per_page = kunco_get_option('give_posts_per_page', 6);
   if ( is_post_type_archive( 'give_forms' ) ) {
      $query->set( 'posts_per_page', $posts_per_page );
   }
}
add_filter( 'pre_get_posts', 'kunco_give_change_posts_per_page' );