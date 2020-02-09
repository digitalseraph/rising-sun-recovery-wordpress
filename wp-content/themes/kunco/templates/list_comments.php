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

$GLOBALS['comment'] = $comment;
$add_below = '';
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

	<div class="the-comment">
		<div class="avatar">
			<?php echo get_avatar($comment, 54); ?>
		</div>

		<div class="comment-box">

			<div class="comment-author meta">
				<strong><?php echo get_comment_author_link() ?></strong>
				<?php printf(esc_html__('%1$s at %2$s', 'kunco'), get_comment_date(),  get_comment_time()) ?></a>
				<?php edit_comment_link(esc_html__(' - Edit', 'kunco'),'  ','') ?>
				<?php comment_reply_link(array_merge( $args, array( 'reply_text' => esc_html__(' - Reply', 'kunco'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>

			<div class="comment-text">
				<?php if ($comment->comment_approved == '0') : ?>
				<em><?php echo esc_html__('Your comment is awaiting moderation.', 'kunco') ?></em>
				<br />
				<?php endif; ?>
				<?php comment_text() ?>
			</div>

		</div>

	</div>
</li>