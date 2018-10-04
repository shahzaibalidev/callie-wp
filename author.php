<?php get_header(); ?>

	<!-- PAGE HEADER -->
	<header>
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<div class="author">
							<img class="author-img center-block" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="">
							<h1 class="text-uppercase"><?php the_author_meta('display_name'); ?></h1>
							<p class="lead"><?php the_author_meta('description'); ?></p>
							<ul class="author-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- /PAGE HEADER -->
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
								<a class="post-img" href="blog-post.html"><img src="<?php echo get_theme_file_uri('/img/post-6.jpg')?>" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<?php the_category(' '); ?>
									</div>
									<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<ul class="post-meta">
										<li><?php the_author(); ?></li>
										<li><?php the_date(); ?></li>
									</ul>
									<p><?php the_excerpt(); ?></p>
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