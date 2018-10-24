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

		//02: Customizing First SUB menu title.
		add_submenu_page(
			'admin_panel',	//Main Menu slug.
			'Admin Panel General',	//Page title.
			'General',	//Menu title.
			'manage_options',	//Capability.
			'admin_panel',	//Sub Menu slug.
			'admin_panel_create_page'	//Callback Function.
		);

		//03: Generate Admin Panel Settings  SUB page.
		add_submenu_page(
			'admin_panel',	//Main Menu slug.
			'Admin Panel Settings',	//Page title.
			'Settings',	//Menu title.
			'manage_options',	//Capability.
			'admin_panel_settings',	//Sub Menu slug.
			'admin_panel_create_settings_page'	//Callback Function.
		);

		//06: Adding Admin Panel custom general settings function.
		add_action('admin_init', 'admin_panel_custom_general');
	}
	//04: Callback function of 01 & 02 Admin Panel  MAIN page.
	function admin_panel_create_page(){
		//adding General page php file.
		require_once( get_template_directory(). '/adminpanel/includes/pages/admin_panel_general.php');

	}

	//05: Callback function of 03 Admin Panel Settings  SUB page.
	function admin_panel_create_settings_page(){
		//adding Settings page php file.
		require_once( get_template_directory(). '/adminpanel/includes/pages/admin_panel_settings.php');

	}

	//07: Callback function of 06 Admin Panel custom general settings.
	function admin_panel_custom_general(){
		/*===================================================*/
		//Using Hooks apis.
		register_setting(
			'admin-panel-general-group', //Option Group.
			'header_logo' //Option Name.
		);
		register_setting(
			'admin-panel-general-group', //Option Group.
			'footer_logo' //Option Name.
		);
		register_setting(
			'admin-panel-general-group', //Option Group.
			'footer_description' //Option Name.
		);
		register_setting(
			'admin-panel-general-group', //Option Group.
			'facebook_handler', //Option Name.
			'sanitize_facebook_handler' //sanitize Callback.
		);
		register_setting(
			'admin-panel-general-group', //Option Group.
			'twitter_handler' //Option Name.
		);
		register_setting(
			'admin-panel-general-group', //Option Group.
			'googleplus_handler' //Option Name.
		);
		register_setting(
			'admin-panel-general-group', //Option Group.
			'instagram_handler' //Option Name.
		);
		/*===================================================*/
		//08: Settings Section.
		add_settings_section(
			'admin-panel-general-options', //ID.
			'General Options', //Title.
			'admin_panel_general_options', //Callback fuction.
			'admin_panel' //page.
		);
		/*===================================================*/
		//10: Adding setting fields.
		add_settings_field(
			'header-logo', //ID.
			'Header Logo', //Title.
			'header_logo', //Callback function.
			'admin_panel', //page.
			'admin-panel-general-options' //section.
			//args or Array.
		);
		add_settings_field(
			'footer-logo', //ID.
			'footer Logo', //Title.
			'footer_logo', //Callback function.
			'admin_panel', //page.
			'admin-panel-general-options' //section.
			//args or Array.
		);
		add_settings_field(
			'footer-description', //ID.
			'footer Description', //Title.
			'footer_description', //Callback function.
			'admin_panel', //page.
			'admin-panel-general-options' //section.
			//args or Array.
		);
		add_settings_field(
			'facebook-handler', //ID.
			'Facebook', //Title.
			'facebook_handler', //Callback function.
			'admin_panel', //page.
			'admin-panel-general-options' //section.
			//args or Array.
		);
		add_settings_field(
			'twitter-handler', //ID.
			'Twitter', //Title.
			'twitter_handler', //Callback function.
			'admin_panel', //page.
			'admin-panel-general-options' //section.
			//args or Array.
		);
		add_settings_field(
			'googleplus-handler', //ID.
			'Google Plus', //Title.
			'googleplus_handler', //Callback function.
			'admin_panel', //page.
			'admin-panel-general-options' //section.
			//args or Array.
		);
		add_settings_field(
			'instagram-handler', //ID.
			'Instagram', //Title.
			'instagram_handler', //Callback function.
			'admin_panel', //page.
			'admin-panel-general-options' //section.
			//args or Array.
		);
		/*===================================================*/
	}

	//09: Callback function of 08 admin_panel_general_options.
	function admin_panel_general_options(){
		echo 'Customize General Settings';
	}

	/*===================================================*/
	//11: Callback function of 10 general_logo.
	function header_logo(){
		$headerLogo = esc_attr( get_option( 'header_logo' ) );
		echo '<input type="text" name="header_logo" value="'.$headerLogo.'" placeholder="Header Logo"/>';
	}

	function footer_logo(){
		$footerLogo = esc_attr( get_option( 'footer_logo' ) );
		echo '<input type="text" name="footer_logo" value="'.$footerLogo.'" placeholder="Footer Logo"/>';
	}

	function footer_description(){
		$footerDescription = esc_attr( get_option( 'footer_description' ) );
		echo '<input type="text" name="footer_description" value="'.$footerdescription.'" placeholder="Footer Description"/>';
	}

	function facebook_handler(){
		$facebook = esc_attr( get_option( 'facebook_handler' ) );
		echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook"/><p class="description">Add Facebook Page url.</p>';
	}

	function twitter_handler(){
		$twitter = esc_attr( get_option( 'twitter_handler' ) );
		echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter"/><p class="description">Add Twitter Profile url.</p>';
	}

	function googleplus_handler(){
		$googleplus = esc_attr( get_option( 'googleplus_handler' ) );
		echo '<input type="text" name="googleplus_handler" value="'.$googleplus.'" placeholder="Google Plus"/><p class="description">Add Google Plus Profile url.</p>';
	}

	function instagram_handler(){
		$instagram = esc_attr( get_option( 'instagram_handler' ) );
		echo '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram"/><p class="description">Add Instagram Account url.</p>';
	}
	/*===================================================*/
	/* sanitize functions */

	function sanitize_facebook_handler( $input ){
		$output = sanitize_text_field( $input );
		return $output;
	}
	/* sanitize functions END */
	/*===================================================*/

?>