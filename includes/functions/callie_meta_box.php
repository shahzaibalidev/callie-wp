<?php
function post_icon($post = 0){
  $post = get_post( $post );
  $custom_meta = get_post_meta($post->ID, 'post_icon', true);
    if (empty($custom_meta)) {
        $custom_meta['image'] = 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
      }
    echo $custom_meta['image'];
}
function get_post_icon($post = 0){
  $post = get_post( $post );
  $custom_meta = get_post_meta($post->ID, 'post_icon', true);
    if (empty($custom_meta)) {
        $custom_meta['image'] = 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
      }
    return $custom_meta['image'];
}

function add_post_icon_meta_box() {
	add_meta_box(
		'post_icon_meta_box', // $id
		'Post Icon', // $title
		'show_post_icon_meta_box', // $callback
		'post', // $screen
		'side', // $context
		'low' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_post_icon_meta_box' );
function show_post_icon_meta_box() {
    global $post;  
    
		$meta = get_post_meta( $post->ID, 'post_icon', true );
    
    if (empty($meta)) {
      $meta['image'] = '';
    }
    ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  
  <p>
    <label for="post_icon[image]">Select Image Size of 700 × 467</label><br>
    <input type="text" name="post_icon[image]" id="post_icon[image]" class="meta-image" value="<?php echo $meta['image']; ?>" size="35" >
    <br /><br />
    <input type="button" class="button image-upload" value="Browse">
    <input type="button" class="button image-remove" value="Remove" style="color: #bc0b0b; font-weight:bold;">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>


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
      // remove button.
      $('.image-remove').click(function (e){
        $('.meta-image').attr('value', '');
        $('.image-preview img').attr('src', '');
      });
    });
  </script>

  <?php }
function save_post_icon_meta( $post_id ) {   
	// verify nonce
	if ( isset($_POST['your_meta_box_nonce']) 
			&& !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
			return $post_id; 
		}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if (isset($_POST['post_type'])) { //Fix 2
        if ( 'page' === $_POST['post_type'] ) {
            if ( !current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }  
        }
    }
	
	$old = get_post_meta( $post_id, 'post_icon', true );
		if (isset($_POST['post_icon'])) { //Fix 3
			$new = $_POST['post_icon'];
			if ( $new && $new !== $old ) {
				update_post_meta( $post_id, 'post_icon', $new );
			} elseif ( '' === $new && $old ) {
				delete_post_meta( $post_id, 'post_icon', $old );
			}
		}
}
add_action( 'save_post', 'save_post_icon_meta' );

add_filter( 'user_contactmethods', 'tgm_io_custom_contact_info' );
/**
 * Removes legacy contact fields and adds support for LinkedIn.
 *
 * @param array $fields  Array of default contact fields.
 * @return array $fields Amended array of contact fields.
 */
function tgm_io_custom_contact_info( $fields ) {
          
    $fields['facebook'] = __( 'Facebook' );
    $fields['twitter'] = __('Twitter');
    $fields['googleplus'] = __('Google Plus');
    $fields['instagram'] = __('Instagram');
     
    // Return the amended contact fields.
    return $fields;
     
}

?>