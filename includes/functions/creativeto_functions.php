<?php 
/* ------------------------------------------------------------------*/
/* ADD CUSTOM SCRIPTS FOR JQUERY UI */
/* ------------------------------------------------------------------*/
function creativeto_add_custom_scripts() {
	global $creativeto_custom_meta_fields, $creativeto_options;

	// Date Picker
	$output = '<script type="text/javascript">
				jQuery(function() {';
	if(is_array($creativeto_custom_meta_fields)){
	foreach ($creativeto_custom_meta_fields as $field) { // loop through the fields looking for certain types
		if($field['type'] == 'date')
			$output .= 'jQuery(".datepicker").datepicker();';
			
		// Slider
		if ($field['type'] == 'slider') {
			$field_id = $field['id'];
			$value = $creativeto_options["$field_id"] != '' ? $creativeto_options["$field_id"] : '0';			
			$output .= '
					jQuery( "#'.$field['id'].'-slider" ).slider({
						value: '.$value.',
						min: '.$field['min'].',
						max: '.$field['max'].',
						step: '.$field['step'].',
						slide: function( event, ui ) {
							jQuery( "#creativeto_val_slider_'.$field['id'].'" ).val( ui.value );
						}
					});';
		}
	}
	}

	
	$output .= '});
		</script>';

	echo $output;
}

add_action('admin_head','creativeto_add_custom_scripts');

/* ------------------------------------------------------------------*/
/* CREATE THE FIELDS AND DISPLAY THEM */
/* ------------------------------------------------------------------*/

function creativeto_show_custom_tabs() {	
	global $creativeto_custom_tabs, $creativeto_version, $creativeto_version_type;
	/*
	echo '<h2 class="nav-tab-wrapper">';
	foreach ($creativeto_custom_tabs as $tab) {
		echo '<a href="#'.$tab['id'].'" class="nav-tab">'.$tab['label'].'</a>';
	}
	echo '<a href="#help" class="nav-tab">'.__('Help', 'creativeto').'</a>';
	echo '</h2>';
	*/
	echo '<div class="wrap">

				<!-- START HEADER -->
					<div id="creativeto-header">
					<div id="logo"></div>
					
					<div id="spot" style="display:none;">
						<a href="http://creativetohemes.com" target="_blank" title="Your Inspiration Themes">DOWNLOAD <strong>HIGH QUALITY</strong> WORDPRESS THEMES <strong>FOR FREE</strong></a>
					</div> 
					<div id="info">
						<p class="name-theme">Creative Theme Options <span style="font-size:28px;color:#ffffff">'.$creativeto_version.'</span></p>
						<p class="framework-version">'.$creativeto_version_type.'</p>
					</div>
					<div style="clear:both"></div>
					<div id="creativeto-utility-bar">
					<p><strong>Нужна помощь?</strong> Посмотри в <a href="http://creativethemes.ru">документации</a> или посетите <a href="http://creativethemes.ru/answers/" title="Support page">страницу поддержки</a></p>
					<p style="display:none"><strong>Need support?</strong> View the <a href="http://creativetohemes.com/docs/">documentation</a> or access in the <a href="http://localhost/wordpress/wordpress/wp-admin/admin.php?page=creativeto_panel_support" title="Support page">support page</a></p>
					<p class="right"><a href="http://creativethemes.ru/new/">Новые поправки к плагину</a> <!-- | <a href="http://creativetohemes.com/">Our free themes</a> --></p>
				</div>
				</div>
					<!-- END HEADER -->
						
				<!-- START UTILITY BAR -->
					<div id="creativeto-utility-bar" style="display:none;">
					<p><strong>Need support?</strong> View the <a href="http://creativetohemes.com/docs/room09/">documentation</a> or access in the <a href="http://localhost/wordpress/wordpress/wp-admin/admin.php?page=creativeto_panel_support" title="Support page">support page</a></p>
					<p class="right"><a href="http://localhost/wordpress/wordpress/wp-content/themes/room09/Changelog.txt">Theme Changelog</a> <!-- | <a href="http://creativetohemes.com/">Our free themes</a> --></p>
				</div>
					<!-- END UTILITY BAR -->
				
			
			
			<div class="wrap" id="creativeto_container">
				<div id="creativeto-wrapper">
					
			
			<!-- START WP ADMIN MENU -->
			<div id="creativeto-adminmenuback"></div>
			<div id="creativeto-adminmenuwrap">
				<div id="creativeto-adminmenuwrap-shadow"></div>
				
				
				<ul role="navigation">';
				if(is_array($creativeto_custom_tabs)){
					foreach ($creativeto_custom_tabs as $tab) {
					$has_submenu = ($tab['submenu'])?'creativeto-has-submenu':'';
			//echo '<li class="creativeto-menu-top menu-icon-'.$tab['icon'].' '.$has_submenu.'" id="creativeto-menu-'.$tab['id'].'">';
			echo '<li class="creativeto-menu-top menu-icon '.$has_submenu.'" id="creativeto-menu-'.$tab['id'].'">';
			////echo '<div class="creativeto-menu-arrow"><div></div></div>';
			$type = pathinfo($tab['icon'], PATHINFO_EXTENSION);
			$imagebase64 = base64_encode_image($tab['icon'],$type);
			echo '<span class="creativeto-menu-icon" style="background:url('.$imagebase64.') center center no-repeat;"></span>
			
			<a title="'.$tab['label'].'" href="#'.$tab['id'].'">'.$tab['label'].'</a>';
			if($tab['submenu']){
				
				echo '<ul class="creativeto-submenu">';
				
				foreach ($tab['submenu'] as $tab_submenu) {
					echo '	
					<li id="creativeto-menu-'.$tab_submenu['id'].'">
						<a href="#creativeto_tabs_theme_option_'.$tab_submenu['id'].'" title="'.$tab_submenu['label'].'">'.$tab_submenu['label'].'</a>
					</li>
                    ';
				}//foreach submenu
			    echo '</ul>';
				echo '
					<div class="creativeto-rightmenu">
						<ul>';
						foreach ($tab['submenu'] as $tab_submenu) {
							echo '	
							<li id="creativeto-menu-'.$tab_submenu['id'].'">
								<a href="#creativeto_tabs_theme_option_'.$tab_submenu['id'].'" title="'.$tab_submenu['label'].'">'.$tab_submenu['label'].'</a>
							</li>
							';
						}
					echo '		
						</ul>
					</div>';
			}// has submenu
			echo '</li>';
						
						
					}
				}
	echo '</ul>
				<div class="clear"></div>
			</div><!-- END CREATIVEWP ADMIN MENU -->';
}

/* ------------------------------------------------------------------*/
/* GET VALUE FROM CREATIVETO */
/* ------------------------------------------------------------------*/

function get_creativeto_val($field_id) {	
	//global $creativeto_options;
	$creativeto_options = get_option('creativeto_settings');	
	return $creativeto_options[$field_id];
}
/* ------------------------------------------------------------------*/
/* CREATE THE FIELDS AND DISPLAY THEM */
/* ------------------------------------------------------------------*/

function base64_encode_image ($filename=string,$filetype=string) {
    if ($filename) {
        //$imgbinary = fread(fopen($filename, "r"), filesize($filename));
        //return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        return $filename;
    }
}

function creativeto_show_custom_fields() {

	global $creativeto_custom_meta_fields;
	$prefix = 'creativeto_';
	
	// Use nonce for verification
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

	// Begin the field table and loop
	$count_item_options = 0;
	if(is_array($creativeto_custom_meta_fields)){
	foreach ($creativeto_custom_meta_fields as $field) {
		
		// get value of this field if it exists for this post
		$creativeto_options = get_option('creativeto_settings');
		
		// Begin a new tab settings
		if( $field['type'] == 'tab_start') {
			echo '<div class="creativeto-box" id="creativeto_tabs_theme_option_'.$field['id'].'">';
			echo '<div class="creativeto-options">';
		}else{
		
		}
		
		if( $field['type'] == 'divider' ){ echo '<div style="clear:both;height:7px;border-top: 2px solid #252525;display:block"></div>'; }
			
		// begin a option row
		if( $field['type'] != 'tab_start' && $field['type'] != 'divider' && $field['type'] != 'tab_end') {
			if( $field['type'] == 'option_title' ){ $creativeto_title = '_title'; } else { $creativeto_title = ''; }
			if( $field['type'] == 'title' ){ $title_options = 'title_options'; } else { $title_options = ''; }
			
			
			echo '<div class="creativeto_options '.$creativeto_title.' '.$title_options.'">';
			
				if( isset( $creativeto_options[$field['id']] ) ) {
					$meta = $creativeto_options[$field['id']];
				} else {
					$meta = "";
				}
		
				switch($field['type']) {
					// text
					case 'title':
						echo '<div class="option">';
						echo '<label style="color:white;height:18px;" for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '</div>';
					break;
					// text
					case 'option_title':
						echo '<div class="option">';
						echo '<label style="color:#cccccc;height:18px;" for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '</div>';
					break;
					// text
					case 'text':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '<input type="text" name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']" value="'.$meta.'" size="30" class="regular-text" />
							</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// text
					case 'password':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '<input type="password" name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']" value="'.$meta.'" size="30" class="regular-text" />';
						echo '</div>';
						echo '<div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// textarea
					case 'textarea':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '<textarea name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']" cols="60" rows="4">'.$meta.'</textarea>';
						echo '</div>';
						echo '<div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// checkbox
					case 'checkbox':
						echo '<div class="option">';
						$id_input = mt_rand();
						echo '<input type="checkbox" name="creativeto_settings['.$field['id'].']" id="checkbox_'.$id_input.'" ',$meta != '' ? ' checked="checked"' : '',' />';
						echo '<label class="checkbox_label" for="checkbox_'.$id_input.'">'.$field['label'].'</label>';
						echo '</div>';
						echo '<div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// select
					case 'select':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
							$w = (isset($field['width']))?' style="width:'.$field['width'].';"':'';
						echo '<select '.$w.' name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']">';
						foreach ($field['options'] as $option) {							
							echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
						}
						echo '</select>';
						echo '</div>';
						echo '<div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// multipletext
					case 'multipletext':
						echo '<div class="option">';
						//if($meta) var_dump($meta);
							$w = (isset($field['width']))?' style="width:'.$field['width'].';"':'';
							// value ="'.$meta["$option[name]"].'"
							//['.$option['name'].']
						foreach ($field['options'] as $option) {						
						//created automaticaly
						$src = (isset($meta["$option[name]"]['src']))?$meta["$option[name]"]['src']:$option['src'];
						$label = (isset($meta["$option[name]"]['label']))?$meta["$option[name]"]['label']:$option['label'];
						
						//created by user
						$link = (isset($meta["$option[name]"]['link']))?$meta["$option[name]"]['link']:'';
							
							if( !isset($option['icon']) || empty($option['icon']) ) echo '<label for="">'.$option['label'].'</label>';
							echo '<img title="'.$option['label'].'" style="margin-bottom:-5px;" src="'.$option['src'].'"/>&nbsp;
							      <input type="text" '.$w.' name="creativeto_settings['.$field['id'].']['.$option['name'].'][link]" value="'.$link.'">
								  <input type="hidden" name="creativeto_settings['.$field['id'].']['.$option['name'].'][name]" value="'.$label.'">
								  <input type="hidden" name="creativeto_settings['.$field['id'].']['.$option['name'].'][src]" value="'.$src.'">
								  <div style="clear:both;height:10px;"></div>';
						}
						echo '</div>';
						echo '<div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = </span>';
								var_dump($meta);
						echo '</div>';
					break;
					// radio
					case 'radio_group_with_images':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						foreach ( $field['options'] as $option ) {
							$w = (isset($field['width']))?' width="'.$field['width'].'"':'';
							$h = (isset($field['height']))?' height="'.$field['height'].'"':'';
							$id_input = mt_rand();
							$default_cheked = '';
                                                        if(empty($meta)) {
							if( $field['default'] == $option['value'] ) $default_cheked = ' checked="checked"';
							}else{
							$default_cheked = $meta == $option['value'] ? ' checked="checked"' : '';
						}
							//if(empty($meta)) {
							//	if( $field['default'] == $option['value'] ) $default_cheked = ' checked="checked"';
							//	}else{
							//	$default_cheked = $meta == $option['value'] ? ' checked="checked"' : '';
							//}
							$type = pathinfo($option['img'], PATHINFO_EXTENSION);
							$imagebase64 = $option['img']?base64_encode_image($option['img'],$type):'';
							//echo '<input class="radio_input_with_images '.$option['class'].'" type="radio" name="creativeto_settings['.$field['id'].']" id="radio_'.$id_input.'" value="'.$option['value'].'" ',$meta == $option['value'] ? ' checked="checked"' : '',' />';
							echo '<input class="radio_input_with_images '.$option['class'].'" type="radio" name="creativeto_settings['.$field['id'].']" id="radio_'.$id_input.'" value="'.$option['value'].'" ',$default_cheked,' />
									<label class="radio_label_with_images '.$option['class'].'" id="label_radio_'.$id_input.'" for="radio_'.$id_input.'"><img '.$w.' '.$h.' src="'.$imagebase64.'" title="'.$option['label'].'"/></label>';
                                                        if($field['new-line'] == 'yes') { echo '<div class="new-line"></div>'; }
						}
						echo '</div>';
						echo '<div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// radio
					case 'radio':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						foreach ( $field['options'] as $option ) {
						$id_input = mt_rand();
						$default_cheked = '';
						if(empty($meta)) {
							if( $field['default'] == $option['value'] ) $default_cheked = ' checked="checked"';
							}else{
							$default_cheked = $meta == $option['value'] ? ' checked="checked"' : '';
						}
						//$meta == $option['value'] ? ' checked="checked"' : '';
							echo '<input class="'.$option['class'].'" type="radio" name="creativeto_settings['.$field['id'].']" id="radio_'.$id_input.'" value="'.$option['value'].'" ',$default_cheked,' />
									<label class="radio_label '.$option['class'].'" for="radio_'.$id_input.'">'.$option['label'].'</label>';
							if($field['new-line'] == 'yes') echo '<div class="new-line"></div>';
						}
						echo '</div>';
						echo '<div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// colorpicker_minicolors
					case 'enabled_disabled':
					$l_r = 0;
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>
						       <div class="field switch">';
							   
							   foreach ( $field['options'] as $option ) {
								$id_input = mt_rand();
								$default_cheked = '';
								$sel = 'cb-disable';
								if(  $meta == "" ) {
									if( $field['default'] == $option['value'] ){ 
									 $default_cheked = ' checked="checked"';
									 $sel = ' cb-enable selected default';
									 }
									}else{
										if($meta == $option['value'] ){
											$default_cheked = ' checked="checked"';
											$sel = ' cb-enable selected';
										}
								}
								$l_r_t = ($l_r == 0)?"l":"r";
								//$meta == $option['value'] ? ' checked="checked"' : '';
									echo '<input class="'.$option['class'].'" type="radio" name="creativeto_settings['.$field['id'].']" id="radio_'.$id_input.'" value="'.$option['value'].'" ',$default_cheked,' />
											<label class="'.$sel.' '.$option['class'].' '.$l_r_t.'" for="radio_'.$id_input.'"><span>'.$option['label'].'</span></label>';
											$l_r++;
								}
						echo '</div></div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
						
						break;
					// checkbox_group
					case 'checkbox_group':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						foreach ($field['options'] as $option) {
							$id_input = mt_rand();
							echo '<input type="checkbox" value="'.$option['value'].'" name="creativeto_settings['.$field['id'].'][]" id="checkbox_group_'.$id_input.'"',$meta && in_array($option['value'], $meta) ? ' checked="checked"' : '',' />
									<label class="checkbox_label" for="checkbox_group_'.$id_input.'">'.$option['label'].'</label><br />';
						}
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// slider_size
					case 'slider_size':
						$id_input = mt_rand();
						$field_id = $field['id'];
						$value = $creativeto_options["$field_id"] != '' ? $creativeto_options["$field_id"] : $field['default'];
						echo '<div class="option">';
						echo '<label for="slider_size_'.$field['id'].'_'.$id_input.'_input">'.$field['label'].': <span style="color:white;" id="slider_size_'.$field_id.'_'.$id_input.'">'.$value.'px</label><input name="creativeto_settings['.$field_id.']" type="hidden" value="'.$value.'" id="slider_size_'.$field['id'].'_'.$id_input.'_input">';
						echo '<div class="slider_size" max="'.$field['max'].'" default="'.$value.'" for="slider_size_'.$field_id.'_'.$id_input.'"></div>';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// tax_select
					case 'tax_select':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '<select name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']">
								<option value="">-- '.__('Select','creativeto').' --</option>'; // Select One
						$terms = get_terms($field['id'], 'get=all');
						$selected = wp_get_object_terms('', 'creativeto_settings['.$field['id'].']');
						foreach ($terms as $term) {
							if ($selected && $term->slug == $creativeto_options[$field['id']] ){
								echo '<option value="'.$term->slug.'" selected="selected">'.$term->name.'</option>';
                                                        }else{
								echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
                                                        }
						}
						$taxonomy = get_taxonomy($field['id']);
						echo '</select></div><div class="description"><a href="'.get_bloginfo('home').'/wp-admin/edit-tags.php?taxonomy='.$field['id'].'">'.__('Manage', 'creativeto').' '.$taxonomy->label.'</a></span>';
						echo '</div><div class="description">'.$field['desc'].'<span class="atention">'.$field['atention'].'</span>';
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
							echo '</div>';
					break; 
					// post_list
					case 'post_list':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						$items = get_posts( array (
							'post_type'	=> $field['post_type'],
							'posts_per_page' => -1
						));
						echo '<select name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']">
								<option value="">-- '.__('Select','creativeto').' --</option>'; // Select One
							foreach($items as $item) {
								if( $item->post_type == 'page' OR $item->post_type == 'post') {
									$post_type = str_replace('page', __('page', 'creativeto'), $item->post_type);
									$post_type = str_replace('post', __('post', 'creativeto'), $item->post_type);
								} else { $post_type = $item->post_type; }
								echo '<option value="'.$item->ID.'"',$creativeto_options[$field['id']] == $item->ID ? ' selected="selected"' : '','>'.$post_type.': '.$item->post_title.'</option>';
							} // end foreach
						echo '</select>';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;     
					// date
					case 'date':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '<input type="text" class="datepicker" name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']" value="'.$creativeto_options[$field['id']].'" size="30" />';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// image
					case 'image':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						//$image = get_template_directory_uri().'/images/image.png';
						$max_width = ($field['max-width'])?$field['max-width'].'':'100%';
						if ($creativeto_options[$field['id']]) { 
							$image = $creativeto_options[$field['id']];
							//$image = wp_get_attachment_image_src($creativeto_options[$field['id']], 'medium');
							//$image = $image[0]; 							
							} 
						else { 
							$image = ''; 
						}
						echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
						echo	'<input name="creativeto_settings['.$field['id'].']" id="creativeto_settings['.$field['id'].']" type="hidden" class="custom_upload_image" value="'.$creativeto_options[$field['id']].'" />
									<img src="'.$image.'" class="custom_preview_image" alt="" style="max-width:'.$max_width.'" /><br />
										<input class="custom_upload_image_button button" type="button" value="'.__('Choose Image', 'creativeto').'" />
										<small> <a href="#" class="custom_clear_image_button button red">'.__('Remove Image', 'creativeto').'</a></small>
										<br clear="all" />';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// slider
					case 'slider':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
					$field_id = $field['id'];
					$value = $creativeto_options["$field_id"] != '' ? $creativeto_options["$field_id"] : '0';
						echo '<div id="'.$field['id'].'-slider"></div>
								<input type="text" name="creativeto_settings['.$field['id'].']" id="creativeto_val_slider_'.$field['id'].'" value="'.$value.'" size="5" />';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
					break;
					// repeatable
					case 'repeatable':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '
								<ul id="creativeto_settings['.$field['id'].']-repeatable" class="custom_repeatable">';
						$i = 0;

						if ( $creativeto_options[$field['id']] ) {
							foreach($creativeto_options[$field['id']] as $row) {
								echo '<li><span class="sort hndle"><img src="' . CREATIVETO_PLUGIN_DIR . 'includes/images/cursor_move.png" /></span>
											<input type="text" name="creativeto_settings['.$field['id'].']['.$i.']" id="creativeto_settings['.$field['id'].']" value="'.$row.'" size="30" />
											<a class="repeatable-remove button" href="#">'.__('Delete','creativeto').'</a></li>';
								$i++;
							}
						} else {
							echo '<li><span class="sort hndle">|||</span>
										<input type="text" name="creativeto_settings['.$field['id'].']['.$i.']" id="creativeto_settings['.$field['id'].']" value="" size="30" />
										<a class="repeatable-remove button" href="#">'.__('Delete','creativeto').'</a></li>';
						}
						echo '</ul>';
						echo '<a class="repeatable-add button" href="#">'.__('Add','creativeto').'</a>';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
						
					break;
					// repeatable
					case 'repeatable2':
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						$i = 0;

						echo '<ul id="creativeto_settings_widget_settings" class="custom_repeatable">';
						if ( $creativeto_options[$field['id']] ) {
							foreach($creativeto_options[$field['id']] as $row) {
								echo '<li class="custom_repeatable_item_name">
									  <label class="_item_name"><div class="sort hndle"><img src="' . CREATIVETO_PLUGIN_DIR . 'includes/images/cursor_move.png" /></div>'.$row['sidebar_name'].'</label><span class="icon"></span>
										<div class="custom_repeatable_item_content">
										<table style="width:542px">
											<tr>
											  <td>
												<label style="display:block;margin-top:5px;width:262px;">Sidebar name</label>
												<input style="width:262px" type="text" name="creativeto_settings['.$field['id'].']['.$i.'][sidebar_name]" id="creativeto_settings['.$field['id'].']" value="'.$row['sidebar_name'].'" size="30" />
											  </td>
											  <td>
												<label style="display:block;margin-top:5px;width:262px;">Sidebar id(no space)</label>
												<input style="width:262px" type="text" name="creativeto_settings['.$field['id'].']['.$i.'][sidebar_id]" id="creativeto_settings['.$field['id'].']" value="'.$row['sidebar_id'].'" size="30" /> 
											  </td>
										  </tr>
											<tr>
											  <td colspan="2">
												<label style="display:block;margin-top:5px;width:542px;">Sidebar description (optional)</label>
												<textarea style="width:542px" name="creativeto_settings['.$field['id'].']['.$i.'][sidebar_desc]" id="creativeto_settings['.$field['id'].'][sidebar_name]" size="30">'.$row['sidebar_desc'].'</textarea> 
											  </td>
											</tr>
											<tr>
											  <td colspan="2">
												<span style="float:right" data-index="'.$i.'" class="custom_repeatable-remove">'.__('Delete','creativeto').'</span>
											  </td>
											</tr>
										</table>
										</div>			
										</li>';
										$i++;
							}
						} else {
							echo '';//<label style="display:block;margin-top:5px;width:542px;">Not added sidebar yet!</label>
						}
						echo '</ul>';
						echo '<div style="clear:both"></div>';
						echo '<div style="width:420px;" class="custom_repeatable_add_input">
						<table style="width:555px">
							<tr>
							  <td>
							  	<label style="display:block;margin-top:5px;width:273px;">Sidebar name</label>
								<input style="width:273px" type="text" id="temp_sidebar_name" size="30" />
							  </td>
							  <td>
							  	<label style="display:block;margin-top:5px;width:273px;">Sidebar id(no space)</label>
								<input style="width:273px" type="text" id="temp_sidebar_id" size="30" /> 
							  </td>
						  </tr>
							<tr>
							  <td colspan="2">
							  	<label style="display:block;margin-top:5px;width:553px;">Sidebar description (optional)</label>
								<textarea style="width:553px" id="temp_sidebar_desc" size="30"></textarea> 
							  </td>
							</tr>
							<tr>
							  <td colspan="2">
							  	<input style="float:right" field_id="'.$field['id'].'" data-index="'.$i.'" type="button" class="custom_repeatable-add button" value="'.__('Add','creativeto').'"/>							  
							  </td>
							</tr>
						</table>
						</div>';
						echo '';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
						
					break;
					// colorpicker
					case 'colorpicker':
					    $default_colorpicker = ( $creativeto_options[$field['id']] == '' )?$field['value']:$creativeto_options[$field['id']];
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '<input type="text" name="creativeto_settings['.$field['id'].']" class="color" id="creativeto_settings['.$field['id'].']" value="'.$default_colorpicker.'" size="30" />';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
						break;
					// colorpicker_minicolors
					case 'colorpicker_minicolors':
					    $default_colorpicker = ( $creativeto_options[$field['id']] == '' )?$field['value']:$creativeto_options[$field['id']];
						echo '<div class="option">';
						echo '<label for="creativeto_settings['.$field['id'].']">'.$field['label'].'</label>';
						echo '<input type="text" name="creativeto_settings['.$field['id'].']" class="minicolors" id="creativeto_settings['.$field['id'].']" value="'.$default_colorpicker.'" size="30" />';
						echo '</div><div class="description">'.$field['desc'];
							if(!empty($field['atention'])){ echo '<span class="atention">'.$field['atention'].'</span>'; }
							echo '<span style="color:white;font-size:11px;display:block;">$creativeto_settings["'.$field['id'].'"] = '.$meta.'</span>';
						echo '</div>';
						break;
					// slider
					case 'info':
						echo '<div class="option" style="max-height: 500px; overflow-y: scroll; width: 100%;">';
						echo $field['info'];
						echo '</div>';
					break;

				
				} //end switch
			echo '<div class="clear"></div>';
			echo '</div>';
		}
		
		// End a tab
		if( $field['type'] == 'tab_end') {
			echo '</div>';
			echo '</div>';
		}
		$count_item_options++;
	} // end foreach
	}// end of if foreach	
	//creativeto_help_center();
	//echo '';//creativeto-content
	//	'; // End Div tab container
}
?>