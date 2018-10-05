<?php if( have_comments()){
	
	wp_list_comments();
} ?>
<?php
						$comments_args = array(
													'label_submit'=>'Send',
													'title_reply'=>'post a comment',
													'comment_notes_after'=>''
										);
						comment_form($comments_args);
?>
