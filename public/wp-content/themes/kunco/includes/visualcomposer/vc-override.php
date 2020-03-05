<?php

/**
*	Remove parameters for vc
*/
vc_remove_param('vc_tta_accordion', 'style');
vc_remove_param('vc_tta_accordion', 'shape');
vc_remove_param('vc_tta_accordion', 'color');
vc_remove_param('vc_tta_accordion', 'no_fill');
vc_remove_param('vc_tta_accordion', 'spacing');
vc_remove_param('vc_tta_accordion', 'gap');
vc_remove_param('vc_tta_accordion', 'c_align');
vc_remove_param('vc_tta_accordion', 'c_position');

vc_remove_param('vc_tta_tour', 'style');
vc_remove_param('vc_tta_tour', 'shape');
vc_remove_param('vc_tta_tour', 'color');
vc_remove_param('vc_tta_tour', 'spacing');
vc_remove_param('vc_tta_tour', 'gap');
vc_remove_param('vc_tta_tour', 'no_fill_content_area');
vc_remove_param('vc_tta_tour', 'controls_size');
vc_remove_param('vc_tta_tour', 'pagination_style');
vc_remove_param('vc_tta_tour', 'pagination_color');
vc_remove_param('vc_tta_tour', 'alignment');

vc_remove_param('vc_tta_tabs', 'shape');
vc_remove_param('vc_tta_tabs', 'style');
vc_remove_param('vc_tta_tabs', 'color');
vc_remove_param('vc_tta_tabs', 'alignment');
vc_remove_param('vc_tta_tabs', 'no_fill_content_area');
vc_remove_param('vc_tta_tabs', 'spacing');
vc_remove_param('vc_tta_tabs', 'gap');
vc_remove_param('vc_tta_tabs', 'pagination_style');
vc_remove_param('vc_tta_tabs', 'pagination_color');
if( function_exists('vc_remove_element') ){ 
	vc_remove_element('vc_masonry_media_grid');
	vc_remove_element('vc_masonry_grid');
	vc_remove_element('vc_media_grid');
	vc_remove_element('vc_tabs');
	vc_remove_element('vc_tour');
	vc_remove_element('vc_accordion');
}

function kunco_init_vc_register(){
	if(kunco_woocommerce_activated()){
		$vendor = new Kunco_Visualcomposer_Woo();
		add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	}
	
	$vendor = new Kunco_Visualcomposer_Theme();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	$vendor = new Kunco_Visualcomposer_Portfolio();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	$vendor = new Kunco_VisualComposer_Give();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	$vendor = new Kunco_Visualcomposer_Event();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );

}
add_action( 'after_setup_theme', 'kunco_init_vc_register' , 90 );   

/**
 * Add parameters for row
 */
if(!function_exists('kunco_add_params_vc')){
	function kunco_add_params_vc(){
		vc_add_param( 'vc_row', array(
		   "type" => "textfield",
		   "heading" => esc_html__("Extra class name inner", 'kunco'),
		   "param_name" => "el_class_inner",
		));

		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Layout Setting", 'kunco'),
		   "param_name" => "fullwidth",
		   "value" => array(
				esc_html__('Boxed', 'kunco') => '1',
				esc_html__('Wide - Full Width', 'kunco') => '0'
			)
		));

		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Style Space", 'kunco'),
		   "param_name" => "row_space",
		   "value" => array(
		   	esc_html__('-- Default --', 'kunco') 										=> '',
				esc_html__('Remove padding top', 'kunco') 								=> 'remove_padding_top',
				esc_html__('Remove padding bottom', 'kunco') 							=> 'remove_padding_bottom',
				esc_html__('Remove padding for row', 'kunco') 							=> 'remove_padding',
				esc_html__('Remove padding for colums of row', 'kunco') 				=> 'remove_padding_col',
				esc_html__('Remove padding for [colums, row]', 'kunco') 				=> 'remove_margin remove_padding remove_padding_col',
				esc_html__('Padding Large', 'kunco') 										=> 'padding-large',
				esc_html__('Padding Medium', 'kunco') 										=> 'padding-medium',
				esc_html__('Padding Small', 'kunco') 										=> 'padding-small',
				esc_html__('Padding Top Large, Remore Padding Bottom', 'kunco') 	=> 'padding-top-large',
				esc_html__('Padding Bottom Large', 'kunco') 								=> 'padding-bottom-large',
				esc_html__('Padding Row 120px, Responsive', 'kunco') 				=> 'padding-row-120',
			)
		));

		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Custom Background", 'kunco'),
		   "param_name" => "custom_background",
		   "value" => array(
		   	esc_html__('-- None --', 'kunco') 						=> '',
				esc_html__('Background Of Theme', 'kunco') 			=> 'bg-theme',
				esc_html__('Background Of Theme Second', 'kunco') 	=> 'bg-theme-2',
				esc_html__('Background Dark', 'kunco') 				=> 'bg-dark',
				esc_html__('Background Position Center', 'kunco') 	=> 'bg-center',
				esc_html__('Background Position Left', 'kunco') 	=> 'bg-left',
				esc_html__('Background Position Right', 'kunco') 	=> 'bg-right',
				esc_html__('Background Position Bottom', 'kunco') 	=> 'bg-bottom',
			)
		));
	}
}
add_action( 'after_setup_theme', 'kunco_add_params_vc', 99 );
 

if(!function_exists('kunco_override_vc_bootstrap')){
	function kunco_override_vc_bootstrap( $class_string,$tag ){
		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
			$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
		}
		return $class_string;
	}
}
add_filter( 'vc_shortcodes_css_class', 'kunco_override_vc_bootstrap', 10, 2);


