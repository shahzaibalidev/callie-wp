<h1>Admin Panel General</h1>
<?php settings_errors(); ?>
<?php
	$headerLogo = esc_attr( get_option( 'header_logo' ) );
	$footerLogo = esc_attr( get_option( 'footer_logo' ) );
?>
<div class="general-preview">
	<div class="logo-preview">
		<h2>Preview</h2>
		<div class="header-logo">
			<div class="icons-wrapper">
			<img id="header-logo-view" src="<?php print $headerLogo; ?>" />
			</div>
		</div>
		<div class="footer-logo">
			<div class="icons-wrapper">
			<img id="footer-logo-view" src="<?php print $footerLogo; ?>" />
			</div>
		</div>
	</div>
</div>

<form method="post" action="options.php" class="general-form">
	<?php settings_fields('admin-panel-general-group'); ?>
	<?php do_settings_sections('admin_panel'); ?>
	<?php submit_button(); ?>
</form>