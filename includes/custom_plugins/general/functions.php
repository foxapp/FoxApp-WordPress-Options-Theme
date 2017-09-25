<?php global $creativeto_options; $creativeto_options = get_option('creativeto_settings');
if( $creativeto_options['creativeto_wp_admin_bg_color'] && $creativeto_options['creativeto_wp_admin_bg_color']!='null'){
	echo '<style> #adminmenuback, #adminmenuwrap, #adminmenu {background-color: '.$creativeto_options['creativeto_wp_admin_bg_color'].' !important} </style>';
}
if( $creativeto_options['creativeto_wp_admin_bg_color'] && $creativeto_options['creativeto_wp_menu_item_top_color']!='null'){
	echo '<style> #adminmenu a.menu-top, #adminmenu .wp-submenu .wp-submenu-head {border-top-color: '.$creativeto_options['creativeto_wp_menu_item_top_color'].' !important} </style>';
}
if( $creativeto_options['creativeto_wp_admin_bg_color'] && $creativeto_options['creativeto_wp_menu_item_bottom_color']!='null'){
	echo '<style> #adminmenu a.menu-top, #adminmenu .wp-submenu .wp-submenu-head {border-bottom-color: '.$creativeto_options['creativeto_wp_menu_item_bottom_color'].' !important} </style>';
}
?>