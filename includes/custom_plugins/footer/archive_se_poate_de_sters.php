<?php
global $creativeto_custom_meta_fields, $prefix, $creativeworks_version;
if($creativeworks_version == '1.0'){
$creativeto_custom_plugin_tabs_submenu = array(
	array(
		'id'	=> $prefix.'site_and_pages_layout', // Use data in $creativeto_custom_tabs
		'type'	=> 'tab_start'
	),
	
	array(
		'label'=> 'General Tab Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	array (
		'label' => 'Archive Layout Type',
		/*'new-line' => 'yes',*/
		'desc'	=> 'Your blog,portfolio(etc) posts will use the layout you select here.<br><br>If you want an image to display in the layout then do not forget to set your featured image when editing your posts.',
		'id'	=> $prefix.'archive_layout',
		'type'	=> 'radio_group_with_images',
		'options' => array (
			'1' => array (
				'label' => 'With Sidebar Left',
				'img' =>  CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/posts_type_1.png',
				'value'	=> '1'
			),
			'2' => array (
				'label' => 'With 2 Sidebars',
				'value'	=> '2',
				'img' => CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/posts_type_2.png'
			),
			'3' => array (
				'label' => 'With Sidebar Right',
				'value'	=> '3',
				'img' => CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/posts_type_3.png'
			),
			'4' => array (
				'label' => 'With No Sidebar',
				'value'	=> '4',
				'img' => CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/posts_type_4.png'
			)
		)
	),
	array (
		'label'	=> 'Pages Layout Type',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'pages_layout',
		'type'	=> 'radio_group_with_images',
		'options' => array (
			'1' => array (
				'label' => 'With Sidebar Left',
				'img' =>  CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/template1.png',
				'value'	=> '1'
			),
			'2' => array (
				'label' => 'With 2 Sidebars',
				'value'	=> '2',
				'img' => CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/template2.png'
			),
			'3' => array (
				'label' => 'With Sidebar Right',
				'value'	=> '3',
				'img' => CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/template3.png'
			),
			'4' => array (
				'label' => 'With No Sidebar',
				'value'	=> '4',
				'img' => CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/template4.png'
			)
		)
	),
	array (
		'label'	=> 'Site Layout Type',
		'desc'	=> 'Choose the layout type. (Default: Stretched) ',
		'id'	=> $prefix.'site_layout',
		'type'	=> 'radio_group_with_images',
		'options' => array (
			'1' => array (
				'label' => 'Stretched',
				'img' =>  CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/stretched.png',
				'value'	=> '1'
			),
			'2' => array (
				'label' => 'Boxed',
				'value'	=> '2',
				'img' => CREATIVEWPCUSTOMPLUGINPATCH.'/archive_layout/assets/boxed.png'
			)
		)
	),
	/*
	array (
		'label' => 'Layout type',
		'new-line' => 'yes',
		'desc'	=> 'Choose the layout type. (Default: Stretched) ',
		'id'	=> $prefix.'breadcrumb',
		'type'	=> 'radio',
		'options' => array (
			'one' => array (
				'label' => 'Stretched',
				'value'	=> 'stretched'
			),
			'two' => array (
				'label' => 'Boxed',
				'value'	=> 'boxed'
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
		'type'	=> 'checkbox'
	),
	array(
		'label'=> 'Copyright Text',
		'desc'	=> '',
		'id'	=> $prefix.'copyright',
		'type'	=> 'text'
	),
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
	array (
		'label' => 'Radio Group',
		'new-line' => 'yes',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'radio',
		'type'	=> 'radio',
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
	array (
		'label'	=> 'Checkbox Group',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'checkbox_group',
		'type'	=> 'checkbox_group',
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
		'label' => 'Category',
		'id'	=> 'category',
		'type'	=> 'tax_select'
	),
	array(
		'label' => 'Post List',
		'desc' => 'A description for the field.',
		'id' 	=>  $prefix.'post_id',
		'type' => 'post_list',
		'post_type' => array('post','page')
	),
	*/
	array(
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}