<?php
$theme_data = wp_get_theme();
define('THEME_NAME', $theme_data->Name);
define('THEME_AUTHOR', $theme_data->Author);
define('THEME_VERSION', trim($theme_data->Version));
?>
