<h1>Admin Panel General</h1>
<?php settings_errors(); ?>

<div class="general-preview">
	<div class="logo-preview">
		<div class="icons-wrapper">

		</div>
	</div>
</div>

<form method="post" action="options.php" class="general-form">
	<?php settings_fields('admin-panel-general-group'); ?>
	<?php do_settings_sections('admin_panel'); ?>
	<?php submit_button(); ?>
</form>