<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'widgets_settings', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array(
		'label'=> 'Widgets Area Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),		
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Widgets Area Create',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),	
	array(
		'label'	=> 'Widget',
		'desc'	=> 'Widget.',
		'id'	=> $prefix.'widget-sidebar_settings',
		'type'	=> 'repeatable2',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}
?>