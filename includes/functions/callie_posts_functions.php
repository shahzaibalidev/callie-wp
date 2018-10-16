<?php

function blog_styles($style, $posts_to_show, $cat = ''){

	switch ($style) {
		case 'hot':
			$posts_to_show = (!$posts_to_show) ? 3 : $post_to_show;
			$args = array(
				'post_type'	=> 'post',
				'post_status' => 'publish',
				'posts_per_page' => ''.$posts_to_show.'',
				'category_name' => ''.$cat.''
			);
			break;
		
		default:
			# code...
			break;
	}



}
blog_styles('hot', 4, 'lifestyle');