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

/* ============================================ */

add_action('admin_init', 'gpm_add_meta_boxes', 2);

function gpm_add_meta_boxes() {
add_meta_box( 'gpminvoice-group', 'Custom Repeatable', 'Repeatable_meta_box_display', 'page', 'normal', 'default');
}

function Repeatable_meta_box_display() {
    global $post;
    $gpminvoice_group = get_post_meta($post->ID, 'customdata_group', true);
     wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
            return false;
        });

        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
  </script>
  <table id="repeatable-fieldset-one" width="100%">
  <tbody>
    <?php
     if ( $gpminvoice_group ) :
      foreach ( $gpminvoice_group as $field ) {
    ?>
    <tr>
      <td width="15%">
        <input type="text"  placeholder="Title" name="TitleItem[]" value="<?php if($field['TitleItem'] != '') echo esc_attr( $field['TitleItem'] ); ?>" /></td> 
      <td width="70%">
      <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription[]"> <?php if ($field['TitleDescription'] != '') echo esc_attr( $field['TitleDescription'] ); ?> </textarea></td>
      <td width="15%"><a class="button remove-row" href="#1">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
      <td> 
        <input type="text" placeholder="Title" title="Title" name="TitleItem[]" /></td>
      <td> 
          <textarea  placeholder="Description" name="TitleDescription[]" cols="55" rows="5">  </textarea>
          </td>
      <td><a class="button  cmb-remove-row-button button-disabled" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
      <td>
        <input type="text" placeholder="Title" name="TitleItem[]"/></td>
      <td>
          <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription[]"></textarea>
          </td>
      <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
  </tbody>
</table>
<p><a id="add-row" class="button" href="#">Add another</a></p>
 <?php
}
add_action('save_post', 'custom_repeatable_meta_box_save');
function custom_repeatable_meta_box_save($post_id) {
    if ( ! isset( $_POST['gpm_repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['gpm_repeatable_meta_box_nonce'], 'gpm_repeatable_meta_box_nonce' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'customdata_group', true);
    $new = array();
    $invoiceItems = $_POST['TitleItem'];
    $prices = $_POST['TitleDescription'];
     $count = count( $invoiceItems );
     for ( $i = 0; $i < $count; $i++ ) {
        if ( $invoiceItems[$i] != '' ) :
            $new[$i]['TitleItem'] = stripslashes( strip_tags( $invoiceItems[$i] ) );
             $new[$i]['TitleDescription'] = stripslashes( $prices[$i] ); // and however you want to sanitize
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'customdata_group', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'customdata_group', $old );


}

?>