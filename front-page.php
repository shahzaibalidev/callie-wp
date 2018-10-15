<?php get_header(); ?>

<?php hotposts_section(); ?>
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- largeboxposts -->
					<?php largeboxposts_section(); ?>
					<!-- /largeboxposts -->
					<!-- smallboxposts -->
					<?php smallboxposts_section('lifestyle'); ?>
					<?php smallboxposts_section('health'); ?>
					<!-- /smallboxposts -->
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
