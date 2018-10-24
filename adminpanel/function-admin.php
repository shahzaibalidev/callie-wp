<?php
	/*
	=========================================
	Admin Panel
	=========================================
	*/

	add_action('admin_menu', 'add_admin_panel_pages');
	function add_admin_panel_pages(){
		//01: Generate Admin Panel  MAIN page.
		add_menu_page(
			'Admin Panel',	//Page title.
			'Admin Panel',	//Menu title.
			'manage_options',	//Capability.
			'admin_panel',	//Menu slug.
			'admin_panel_create_page',	//Callback Function.
			get_template_directory_uri(). '/adminpanel/assets/img/sa-admin-icon.png',	//Icon url.
			2	//Position in the menu order.
		);

		//05: Customizing First SUB menu title.
		add_submenu_page(
			'admin_panel',	//Main Menu slug.
			'Admin Panel General',	//Page title.
			'General',	//Menu title.
			'manage_options',	//Capability.
			'admin_panel',	//Sub Menu slug.
			'admin_panel_create_page'	//Callback Function.
		);

		//02: Generate Admin Panel Settings  SUB page.
		add_submenu_page(
			'admin_panel',	//Main Menu slug.
			'Admin Panel Settings',	//Page title.
			'Settings',	//Menu title.
			'manage_options',	//Capability.
			'admin_panel_settings',	//Sub Menu slug.
			'admin_panel_create_settings_page'	//Callback Function.
		);
	}
	//03: Callback function of 01 Admin Panel  MAIN page.
	function admin_panel_create_page(){

	}

	//04: Callback function of 02 Admin Panel Settings  SUB page.
	function admin_panel_create_settings_page(){

	}
?>