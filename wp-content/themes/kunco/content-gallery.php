<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @package    basetheme
 * @author     gaviasthemes Team     
 * @copyright  Copyright (C) 2016 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
?>
<?php 
	$thumbnail = 'post-thumbnail';
	if(isset($thumbnail_size) && $thumbnail_size){
		$thumbnail = $thumbnail_size;
	}
	if(is_single()){
		$thumbnail = 'full';
	}
	if(!isset($excerpt_words)){
    	$excerpt_words = kunco_get_option('blog_excerpt_limit', 20);
  	}
?>
<article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class(); ?>>
	
	<?php if ( is_single() ){ ?>
		<div class="content-top entry-meta">
        	<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){ ?>
            <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kunco' ) ); ?></span>
            <span class="line"></span>
         <?php } ?>
         <?php kunco_posted_on(); ?>
      </div> 
		<h1 class="entry-title"><?php echo the_title() ?></h1>
	<?php } ?>

	<div class="post-thumbnail">
		<?php
			$image_gallery_val = get_post_meta( get_the_ID(), 'kunco_thumbnail_gallery' , false );
			?>
			<?php if($image_gallery_val && is_array($image_gallery_val) && count($image_gallery_val>0)){ ?>
				<div class="blog-gallery">
					<div class="init-carousel-owl owl-carousel" data-items="1"  data-nav="true" >
						<?php
						foreach($image_gallery_val as $gimg_id): ?>
							<div class="item text-center">
								<a href="<?php echo esc_url(get_the_permalink()); ?>">
									<?php echo wp_get_attachment_image( $gimg_id, $thumbnail ); ?>
								</a>
							</div>
						<?php endforeach;
						?>
					</div>
				</div>
			<?php }else{
				the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) );
			} ?>
	</div>	

	<div class="entry-content">
		<div class="content-inner">
			<?php if(!is_single()){ ?>
				<div class="content-top entry-meta">
	           	<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ){ ?>
                  <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'kunco' ) ); ?></span>
                  <span class="line"></span>
               <?php } ?>
               <?php kunco_posted_on(); ?>
	         </div> 
	         <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
	      <?php } ?>	

			<?php if(is_single()){
				the_content( sprintf(
					esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kunco' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'kunco' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			
			}else{
				echo kunco_limit_words( $excerpt_words, get_the_excerpt(), get_the_content() );
			}
			?>
		</div>
		<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
      <div class="read-more hidden"><a class="btn-theme" href="<?php echo esc_url( get_permalink() ) ?>"><?php echo esc_html__( 'Read more ', 'kunco' ) ?></a></div>
		
	</div><!-- .entry-content -->	

</article><!-- #post-## -->
