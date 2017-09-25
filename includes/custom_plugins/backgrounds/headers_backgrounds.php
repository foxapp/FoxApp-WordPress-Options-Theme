<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'headers_backgrounds', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array(
		'label'=> 'Headers Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'	=> 'Home Header image URL',
		'desc'	=> 'Enter the URL to your header image(png, jpg or gif file).',
		'id'	=> $prefix.'home_header_image',
		'width' => '80px',
		'height' => '80px',
		'max-width' => '100%',
		'type'	=> 'image'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Header on content pages',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array (
		'label'	=> 'Choose background image',
		'desc'	=> 'Choose background image.',
		'id'	=> $prefix.'header_content-bg_image',
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
                            'label' => 'z04',
                            'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z04.jpg',
                            'value'	=> CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z04.png'
                    ),
                    '3' => array (
                            'label' => 'z09',
                            'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z09.jpg',
                            'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.png',
                    )
		)
	),
	array(
		'label'=> 'Repeat',
		'id'	=> $prefix.'header_content-bg_repeat',
		'type'	=> 'select',
		'width' => '200px',
		'default'	=> 'repeat',
		'options' => array (
                    '1' => array (
                            'label' => 'repeat',
                            'value' => 'repeat'
                    ),
                    '2' => array (
                            'label' => 'repeat-x',
                            'value' => 'repeat-x'
                    ),
                    '3' => array (
                            'label' => 'repeat-y',
                            'value' => 'repeat-y'
                    ),
                    '4' => array (
                            'label' => 'no-repeat',
                            'value' => 'no-repeat'
                    )
		)
	),
	array(
		'label'=> 'Vertical position',
		'id'	=> $prefix.'header_content-bg_vertical_pos',
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
		'id'	=> $prefix.'header_content-bg_horizontal_pos',
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
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Background under logo & menu',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'header_logo_menu-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Choose background image',
		'id'	=> $prefix.'header_logo_menu-bg_image',
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
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z02.png'
			),
			'3' => array (
				'label' => 'z03',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z03.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z03.jpg'
			),
			'4' => array (
				'label' => 'z04',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z04.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z04.jpg'
			),
			'5' => array (
				'label' => 'z05',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z05.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z05.jpg'
			),
			'6' => array (
				'label' => 'z06',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z06.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z06.jpg'
			),
			'7' => array (
				'label' => 'z07',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z07.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z07.jpg'
			),
			'8' => array (
				'label' => 'z08',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z08.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z08.jpg'
			),
			'9' => array (
				'label' => 'z09',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z09.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.jpg'
			),
			'10' => array (
				'label' => 'z10',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z10.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z10.jpg'
			),
			'11' => array (
				'label' => 'z11',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z11.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z11.jpg'
			),
			'12' => array (
				'label' => 'z12',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z12.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z12.jpg'
			),
			'13' => array (
				'label' => 'z13',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z13.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z13.jpg'
			),
			'14' => array (
				'label' => 'z14',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z14.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z14.jpg'
			),
			'15' => array (
				'label' => 'z15',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z15.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z15.jpg'
			),
			'16' => array (
				'label' => 'z16',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z16.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z16.jpg'
			),
			'17' => array (
				'label' => 'z17',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z17.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z17.jpg'
			),
			'18' => array (
				'label' => 'z18',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z18.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z18.jpg'
			),
			'19' => array (
				'label' => 'z19',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z19.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z19.jpg'
			),
			'20' => array (
				'label' => 'z20',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z20.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z20.jpg'
			),
			'21' => array (
				'label' => 'Transparent 50',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/tr_50.png',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/tr_50.png'
			),
			'22' => array (
				'label' => 'Transparent 525',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/tr_25.png',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/tr_25.png'
			)
		)
	),
	array(
		'label'=> 'Repeat',
		'id'	=> $prefix.'header_logo_menu-bg_repeat',
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
		'id'	=> $prefix.'header_logo_menu-bg_vertical_pos',
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
		'id'	=> $prefix.'header_logo_menu-bg_horizontal_pos',
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
		'id'	=> $prefix.'header_logo_menu-bg_fixed',
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
		'label'=> 'Top line background',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'top_line-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'=> 'Choose background image',
		'id'	=> $prefix.'top_line-bg_image',
		'type'	=> 'radio_group_with_images',
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
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z03.jpg'
			),
			'4' => array (
				'label' => 'z04',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/thumbs/z04.jpg',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z04.jpg'
			)
		)
	),
	array(
		'label'=> 'Repeat',
		'id'	=> $prefix.'top_line-bg_repeat',
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
		'id'	=> $prefix.'top_line-bg_vertical_pos',
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
		'id'	=> $prefix.'top_line-bg_horizontal_pos',
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
		'id'	=> $prefix.'top_line-bg_fixed',
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
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}
?>