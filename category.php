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
			
			cattoploop($pnumb);

			catinloop($pnumb, $post_url, $thumb_url, $thumb_alt, $post_cat_list, $post_title, $post_author, $post_date, $grid_class, $post_excerpt);

			
			catbottomloop($pnumb);
	
			$pnumb++;
		}
		if($pnumb >= 10){
		?>
		<div class="section-row loadmore text-center">
			<a href="#" class="primary-button">Load More</a>
		</div>
		<?php }
		
		
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