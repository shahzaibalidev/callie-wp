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

/*==================================== MENUS ====================================================== */
	function wpcustom_nav_menus(){
		//Menus
			register_nav_menus(array(
						'Header_Menu' => __('Header Menu')
			));



						/**
						* Custom walker class.
						*/
						class Header_Walker_Nav_Menu extends Walker_Nav_Menu {

						/**
						* Starts the list before the elements are added.
						*
						* Adds classes to the unordered list sub-menus.
						*
						* @param string $output Passed by reference. Used to append additional content.
						* @param int    $depth  Depth of menu item. Used for padding.
						* @param array  $args   An array of arguments. @see wp_nav_menu()
						*/
						function start_lvl( &$output, $depth = 0, $args = array() ) {
						// Depth-dependent classes.
						$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
						$display_depth = ( $depth + 1); // because it counts the first submenu as 0
						$classes = array(
						'sub-menu',
						( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
						( $display_depth >=2 ? 'sub-sub-menu' : '' ),
						'menu-depth-' . $display_depth
						);
						$class_names = implode( ' ', $classes );

						// Build HTML for output.
						$output .= "\n" . $indent . '<div class="dropdown"><div class="dropdown-body"><ul class="dropdown-list ' . $class_names . '">' . "\n";
						}

						/**
						* Start the element output.
						*
						* Adds main/sub-classes to the list items and links.
						*
						* @param string $output Passed by reference. Used to append additional content.
						* @param object $item   Menu item data object.
						* @param int    $depth  Depth of menu item. Used for padding.
						* @param array  $args   An array of arguments. @see wp_nav_menu()
						* @param int    $id     Current item ID.
						*/
						function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
						global $wp_query;
						$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

						// Depth-dependent classes.
						$depth_classes = array(
						( $depth == 0 ? 'main-menu-item has-dropdown' : 'sub-menu-item' ),
						( $depth >=2 ? 'sub-sub-menu-item' : '' ),
						( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
						'menu-item-depth-' . $depth
						);
						$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

						// Passed classes.
						$classes = empty( $item->classes ) ? array() : (array) $item->classes;
						$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

						// Build HTML.
						$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

						// Link attributes.
						$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
						$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
						$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
						$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
						$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

						// Build HTML output and pass through the proper filter.
						$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
						$args->before,
						$attributes,
						$args->link_before,
						apply_filters( 'the_title', $item->title, $item->ID ),
						$args->link_after,
						$args->after
						);
						$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
						}
						}
		}
		add_action('widgets_init', 'wpcustom_nav_menus');

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




/*=============================================================================================================================*/
																			/* COMMENTS */

add_filter('comment_reply_link', 'replace_reply_link_class');


function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='reply", $class);
    return $class;
}




    function format_comment($comment, $args, $depth) {

       $GLOBALS['comment'] = $comment; ?>

        <div <?php comment_class('media'); ?> id="li-comment-<?php comment_ID() ?>">


								<div class="media-left">
									<?php	echo get_avatar( $comment, 50, '', '', array( 'class'=> 'media-object' )); ?>
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h4><?php printf(__('%s'), get_comment_author_link()) ?></h4>
										<span class="time"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></span>
									</div>
									<?php if ($comment->comment_approved == '0') : ?>
			                <p><php _e('Your comment is awaiting moderation.') ?></p><br />
			            <?php endif; ?>

			            <?php comment_text(); ?>

									<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>


					</div>

</div>

<?php }
												/* /COMMENTS */
/*========================================================================================================================= */


?>
