<?php
global $creativeto_custom_meta_fields, $creativeto_custom_tabs, $prefix, $creativeto_version, $creativeto_version_compatible;
$not_compatible_custom_plugin = " (<span style=color:#f96a6a>not compatible</span>)";
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs = array(
		array(
			'label'=> __('Typography', 'creativeto'),
			'id'	=> $prefix.'typography',
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/typography/assets/icon.png',
			'menu_position'  => 2,
			'submenu'=>array(
				array(
				'label'=> __('Typography', 'creativeto'),
				'id'	=> $prefix.'typography',
				),
			),
		)
);
}else{
$creativeto_custom_plugin_tabs = array(
		array(
			'label' => sprintf(__('Typography %s', 'creativeto'),$not_compatible_custom_plugin),
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/typography/assets/icon.png',
			'menu_position'  => 2,
		)
);
}
$creativeto_custom_tabs = array_merge($creativeto_custom_plugin_tabs,$creativeto_custom_tabs);
?>