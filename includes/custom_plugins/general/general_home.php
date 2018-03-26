<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'general_home_settings', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'=> 'General Tab Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array (
		'label' => 'Slider on home page',
		'new-line' => 'yes',
		'desc'	=> 'Choose if you want to show or not on the first page slider. (Default: On)',
		'id'	=> $prefix.'home_settings',
		'type'	=> 'enabled_disabled',
		'default'	=> 'on',
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> 'on'
			),
			'two' => array (
				'label' => 'No',
				'value'	=> 'off'
			)
		)
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