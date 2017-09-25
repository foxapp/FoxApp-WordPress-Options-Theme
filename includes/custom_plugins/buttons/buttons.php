<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'buttons_settings', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array(
		'label'=> 'Buttons Settings',
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
		'id'	=> $prefix.'buttons-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Font color',
		'desc'	=> 'Font color.',
		'id'	=> $prefix.'buttons-font_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Font shadow color',
		'desc'	=> 'Font shadow color.',
		'id'	=> $prefix.'buttons-font_shadow',
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
		'id'	=> $prefix.'buttons-hover_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Font color',
		'desc'	=> 'Font color.',
		'id'	=> $prefix.'buttons-hover_font_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Font shadow color',
		'desc'	=> 'Font shadow color.',
		'id'	=> $prefix.'buttons-hover_font_shadow',
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
		'id'	=> $prefix.'buttons-active_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Font color',
		'desc'	=> 'Font color.',
		'id'	=> $prefix.'buttons-active_font_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Font shadow color',
		'desc'	=> 'Font shadow color.',
		'id'	=> $prefix.'buttons-active_font_shadow',
		'type'	=> 'colorpicker_minicolors',
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