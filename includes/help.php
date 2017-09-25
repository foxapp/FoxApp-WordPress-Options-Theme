<?php

/* ------------------------------------------------------------------*/
/* CREATE THE HELP TAB */
/* ------------------------------------------------------------------*/

function creativeto_help_center() {
	
	ob_start(); 
	?>
	
<div class="tab_content" id="help">

	<p>
	<a href="#add_fields"><?php _e('Add Fields', 'creativeto'); ?></a> | 
	<a href="#retrieve_fields_data"><?php _e('Retrieve Fields Data', 'creativeto'); ?></a> | 
	<a href="#custom_functions"><?php _e('Customs Functions', 'creativeto'); ?></a> | 
	<a href="#shortcodes"><?php _e('Shortcodes', 'creativeto'); ?></a>
	</p>

	<h3 id="add_fields"><?php _e('How to add new tabs', 'creativeto'); ?></h3>
	<p><?php _e('Adding tabs is simple. What you have to do is to edit the includes/options.php file in the plugin directory. Adding a tab and adding a field is a bit different. You have to actions to do when you create a tab. First of all you have to add data in the <code>$creativeto_custom_tabs</code> var, and then, in the <code>$creativeto_custom_meta_fields</code> you have to call the Tab starting element and to close this element. Here is an example:', 'creativeto'); ?></p>
	<h4><?php _e('Create the tabs', 'creativeto'); ?></h4>
<pre><code>$creativeto_custom_tabs = array(
		array(
			'label'=> __('General', 'creativeto'),
			'id'	=> $prefix.'general'
		),
		array(
			'label'=> __('Advanced', 'creativeto'),
			'id'	=> $prefix.'advanced'
		)
	);</code></pre>
	<h4><?php _e('Wrap fields into a tab', 'creativeto'); ?></h4>
<pre><code>	/* -- TAB 1 -- */
	array(
		'id'	=> $prefix.'general', // Open Tab
		'type'	=> 'tab_start'
	),
	
	/* <?php _e('Your fields here', 'creativeto'); ?> */
	
	array(
		'type'	=> 'tab_end' // Close Tab
	),
	</code></pre>
	
	<p><?php _e('If this seems to be too complicated for you, please just take a look at the options.php file included to have a demo of how to fill in the file.', 'creativeto'); ?></p>
	
<h3><?php _e('How to create custom fields', 'creativeto'); ?></h3>
	<p><?php _e('Creating fields is easy! All you have to do id to edit the includes/options.php file in the plugin directory and create as many tabs and fields as you need!', 'creativeto'); ?></p>
	
	<h4><?php _e('Add a Title', 'creativeto'); ?></h4>
<pre><code>array(
		'label'=> 'Title',
		'id'	=> $prefix.'title',
		'type'	=> 'title'
	),</code></pre>
	
	<h4><?php _e('Add a Text input field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'=> 'Text Input',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'textinput',
		'type'	=> 'text'
	),</code></pre>
	
	<h4><?php _e('Add a Password input field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'=> 'Password Input',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'password',
		'type'	=> 'password'
	),</code></pre>
	
	<h4><?php _e('Add a Textarea field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'=> 'Textarea',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'textarea',
		'type'	=> 'textarea'
	),</code></pre>
	
	<h4><?php _e('Add a Checkbox field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'=> 'Checkbox Input',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'checkbox',
		'type'	=> 'checkbox'
	),</code></pre>
	
	<h4><?php _e('Add a Select Box', 'creativeto'); ?></h4>
<pre><code>array(
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
	),</code></pre>
	<p><?php _e('Here you have to add options to the field. Each option has a label and a value.', 'creativeto'); ?></p>
	
	<h4><?php _e('Add a Radio Group', 'creativeto'); ?></h4>
<pre><code>array (
		'label' => 'Radio Group',
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
	),</code></pre>
	<p><?php _e('Here you have to add options to the field. Each option has a label and a value.', 'creativeto'); ?></p>
	
	<h4><?php _e('Add a Ckeckbox Group', 'creativeto'); ?></h4>
<pre><code>array (
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
	),</code></pre>
	<p><?php _e('Here you have to add options to the field. Each option has a label and a value.', 'creativeto'); ?></p>
	
	<h4><?php _e('Add a Taxonomy list', 'creativeto'); ?></h4>
<pre><code>array(
		'label' => 'Category',
		'id'	=> 'category',
		'type'	=> 'tax_select'
	)</code></pre>
	
<h4><?php _e('Add a Posts list', 'creativeto'); ?></h4>
<pre><code>array(
		'label' => 'Post List',
		'desc' => 'A description for the field.',
		'id' 	=>  $prefix.'post_id',
		'type' => 'post_list',
		'post_type' => array('post','page')
	),</code></pre>
	<p><?php _e('Here you can define the post types you want to list.', 'creativeto'); ?></p>
	
<h4><?php _e('Add a Repeatable Field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'	=> 'Repeatable',
		'desc'	=> 'A description for the field. The items inserted here are movable.',
		'id'	=> $prefix.'repeatable',
		'type'	=> 'repeatable'
	),</code></pre>
	
<h4><?php _e('Add a Date Field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'	=> 'Date',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'date',
		'type'	=> 'date'
	),</code></pre>
	
<h4><?php _e('Add a Image Upload Field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'	=> 'Image',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'image',
		'type'	=> 'image'
	),</code></pre>
	
<h4><?php _e('Add a Slider Field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'	=> 'Slider',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'slider',
		'type'	=> 'slider',
		'min'	=> '0',
		'max'	=> '100',
		'step'	=> '5'
	),</code></pre>
	<p><?php _e('Here think to modify the min, max and step values to fit your needs.', 'creativeto'); ?></p>

<h4><?php _e('Add a Color Picker Field', 'creativeto'); ?></h4>
<pre><code>array(
		'label'	=> 'Color Picker',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'colorpicker',
		'type'	=> 'colorpicker'
	),</code></pre>

	<hr />
	<a href="#icon-options-general"><?php _e('top', 'creativeto'); ?></a>

	<h3 id="retrieve_fields_data"><?php _e('How to retrieve the data fields', 'creativeto'); ?></h3>
	
	<p><?php _e('There are two ways to retrieve the data, one with a function, and the second one using a global variable. The first method use a little more queries, but is easier to set up. Some field types provide pre-made functions to display the content, for these functions, have a look below.', 'creativeto'); ?></p>
	
	<h4>1 - <?php _e('First Method: using a function', 'creativeto'); ?></h4>
	
	<p><?php _e('To display a field data using a function, use this function call and echo it:', 'creativeto'); ?></p>
<pre><code>echo creativeto_get_option('creativeto_var')</code></pre>
	<p><?php _e('Where you replace <code>var</code> by the id of the field you want to echo.','creativeto'); ?></p>
	
	<h4>2 - <?php _e('Second Method: using a global variable', 'creativeto'); ?></h4>
	
	<p><?php _e('The first thing to do is to insert this lines of code in your header.php file inside your template directory', 'creativeto'); ?></p>
<pre><code>// Easy Theme Options 
$creativeto_options = get_option('creativeto_settings');
global $creativeto_options; </code></pre>
	<p><i><?php _e('You really need to add these lines, above the wp_head() function, otherwise the data will not be available in your theme.', 'creativeto'); ?></i></p>
	<p><?php _e('Retrieving the data fields is then pretty simple. The main way to do it is to echo a variable:', 'creativeto'); ?></p>
<pre><code>echo $creativeto_options["creativeto_var"]</code></pre>
	<p><?php _e('Where you replace <code>var</code> by the id of the field you want to echo.','creativeto'); ?> <?php _e('For example if you your field has the id "slogan", to echo it, use this code:','creativeto'); ?></p>
<pre><code>echo $creativeto_options["creativeto_slogan"]</code></pre>

	<hr />
	<a href="#icon-options-general"><?php _e('top', 'creativeto'); ?></a>

	<h3 id="custom_functions"><?php _e('Custom Functions', 'creativeto'); ?></h3>
	
	<p><?php _e('For some kind of field types, there are some pre-made functions already created to help you display the content of the field.', 'creativeto'); ?></p>
	
	<h4>1 - <?php _e('Image: display an image', 'creativeto'); ?></h4>
	
	<p><?php _e('Function Name', 'creativeto'); ?>:<b> creativeto_image($field_id,  $width = '', $height = '')</b></p>
	<p><?php _e('This function echo an image and add an option to modify the width and the height. Replace the <i>$field_id</i> by the call to the needed variable. For example, if you field id is "logo", the function call is:', 'creativeto'); ?></p>
<pre><code>creativeto_image('creativeto_logo')</code></pre>
	
	<h4>1 - <?php _e('Image: get image url without displaying it', 'creativeto'); ?></h4>
	
	<p><?php _e('Function Name', 'creativeto'); ?>:<b> creativeto_get_image($field_id)</b></p>
	<p><?php _e('This function retrieve the image url without printing anything. Replace the <i>$field_id</i> by the call to the needed variable. For example, if you field id is "logo", the function call can be (inside an img tag):', 'creativeto'); ?></p>
<pre><code>echo creativeto_get_image('creativeto_logo')</code></pre>

	<hr />
	<a href="#icon-options-general"><?php _e('top', 'creativeto'); ?></a>

	<h3 id="shortcodes"><?php _e('Shortcodes', 'creativeto'); ?></h3>
	
	<p><?php _e('There are some shortcodes that you can use directly in the content of your pages, or posts, to display the content of the custom theme fields. The main one, is:', 'creativeto'); ?></p>
<pre><code>[option id="field_id"]</code></pre>
	<p><?php _e('Where you replace <code>field_id</code> by the id of the field you want to display.','creativeto'); ?></p>
	
	<p><?php _e('To display an image directly into your posts of pages content use this shortcode:', 'creativeto'); ?></p>
<pre><code>[image id="field_id"]</code></pre>
	<p><?php _e('Where you replace <code>field_id</code> by the id of the image field you want to display.','creativeto'); ?></p>

</div>

	<?php
	echo ob_get_clean();
}

?>