<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'general_colors',
		'type'	=> 'tab_start'
	),	
	array(
		'label'=> 'General Tab Settings - Skin & Colors',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),	
	array(
		'type'	=> 'divider'
	),	
	array(
		'label'=> 'Skin',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array (
		'label'	=> 'Select site skin',
		'desc'	=> 'Site skin. (Default: light)<br><span class="var">$creativeto_settings[\'creativeto_site_skin\'] = light</span>',
		'id'	=> $prefix.'of-preset',
		'type'	=> 'radio_group_with_images',
		'atention'=>'Atention!: After modify skin please refresh page.', 
		'default'=> 'light',
		'options' => array (
			'1' => array (
				'label' => 'Angular skin',
				'value'	=> 'angular',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/light_skin.png'
			),
			'2' => array (
				'label' => 'Business skin',
				'value'	=> 'business',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/light_skin.png'
			),
			'3' => array (
				'label' => 'Grunge skin',
				'value'	=> 'grunge',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/light_skin.png'
			),
			'4' => array (
				'label' => 'Light skin',
				'value'	=> 'light',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/light_skin.png'
			),
			'5' => array (
				'label' => 'Dark skin',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/dark_skin.png',
				'value'	=> 'dark'
			),
			'6' => array (
				'label' => 'Customized skin',
				'value'	=> 'custom',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/custom_skin.png'
			)
		)
	),		
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Customize Site Skin',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),	
	array(
		'label'	=> 'Accent site skin',
		'desc'	=> 'Color for all icon/arrows elements.',
		'id'	=> $prefix.'accent-color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),	
	array(
		'label'	=> 'Tag \'a\' color',
		'desc'	=> 'Color for all links \'a\' tag.',
		'id'	=> $prefix.'tag_a_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label'	=> 'Icons style',
		'desc'	=> 'Icons style.',
		'id'	=> $prefix.'accent-icons_style',
		'type'	=> 'enabled_disabled',
		'default'	=> 'black',
		'options' => array (
			'one' => array (
				'label' => 'Black',
				'value'	=> 'black'
			),
			'two' => array (
				'label' => 'White',
				'value'	=> 'white'
			)
		)
	),	
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Dashboard customize colors',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),	
	array(
		'label'	=> 'WP Admin Background',
		'desc'	=> 'Color for dashboard background.',
		'id'	=> $prefix.'wp_admin_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> '',
		'atention'=>'Atention!: After change value, please refresh page.'
	),
	array(
		'label'	=> 'WP Admin Menu Bottom Top Color',
		'desc'	=> 'Colors for dashboard menu.',
		'id'	=> $prefix.'wp_menu_item_top_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> '',
		'atention'=>'Atention!: After change value, please refresh page.'
	),
	array(
		'label'	=> 'WP Admin Menu Bottom Line Color',
		'desc'	=> 'Colors for dashboard menu.',
		'id'	=> $prefix.'wp_menu_item_bottom_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> '',
		'atention'=>'Atention!: After change value, please refresh page.'
	),
	/*
	array(
		'label'=> 'Select Box',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'select',
		'type'	=> 'select',
		'options' => array (
			'one' => array (
				'label' => 'Option One',
				'value'	=> 'one'
			),
			'two' => array (
				'label' => 'Option Two',
				'value'	=> 'two'
			),
			'three' => array (
				'label' => 'Option Three',
				'value'	=> 'three'
			)
		)
	),
	array(
		'label'	=> 'Repeatable',
		'desc'	=> 'A description for the field. The items inserted here are movable.',
		'id'	=> $prefix.'repeatable',
		'type'	=> 'repeatable'
	),*/
	array(
		'type'	=> 'divider'
	),
	array(
		'type'	=> 'tab_end'
	)
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}