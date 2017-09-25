<?php
global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(

	array(
		'id'	=> $prefix.'general_header', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array(
		'label'=> 'General Tab Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),	
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Contact icons & search in top line',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array (
		'label'	=> 'Icons style',
		'desc'	=> 'Icons style.',
		'id'	=> $prefix.'header-icons_style',
		'type'	=> 'enabled_disabled',
		'default'	=> 'black',
		'options' => array (
			'one' => array (
				'label' => 'Dark (Black)',
				'value'	=> 'black'
			),
			'two' => array (
				'label' => 'Light (White)',
				'value'	=> 'white'
			)
		)
	),
	array (
		'label' => 'Icons opacity',
		'desc'	=> '',
		'id'	=> $prefix.'header-icons_opacity',
		'type'	=> 'slider_size',
		'default'=> 61,
		'max'	=> 100
	),	
	array(
		'label'	=> 'Icons background color',
		'desc'	=> '',
		'id'	=> $prefix.'header-icons_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label' => 'Icons background opacity',
		'desc'	=> '',
		'id'	=> $prefix.'header-icons_bg_opacity',
		'type'	=> 'slider_size',
		'default'	=> 100,
		'max'	=> 100
	),	
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Login links',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array (
		'label' => 'Display Login links',
		'desc'	=> 'Say if you want to display the Login/Register item in Tobar. (Default: On)',
		'id'	=> $prefix.'top_links',
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
		'label'=> 'Header layout',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array (
		'label'	=> 'Header layout',
		'desc'	=> 'Site skin. (Default: light)<br><span class="var">$creativeto_settings[\'creativeto_site_skin\'] = light</span>',
		'id'	=> $prefix.'header_layout',
		'type'	=> 'radio_group_with_images',
		'atention'=>'Atention!: After modify skin please refresh page.', 
		'default'=> 'light',
		'options' => array (
			'1' => array (
				'label' => 'Header 1',
				'value'	=> '1',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/header_1.png'
			),
			'2' => array (
				'label' => 'Header 2',
				'value'	=> '2',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/header_2.png'
			),
			'3' => array (
				'label' => 'Header 3',
				'value'	=> '3',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/header_3.png'
			),
			'4' => array (
				'label' => 'Header 4',
				'value'	=> '4',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/header_4.png'
			)
		)
	),	
	array(
		'type'	=> 'divider'
	),		
	array (
		'label' => 'Show Search bar',
		'desc'	=> 'Say if you want to display the search bar in header. (Default: On)',
		'id'	=> $prefix.'search_bar',
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
		'label'=> 'Enable "Back To Top"',
		'desc'	=> 'go to top of page',
		'id'	=> $prefix.'to_top',
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
	)
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}