<?php global $creativeto_custom_meta_fields, $creativeto_custom_tabs, $prefix, $creativeto_version, $creativeto_version_compatible;
$not_compatible_custom_plugin = " (<span style=color:#f96a6a>not compatible</span>)";
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs = array(
		array(
			'label' => __('Footer', 'creativeto'),
			'id'	=> $prefix.'Footer',
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/footer/assets/icon.png',
			'menu_position'  => 4,
			'submenu'=>array(
				array(
				'label'=> __('Footer Layout', 'creativeto'),
				'id'	=> $prefix.'footer_layout',
				),/*
				array(
				'label'=> __('Pagination Mode', 'creativeto'),
				'id'	=> $prefix.'archivelayout_pagination_mode',
				)*/
			),
		)
);
}else{
$creativeto_custom_plugin_tabs = array(
		array(
			'label' => sprintf(__('Footer %s', 'creativeto'),$not_compatible_custom_plugin),
			'icon'  => CREATIVETOCUSTOMPLUGINPATCH.'/archive_layout/assets/icon.png',
			'menu_position'  => 4
		)
);
}
$creativeto_custom_tabs = array_merge($creativeto_custom_plugin_tabs,$creativeto_custom_tabs);