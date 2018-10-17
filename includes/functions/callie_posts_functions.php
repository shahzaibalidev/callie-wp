<?php
/* Main */

function blog_styles($style, $posts_to_show, $cat = ''){
	if($cat){
		$selectedtitle = $cat;
	}else{
		$selectedtitle = 'Recent posts';
	}
	wp_reset_query();
	$args = array(
	'post_type'	=> 'post',
	'post_status' => 'publish',
	'posts_per_page' => ''.$posts_to_show.'',
	'category_name' => ''.$cat.''
	);

	$query = new WP_Query( $args );
	if($query->have_posts()){
		

		if($style === 'hot'){$i = 1;}
		toploophtml($style, $selectedtitle);
		while($query->have_posts()){ 
					$query->the_post();

					if($style === 'hot'){
					$grid_class = ($i < 2) ? '<div class="col-md-8 hot-post-left">' : '<div class="col-md-4 hot-post-right">';}

					$post_id = get_the_ID();
					$thumb_url = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
					$thumb_alt = get_the_post_thumbnail_caption();
					$post_cats = get_the_category();
					$post_cat_list = '';
					$post_title = wp_html_excerpt(get_the_title(), 100, ' ...');
					$post_url = get_the_permalink();
					$post_author = get_the_author_posts_link();
					$post_date = get_the_date('d F Y');
					$post_excerpt = wp_html_excerpt(get_the_excerpt(), 160,' ...');

					foreach ($post_cats as $post_cat) {
						$post_cat_name = $post_cat->cat_name;
						$post_cat_link = get_category_link($post_cat);
						$post_cat_list .= '<a href="'.$post_cat_link.'">'.$post_cat_name.'</a> ';
					}

					inloophtml($style, $post_url, $thumb_url, $thumb_alt, $post_cat_list, $post_title, $post_author, $post_date, $grid_class, $post_excerpt);

					
					if($style === 'hot'){$i++;
					echo '</div>';}
			}

		bottomloophtml($style);
	}
	wp_reset_query();
}
/* Main END */

/*==============================================================================================*/

/* Top Loop */
function toploophtml($style, $selectedtitle = ''){
	switch ($style) {
		case 'hot':
			?>
			<div class="section">
				<div class="container">
					<div id="hot-post" class="row hot-post">
			<?php
			break;
		case 'list':
			if($selectedtitle){ ?>
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title"><?php echo $selectedtitle; ?></h2>
					</div>
				</div>
			</div>
			<?php }
			break;
		case 'large':
			?>
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title"><?php echo $selectedtitle; ?></h2>
					</div>
				</div>
			<?php
			break;
		case 'small':
			?>
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title"><?php echo $selectedtitle; ?></h2>
					</div>
				</div>
			<?php
			break;
		
		default:
			# code...
			break;
	}
}
/* Top Loop END */

/*==============================================================================================*/

/* In Loop */
function inloophtml($style, $post_url, $thumb_url, $thumb_alt, $post_cat_list, $post_title, $post_author, $post_date, $grid_class, $post_excerpt){
	switch ($style) {
		case 'hot':
			echo $grid_class;
			?>
				<div class="post post-thumb">
					<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
					<div class="post-body">
						<div class="post-category">
							<?php echo $post_cat_list; ?>
						</div>
						<h3 class="post-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
						<ul class="post-meta">
							<li><?php echo $post_author; ?></li>
							<li><?php echo $post_date; ?></li>
						</ul>
					</div>
				</div>
					
			<?php
			break;
		case 'list':
			?>
				<!-- post -->
				<div class="post post-row">
					<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
					<div class="post-body">
						<div class="post-category">
							<?php echo $post_cat_list; ?>
						</div>
						<h3 class="post-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
						<ul class="post-meta">
							<li><?php echo $post_author; ?></li>
							<li><?php echo $post_date; ?></li>
						</ul>
						<p><?php echo $post_excerpt; ?></p>
					</div>
				</div>
				<!-- /post -->
			<?php
			break;
		case 'large':
			?>
				<div class="col-md-6">
					<div class="post"> 
						<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
						<div class="post-body">
							<div class="post-category">
								<?php echo $post_cat_list; ?>
							</div>
							<h3 class="post-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
							<ul class="post-meta">
								<li><?php echo $post_author; ?></li>
								<li><?php echo $post_date; ?></li>
							</ul>
						</div>
					</div>
				</div>
		<?php
			break;
		case 'small':
			?>
				<div class="col-md-4">
					<div class="post post-sm">
						<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
						<div class="post-body">
							<div class="post-category">
								<?php echo $post_cat_list; ?>
							</div>
							<h3 class="post-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
							<ul class="post-meta">
								<li><?php echo $post_author; ?></li>
								<li><?php echo $post_date; ?></li>
							</ul>
						</div>
					</div>
				</div>
			<?php
			break;
		
		default:
			# code...
			break;
	}
}
/* In Loop END */

/*==============================================================================================*/

/* Bottom Loop */
function bottomloophtml($style){
	switch ($style) {
		case 'hot':
			echo '</div></div></div>';
			break;
		case 'list':
			?>
				<div class="section-row loadmore text-center">
					<a href="#" class="primary-button">Load More</a>
				</div>	
			<?php
			break;
		case 'large':
			echo '</div>';
			break;
		case 'small':
			echo '</div>';
			break;
		
		default:
			# code...
			break;
	}
}
/* Bottom Loop END */