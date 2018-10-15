<?php get_header(); ?>
<?php 
	$args = array(
		'post_type'	=> 'post',
		'post_status' => 'publish',
		'posts_per_page' => 3,
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
							$post_author = get_the_author();
							$post_author_url = get_the_author_link();
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
									<li><a href="<?php echo $post_author_url; ?>"><?php echo $post_author; ?></a></li>
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
?>

<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<?php 
						$args = array(
							'post_type'	=> 'post',
							'post_status' => 'publish',
							'posts_per_page' => 4,
						);

						$query = new WP_Query( $args );

						if($query->have_posts()){
					?>
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2 class="title">Recent posts</h2>
								</div>
							</div>
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
									$post_author = get_the_author();
									$post_author_url = get_the_author_link();
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
													<li><a href="<?php echo $post_author_url; ?>"><?php echo $post_author; ?></a></li>
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
					?>
					
					<?php 
						$args = array(
							'post_type'	=> 'post',
							'post_status' => 'publish',
							'posts_per_page' => 3,
							'category_name' => 'lifestyle'
						);

						$query = new WP_Query( $args );

						if($query->have_posts()){
					?>
							<div class="row">
								<div class="col-md-12">
									<div class="section-title">
										<h2 class="title">Lifestyle</h2>
									</div>
								</div>
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
										$post_title = wp_html_excerpt(get_the_title(), 30, ' ...');
										$post_url = get_the_permalink();
										$post_author = get_the_author();
										$post_author_url = get_the_author_link();
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
														<li><a href="<?php echo $post_author_url; ?>"><?php echo $post_author; ?></a></li>
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
					?>

					<?php 
						$args = array(
							'post_type'	=> 'post',
							'post_status' => 'publish',
							'posts_per_page' => 3,
							'category_name' => 'travel'
						);

						$query = new WP_Query( $args );

						if($query->have_posts()){
					?>
							<div class="row">
								<div class="col-md-12">
									<div class="section-title">
										<h2 class="title">Travel</h2>
									</div>
								</div>
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
										$post_title = wp_html_excerpt(get_the_title(), 30, ' ...');
										$post_url = get_the_permalink();
										$post_author = get_the_author();
										$post_author_url = get_the_author_link();
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
														<li><a href="<?php echo $post_author_url; ?>"><?php echo $post_author; ?></a></li>
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
					?>

					<?php 
						$args = array(
							'post_type'	=> 'post',
							'post_status' => 'publish',
							'posts_per_page' => 3,
							'category_name' => 'health'
						);

						$query = new WP_Query( $args );

						if($query->have_posts()){
					?>
							<div class="row">
								<div class="col-md-12">
									<div class="section-title">
										<h2 class="title">Health</h2>
									</div>
								</div>
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
										$post_title = wp_html_excerpt(get_the_title(), 30, ' ...');
										$post_url = get_the_permalink();
										$post_author = get_the_author();
										$post_author_url = get_the_author_link();
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
														<li><a href="<?php echo $post_author_url; ?>"><?php echo $post_author; ?></a></li>
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
					?>
				</div>
				<div class="col-md-4">
					<?php dynamic_sidebar('home-sidebar'); ?>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
<?php get_footer(); ?>