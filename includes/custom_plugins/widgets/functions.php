<?php
add_action( 'admin_footer', 'ct_widgets_settings_javascript' );
function ct_widgets_settings_javascript() {
?>
<style>
.custom_repeatable_item_content{
	display:none;
}
.custom_repeatable_item_name.active .custom_repeatable_item_content{
	display:block;
}
.custom_repeatable_item_name label{cursor:pointer;}
.custom_repeatable_item_name .icon{
	background: url(<?php echo CREATIVETO_PLUGIN_DIR; ?>includes/images/widget_not-active.png);
	background-position:center center;
	background-repeat:no-repeat;
	height:22px;
	width:22px;
	display:block;
	float:right;
	cursor:pointer;
}
.custom_repeatable_item_name .icon:hover, .custom_repeatable_item_name .icon:active{
	background: url(<?php echo CREATIVETO_PLUGIN_DIR; ?>includes/images/widget_not-active_hover.png);
	background-position:center center;
	background-repeat:no-repeat;
}
.custom_repeatable_item_name.active .icon{
	background-image:url(<?php echo CREATIVETO_PLUGIN_DIR; ?>includes/images/widget_active.png?das);
}
.custom_repeatable_item_name{
	background: #333333;
	display:block;
	padding:3px;
	border-right:1px solid #222;
	border-bottom:1px solid #222;
}
.custom_repeatable_item_name.active{
	background:#444444;
}
.custom_repeatable-remove{
	color:#CA5151;
	cursor:pointer;
}
.custom_repeatable-remove:hover, .custom_repeatable-remove:active{
	color:red;
}
.custom_repeatable_item_name .sort{
	display:inline-block;
	vertical-align:middle;
	margin-right:5px;
}
.custom_repeatable_item_name ._item_name{
	margin-left:5px;
	width:auto;
	display:inline;
}
</style>
<script type="text/javascript" >
function init_repeatable_func(){
	
	jQuery('.custom_repeatable_item_name .icon').off( "click" );
	
	jQuery('.custom_repeatable_item_name .icon').bind({
		click:function(){
			jQuery(this).parent('li').toggleClass('active');
			//if(jQuery(this).parent('li').hasClass('active')){
			//	jQuery(this).parent('li').removeClass('active');
			//}else{
			//	jQuery(this).parent('li').addClass('active');			
			//}
		}});
	
	jQuery('.custom_repeatable-remove').off( "click" );
	
	jQuery('.custom_repeatable-remove').click(function(){
		if(confirm("Are you sure you want to delete?")){
		jQuery(this).closest('li').remove();
		}
	});
}
jQuery(document).ready(function($) {
	
	init_repeatable_func();
	
	jQuery('.custom_repeatable-add').click(function(){
		var data = {
			action: 'ct_widgets_settings_add_btn',
			field_id: jQuery(this).attr('field_id'),
			data_index: jQuery('#creativeto_settings_widget_settings').children("li").length,
			sidebar_name: jQuery('#temp_sidebar_name').val(),
			sidebar_id: jQuery('#temp_sidebar_id').val(),
			sidebar_desc: jQuery('#temp_sidebar_desc').val()
		};
		
		jQuery('#temp_sidebar_name').val('');
		jQuery('#temp_sidebar_id').val('');
		jQuery('#temp_sidebar_desc').val('');
		
		jQuery.post(ajaxurl, data, function(response) {
			jQuery('#creativeto_settings_widget_settings').append(response);
			init_repeatable_func();
		});
	});
	
});
</script>
<?php
}

add_action( 'wp_ajax_ct_widgets_settings_add_btn', 'ct_widgets_settings_callback_add_btn' );
function ct_widgets_settings_callback_add_btn() {
	global $wpdb; // this is how you get access to the database
	$field_id = strip_tags($_POST['field_id']);
	$i = (int)$_POST['data_index'];
	$sidebar_name = strip_tags($_POST['sidebar_name']);
	$sidebar_id = strip_tags($_POST['sidebar_id']);
	$sidebar_desc = strip_tags($_POST['sidebar_desc']);
echo '<li class="custom_repeatable_item_name"><label class="_item_name"><div class="sort hndle"><img src="' . CREATIVETO_PLUGIN_DIR . 'includes/images/cursor_move.png" /></div>'.$sidebar_name.'</label><span class="icon"></span>
	  <div class="custom_repeatable_item_content">
	  <table style="width:542px">
		  <tr>
			<td>
			  <label style="display:block;margin-top:5px;width:262px;">Sidebar name</label>
			  <input style="width:262px" type="text" name="creativeto_settings['.$field_id.']['.$i.'][sidebar_name]" id="creativeto_settings['.$field_id.']" value="'.$sidebar_name.'" size="30" />
			</td>
			<td>
			  <label style="display:block;margin-top:5px;width:262px;">Sidebar id(no space)</label>
			  <input style="width:262px" type="text" name="creativeto_settings['.$field_id.']['.$i.'][sidebar_id]" id="creativeto_settings['.$field_id.']" value="'.$sidebar_id.'" size="30" /> 
			</td>
		</tr>
		  <tr>
			<td colspan="2">
			  <label style="display:block;margin-top:5px;width:542px;">Sidebar description (optional)</label>
			  <textarea style="width:542px" name="creativeto_settings['.$field_id.']['.$i.'][sidebar_desc]" id="creativeto_settings['.$field_id.'][sidebar_name]" size="30">'.$sidebar_desc.'</textarea> 
			</td>
		  </tr>
		  <tr>
			<td colspan="2">
			  <span style="float:right" data-index="'.$field_id.'" class="custom_repeatable-remove">'.__('Delete','creativeto').'</span>
			</td>
		  </tr>
	  </table>
	  </div></li>';
	  
	die(); // this is required to return a proper result
}

$creativeto_options = get_option("creativeto_settings");//Array

//Initializate all widgets created in Creative Theme Options (Widget Module)

if ( $creativeto_options["creativeto_widget-sidebar_settings"] ) {
	$j=0;
		foreach($creativeto_options["creativeto_widget-sidebar_settings"] as $row) {
			register_sidebar( array(
				'name'         => __( $row['sidebar_name'], 'creativeto' ),
				'id'           => $row['sidebar_id'],
				'description'  => __( $row['sidebar_desc'], 'creativeto' ),
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<div class="header">',
				'after_title'  => '</div>',//Slideshow</div>
			) );
		}//foreach
}//if