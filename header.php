<!DOCTYPE html>
<html lang="en">

<head>
<?php wp_head(); ?>

</head>

<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<!-- /social -->

					<!-- logo -->
					<div class="nav-logo">
						<a href="<?php echo site_url()?>" class="logo"><img src="<?php echo get_theme_file_uri('/assets/img/logo.png')?>" alt=""></a>
					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form>
								<input class="input" name="search" placeholder="Enter your search...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<?php //Home_Drop_Menu
						wp_nav_menu( array(
									'theme_location' => 'Header_Menu',
									'menu_class' => 'nav-menu',
							    'menu'   => 'Something custom walker',
							    'walker' => new Header_Walker_Nav_Menu()
							) );
						 ?>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<?php //Home_Drop_Menu
					wp_nav_menu( array(
								'theme_location' => 'Slider_Menu',
								'menu_class' => 'nav-aside-menu'
						) );
					 ?>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
		<?php
		if(is_single()){
		?>

			<div id="post-header" class="page-header">
				<div class="page-header-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>');" data-stellar-background-ratio="0.5"></div>
				<div class="container">
						<div class="row">
							<div class="col-md-10">
								<div class="post-category">
									<?php the_category(' '); ?>
								</div>
								<h1>
								<?php the_title(); ?>
								</h1>
								<ul class="post-meta">
									<li><?php the_author_posts_link(); ?></li>
									<li><?php the_date(); ?></li>
									<li><i class="fa fa-comments"></i> <?php comments_number( '0', '1', '%'); ?></li>
									<li><i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?></li>
								</ul>
							</div>
						</div>
				</div>
			</div>
		<?php
		}
		if(!is_home() && !is_single() && !is_front_page() && !is_category() && !is_archive() && !is_404() && !is_category()){
		?>
		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url('<?php the_post_thumbnail_url(); ?>');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase"><?php the_title(); ?></h1>
						<p class="lead"><?php the_content(); ?></p>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
		<?php
		}

		if (is_category()) {
		
		?>

		<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="page-header-bg" style="background-image: url('<?php echo get_theme_file_uri('/img/header-2.jpg')?>');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase"><?php single_cat_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
		<?php
		}
		if(is_author()){
		?>
	<!-- PAGE HEADER -->
		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<div class="author">
							<img class="author-img center-block" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="">
							<h1 class="text-uppercase"><?php the_author_meta('display_name'); ?></h1>
							<p class="lead"><?php the_author_meta('description'); ?></p>
							<ul class="author-social">
								<li><a href="<?php the_author_meta( 'facebook', get_current_user_id() ); ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php the_author_meta( 'twitter', get_current_user_id() ); ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php the_author_meta( 'googleplus', get_current_user_id() ); ?>"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="<?php the_author_meta( 'instagram', get_current_user_id() ); ?>"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- /PAGE HEADER -->
	<?php
	}
	 ?>
	</header>
	<!-- /HEADER -->