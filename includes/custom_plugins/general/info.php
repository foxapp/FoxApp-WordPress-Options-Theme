<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$info = '<div style="color:#ccc" class="info-plugin">Created by <a href="http://creativethemes.ru">Creative Themes</a></div>';

$info .= '';

$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'general_info', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array (
		'label' => 'Display Login links',
		'type'	=> 'info',
		'info'	=> $info,
	),
	array(
		'label'=> 'General Tab Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'type'	=> 'tab_end'
	)
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}