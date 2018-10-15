<?php
	//Admin Panel
	require get_template_directory(). '/adminpanel/function-admin.php';
	// Functions Files.
	require get_template_directory(). '/includes/functions/callie_style.php';
	require get_template_directory(). '/includes/functions/callie_fp_functions.php';
	require get_template_directory(). '/includes/functions/callie_comments.php';
	require get_template_directory(). '/includes/functions/callie_widgets.php';
	require get_template_directory(). '/includes/functions/callie_nav_menu.php';
	require get_template_directory(). '/includes/functions/callie_post_views_count.php';

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

	echo '<input id="upload_image" type="text" size="36" name="upload_image" value="" />
	<input id="upload_image_button" type="button" value="Upload Image" />';
}


?>
