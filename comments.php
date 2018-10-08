<?php
		if( have_comments() ):
		//We have comments
	?>
	<div class="section-title">
		<h3 class="title"><?php comments_number(); ?></h3>
	</div>

	<ol class="commentlist">
	    <?php wp_list_comments('type=comment&callback=format_comment'); ?>
	</ol>




	<?php
		if( !comments_open() && get_comments_number() ):
	?>



	<?php
		endif;
	?>

	<?php
		endif;
	?>


<!-- post add comments form -->

<?php
					/* Comment Form section */
						$fields = array(
									'author' =>
										'<div class="col-md-4"><div class="form-group"><input id="author" name="author" type="text" class="input" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div></div>',

									'email' =>
										'<div class="col-md-4"><div class="form-group"><input id="email" name="email" class="input" type="email" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div></div>',

									'url' =>
										'<div class="col-md-4"><div class="form-group last-field"><input id="url" name="url" class="input" type="text" placeholder="Website" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>'
								);
						$comments_args = array(
													'title_reply'=>'LEAVE A REPLY',

													'title_reply_before' => '<div class="section-title"><h3 id="reply-title" class="title">',

													'title_reply_after' => '</h3></div>',

													'class_form'=> 'post-reply',

													'comment_notes_before' => '',
													/*
													'comment_notes_after' => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
													*/
													'comment_field' => '<div class="row"><div class="col-md-12"><div class="form-group"><textarea id="comment" name="comment" class="input" placeholder="Message" aria-required="true"></textarea></div></div>',

													'label_submit' => 'Submit',

													'submit_button' => '<div class="col-md-12"><div class="form-group"><input name="%1$s" type="submit" id="%2$s" class="primary-button" value="%4$s" /></div></div></div>',

													'fields' => apply_filters( 'comment_form_default_fields', $fields )
										);
						comment_form($comments_args);
?>
<!-- /post add comments form -->
