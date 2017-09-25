<?php
global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'typography', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),	
	array(
		'label'=> 'Basic Font Family Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array (
		'label' => 'Basic font-family',
		'new-line' => 'yes',
		'desc'	=> 'Select the general font type for site. (Default: Arial, Tahoma, Verdana) ',
		'id'	=> $prefix.'fonts-font_family',
		'type'	=> 'radio',
		'options' => array (
			'1' => array (
				'label' => "<span style=\"font-family:Arial, Tahoma, Verdana\">Arial, Tahoma, Verdana</span>",
				'value'	=> 'Arial, Tahoma, Verdana'
			),
			'2' => array (
				'label' => "<span style=\"font-family:'Arial Black', Gadget, sans-serif\">'Arial Black', Gadget, sans-serif</span>",
				'value'	=> "'Arial Black', Gadget, sans-serif"
			),
			'3' => array (
				'label' => "<span style=\"font-family:Verdana, Geneva, sans-serif\">Verdana, Geneva, sans-serif</span>",
				'value'	=> 'Verdana, Geneva, sans-serif'
			),
			'4' => array (
				'label' => "<span style=\"font-family:Georgia, 'Times New Roman', Times, serif\">Georgia, 'Times New Roman', Times, serif</span>",
				'value'	=> "Georgia, 'Times New Roman', Times, serif"
			),
			'5' => array (
				'label' => "<span style=\"font-family:'Courier New', Courier, monospace\">'Courier New', Courier, monospace</span>",
				'value'	=> "'Courier New', Courier, monospace"
			),
			'6' => array (
				'label' => "<span style=\"font-family:Tahoma, Geneva, sans-serif\">Tahoma, Geneva, sans-serif</span>",
				'value'	=> "Tahoma, Geneva, sans-serif"
			),
			'7' => array (
				'label' => "<span style=\"font-family:'Trebuchet MS', Arial, Helvetica, sans-serif\">'Trebuchet MS', Arial, Helvetica, sans-serif</span>",
				'value'	=> "'Trebuchet MS', Arial, Helvetica, sans-serif"
			),
			'8' => array (
				'label' => "<span style=\"font-family:'Comic Sans MS', cursive\">'Comic Sans MS', cursive</span>",
				'value'	=> "'Comic Sans MS', cursive"
			)
		)
	),
	array (
		'label' => 'General font size',
		'desc'	=> 'Select the general font size for site. (Default: 12px) ',
		'id'	=> $prefix.'fonts-font_size',
		'type'	=> 'slider_size',
		'default'	=> 12,
		'max'	=> 50
	),
	array (
		'label' => 'General line height',
		'desc'	=> 'Select the general line height in text for site. (Default: 12px) ',
		'id'	=> $prefix.'fonts-line_height',
		'type'	=> 'slider_size',
		'default'	=> 12,
		'max'	=> 50
	),
	array(
		'type'	=> 'divider'
	),	
	array(
		'label'=> 'Content area',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'	=> 'Primary text color',
		'desc'	=> 'Primary text color.',
		'id'	=> $prefix.'fonts_content-primary_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),	
	array(
		'label'	=> 'Secondary text color',
		'desc'	=> 'Secondary text color.',
		'id'	=> $prefix.'fonts_content-secondary_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Links text color',
		'desc'	=> 'Links text color.',
		'id'	=> $prefix.'fonts-links_text_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),	
	array(
		'label'=> 'Footer',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'	=> 'Primary text color',
		'desc'	=> 'Primary text color.',
		'id'	=> $prefix.'fonts_footer-primary_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),	
	array(
		'label'	=> 'Secondary text color',
		'desc'	=> 'Secondary text color.',
		'id'	=> $prefix.'fonts_footer-secondary_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'label'	=> 'Links text color',
		'desc'	=> 'Links text color.',
		'id'	=> $prefix.'fonts-links_text_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),	
	array(
		'label'=> 'Bottom line',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'	=> 'Text color',
		'desc'	=> 'Text color.',
		'id'	=> $prefix.'fonts_content-bottomline_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),	
	array(
		'label'=> 'Contacts in top line',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'	=> 'Text color',
		'desc'	=> 'Text color.',
		'id'	=> $prefix.'fonts_content-topline_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),
	array(
		'type'	=> 'divider'
	),	
	array(
		'label'=> 'Headers sizes',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'=> 'H1',
		'desc'	=> '',
		'id'	=> $prefix.'fonts-headers_size_h1',
		'type'	=> 'text'
	),
	array(
		'label'=> 'H2',
		'desc'	=> '',
		'id'	=> $prefix.'fonts-headers_size_h2',
		'type'	=> 'text'
	),
	array(
		'label'=> 'H3',
		'desc'	=> '',
		'id'	=> $prefix.'fonts-headers_size_h3',
		'type'	=> 'text'
	),
	array(
		'label'=> 'H4',
		'desc'	=> '',
		'id'	=> $prefix.'fonts-headers_size_h4',
		'type'	=> 'text'
	),
	array(
		'label'=> 'H5',
		'desc'	=> '',
		'id'	=> $prefix.'fonts-headers_size_h5',
		'type'	=> 'text'
	),
	array(
		'label'=> 'H6',
		'desc'	=> '',
		'id'	=> $prefix.'fonts-headers_size_h6',
		'type'	=> 'text'
	),
	array(
		'type'	=> 'divider'
	),	
	array(
		'label'=> 'Headers color in content area',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'	=> 'Text color',
		'desc'	=> 'Text color.',
		'id'	=> $prefix.'fonts_content-headers_color',
		'type'	=> 'colorpicker_minicolors',
		'value'	=> ''
	),	
	array(
		'label'=> 'Headers color in footer',
		'id'	=> $prefix.'title',
		'type'	=> 'option_title'
	),
	array(
		'label'	=> 'Text color',
		'desc'	=> 'Text color.',
		'id'	=> $prefix.'fonts_footer-headers_bottom_color',
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