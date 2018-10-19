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

	add_meta_box(
		'your_fields_meta_box_02', // $id
		'Your Fields 2', // $title
		'show_your_fields_meta_box2', // $callback
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

function show_your_fields_meta_box2(){
	?>
	<script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>
	<p>
	<label for="your_fields[image]">Image Upload</label><br>
	<input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
	<input type="button" class="button image-upload" value="Browse">
</p>
<div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>

	<?php
}


?>
