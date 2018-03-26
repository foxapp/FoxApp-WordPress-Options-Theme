<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'content_backgrounds', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array(
		'label'=> 'Content Area Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Icons',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array (
		'label'	=> 'Icons style',
		'desc'	=> 'Icons style.',
		'id'	=> $prefix.'main-icons_style',
		'type'	=> 'enabled_disabled',
		'default'	=> 'light',
		'options' => array (
			'one' => array (
				'label' => 'Dark',
				'value'	=> 'dark'
			),
			'two' => array (
				'label' => 'Light',
				'value'	=> 'light'
			)
		)
	),
	array (
		'label' => 'Icons opacity',
		'desc'	=> '',
		'id'	=> $prefix.'main-icons_opacity',
		'type'	=> 'slider_size',
		'default'	=> 0,
		'max'	=> 100
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Main background',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'main_bg-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Choose background image',
		'id'	=> $prefix.'background-bg_image',
		'type'	=> 'radio_group_with_images',
		'width' => '80px',
		'height' => '80px',
		'options' => array (
			'1' => array (
				'label' => 'None',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/none.png',
				'value' =>  'none'
			),
			'2' => array (
				'label' => 'z02',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z02.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z02.jpg'
			),
			'3' => array (
				'label' => 'z03',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z03.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z03.jpg'
			),
			'4' => array (
				'label' => 'z04',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z04.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z04.jpg'
			),
			'5' => array (
				'label' => 'z05',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z05.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z05.jpg'
			),
			'6' => array (
				'label' => 'z06',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z06.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z06.jpg'
			),
			'7' => array (
				'label' => 'z07',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z07.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z07.jpg'
			),
			'8' => array (
				'label' => 'z08',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z08.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z08.jpg'
			),
			'9' => array (
				'label' => 'z09',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z09.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z09.jpg'
			),
			'10' => array (
				'label' => 'z10',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z10.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z10.jpg'
			),
			'11' => array (
				'label' => 'z11',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z11.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z11.jpg'
			),
			'12' => array (
				'label' => 'z12',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z12.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z12.jpg'
			),
			'13' => array (
				'label' => 'z13',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z13.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z13.jpg'
			),
			'14' => array (
				'label' => 'z14',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z14.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z14.jpg'
			),
			'15' => array (
				'label' => 'z15',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z15.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z15.jpg'
			),
			'16' => array (
				'label' => 'z16',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z16.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z16.jpg'
			),
			'17' => array (
				'label' => 'z17',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z17.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z17.jpg'
			),
			'18' => array (
				'label' => 'z18',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z18.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z18.jpg'
			),
			'19' => array (
				'label' => 'z19',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z19.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z19.jpg'
			),
			'20' => array (
				'label' => 'z20',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z20.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z20.jpg'
			)
		)
	),
	array (
		'label' => 'replace background with your custom image',
		'desc'	=> ' ',
		'id'	=> $prefix.'main_bg-bg_upload',
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
		'label'	=> 'Upload your own image',
		'desc'	=> '',
		'max-width'		=> '235',
		'id'	=> $prefix.'main_bg-bg_custom',
		'type'	=> 'image'
	),
	array(
		'label'=> 'Repeat',
		'id'	=> $prefix.'main_bg-bg_repeat',
		'type'	=> 'select',
		'width' => '200px',
		'default'	=> 'repeat',
		'options' => array (
			'1' => array (
				'label' => 'repeat',
				'value'	=> 'repeat'
			),
			'2' => array (
				'label' => 'repeat-x',
				'value'	=> 'repeat-x'
			),
			'3' => array (
				'label' => 'repeat-y',
				'value'	=> 'repeat-y'
			),
			'4' => array (
				'label' => 'no-repeat',
				'value'	=> 'no-repeat'
			)
		)
	),
	array(
		'label'=> 'Vertical position',
		'id'	=> $prefix.'main_bg-bg_vertical_pos',
		'type'	=> 'select',
		'width' => '200px',
		'default'	=> 'center',
		'options' => array (
			'1' => array (
				'label' => 'top',
				'value'	=> 'top'
			),
			'2' => array (
				'label' => 'center',
				'value'	=> 'center'
			),
			'3' => array (
				'label' => 'bottom',
				'value'	=> 'bottom'
			)
		)
	),
	array(
		'label'=> 'Horizontal position',
		'id'	=> $prefix.'main_bg-bg_horizontal_pos',
		'type'	=> 'select',
		'width' => '200px',
		'default'	=> 'center',
		'options' => array (
			'1' => array (
				'label' => 'left',
				'value'	=> 'left'
			),
			'2' => array (
				'label' => 'center',
				'value'	=> 'center'
			),
			'3' => array (
				'label' => 'right',
				'value'	=> 'right'
			)
		)
	),
	array(
		'label'=> 'Fixed background',
		'id'	=> $prefix.'main_bg-bg_fixed',
		'type'	=> 'enabled_disabled',
		'default'	=> '0',
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> '1'
			),
			'two' => array (
				'label' => 'No',
				'value'	=> '0'
			)
		)
	),
	array(
		'label'=> 'Hide in mobile layout',
		'id'	=> $prefix.'main_bg-bg_mobile_hide',
		'type'	=> 'enabled_disabled',
		'default'	=> '0',
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> '1'
			),
			'two' => array (
				'label' => 'No',
				'value'	=> '0'
			)
		)
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Overlay',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Enable overlay',
		'id'	=> $prefix.'main_bg-overlay_enable',
		'type'	=> 'enabled_disabled',
		'default'	=> '0',
		'options' => array (
			'one' => array (
				'label' => 'Yes',
				'value'	=> '1'
			),
			'two' => array (
				'label' => 'No',
				'value'	=> '0'
			)
		)
	),
	array(
		'label'=> 'Choose overlay image',
		'id'	=> $prefix.'main_bg-overlay_image',
		'type'	=> 'radio_group_with_images',
		'width' => '80px',
		'height' => '80px',
		'options' => array (
			'1' => array (
				'label' => 'None',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/none.png',
				'value' =>  'none'
			),
			'2' => array (
				'label' => 'z21',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z21.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z21.jpg'
			),
			'3' => array (
				'label' => 'z22',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z22.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z22.jpg'
			),
			'4' => array (
				'label' => 'z23',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z23.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z23.jpg'
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
?>