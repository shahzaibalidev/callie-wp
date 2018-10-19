<?php
	//Admin Panel
	require get_template_directory(). '/adminpanel/function-admin.php';
	// Functions Files.
	require get_template_directory(). '/includes/functions/callie_style.php';
	require get_template_directory(). '/includes/functions/callie_posts_functions.php';
	require get_template_directory(). '/includes/functions/callie_comments.php';
	require get_template_directory(). '/includes/functions/callie_widgets.php';
	require get_template_directory(). '/includes/functions/callie_nav_menu.php';
	require get_template_directory(). '/includes/functions/callie_post_views_count.php';
	require get_template_directory(). '/includes/functions/callie_cat_functions.php';

/*=====================================================================*/

function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box_01', // $id
		'Your Fields', // $title
		'show_your_fields_meta_box', // $callback
		'post', // $screen
		'normal', // $context
		'low' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );

function show_your_fields_meta_box(){
	global $post;

	$data = get_post_custom($post->ID);
	$val = isset($data['custom_input']) ? esc_attr($data['custom_input'][0]) : '';

	echo '<input type="text" name="custom_input" id="custom_input" value="'.$val.'" />';
}

add_action( "save_post", "save_detail" );
function save_detail(){
	global $post;

	if(define('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post->ID;
	}

	update_post_meta($post->ID, "custom_input", $_POST["custom_input"]);
}

?>
