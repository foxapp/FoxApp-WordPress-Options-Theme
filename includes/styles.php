<?php

/* ----------------------------------------
* load CSS
----------------------------------------- */

function creativeto_admin_styles() {
	if( is_admin() ) {
		wp_enqueue_style('thickbox');
		wp_enqueue_style('creativeto-admin', CREATIVETO_PLUGIN_DIR.'includes/css/admin-styles.css');
		wp_enqueue_style('minicolors', CREATIVETO_PLUGIN_DIR.'includes/css/jquery.minicolors.css');
		wp_enqueue_style('jquery-ui-custom', CREATIVETO_PLUGIN_DIR.'includes/css/jquery-ui-custom.css');
		wp_enqueue_style('creativeto-admin-panel', CREATIVETO_PLUGIN_DIR.'includes/assets/css/panel.css');
	}
}

if (isset($_GET['page']) && ( $_GET['page'] == 'creativeto-settings' ) ) {
	add_action('init', 'creativeto_admin_styles',100);
}

?>