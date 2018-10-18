<?php get_header(); ?>
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

<?php
	if (have_posts()) {
		$pnumb = 1;
		
		
		while (have_posts()) {
			the_post();
			$thumb_url = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
			$thumb_alt = get_the_post_thumbnail_caption();
			$post_cats = get_the_category();
			$post_cat_list = '';
			$post_title = get_the_title();
			$post_url = get_the_permalink();
			$post_author = get_the_author_posts_link();
			$post_date = get_the_date('d F Y');
			$post_excerpt = wp_html_excerpt(get_the_excerpt(), 160,' ...');

			foreach ($post_cats as $post_cat) {
						$post_cat_name = $post_cat->cat_name;
						$post_cat_link = get_category_link($post_cat);
						$post_cat_list .= '<a href="'.$post_cat_link.'">'.$post_cat_name.'</a> ';
			}
			/*if ($pnumb < 3) {cattoploop($pnumb);}*/
			
			cattoploop($pnumb);
			catinloop($pnumb, $post_url, $thumb_url, $thumb_alt, $post_cat_list, $post_title, $post_author, $post_date, $grid_class, $post_excerpt);

			$pnumb++;
			catbottomloop($pnumb);
			/*if($pnumb == 5){catbottomloop($pnumb);}*/
		}
		
		
	}
?>
				</div>

				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
<?php get_footer(); ?>

<?php
function cattoploop($pnumb){
	switch ($pnumb) {
		case '1':
			
			break;

		case '2':
			echo '<div class="row">';
			break;
		
		default:
			
			break;
	}
}

function catinloop($pnumb, $post_url, $thumb_url, $thumb_alt, $post_cat_list, $post_title, $post_author, $post_date, $grid_class, $post_excerpt){
	switch ($pnumb) {
		case '1':
			?>
					<div class="post post-thumb">
						<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
						<div class="post-body">
							<div class="post-category">
								<?php echo $post_cat_list; ?>
							</div>
							<h3 class="post-title title-lg"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
							<ul class="post-meta">
								<li><?php echo $post_author; ?></li>
								<li><?php echo $post_date; ?></li>
							</ul>
						</div>
					</div>
			<?php
			break;

		case '2':
		case '3':
		case '4':
		case '5':
			?>
						<!-- post -->
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
						<!-- /post -->
			<?php
			break;
		
		default:
			
			break;
	}
}

function catbottomloop($pnumb){
	switch ($pnumb) {
		case '1':
		case '2':
		case '3':
			
			break;

		case '6':
			//echo '</div>';
			break;
		
		default:
			
			break;
	}
}
?>