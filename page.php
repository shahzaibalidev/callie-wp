<?php get_header(); ?>
<?php
	if(have_posts()){
		while(have_posts()){
			the_post();

			
			// echo get_the_title();

			// the_content('<p>', '</p>');
			// the_author();
			// the_date();
			// the_comment();
			// the_category();
		}
	} 
?>
		<!-- PAGE HEADER -->
		<header>
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase"><?php the_title(); ?></h1>
						<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
			<?php the_content(); ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
<?php get_footer(); ?>