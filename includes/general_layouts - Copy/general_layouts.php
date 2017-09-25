<?php global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
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
		'label'	=> 'Тип макета сайта',
		'desc'	=> 'Выберите тип макета.',
		'id'	=> $prefix.'site_layouts',
		'type'	=> 'radio_group_with_images',
		'options' => array (
			'1' => array (
				'label' => 'Stretched',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/stretched.png',
				'value'	=> '1'
			),
			'2' => array (
				'label' => 'Boxed',
				'value'	=> '2',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/boxed.png'
			)
		)
	),
	array (
		'label'	=> 'Страницы Тип макета',
		'desc'	=> 'Выберите тип макета.',
		'id'	=> $prefix.'page_layout',
		'type'	=> 'radio_group_with_images',
		'options' => array (
			'1' => array (
				'label' => '1 колонка',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/template1.png',
				'value'	=> '1'
			),
			'2' => array (
				'label' => '2 колонки',
				'value'	=> '2',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/template2.png'
			),
			'3' => array (
				'label' => '3 колонки',
				'value'	=> '3',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/template3.png'
			),
			'4' => array (
				'label' => '4 колонки',
				'value'	=> '4',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/template4.png'
			)
		)
	),
	array (
		'label'	=> 'Нижний колонтитул Тип макета',
		'desc'	=> 'Выберите тип макета.',
		'id'	=> $prefix.'footer_layout',
		'type'	=> 'radio_group_with_images',
		'options' => array (
			'1' => array (
				'label' => 'С 1 Виджет',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/footer1.png',
				'value'	=> '1'
			),
			'2' => array (
				'label' => 'С 2 Виджеты',
				'value'	=> '2',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/footer2.png'
			),
			'3' => array (
				'label' => 'С 3 Виджеты',
				'value'	=> '3',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/footer3.png'
			),
			'4' => array (
				'label' => 'С 4 Виджеты',
				'value'	=> '4',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/footer4.png'
			)
		)
	),
	array (
		'label' => 'Архив Тип макета',
		/*'new-line' => 'yes',*/
		'desc'	=> 'Выберите тип макета.',
		'id'	=> $prefix.'arhive_layout',
		'type'	=> 'radio_group_with_images',
		'options' => array (
			'1' => array (
				'label' => 'С боковой панели слева',
				'img' =>  CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/posts_type_1.png',
				'value'	=> '1'
			),
			'2' => array (
				'label' => 'С 2 боковых панелей',
				'value'	=> '2',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/posts_type_2.png'
			),
			'3' => array (
				'label' => 'С боковой панели справа',
				'value'	=> '3',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/posts_type_3.png'
			),
			'4' => array (
				'label' => 'Без боковой панели',
				'value'	=> '4',
				'img' => CREATIVETOCUSTOMPLUGINPATCH.'/general_layouts/assets/posts_type_4.png'
			)
		)
	),
	array(
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($creativeto_custom_plugin_tabs_submenu,$creativeto_custom_meta_fields);
}
?>