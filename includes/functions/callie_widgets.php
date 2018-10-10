<?php
//Blog Widgets
function blogWidgetInit(){
    register_sidebar(array(
        'name' => __('Blog Top Ad', 'callie-wp'),
        'id' => 'blog-widget-top-ad',
        'before_widget' => '<div class="aside-widget text-center">',
        'after_widget'  => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Blog Social Media', 'callie-wp'),
        'id' => 'blog-widget-social-media',
        'before_widget' => '<div class="aside-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="section-title"><h2 class="title">',
        'after_title'   => '</h2></div>'
    ));
    register_sidebar(array(
        'name' => __('Blog Categories', 'callie-wp'),
        'id' => 'blog-widget-categories',
        'before_widget' => '<div class="aside-widget category-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="section-title"><h2 class="title">',
        'after_title'   => '</h2></div>'
    ));
    register_sidebar(array(
        'name' => __('Blog POPULAR POSTS', 'callie-wp'),
        'id' => 'blog-widget-popular-posts',
        'before_widget' => '<div class="aside-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="section-title"><h2 class="title">',
        'after_title'   => '</h2></div>'
    ));
    register_sidebar(array(
        'name' => __('Blog Bottom Ad', 'callie-wp'),
        'id' => 'blog-widget-bottom-ad',
        'before_widget' => '<div class="aside-widget text-center">',
        'after_widget'  => '</div>'
    ));
}
add_action('widgets_init', 'blogWidgetInit');

?>
