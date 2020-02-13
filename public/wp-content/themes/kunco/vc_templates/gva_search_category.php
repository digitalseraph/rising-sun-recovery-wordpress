<?php 
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
?>
<div class="widget-search-category <?php echo esc_attr( $el_class ); ?> <?php echo esc_attr( $color ) ?>">
<?php echo kunco_categories_searchform(); ?>
</div>