<h1>Main Admin Panel</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields('adminpanel-settings-group'); ?>
	<?php do_settings_sections( 'sa_admin_panel' ); ?>
	<?php submit_button(); ?>
</form>
