<?php
global $creativeto_custom_meta_fields, $prefix, $creativeto_version, $creativeto_version_compatible;
if( in_array( (string) $creativeto_version, (array) $creativeto_version_compatible) ){
$temp_array = array(

	array(
		'id'	=> $prefix.'querywordpress_vars',
		'type'	=> 'tab_start'
	),
	
	array(
		'label'=> 'General Tab Settings',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),
	
	array(
		'label'=> 'Query Vars for Wordpress Link Rewrites used in codes',
		'desc'	=> 'Delimited by comma (ex:forum_id, page_id)',
		'id'	=> $prefix.'queryvars',
		'type'	=> 'textarea'
	),
	
	array(
		'type'	=> 'tab_end'
	),
);
$creativeto_custom_meta_fields = array_merge($temp_array,$creativeto_custom_meta_fields);
}