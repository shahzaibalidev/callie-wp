<?php if( have_comments()){

	wp_list_comments();
} ?>
<?php
						$fields = array(
									'author' =>
										'<div class="col-md-4"><div class="form-group"><input id="author" name="author" type="text" class="input" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div></div>',

									'email' =>
										'<div class="col-md-4"><div class="form-group"><input id="email" name="email" class="input" type="email" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div></div>',

									'url' =>
										'<div class="col-md-4"><div class="form-group last-field"><input id="url" name="url" class="input" type="text" placeholder="Website" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>'
								);
						$comments_args = array(
													'class_form'=> 'post-reply',
													'title_reply'=>'post a comment',
													'comment_field' => '<div class="col-md-12"><div class="form-group"><textarea id="comment" name="comment" class="input" placeholder="Message" aria-required="true"></textarea></div></div>',
													'label_submit' => 'Submit',
													'submit_button' => '<div class="col-md-12"><div class="form-group"><input name="%1$s" type="submit" id="%2$s" class="primary-button" value="%4$s" /></div></div>',
													'fields' => apply_filters( 'comment_form_default_fields', $fields )
										);
						comment_form($comments_args);
?>
