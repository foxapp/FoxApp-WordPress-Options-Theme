<?php
global $creativeto_options; $creativeto_options = get_option('creativeto_settings');
if( $creativeto_options['creativeto_footer_layout']!='null' && (int)$creativeto_options['creativeto_footer_layout']>0){
	for($i=0,$j=1;$i<$creativeto_options['creativeto_footer_layout'];$i++,$j++){
		register_sidebar( array(
			'name' => __( 'Footer Widget '.$j, 'twentytwelve' ),
			'id' => 'footer-widget-'.$j,
			'description' => __( 'Place here content for widget '.$j, 'twentytwelve' ),
			'before_widget' => false,
			'after_widget' => false,
			'before_title' => '',
			'after_title' => '',
		) );
	}
}
//var_dump($creativeto_options['creativeto_footer_layout']);
?>