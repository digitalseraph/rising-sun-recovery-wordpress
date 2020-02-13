<?php
/**
 * The template for displaying form content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/single-give-form/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Fires in single form template, before the form.
 *
 * Allows you to add elements before the form.
 *
 * @since 1.0
 */
do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}

$show_content = give_get_meta( get_the_ID(), '_give_display_content', true );
$content = wpautop( give_get_meta( get_the_ID(), '_give_form_content', true ) );
$sidebar_option = give_get_option( 'disable_form_sidebar' );

$class_main = 'col-sm-12 col-xs-12';
?>

<div class="content-single-give-form">
	<div class="row">
		<div class="<?php echo esc_attr($class_main) ?>">
			<?php do_action( 'give_before_single_form' ); ?>
			<?php 
				if ( post_password_required() ) {
					echo get_the_password_form();
					return;
				}
			?>	
			<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>
				<div class="single-give-images">
				<?php give_show_form_images() ?>
				<?php get_template_part( 'give/part', 'gallery' ); ?>
      		<?php get_template_part( 'give/part', 'video' ); ?>
				</div>
				<div class="single-give">
					<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'entry-summary' ); ?>">
					<?php
						/**
						 * give_single_form_summary hook
						 *
						 * @hooked give_template_single_title - 5
						 * @hooked give_get_donation_form - 10
						 */
						do_action( 'give_single_form_summary' );
					?>
					</div>	
				</div>
				<!-- .summary -->

				<?php
				/**
				 * give_after_single_form_summary hook
				 */
				do_action( 'give_after_single_form_summary' );
				?>
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>
			</div>	
		</div>

	</div>	
</div>

<?php do_action( 'give_after_single_form' ); ?>
