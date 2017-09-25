<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'menu_settings', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'=> 'Menu Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array (
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Make parent menu items clickable',
		'id'	=> $prefix.'parent_menu_clickable',
		'type'	=> 'enabled_disabled',
		'default'	=> 0,
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> 1
			),
			'two' => array (
				'label' => 'No',
				'value'	=> 0
			)
		)
	),
	array (
		'type'	=> 'divider'
	),
	array(
		'label'=> 'First level',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Bold',
		'id'	=> $prefix.'menu_first_font_bold',
		'type'	=> 'enabled_disabled',
		'default'	=> 0,
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> 1
			),
			'two' => array (
				'label' => 'No',
				'value'	=> 0
			)
		)
	),
	array(
		'label'=> 'Italic',
		'id'	=> $prefix.'menu_first_font_italic',
		'type'	=> 'enabled_disabled',
		'default'	=> 0,
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> 1
			),
			'two' => array (
				'label' => 'No',
				'value'	=> 0
			)
		)
	),
	array (
		'label' => 'Font size',
		//'desc'	=> 'Select the general font size for site. (Default: 12px) ',
		'id'	=> $prefix.'menu_first_font_size',
		'type'	=> 'slider_size',
		'default'	=> 12,
		'max'	=> 50
	),
	array(
		'label'=> 'Uppercase',
		'id'	=> $prefix.'menu_first_font_upper',
		'type'	=> 'enabled_disabled',
		'default'	=> 0,
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> 1
			),
			'two' => array (
				'label' => 'No',
				'value'	=> 0
			)
		)
	),
	array(
		'label'=> 'Font color',
		'id'	=> $prefix.'menu-first_font_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Font color (active)',
		'id'	=> $prefix.'menu-first_font_color_active',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Arrow color',
		'id'	=> $prefix.'menu-first_hoover_line_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Hoover color',
		'id'	=> $prefix.'menu-first_hoover_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label' => 'Hoover opacity',
		'desc'	=> '',
		'id'	=> $prefix.'menu-first_hoover_opacity',
		'type'	=> 'slider_size',
		'default'=> 100,
		'max'	=> 100
	),
	array (
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Second level',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Font color',
		'id'	=> $prefix.'menu-second_font_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Text hoover and arrow color',
		'id'	=> $prefix.'menu-second_font_color_active',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'menu-second_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label' => 'Hoover opacity',
		'desc'	=> '',
		'id'	=> $prefix.'menu-second_bg_opacity',
		'type'	=> 'slider_size',
		'default'=> 100,
		'max'	=> 100
	),
	array (
		'type'	=> 'divider'
	),
	array(
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}