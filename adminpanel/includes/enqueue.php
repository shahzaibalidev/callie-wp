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
}
add_action( 'admin_enqueue_scripts', 'admin_panel_load_scripts');