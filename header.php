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
	</header>
	<!-- /HEADER -->
