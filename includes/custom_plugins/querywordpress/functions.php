<?php
if(!function_exists("create_rewrite_rules")){
function create_rewrite_rules() {
    global $wp_rewrite;
	function query_vars_add($query_vars){
		  if(function_exists('creativeto_get_option') && creativeto_get_option('creativeto_queryvars') != FALSE){//need plugin creativeto_theme_functions by Enache Ion
			  $creativeto_queryvars = explode(",",creativeto_get_option('creativeto_queryvars'));
			  if(is_array($creativeto_queryvars)){
				  foreach($creativeto_queryvars as $var){
					 $query_vars[] = $var;
				  }
			  }else{
				  $query_vars[] = creativeto_get_option('creativeto_queryvars');
				 }
		  }
		  
		  return $query_vars;
	}
	add_action('query_vars', 'query_vars_add');
	$wp_rewrite->flush_rules();
}
//add_action('init', 'create_rewrite_rules');
}
?>