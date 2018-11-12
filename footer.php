<?php
$footerLogo = esc_attr( get_option( 'footer_logo' ) );
$footerDescription = esc_attr( get_option( 'footer_description' ) );
?>
	<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="<?php echo site_url()?>" class="logo"><img src="<?php print $footerLogo; ?>" alt=""></a>
						</div>
						<p><?php print $footerDescription; ?></p>
						<ul class="contact-social">
							<li><a href="<?php echo $GLOBALS[ 'facebook' ]; echo $facebook; ?>" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?php echo $GLOBALS[ 'twitter']; ?>" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo $GLOBALS[ 'googleplus']; ?>" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="<?php echo $GLOBALS[ 'instagram']; ?>" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Categories</h3>
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
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
								<li><a href="#">Social</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Travel</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Life</a></li>
								<li><a href="#">News</a></li>
								<li><a href="#">Magazine</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Health</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Newsletter</h3>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
					<ul class="footer-nav">
						<li><a href="<?php echo site_url()?>">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Contacts</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Copyright -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by &amp;
						<!-- /Copyright -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->
<?php wp_footer(); ?>

</body>

</html>
