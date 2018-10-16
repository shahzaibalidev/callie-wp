<?php get_header(); ?>

<?php posts_section(hotbox); ?>
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- largeboxposts -->
					<?php posts_section(largebox); ?>
					<!-- /largeboxposts -->
					<!-- smallboxposts -->
					<?php posts_section(smallbox,'lifestyle'); ?>
					<?php posts_section(smallbox,'','health'); ?>
					<!-- /smallboxposts -->
					<?php posts_section(listbox); ?>
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
