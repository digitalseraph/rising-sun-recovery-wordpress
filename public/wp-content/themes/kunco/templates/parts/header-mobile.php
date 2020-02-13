<?php $kunco_options = kunco_get_options(); ?>

<div class="header-mobile hidden-lg hidden-md gv-sticky-mobile">
  <div class="container">
    <div class="row"> 
     
      <div class="left col-xs-3">
         <?php get_template_part('templates/parts/canvas-mobile'); ?>
      </div>

      <div class="center text-center col-xs-6">
        <div class="logo-menu">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo ((isset($kunco_options['header_logo_mobile']['url']) && $kunco_options['header_logo_mobile']['url']) ? $kunco_options['header_logo_mobile']['url'] : get_template_directory_uri().'/images/logo-mobile.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          </a>
        </div>
      </div>

        <div class="right col-xs-3">
          <?php if(kunco_woocommerce_activated()){ ?>
            <div class="mini-cart-header">
              <?php if(kunco_woocommerce_activated()){ ?>
                <?php  kunco_get_cart_contents(); ?>
              <?php } ?>  
            </div>
          <?php } ?>
          <div class="main-search gva-search">
            <a class="control-search"><i class="fa fa-search"></i></a>
            <div class="gva-search-content search-content">
              <div class="search-content-inner">
                <div class="content-inner"><?php get_search_form(); ?></div>  
              </div>  
            </div>
          </div>
        </div> 
       
    </div>  
  </div>  
</div>