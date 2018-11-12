<?php
function cattoploop($pnumb){
	switch ($pnumb) {
		case '1':
			
			break;

		case '2':
			echo '<div class="row">';
			break;
		
		default:
			
			break;
	}
}

function catinloop($pnumb, $post_url, $thumb_url, $thumb_alt, $post_cat_list, $post_title, $post_author, $post_date, $grid_class, $post_excerpt){
	switch ($pnumb) {
		case '1':
			?>
					<div class="post post-thumb">
						<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
						<div class="post-body">
							<div class="post-category">
								<?php echo $post_cat_list; ?>
							</div>
							<h3 class="post-title title-lg"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
							<ul class="post-meta">
								<li><?php echo $post_author; ?></li>
								<li><?php echo $post_date; ?></li>
							</ul>
						</div>
					</div>
			<?php
			break;

		case '2':
		case '3':
		case '4':
		case '5':
			?>
						<!-- post -->
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
								<div class="post-body">
									<div class="post-category">
										<?php echo $post_cat_list; ?>
									</div>
									<h3 class="post-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
									<ul class="post-meta">
										<li><?php echo $post_author; ?></li>
										<li><?php echo $post_date; ?></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- /post -->
			<?php
			break;
		
		default:
			?>
					<!-- post -->
					<div class="post post-row">
						<a class="post-img" href="<?php echo $post_url; ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>"></a>
						<div class="post-body">
							<div class="post-category">
								<?php echo $post_cat_list; ?>
							</div>
							<h3 class="post-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h3>
							<ul class="post-meta">
								<li><?php echo $post_author; ?></li>
								<li><?php echo $post_date; ?></li>
							</ul>
							<p><?php echo $post_excerpt; ?></p>
						</div>
					</div>
					<!-- /post -->
			<?php
			break;
	}
}

function catbottomloop($pnumb){
	switch ($pnumb) {
		case '1':
		case '2':
		case '3':
			
			break;

		case '5':
			echo '</div>';
			break;
		
		default:
			
			break;
	}
}
?>