<?php


/*=============================================================================================================================*/
																			/* COMMENTS */

add_filter('comment_reply_link', 'replace_reply_link_class');


function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='reply", $class);
    return $class;
}




    function format_comment($comment, $args, $depth) {

       $GLOBALS['comment'] = $comment; ?>

        <div <?php comment_class('media'); ?> id="li-comment-<?php comment_ID() ?>">


								<div class="media-left">
									<?php	echo get_avatar( $comment, 50, '', '', array( 'class'=> 'media-object' )); ?>
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h4><?php printf(__('%s'), get_comment_author_link()) ?></h4>
										<span class="time"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></span>
									</div>
									<?php if ($comment->comment_approved == '0') : ?>
			                <p><php _e('Your comment is awaiting moderation.') ?></p><br />
			            <?php endif; ?>

			            <?php comment_text(); ?>

									<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>


					</div>

</div>

<?php }
												/* /COMMENTS */
/*========================================================================================================================= */
?>
