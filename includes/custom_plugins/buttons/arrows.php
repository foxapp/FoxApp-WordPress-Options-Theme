<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'arrows_settings', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array(
		'label'=> 'Arrows Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),		
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Normal stance',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),	
	array(
		'label'	=> 'Background color',
		'desc'	=> 'Background color.',
		'id'	=> $prefix.'arrows-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Hoover stance',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),	
	array(
		'label'	=> 'Background color',
		'desc'	=> 'Background color.',
		'id'	=> $prefix.'arrows-hover_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Active stance',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),	
	array(
		'label'	=> 'Background color',
		'desc'	=> 'Background color.',
		'id'	=> $prefix.'arrows-active_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),
	array (
		'label' => 'Border Radius size',
		//'desc'	=> 'Select the general font size for site. (Default: 12px) ',
		'id'	=> $prefix.'arrows-border_radius',
		'type'	=> 'slider_size',
		'default'	=> 0,
		'max'	=> 30
	),
	array(
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}
?>