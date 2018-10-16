<?php

function posts_section($selectedtype, $selectedpostnumber = '', $selectedcategory = ''){
	switch ($selectedtype) {
		case 'hotbox':
			if(!$selectedpostnumber){$selectedpostnumber = 3;}
			hotposts_section(''.$selectedpostnumber.'', ''.$selectedcategory.'');
			break;
		
		case 'largebox':
			if(!$selectedpostnumber){$selectedpostnumber = 4;}
			largeboxposts_section(''.$selectedpostnumber.'', ''.$selectedcategory.'');
			break;

		case 'smallbox':
			if(!$selectedpostnumber){$selectedpostnumber = 3;}
			smallboxposts_section(''.$selectedpostnumber.'', ''.$selectedcategory.'');
			break;

		case 'listbox':
			if(!$selectedpostnumber){$selectedpostnumber = 5;}
			listboxposts_section(''.$selectedpostnumber.'', ''.$selectedcategory.'');
			break;

		default:
			echo "error in posts_section()";
			break;
	}
}

/*=========================================================================================*/

/* Hot Post Section */
function hotposts_section($selectedpostnumber = 3, $selectedcategory = ''){

	$args = array(
		'post_type'	=> 'post',
		'post_status' => 'publish',
		'posts_per_page' => ''.$selectedpostnumber.'',
		'category_name' => ''.$selectedcategory.''
	);

	$query = new WP_Query( $args );

	if($query->have_posts()){ 
		$i = 1;
?>
	<div class="section">
		<div class="container">
			<div id="hot-post" class="row hot-post">
				
					<?php
						while($query->have_posts()){ 
							$query->the_post();

							$grid_class = ($i === 1) ? 'col-md-8 hot-post-left' : 'col-md-4 hot-post-right';
							if($i <= 2){ echo '<div class="'.$grid_class.'">'; }

							$post_id = get_the_ID();
							$thumb_url = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
							$thumb_alt = get_the_post_thumbnail_caption();
							$post_cats = get_the_category();
							$post_cat_list = '';
							$post_title = get_the_title();
							$post_url = get_the_permalink();
							$post_author = get_the_author_posts_link();
							$post_date = get_the_date('d F Y');

							foreach ($post_cats as $post_cat) {
								$post_cat_name = $post_cat->cat_name;
								$post_cat_link = get_category_link($post_cat);
								$post_cat_list .= '<a href="'.$post_cat_link.'">'.$post_cat_name.'</a> ';
							}
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
							if($i === 1){ echo '</div>'; }
							$i++;
						}
						echo '</div>';
					?>
				
			</div>
		</div>
	</div>

<?php
	}
	wp_reset_query();
}
/* Hot Post Section END */

/*=========================================================================================*/

/* Large Box Posts */
function largeboxposts_section($selectedpostnumber = 4, $selectedcategory = ''){
	if($selectedcategory){
		$selectedtitle = $selectedcategory;
	}else{
		$selectedtitle = 'Recent posts';
	}
	wp_reset_query();
	$args = array(
		'post_type'	=> 'post',
		'post_status' => 'publish',
		'posts_per_page' => ''.$selectedpostnumber.'',
		'category_name' => ''.$selectedcategory.''
	);

	$query = new WP_Query( $args );

	if($query->have_posts()){
?>
	<div class="row">
		<div class="col-md-12">
			<div class="section-title">
				<h2 class="title"><?php echo $selectedtitle; ?></h2>
			</div>
		</div>
		<?php
			while($query->have_posts()){ 
				$query->the_post();

				$post_id = get_the_ID();
				$thumb_url = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
				$thumb_alt = get_the_post_thumbnail_caption();
				$post_cats = get_the_category();
				$post_cat_list = '';
				$post_title = get_the_title();
				$post_url = get_the_permalink();
				$post_author = get_the_author_posts_link();
				$post_date = get_the_date('d F Y');

				foreach ($post_cats as $post_cat) {
					$post_cat_name = $post_cat->cat_name;
					$post_cat_link = get_category_link($post_cat);
					$post_cat_list .= '<a href="'.$post_cat_link.'">'.$post_cat_name.'</a> ';
				}
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

		<?php } ?>
	</div>
<?php
	}
	wp_reset_query();
}
/* Large Box Posts END */

/*=========================================================================================*/

/* Small Box Posts */
function smallboxposts_section($selectedpostnumber = 3, $selectedcategory = ''){
	if($selectedcategory){
		$selectedtitle = $selectedcategory;
	}else{
		$selectedtitle = 'Recent posts';
	}
	wp_reset_query();	
	$args = array(
		'post_type'	=> 'post',
		'post_status' => 'publish',
		'posts_per_page' => ''.$selectedpostnumber.'',
		'category_name' => ''.$selectedcategory.''
	);

	$query = new WP_Query( $args );

	if($query->have_posts()){
	?>
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title"><?php echo $selectedtitle; ?></h2>
				</div>
			</div>
			<?php
				while($query->have_posts()){ 
					$query->the_post();

					$post_id = get_the_ID();
					$thumb_url = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
					$thumb_alt = get_the_post_thumbnail_caption();
					$post_cats = get_the_category();
					$post_cat_list = '';
					$post_title = wp_html_excerpt(get_the_title(), 30, ' ...');
					$post_url = get_the_permalink();
					$post_author = get_the_author_posts_link();
					$post_date = get_the_date('d F Y');

					foreach ($post_cats as $post_cat) {
						$post_cat_name = $post_cat->cat_name;
						$post_cat_link = get_category_link($post_cat);
						$post_cat_list .= '<a href="'.$post_cat_link.'">'.$post_cat_name.'</a> ';
					}
					
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
		<?php } ?>
	</div>
<?php
}
wp_reset_query();
}
/* Small Box Posts END */

/*=========================================================================================*/

/* list Box Posts */
function listboxposts_section($selectedpostnumber = 5, $selectedcategory = ''){
	if($selectedcategory){
		$selectedtitle = $selectedcategory;
	}else{
		//$selectedtitle = 'Recent posts';
	}
	wp_reset_query();	
	$args = array(
		'post_type'	=> 'post',
		'post_status' => 'publish',
		'posts_per_page' => ''.$selectedpostnumber.'',
		'category_name' => ''.$selectedcategory.''
	);

	$query = new WP_Query( $args );

	if($query->have_posts()){ 
		//echo '<div class="col-md-8">';
		if($selectedtitle){ ?>
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title"><?php echo $selectedtitle; ?></h2>
					</div>
				</div>
			</div>
			<?php }
				while($query->have_posts()){ 
					$query->the_post();

					$post_id = get_the_ID();
					$thumb_url = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
					$thumb_alt = get_the_post_thumbnail_caption();
					$post_cats = get_the_category();
					$post_cat_list = '';
					$post_title = wp_html_excerpt(get_the_title(), 100, ' ...');
					$post_url = get_the_permalink();
					$post_author = get_the_author_posts_link();
					$post_date = get_the_date('d F Y');
					$post_excerpt = get_the_excerpt();

					foreach ($post_cats as $post_cat) {
						$post_cat_name = $post_cat->cat_name;
						$post_cat_link = get_category_link($post_cat);
						$post_cat_list .= '<a href="'.$post_cat_link.'">'.$post_cat_name.'</a> ';
					}
					
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
			<?php } ?>

			<div class="section-row loadmore text-center">
				<a href="#" class="primary-button">Load More</a>
			</div>	
<?php
		//echo '</div>';
}
wp_reset_query();
}