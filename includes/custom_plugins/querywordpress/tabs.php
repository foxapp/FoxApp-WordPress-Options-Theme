<?php global $creativeto_custom_meta_fields, $creativeto_custom_tabs, $prefix, $creativeto_version, $creativeto_version_compatible;
$not_compatible_custom_plugin = " (<span style=color:#f96a6a>not compatible</span>)";
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs = array(
		array(
			'label'=> __('Query Vars', 'creativeto'),
			'id'	=> $prefix.'querywordpress',
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/querywordpress/assets/icon.png',
			'menu_position'  => 5,
			'submenu'=>array(
				array(
				'label'=> __('General vars', 'creativeto'),
				'id'	=> $prefix.'querywordpress_vars',
				),
			),
		)
);
}else{
$creativeto_custom_plugin_tabs = array(
		array(
			'label' => sprintf(__('Query Vars %s', 'creativeto'),$not_compatible_custom_plugin),
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/querywordpress/assets/icon.png',
			'menu_position'  => 5,
		)
);
}
$creativeto_custom_tabs = array_merge($creativeto_custom_plugin_tabs,$creativeto_custom_tabs);