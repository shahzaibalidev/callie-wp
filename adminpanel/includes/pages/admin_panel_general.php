<h1>Admin Panel General</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields('admin-panel-general-group'); ?>
	<?php do_settings_sections('admin_panel'); ?>
	<?php submit_button(); ?>
</form>