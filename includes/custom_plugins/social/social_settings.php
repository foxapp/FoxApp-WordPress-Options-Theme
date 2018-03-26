<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'social_settings',
		'type'	=> 'tab_start'
	),	
	array(
		'label'=> 'Social sites',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Social links',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Social links',
		'desc'	=> '',
		'width'	=> '350px',
		'id'	=> $prefix.'social_icons',
		'type'	=> 'multipletext',
		'options' => array (
			'one' => array (
				'label' => 'Skype',
				'src'	=> CREATIVETOCUSTOMPLUGINPATCH.'/social/social-icons/skype.png',
				'name' => 'skype'
			),
			'two' => array (
				'label' => 'Facebook',
				'src'	=> CREATIVETOCUSTOMPLUGINPATCH.'/social/social-icons/facebook.png',
				'name' => 'facebook'
			),
			'three' => array (
				'label' => 'Linkedin',
				'src'	=> CREATIVETOCUSTOMPLUGINPATCH.'/social/social-icons/linkedin.png',
				'name' => 'linkedin'
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