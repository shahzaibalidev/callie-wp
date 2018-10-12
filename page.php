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