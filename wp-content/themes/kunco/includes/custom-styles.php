<?php
/* Save custom theme styles */
if ( ! function_exists( 'kunco_custom_styles_save' ) ) :
function kunco_custom_styles_save() {

	$main_font = false;
	$main_font_enabled = ( kunco_get_option('main_font_source', 0) == 0 ) ? false : true;
	if ( $main_font_enabled ) {
		$font_main = kunco_get_option('main_font', '');
		if(isset($font_main['font-family']) && $font_main['font-family']){
			$main_font = $font_main['font-family'];
		}
	}

	$secondary_font = false;
	$secondary_font_enabled = ( kunco_get_option('secondary_font_source', 0) == 0 ) ? false : true;
	if ( $secondary_font_enabled ) {
		$font_second = kunco_get_option('secondary_font', '');
		if(isset($font_second['font-family']) && $font_second['font-family']){
			$secondary_font = $font_second['font-family'];
		}
	}

	ob_start();
?>


/* Typography */
<?php if ( $main_font_enabled && isset($main_font) && $main_font ) : ?>
body,.menu-font-base ul.mega-menu > li > a,.megamenu-main .widget .widget-title,.megamenu-main .widget .widgettitle,.gva-vertical-menu ul.navbar-nav li a,.vc_general.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-panels-container .tabs-list > li > a
{
	font-family:<?php echo esc_attr( $main_font ); ?>,sans-serif;
	font-weight:<?php echo $font_main['font-weight']; ?>;
}
<?php endif; ?>

<?php if ( $secondary_font_enabled && isset($secondary_font) && $secondary_font ) : ?>
h1, h2, h3, h4, h5, h6,.h1, .h2, .h3, .h4, .h5, .h6,
.page-links,#wp-calendar caption,.pager .paginations a,.text-medium,.btn-theme, button, .btn, .btn-white,.btn-inline,input[type*="submit"]:not(.fa),.gva-search,.header-v1 .header-bottom .header-bottom-inner .quick-button a,
.header-v2 .header-bottom .header-bottom-inner .quick-button a,.header-v4 .header-bottom .header-bottom-inner .quick-button a,ul.navbar-nav.gva-nav-menu > li > a, ul.gva-my-account-menu > li > a,.gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li a,
ul.gva-my-account-menu > li > a,.vc_tta.vc_general.vc_tta-tabs-position-left .vc_tta-tab > a,.gsc-icon-box .highlight_content .title,.gsc-heading .sub-title,.gsc-heading .title-desc,.milestone-block .milestone-text,.pricing-table .plan-name .title,.gsc-call-to-action .title,
.gsc-box-hover .backend .box-title,.gsc-box-hover .box-title,.rotate-text .primary-text,.gsc-quotes-rotator .cbp-qtrotator .cbp-qtcontent .content-title,.gsc-service-box .content-inner .title,.gsc-job-box .content-inner .job-type,.gsc-job-box .content-inner .title,.gsc-box-color .box-content .box-title,
.gsc-box-color .box-content .link,.widget_recent_comments ul li,.widget[class*="instagram-feed"] .widget-title span,.widget_categories ul > li > a, .widget_archive ul > li > a, .sidebar .widget_nav_menu ul > li > a, .widget_pages ul > li > a, .widget_meta ul > li > a,.widget_rss ul > li a, .widget_recent_entries ul > li a,
.widget_pages ul > li > a,.widget_gva_give_categories_widget ul.categories-listing li > a,.widget_gva_give_categories_widget ul.categories-listing li .post-count,.post .entry-title,.post .entry-meta,.single.single-post #wp-content > article.post .content-top.entry-meta,.post-navigation a,.event-block .event-content .event-info .title,
.event-block .event-content .event-info .address,.portfolio-v1 .content-inner .title a,.portfolio-filter ul.nav-tabs > li > a,.single-portfolio .portfolio-content .portfolio-information ul li .label,.give-block .form-image .content-action .link,.give-block .form-content .campaign-information > div .c-label,.give-block .form-content .campaign-information .campaign-raised,
.give-block .form-content .campaign-information .funded .pie-label,.give-block .form-content .campaign-information .campaign-goal,.give-block-2 .campaign-information > div .c-label,.give-block-2 .campaign-information .campaign-raised,.give-block-2 .campaign-information .campaign-goal,.give-block-3 .campaign-information > div .c-label,.give-block-3 .campaign-information .campaign-raised,
.give-block-3 .campaign-information .campaign-goal,.gives-form-carousel-2 .tab-carousel-nav .link-service,.gives-form-carousel-2 .tab-carousel-nav .link-service .cat-links a,.gives-form-carousel-3 .tab-carousel-nav .link-service,.gives-form-carousel-3 .tab-carousel-nav .link-service .cat-links a,.content-single-give-form .give-goal-progress,.content-single-give-form form[id*=give-form].give-form .give-donation-levels-wrap li button,
.testimonial-node-1 .testimonial-content .quote,.testimonial-node-1 .testimonial-content .info .right .title,.testimonial-node-2 .testimonial-content .quote,.testimonial-node-2 .testimonial-content .info .right .title,.team-block.team-v1 .team-name,.team-block.team-v2 .team-content .team-name,#comments .nav-links .nav-previous a,#comments .nav-links .nav-next a,#comments #add_review_button,
#comments #submit,#comments ol.comment-list .vcard .fn,.custom-breadcrumb .breadcrumb,.title-layout-standard .custom-breadcrumb .breadcrumb-main .container .back-to-home
{
	font-family:<?php echo esc_attr( $secondary_font ); ?>,sans-serif;
	font-weight:<?php echo $font_second['font-weight']; ?>;
}
<?php endif; ?>

/* ----- Main Color ----- */
<?php if($style = kunco_get_option('main_color', '')){ ?>
	body{
		color:<?php echo esc_attr($style) ?>;
	}
<?php } ?>

/* ----- Background body ----- */
<?php 
	$main_background = kunco_get_option('main_background_image', '');
	if(isset($main_background['url']) && $main_background['url']){
?>
body{
	<?php if ( strlen( $main_background['url'] ) > 0 ) : ?>
	background-image:url("<?php echo esc_url( $main_background['url'] ); ?>");
	<?php if ( kunco_get_option('main_background_image_type', '') == 'fixed' ) : ?>
	background-attachment:fixed;
	background-size:cover;
	<?php else : ?>
	background-repeat:repeat;
	background-position:0 0;
	<?php endif; endif; ?>
	background-color:<?php echo esc_attr( kunco_get_option('main_background_color', '') ); ?>;
}
<?php } ?>


/* ----- Top bar ----- */
<?php if(kunco_get_option('top_bar_background_color', '')){ ?>
.topbar{
	background:<?php echo esc_attr( kunco_get_option('top_bar_background_color', '') ); ?>;
}
<?php } ?>

<?php if(kunco_get_option('top_bar_background_color', '')){ ?>
.topbar{
	color: <?php echo esc_attr( kunco_get_option('top_bar_font_color', '') ); ?>;
}
<?php } ?>	

/* ----- Header ---- */
<?php if(kunco_get_option('header_background_color', '')){ ?>
header, header .header-main, header .main-header-inner, .header-v2 .header-top{
	background: <?php echo esc_attr( kunco_get_option('header_background_color', '') ); ?>!important;
}
<?php } ?>	

<?php if(kunco_get_option('header_font_color', '')){ ?>
header{
	color: <?php echo esc_attr( kunco_get_option('header_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(kunco_get_option('header_font_color_link', '')){ ?>
header a{
	color: <?php echo esc_attr( kunco_get_option('header_font_color_link', '') ); ?>;
}
<?php } ?>	

<?php if(kunco_get_option('header_font_color_link_hover', '')){ ?>
header a:hover, header a:focus, header a:active{
	color: <?php echo esc_attr( kunco_get_option('header_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

/* ----- Menu ----- */ 

<?php if(kunco_get_option('menu_background_color', '')){ ?> 
.header-mainmenu, .header-v1 .header-bottom, .header-v2 .header-bottom, .header-v4 .header-bottom, .header-v4 .header-bottom .header-bottom-inner{
	background: <?php echo esc_attr( kunco_get_option('menu_background_color', '') ); ?>!important;
}
<?php } ?>	

<?php if(kunco_get_option('menu_font_color', '')){ ?>
ul.gva-main-menu{
	color: <?php echo esc_attr( kunco_get_option('menu_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(kunco_get_option('menu_font_color_link', '')){ ?>
ul.gva-main-menu > li > a, .menu-light-style .gva-nav-menu > li > a{
	color: <?php echo esc_attr( kunco_get_option('menu_font_color_link', '') ); ?>!important;
}
<?php } ?>	

<?php if(kunco_get_option('menu_font_color_link_hover', '')){ ?>
ul.gva-main-menu > li > a:hover, ul.gva-main-menu > li > a:focus, ul.gva-main-menu > li > a:active{
	color: <?php echo esc_attr( kunco_get_option('menu_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

<?php if(kunco_get_option('menu_sub_background_color', '')){ ?>
ul.gva-main-menu .submenu-inner {
	background: <?php echo esc_attr( kunco_get_option('menu_sub_background_color', '') ); ?>!important;
}
<?php } ?>	

<?php if(kunco_get_option('menu_sub_font_color', '')){ ?>
ul.gva-main-menu .submenu-inner {
	color: <?php echo esc_attr( kunco_get_option('menu_sub_font_color', '') ); ?>;
}
<?php } ?>	

<?php if(kunco_get_option('menu_sub_font_color_link', '')){ ?>
ul.gva-main-menu .submenu-inner a {
	color: <?php echo esc_attr( kunco_get_option('menu_sub_font_color_link', '') ); ?>;
}
<?php } ?>	

<?php if(kunco_get_option('menu_sub_font_color_link_hover', '')){ ?>
ul.gva-main-menu .submenu-inner a:hover, ul.gva-main-menu .submenu-inner a:active, ul.gva-main-menu .submenu-inner a:focus {
	color: <?php echo esc_attr( kunco_get_option('menu_sub_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>	

/* ----- Main content ----- */
<?php if(kunco_get_option('content_background_color', '')){ ?>
div.page {
	background: <?php echo esc_attr( kunco_get_option('content_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(kunco_get_option('content_font_color', '')){ ?>
div.page {
	color: <?php echo esc_attr( kunco_get_option('content_font_color', '') ); ?>;
}
<?php } ?>

<?php if(kunco_get_option('content_font_color_link', '')){ ?>
div.page a{
	color: <?php echo esc_attr( kunco_get_option('content_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(kunco_get_option('content_font_color_link_hover', '')){ ?>
div.page a:hover, div.page a:active, div.page a:focus {
	color: <?php echo esc_attr( kunco_get_option('content_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

/* ----- Footer content ----- */
<?php if(kunco_get_option('footer_background_color', '')){ ?>
#wp-footer {
	background: <?php echo esc_attr( kunco_get_option('footer_background_color', '') ); ?>!important;
}
<?php } ?>

<?php if(kunco_get_option('footer_font_color', '')){ ?>
#wp-footer {
	color: <?php echo esc_attr( kunco_get_option('footer_font_color', '') ); ?>;
}
<?php } ?>

<?php if(kunco_get_option('footer_font_color_link', '')){ ?>
#wp-footer a{
	color: <?php echo esc_attr( kunco_get_option('footer_font_color_link', '') ); ?>;
}
<?php } ?>

<?php if(kunco_get_option('footer_font_color_link_hover', '')){ ?>
#wp-footer a:hover, #wp-footer a:active, #wp-footer a:focus {
	background: <?php echo esc_attr( kunco_get_option('footer_font_color_link_hover', '') ); ?>!important;
}
<?php } ?>

<?php
	$styles = ob_get_clean();
	
    $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
	
	$styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
		
	update_option( 'kunco_theme_custom_styles', $styles, true );
}
endif;

add_action( 'redux/options/kunco_theme_options/saved', 'kunco_custom_styles_save' );


/* Make sure custom theme styles are saved */
function kunco_custom_styles_install() {
	if ( ! get_option( 'kunco_theme_custom_styles' ) && get_option( 'kunco_theme_options' ) ) {
		kunco_custom_styles_save();
	}
}

add_action( 'redux/options/kunco_theme_options/register', 'kunco_custom_styles_install' );
