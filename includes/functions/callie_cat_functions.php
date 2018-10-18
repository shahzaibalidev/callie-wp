<?php
	if (have_posts()) {
		$pnumb = 1;
		while (have_posts()) {
			the_post();
			$thumb_url = (get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : 'https://dubsism.files.wordpress.com/2017/12/image-not-found.png?w=547';
			$thumb_alt = get_the_post_thumbnail_caption();
			$post_cats = get_the_category();
			$post_title = get_the_title();
			$post_url = get_the_permalink();
			$post_author = get_the_author_posts_link();
			$post_date = get_the_date('d F Y');
			

			$pnumb++;
		}
	}

function cattoploop($pnumb){
	switch ($pnumb) {
		case '1':
			
			break;
		
		default:
			
			break;
	}
}

function catinloop($pnumb){
	switch ($pnumb) {
		case '1':
			?>
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<?php echo $post_cats; ?>
							</div>
							<h3 class="post-title title-lg"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
			<?php
			break;
		
		default:
			
			break;
	}
}

function catbottomloop($pnumb){
	switch ($pnumb) {
		case '1':
			
			break;
		
		default:
			
			break;
	}
}
?>