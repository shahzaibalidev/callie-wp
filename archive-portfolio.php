<?php get_header(); ?>

<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<?php
					if(have_posts()){
						while(have_posts()){the_post(); ?>
							<!-- post -->
							<div class="post post-row">
								<a class="post-img" href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<?php the_category(' '); ?>
									</div>
									<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<ul class="post-meta">
										<li><?php the_author_posts_link(); ?></li>
										<li><?php echo get_the_date('d F Y'); ?></li>
									</ul>
									<p><?php echo wp_html_excerpt(get_the_excerpt(), 160,' ...'); ?></p>
								</div>
							</div>
							<!-- /post -->
					<?php }
						}
					?>

					<div class="section-row loadmore text-center">
						<a href="#" class="primary-button">Load More</a>
					</div>
				</div>


				<!-- Widget Sidebar-->
				<div class="col-md-4">
					<!-- ad widget-->
					<?php dynamic_sidebar('blog-widget-top-ad'); ?>
					<!-- /ad widget -->
					<!-- social widget -->
					<?php dynamic_sidebar('blog-widget-social-media'); ?>
					<!-- /social widget -->

					<!-- category widget -->
					<?php dynamic_sidebar('blog-widget-categories'); ?>
					<!-- /category widget -->

					<!-- post widget -->
					<?php dynamic_sidebar('blog-widget-popular-posts'); ?>
					<!-- /post widget -->

					<!-- Ad widget -->
					<?php dynamic_sidebar('blog-widget-bottom-ad'); ?>
					<!-- /Ad widget -->
				</div>
				<!-- /Widget Sidebar-->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
<!-- /SECTION -->

<?php get_footer(); ?>