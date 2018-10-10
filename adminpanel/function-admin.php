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
		//Generate Admin Panel Settings  SUB page.
		add_submenu_page(
			'sa_admin_panel',	//Main Menu slug.
			'SA Theme Options Settings',	//Page title.
			'Settings',	//Menu title.
			'manage_options',	//Capability.
			'sa_admin_panel_settings',	//Sub Menu slug.
			'sa_admin_create_settings_page'	//Callback Function.
		);
		//Generate Admin Panel Settings  SUB page.
		add_submenu_page(
			'sa_admin_panel',	//Main Menu slug.
			'Custom CSS',	//Page title.
			'Custom CSS',	//Menu title.
			'manage_options',	//Capability.
			'sa_admin_panel_css',	//Sub Menu slug.
			'sa_admin_create_css_page'	//Callback Function.
		);

		//Activate custom settings
		add_action('admin_init', 'adminpanel_custom_settings');
	}
	add_action('admin_menu', 'sa_add_admin_page');

	function adminpanel_custom_settings(){
		register_setting('adminpanel-settings-group', 'first_name');
		register_setting('adminpanel-settings-group', 'last_name');
		add_settings_section( 'adminpanel-sidebar-options', 'Sidebar Options', 'ap_sidebar_options', 'sa_admin_panel' );
		add_settings_field( 'sidebar-name', 'Full Name', 'ap_sidebar_name', 'sa_admin_panel', 'adminpanel-sidebar-options');
	}
	function ap_sidebar_options(){
		echo 'Customize options';
	}
	function ap_sidebar_name(){
		$firstName = esc_attr( get_option( 'first_name' ) );
		$lastName = esc_attr( get_option( 'last_name' ) );
		echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/>';
	}

	function sa_admin_create_page(){
		//Admin Panel main page.
		require_once( get_template_directory(). '/adminpanel/includes/adminpanel-main.php');

	}

	function sa_admin_create_settings_page(){
		//Admin Panel Settings sub page.
		echo '<h1>Settings</h1>';
	}
	function sa_admin_create_css_page(){
		//Admin Panel Custom CSS sub page.
		echo '<h1>Custom CSS</h1>';

	}
?>
