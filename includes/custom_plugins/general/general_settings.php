<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'general_settings', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'=> 'General Tab Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'label'	=> 'Logo image URL',
		'desc'	=> 'Enter the URL to your logo image(png, jpg or gif file).',
		'id'	=> $prefix.'branding-header_logo',
		'type'	=> 'image'
	),
	array(
		'label'	=> 'Favicon image URL',
		'desc'	=> 'Enter the URL to your favicon image(png, jpg or gif file).',
		'id'	=> $prefix.'branding-favicon',
		'type'	=> 'image'
	),
	array(
		'label'	=> 'Footer Logo',
		'desc'	=> 'Enter the URL to footer image(png, jpg or gif file).',
		'id'	=> $prefix.'branding-footer_logo',
		'type'	=> 'image'
	),
	array(
		'label'=> 'Logo tagline',
		'desc'	=> 'Specify tagline text to show below the logo',
		'id'	=> $prefix.'branding-header_tagline',
		'type'	=> 'text'
	),
	array (
		'label' => 'Show Breadcrumb',
		'desc'	=> 'Choose if you want to show or not breadcrumbs on your website. (Default: On) ',
		'id'	=> $prefix.'breadcrumb',
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
	array (
		'label' => 'Search type header',
		'new-line' => 'yes',
		'desc'	=> 'Select the type of posts you want to search with searchform of the header. (Default: Products) ',
		'id'	=> $prefix.'search_header_type',
		'type'	=> 'radio',
		'options' => array (
			'one' => array (
				'label' => 'Products',
				'value'	=> 'products'
			),
			'two' => array (
				'label' => 'Posts',
				'value'	=> 'posts'
			),
			'three' => array (
				'label' => 'All',
				'value'	=> 'all'
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
		'label'=> 'Copyright & Credits',
		'desc'	=> '',
		'id'	=> $prefix.'branding-copyrights',
		'type'	=> 'text'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Creative Themes Credits',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),	
	array(
		'label'=> 'Give credits to Creative Themes',
		'id'	=> $prefix.'branding-ct_credits',
		'type'	=> 'enabled_disabled',
		'default'	=> 1,
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
		'label'=> 'Creative Themes credits color',
		'id'	=> $prefix.'branding-ct_credits_color',
		'type'	=> 'enabled_disabled',
		'default'	=> CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/creativethemes_white.png',
		'options' => array (
			'one' => array (
				'label' => 'White',
				'value'	=> CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/creativethemes_white.png'
			),
			'two' => array (
				'label' => 'Black',
				'value'	=> CREATIVETOCUSTOMPLUGINPATCH.'/general/assets/creativethemes_black.png'
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