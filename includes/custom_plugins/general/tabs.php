<?php global $creativeto_custom_meta_fields, $creativeto_custom_tabs, $prefix, $creativeto_version, $creativeto_version_compatible;
$not_compatible_custom_plugin = " (<span style=color:#f96a6a>not compatible</span>)";
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs = array(
		array(
			'label' => __('General', 'creativeto'),
			'id'	=> $prefix.'general',
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/icon.png',
			'menu_position'  => 1,
			'submenu'=>array(
				array(
				'label'=> __('Settings', 'creativeto'),
				'id'	=> $prefix.'general_settings'
				),
				array(
				'label'=> __('Home Page Settings', 'creativeto'),
				'id'	=> $prefix.'general_home_settings',
				),
				array(
				'label'=> __('Header', 'creativeto'),
				'id'	=> $prefix.'general_header'
				),
				array(
				'label'=> __('Skin & Colors', 'creativeto'),
				'id'	=> $prefix.'general_colors'
				),
				array(
				'label'=> __('Info', 'creativeto'),
				'id'	=> $prefix.'general_info'
				)
			)
		)
);
}else{
$creativeto_custom_plugin_tabs = array(
		array(
			'label' => sprintf(__('General %s', 'creativeto'),$not_compatible_custom_plugin),
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/icon.png',
			'menu_position'  => 1
		)
);
}
$creativeto_custom_tabs = array_merge($creativeto_custom_plugin_tabs,$creativeto_custom_tabs);