<?php
/*
=========================================
Admin Panel Enqueue Functions.
=========================================
*/

function admin_panel_load_scripts( $hook ){
	
	if( 'toplevel_page_admin_panel' != $hook ){
		return;
	}
	wp_register_style( 'admin_panel', get_template_directory_uri() . '/adminpanel/assets/css/admin-panel.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'admin_panel' );

	wp_register_script( 'admin-panel-script', get_template_directory_uri() . '/adminpanel/assets/js/admin.panel.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'admin-panel-script' );
}
add_action( 'admin_enqueue_scripts', 'admin_panel_load_scripts');