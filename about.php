<?php /* Template Name: About */ ?>
<?php get_header(); ?>
<?php while (have_posts()) {
	the_post();
	the_title();
} ?>
<?php blog_styles('hot', '3', ''); ?>
<?php get_footer(); ?>