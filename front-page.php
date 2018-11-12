<?php get_header(); ?>

<?php blog_styles('hot', '3', ''); ?>
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- largeboxposts -->
					<?php blog_styles('large', '4', ''); ?>
					<!-- /largeboxposts -->
					<!-- smallboxposts -->
					<?php blog_styles('small', '3', 'health'); ?>
					<!-- /smallboxposts -->
					<?php blog_styles('list', '30', ''); ?>
				</div>
				<div class="col-md-4">
					<?php //dynamic_sidebar('home-sidebar'); ?>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
<?php get_footer(); ?>
