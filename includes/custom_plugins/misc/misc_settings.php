<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array((string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'misc_settings', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'=> 'Misc Tab Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array (
		'label' => 'Use blur',
		'desc'	=> '',
		'id'	=> $prefix.'misc_rollover_blur',
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
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Top line options',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Show top line',
		'id'	=> $prefix.'misc-show_top_line',
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
		'label'=> 'Show search form',
		'id'	=> $prefix.'misc-show_search_top',
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
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Post options',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Show author info in posts',
		'id'	=> $prefix.'misc-show_author_details',
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
		'label'=> 'Contacts in header',
		'id'	=> $prefix.'misc-show_header_contacts',
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
		'label'=> 'Adress',
		'desc'	=> '',
		'id'	=> $prefix.'misc-contact_address',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Phone',
		'desc'	=> '',
		'id'	=> $prefix.'misc-contact_phone',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Email',
		'desc'	=> '',
		'id'	=> $prefix.'misc-contact_email',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Skype',
		'desc'	=> '',
		'id'	=> $prefix.'misc-contact_skype',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Working hours',
		'desc'	=> '',
		'id'	=> $prefix.'misc-contact_work_hours',
		'type'	=> 'text'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Show next/prev links',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'on blog post page',
		'id'	=> $prefix.'misc-show_next_prev_post',
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
		'label'=> 'on portfolio project page',
		'id'	=> $prefix.'misc-show_next_prev_portfolio',
		'type'	=> 'enabled_disabled',
		'default'	=> 1,
		'options' => array (
			'1' => array (
				'label' => 'Yes',
				'value'	=> 1
			),
			'2' => array (
				'label' => 'No',
				'value'	=> 0
			)
		)
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Analytics',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Code',
		'desc'	=> '',
		'id'	=> $prefix.'misc-analitics_code',
		'type'	=> 'textarea'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Loading icon',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Loading icon background',
		'id'	=> $prefix.'misc-loading_bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Loading border icon background',
		'id'	=> $prefix.'misc-loading_bg_border_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Loading image',
		'id'	=> $prefix.'misc-loading_bg_image',
		'width'	=> '32px',
		'type'	=> 'radio_group_with_images',
		'default'=> 'none',
		'options' => array (
			'1' => array (
				'label' => 'None',
				'img' =>  get_template_directory_uri().'/images/noimage_small.jpg',
				'value' =>  'none'
			),
			'2' => array (
				'label' => 'Example 2',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_2.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_2.gif'
			),
			'3' => array (
				'label' => 'Example 3',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_3.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_3.gif'
			),
			'4' => array (
				'label' => 'Example 4',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_4.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_4.gif'
			),
			'5' => array (
				'label' => 'Example 5',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_5.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_5.gif'
			),
			'6' => array (
				'label' => 'Example 6',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_6.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_6.gif'
			),
			'7' => array (
				'label' => 'Example 7',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_7.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_7.gif'
			),
			'8' => array (
				'label' => 'Example 8',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_8.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_8.gif'
			),
			'9' => array (
				'label' => 'Example 9',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_9.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_9.gif'
			),
			'10' => array (
				'label' => 'Example 10',
				'img'   => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_10.gif',
				'value' => CREATIVETOCUSTOMPLUGINPATCH.'/misc/loading-image/loader_10.gif'
			)
		)
	),
	array (
		'label' => 'replace image with your custom image',
		'desc'	=> ' ',
		'id'	=> $prefix.'misc-loading_bg_upload',
		'type'	=> 'enabled_disabled',
		'default'	=> false,
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> true
			),
			'two' => array (
				'label' => 'No',
				'value'	=> false
			)
		)
	),
	array(
		'label'	=> 'Upload your own loading image',
		'desc'	=> '',
		'max-width'		=> '235',
		'id'	=> $prefix.'misc-loading_bg_custom',
		'type'	=> 'image'
	),
	array(
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}