<?php get_header(); ?>
<?php
	setPostViews(get_the_ID());
	if(have_posts()){
		while(have_posts()){
			the_post();
			// the_title();
			// the_content();
			// the_author();
			// the_date();
			// the_comment();
			// the_category();
		}
	}
?>

	<!-- PAGE HEADER -->
	<header>
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
	</header>
	<!-- /PAGE HEADER -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- post share -->
					<div class="section-row">
						<div class="post-share">
							<a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
							<a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
							<a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
							<a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
						</div>
					</div>
					<!-- /post share -->

					<!-- post content -->
					<div class="section-row">
					<?php the_content(); ?>
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
								<?php the_tags( '<ul><li>Tags: ',', ','</li></ul>'); ?>
						</div>
					</div>
					<!-- /post tags -->

					<!-- post nav -->
					<div class="section-row">
						<div class="post-nav">
							<?php $prevPost = get_previous_post();
							$prevthumbnail = get_the_post_thumbnail($prevPost->ID);
							if($prevPost) {?>
							<div class="prev-post">
								 <a class="post-img"><?php echo $prevthumbnail; ?></a>
								<h3 class="post-title"><?php previous_post( $format = '%', $previous = '', $title = 'yes', $in_same_cat = 'no', $limitprev = 1, $excluded_categories = '' ) ?></h3>
								<span>Previous post</span>
							</div>

							<?php } $nextPost = get_next_post();
							$nextthumbnail = get_the_post_thumbnail($nextPost->ID);
							if($nextPost){ ?>
							<div class="next-post">
								<a class="post-img"><?php echo $nextthumbnail; ?></a>
								<h3 class="post-title"><?php next_post( $format = '%', $next = '', $title = 'yes', $in_same_cat = 'no', $limitnext = 1, $excluded_categories = '' ) ?></h3>
								<span>Next post</span>
							</div>
							<?php } ?>
						</div>
					</div>
					<!-- /post nav  -->

					<!-- post author -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">About <?php the_author_posts_link(); ?></h3>
						</div>
						<div class="author media">
							<div class="media-left">
								<a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>">
									<img class="author-img media-object" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>">
								</a>
							</div>
							<div class="media-body">
								<p><?php the_author_meta('description'); ?></p>
								<ul class="author-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /post author -->

					<!-- /related post -->
					<div>
						<div class="section-title">
							<h3 class="title">Related Posts</h3>
						</div>
						<div class="row">
							<!-- post -->
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="blog-post.html"><img src="./img/post-4.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="category.html">Health</a>
										</div>
										<h3 class="post-title title-sm"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
										<ul class="post-meta">
											<li><a href="author.html">John Doe</a></li>
											<li>20 April 2018</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="blog-post.html"><img src="./img/post-6.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="category.html">Fashion</a>
											<a href="category.html">Lifestyle</a>
										</div>
										<h3 class="post-title title-sm"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
										<ul class="post-meta">
											<li><a href="author.html">John Doe</a></li>
											<li>20 April 2018</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-4">
								<div class="post post-sm">
									<a class="post-img" href="blog-post.html"><img src="./img/post-7.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="category.html">Health</a>
											<a href="category.html">Lifestyle</a>
										</div>
										<h3 class="post-title title-sm"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
										<ul class="post-meta">
											<li><a href="author.html">John Doe</a></li>
											<li>20 April 2018</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /post -->
						</div>
					</div>
					<!-- /related post -->
					<!-- post comments -->
					<!-- /post comments -->
				</div>

				<div class="col-md-4">
					<!-- ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-3.jpg" alt="">
						</a>
					</div>
					<!-- /ad widget -->

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="#" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="#" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								<li><a href="#">Lifestyle <span>451</span></a></li>
								<li><a href="#">Fashion <span>230</span></a></li>
								<li><a href="#">Technology <span>40</span></a></li>
								<li><a href="#">Travel <span>38</span></a></li>
								<li><a href="#">Health <span>24</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->

					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>
						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-3.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Lifestyle</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Ne bonorum praesent cum, labitur persequeris definitionem quo cu?</a></h3>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-2.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Technology</a>
									<a href="category.html">Lifestyle</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-4.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Health</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						<div class="post post-widget">
							<a class="post-img" href="blog-post.html"><img src="./img/widget-5.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="category.html">Health</a>
									<a href="category.html">Lifestyle</a>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
							</div>
						</div>
						<!-- /post -->
					</div>
					<!-- /post widget -->

					<!-- galery widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Instagram</h2>
						</div>
						<div class="galery-widget">
							<ul>
								<li><a href="#"><img src="./img/galery-1.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-2.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-3.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-4.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-5.jpg" alt=""></a></li>
								<li><a href="#"><img src="./img/galery-6.jpg" alt=""></a></li>
							</ul>
						</div>
					</div>
					<!-- /galery widget -->

					<!-- Ad widget -->
					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					<!-- /Ad widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



<?php get_footer(); ?>
