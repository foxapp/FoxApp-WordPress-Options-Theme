<?php
/* ----------------------------------------
* load scripts
----------------------------------------- */
function creativeto_admin_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('colorpicker');
	wp_enqueue_script('jquery-ui-sortable');

	wp_enqueue_script('jscolor', CREATIVETO_PLUGIN_DIR . 'includes/js/jscolor.js');
	wp_enqueue_script('minicolors', CREATIVETO_PLUGIN_DIR . 'includes/js/jquery.minicolors.js');
	
	wp_enqueue_script('creativeto-admin-scripts', CREATIVETO_PLUGIN_DIR . 'includes/js/admin-scripts.js');
	wp_enqueue_script('creativeto-admin-panel', CREATIVETO_PLUGIN_DIR . 'includes/assets/js/panel.js');
	wp_enqueue_script('media-uploader', CREATIVETO_PLUGIN_DIR . 'includes/js/media-uploader.js');
}

if (isset($_GET['page']) && ( $_GET['page'] == 'creativeto-settings') ){
	add_action('admin_print_scripts', 'creativeto_admin_scripts');
}
?>