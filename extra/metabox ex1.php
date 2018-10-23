<?php
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


/*
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
  <?php global $post;

	$dataimg = get_post_custom($post->ID);
	$valimg = $dataimg['your_fields1[image]'];

	/*$img_url = ($valimg) ? $valimg : $meta['image'];*/
	/*
   ?>
   <p><?php echo $valimg; ?></p>
	<p>
	<label for="your_fields1[image]">Image Upload</label><br>
	<input type="text" name="your_fields1[image]" id="your_fields1[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
	<input type="button" class="button image-upload" value="Browse">
</p>
<div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>
<p><?php print_r($meta); ?></p>
	<?php

}*/


add_action( "save_post", "save_detail" );
function save_detail(){
	global $post;

	if(define('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post->ID;
	}

	update_post_meta($post->ID, "custom_input", $_POST["custom_input"]);
	/*update_post_meta($post->ID, "your_fields1[image]", $_POST["your_fields1[image]"]);*/
}

?>





<?php
/*=====================================================*/

/* functions.PHP */


function create_post_your_post() {
  register_post_type( 'your_post',
    array(
      'labels'       => array(
        'name'       => __( 'Your Post' ),
      ),
      'public'       => true,
      'hierarchical' => true,
      'has_archive'  => true,
      'supports'     => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
      ), 
      'taxonomies'   => array(
        'post_tag',
        'category',
      )
    )
  );
  register_taxonomy_for_object_type( 'category', 'your_post' );
  register_taxonomy_for_object_type( 'post_tag', 'your_post' );
}
add_action( 'init', 'create_post_your_post' );
function add_your_fields_meta_box() {
  add_meta_box(
    'your_fields_meta_box', // $id
    'Your Fields', // $title
    'show_your_fields_meta_box', // $callback
    'your_post', // $screen
    'normal', // $context
    'high' // $priority
  );
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
function show_your_fields_meta_box() {
    global $post;  
    
    $meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <p>
    <label for="your_fields[text]">Input Text</label>
    <br>
    <input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php if (is_array($meta) && isset($meta['text'])) { echo $meta['text']; } ?>">
  </p>
  <p>
    <label for="your_fields[textarea]">Textarea</label>
    <br>
    <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
  </p>
  <p>
    <label for="your_fields[checkbox]">Checkbox
      <input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if ( $meta['checkbox'] === 'checkbox' ) echo 'checked'; ?>>
    </label>
  </p>
  <p>
    <label for="your_fields[select]">Select Menu</label>
    <br>
    <select name="your_fields[select]" id="your_fields[select]">
        <option value="option-one" <?php selected( $meta['select'], 'option-one' ); ?>>Option One</option>
        <option value="option-two" <?php selected( $meta['select'], 'option-two' ); ?>>Option Two</option>
    </select>
  </p>
  <p>
    <label for="your_fields[image]">Image Upload</label><br>
    <input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
    <input type="button" class="button image-upload" value="Browse">
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
    });
  </script>

  <?php }
function save_your_fields_meta( $post_id ) {   
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
  
  $old = get_post_meta( $post_id, 'your_fields', true );
    if (isset($_POST['your_fields'])) { //Fix 3
      $new = $_POST['your_fields'];
      if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'your_fields', $new );
      } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'your_fields', $old );
      }
    }
}
add_action( 'save_post', 'save_your_fields_meta' );
/*=====================================================*/

/* PAGE.PHP */

 get_header(); ?>

<?php 
$args = array(
  'post_type' => 'your_post',
);  
$your_loop = new WP_Query( $args ); if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post();
$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

<h1>Title</h1>
<?php the_title(); ?>

<h1>Content</h1>
<?php the_content(); ?>

<h1>Excerpt</h1>
<?php the_excerpt(); ?>

<h1>Text Input</h1>
<?php echo $meta['text']; ?>

<h1>Textarea</h1>
<?php echo $meta['textarea']; ?>


<h1>Checkbox</h1>
<?php if ( $meta['checkbox'] === 'checkbox') { ?>
Checkbox is checked.
<?php } else { ?> 
Checkbox is not checked. 
<?php } ?>


<h1>Select Menu</h1>
<p>The actual value selected.</p>
<?php echo $meta['select']; ?>

<p>Switch statement for options.</p>
<?php 
  switch ( $meta['select'] ) {
    case 'option-one':
      echo 'Option One';
      break;
    case 'option-two':
      echo 'Option Two';
      break;
    default:
      echo 'No option selected';
      break;
  } 
?>

<h1>Image</h1>
<img src="<?php echo $meta['image']; ?>">


<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>