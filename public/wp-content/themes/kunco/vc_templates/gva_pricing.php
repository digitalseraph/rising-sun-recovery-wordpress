<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if($featured){ $el_class .= 'highlight-plan'; }
?>
<div class="pricing-table <?php echo esc_attr($el_class) ?>">
   <div class="content-inner">
      <?php if($featured){ ?><div class="featured-label"><?php echo esc_html__( 'Recommended Plan', 'kunco' ); ?></div><?php } ?>
      <div class="content-wrap">
         <div class="plan-name"><span class="title"><?php echo esc_html( $title ); ?></span></div>
         <div class="plan-price">
            <div class="price-value clearfix">
               <span class="dollar" itemprop="priceCurrency"><?php echo esc_html( $currency ) ?></span>
               <span class="value" itemprop="price"><?php echo esc_html( $price ); ?></span>
               <span class="interval"><span class="space">/<span><?php echo esc_html( $period ); ?></span>
            </div>
         </div>

         <?php if($content){ ?>
            <div class="plan-list">
               <?php echo wp_kses( $content, true ) ?>
            </div>
         <?php } ?>   

         <?php if($link){ ?>
            <div class="plan-signup">
               <a class="btn-theme" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $link_title ) ?></a>
            </div>
         <?php } ?>  
      </div> 
   </div>      
</div>