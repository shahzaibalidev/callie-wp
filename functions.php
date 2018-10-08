<?php
	//Admin Panel
	require get_template_directory(). '/adminpanel/function-admin.php';

	function callie_style(){

		/*CSS Start*/
		wp_enqueue_style('google-fonts','http://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700');
		wp_enqueue_style('bootstrap_min_css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_enqueue_style('font_awesome_min_css', get_template_directory_uri().'/assets/css/font-awesome.min.css');
		wp_enqueue_style('main_style' , get_template_directory_uri().'/assets/css/style.css');
		/*CSS End*/
		/*JS Start*/
		wp_enqueue_script('jquery_min_js', get_template_directory_uri().'/assets/js/jquery.min.js', array(), '1.0', true);
		wp_enqueue_script('bootstrap_min_js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), '1.0', true);
		wp_enqueue_script('jquery_stellar_min_js', get_template_directory_uri().'/assets/js/jquery.stellar.min.js', array(), '1.0', true);
		wp_enqueue_script('main_js', get_template_directory_uri().'/assets/js/main.js', array(), '1.0', true);
		/*JS End*/
		add_theme_support( 'html5' );
	}

	add_action('wp_enqueue_scripts','callie_style');

	//Menus
	register_nav_menus(array(
				'Head_Home_Drop_Menu' => __('Header Home Drop Menu'),
				'Head_Category_Drop_Menu' => __('Header Category Drop Menu'),
				'Footer' => __('Footer Menu')
	));
	//Blog Widgets
	function blogWidgetInit(){
			register_sidebar(array(
					'name' => __('Blog Top Ad', 'callie-wp'),
					'id' => 'blog-widget-top-ad',
					'before_widget' => '<div class="aside-widget text-center">',
					'after_widget'  => '</div>'
			));
			register_sidebar(array(
					'name' => __('Blog Social Media', 'callie-wp'),
					'id' => 'blog-widget-social-media',
					'before_widget' => '<div class="aside-widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="section-title"><h2 class="title">',
					'after_title'   => '</h2></div>'
			));
			register_sidebar(array(
					'name' => __('Blog Categories', 'callie-wp'),
					'id' => 'blog-widget-categories',
					'before_widget' => '<div class="aside-widget category-widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="section-title"><h2 class="title">',
					'after_title'   => '</h2></div>'
			));
			register_sidebar(array(
					'name' => __('Blog POPULAR POSTS', 'callie-wp'),
					'id' => 'blog-widget-popular-posts',
					'before_widget' => '<div class="aside-widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="section-title"><h2 class="title">',
					'after_title'   => '</h2></div>'
			));
			register_sidebar(array(
					'name' => __('Blog Bottom Ad', 'callie-wp'),
					'id' => 'blog-widget-bottom-ad',
					'before_widget' => '<div class="aside-widget text-center">',
					'after_widget'  => '</div>'
			));
	}
	add_action('widgets_init', 'blogWidgetInit');

	/* Post Views Number*/
	// function to display number of posts.
	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return $count;
	}

	// function to count views.
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}
	/* Post Views Number END */

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 1200, 800 );

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





<?php

    function format_comment($comment, $args, $depth) {

       $GLOBALS['comment'] = $comment; ?>

        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

            <div class="comment-intro">
                <em>commented on</em>
                <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></a>
                <em>by</em>
                <?php printf(__('%s'), get_comment_author_link()) ?>
            </div>

            <?php if ($comment->comment_approved == '0') : ?>
                <em><php _e('Your comment is awaiting moderation.') ?></em><br />
            <?php endif; ?>

            <?php comment_text(); ?>

            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?> 
            </div>

<?php } ?>
