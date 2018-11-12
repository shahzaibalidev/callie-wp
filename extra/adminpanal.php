<?php
	/*
	=========================================
	Admin Panel
	=========================================
	*/

	function sa_add_admin_page(){
		//Generate Admin Panel  MAIN page.
		add_menu_page(
			'SA Theme Options',	//Page title.
			'Admin Panel',	//Menu title.
			'manage_options',	//Capability.
			'sa_admin_panel',	//Menu slug.
			'sa_admin_create_page',	//Callback Function.
			get_template_directory_uri(). '/adminpanel/assets/img/sa-admin-icon.png',	//Icon url.
			2	//Position in the menu order.
		);
		//Generate Admin Panel  MAIN page SUB page on same Slug.
		add_submenu_page(
			'sa_admin_panel',	//Main Menu slug.
			'Theme Options',	//Page title.
			'General',	//Menu title.
			'manage_options',	//Capability.
			'sa_admin_panel',	//Sub Menu slug.
			'sa_admin_create_page'	//Callback Function.
		);

		//Generate Admin Panel Settings  SUB page.
		add_submenu_page(
			'sa_admin_panel',	//Main Menu slug.
			'SA Theme Options Settings',	//Page title.
			'Settings',	//Menu title.
			'manage_options',	//Capability.
			'sa_admin_panel_settings',	//Sub Menu slug.
			'sa_admin_create_settings_page'	//Callback Function.
		);
		
		//Active  Custom settings
		add_action('admin_init', 'admin_custom_settings');
		
	}
	add_action('admin_menu', 'sa_add_admin_page');

	function admin_custom_settings(){
		register_setting('sa-admin-settings-group', 'general-options');
		add_settings_section( 'general-options', 'General Options', 'general_options', 'sa_admin_panel');
		add_settings_field()
	}

	function general_options(){
		echo 'Customize User settings';
	}

	function sa_admin_create_page(){
		//Admin Panel main page.
		require_once( get_template_directory(). '/adminpanel/includes/adminpanel-main.php');

	}

	function sa_admin_create_css_page(){
		//Admin Panel Custom CSS sub page.
		echo '<h1>Front Page</h1>';

	}

	function sa_admin_create_settings_page(){
		//Admin Panel Settings sub page.
		echo '<h1>Settings</h1>';
	}




/*=========================*/

//Generate Admin Panel  MAIN page SUB page on same Slug.
		add_submenu_page(
			'admin_panel',	//Main Menu slug.
			'General Options',	//Page title.
			'General',	//Menu title.
			'manage_options',	//Capability.
			'sa_admin_panel',	//Sub Menu slug.
			'sa_admin_create_page'	//Callback Function.
		);

		//Generate Admin Panel Settings  SUB page.
		add_submenu_page(
			'admin_panel',	//Main Menu slug.
			'Theme Settings',	//Page title.
			'Settings',	//Menu title.
			'manage_options',	//Capability.
			'admin_panel_settings',	//Sub Menu slug.
			'admin_create_settings_page'	//Callback Function.
		);
	
?>