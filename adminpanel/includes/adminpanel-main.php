<h1>Main Admin Panel</h1>
<form action="" method="post">
	<?php settings_fields('sa-admin-settings-group'); ?>
	<?php do_settings_sections( 'sa_admin_panel' ); ?>
</form>