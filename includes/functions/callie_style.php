<?php
function callie_style(){

  /*CSS Start*/
  wp_enqueue_style('google-fonts','http://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700');
  wp_enqueue_style('bootstrap_min_css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
  wp_enqueue_style('font_awesome_min_css', get_template_directory_uri().'/assets/css/font-awesome.min.css');
  wp_enqueue_style('main_style' , get_template_directory_uri().'/assets/css/style.css');
  /*CSS End*/
  /*JS Start*/
  wp_enqueue_script('jquery_min_js', get_template_directory_uri().'/assets/js/jquery.min.js', array(), '1.0', true);
  wp_enqueue_script('bootstrap_min_js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), '1.0', true);
  wp_enqueue_script('jquery_stellar_min_js', get_template_directory_uri().'/assets/js/jquery.stellar.min.js', array(), '1.0', true);
  wp_enqueue_script('main_js', get_template_directory_uri().'/assets/js/main.js', array(), '1.0', true);
  /*JS End*/
  add_theme_support( 'html5' );
}

add_action('wp_enqueue_scripts','callie_style');

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 1200, 800 );

?>
