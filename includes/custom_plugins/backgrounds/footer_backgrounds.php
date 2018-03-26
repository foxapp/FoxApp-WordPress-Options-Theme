<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'footer_backgrounds', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	array(
		'label'=> 'Footer Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Footer background',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'footer-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label' => 'Background opacity',
		'desc'	=> '',
		'id'	=> $prefix.'footer-bg_opacity',
		'type'	=> 'slider_size',
		'default'=> 100,
		'max'	=> 100
	),
	array (
		'label'	=> 'Choose background image',
		'desc'	=> 'Choose background image.',
		'id'	=> $prefix.'footer-bg_image',
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
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z04.png',
				'value'	=> 'z04'
			),
			'3' => array (
				'label' => 'z09',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.png',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.png',
			)
		)
	),
	array(
		'label'=> 'Repeat',
		'id'	=> $prefix.'footer-bg_repeat',
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
		'id'	=> $prefix.'footer-bg_vertical_pos',
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
		'id'	=> $prefix.'footer-bg_horizontal_pos',
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
		'label'=> 'Decorative line above the footer',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'divs_and_heads-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label'	=> 'Choose decorative line',
		'desc'	=> 'Choose decorative line.',
		'id'	=> $prefix.'divs_and_heads-footer_wide_divider',
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
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z04.png',
				'value'	=> 'z04'
			),
			'3' => array (
				'label' => 'z09',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.png',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.png',
			)
		)
	),
	array (
		'label' => 'hide if the widget area in the footer is disabled',
		'desc'	=> '',
		'id'	=> $prefix.'divs_and_heads-footer_wide_divider_hide_if_no_footer',
		'type'	=> 'enabled_disabled',
		'default'	=> '1',
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
		'label'=> 'Repeat X',
		'id'	=> $prefix.'footer-bg_repeat',
		'type'	=> 'select',
		'width' => '200px',
		'default'	=> 'none',
		'options' => array (
			'1' => array (
				'label' => 'none',
				'value'	=> 'none'
			),
			'2' => array (
				'label' => 'repeat-x',
				'value'	=> 'repeat-x'
			)
		)
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Background in footer widgets',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'widgetcodes_footer-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label' => 'Background opacity',
		'desc'	=> '',
		'id'	=> $prefix.'widgetcodes_footer-bg_opacity',
		'type'	=> 'slider_size',
		'default'=> 100,
		'max'	=> 100
	),
	array(
		'type'	=> 'divider'
	),
	array(
		'label'=> 'Bottom line background',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'Background color',
		'id'	=> $prefix.'bottom_line-bg_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array (
		'label' => 'Background opacity',
		'desc'	=> '',
		'id'	=> $prefix.'bottom_line-bg_opacity',
		'type'	=> 'slider_size',
		'default'=> 100,
		'max'	=> 100
	),
	array (
		'label'	=> 'Choose background image',
		'desc'	=> 'Choose background image.',
		'id'	=> $prefix.'bottom_line-bg_image',
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
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z04.png',
				'value'	=> 'z04'
			),
			'3' => array (
				'label' => 'z09',
				'value' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.png',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/backgrounds/assets/backgrounds/content/pattern-main/full/z09.png',
			)
		)
	),
	array(
		'label'=> 'Repeat',
		'id'	=> $prefix.'bottom_line-bg_repeat',
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
		'id'	=> $prefix.'bottom_line-bg_vertical_pos',
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
		'id'	=> $prefix.'bottom_line-bg_horizontal_pos',
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
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}
?>