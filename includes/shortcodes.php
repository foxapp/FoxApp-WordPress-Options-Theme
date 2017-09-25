<?php

/* ------------------------------------------------------------------*/
/* SHORTCODES */
/* ------------------------------------------------------------------*/

// Display Simple Content [option id="field_id"]
function creativeto_shortcode_option( $atts, $content = null)	{
	global $creativeto_options;	
	extract( shortcode_atts( 
	array(
	      'id' => ''
	      ), $atts ) );
	$content = $creativeto_options["$id"];	
	return $content;
}
add_shortcode('option', 'creativeto_shortcode_option');

// Display Image [image id="field_id"]
function creativeto_shortcode_image( $atts, $content = null)	{
	global $creativeto_options;
	extract( shortcode_atts( 
	array(
	      'id' => ''
	      ), $atts ) );
	      
	// Get attachment data
	$image_data = wp_get_attachment_image_src( $creativeto_options["$id"], '' );	
	// get URL
	$url = $image_data[0];
	$content = '<img src="'.$url.'" />';	
	return $content;
}
add_shortcode('image', 'creativeto_shortcode_image');

?>