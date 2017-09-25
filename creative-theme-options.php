<?php 
/*
Plugin Name: Creative Theme Options
Plugin URL: http://creativethemes.ru/
Description: This plugin adds the ability to create as many site options as you want to customize your theme or your website.
Version: 1.06
Author: Ion Enache
Author URI: http://creativethemes.ru
Contributors: Ion Enache
----------------------------------------
* Plugin Globals
----------------------------------------- */
ini_set("disaplay_errors",1);
global $creativeto_base_dir, $user_ID, $creativeto_prefix, $creativeto_options, $creativeto_settings;
$creativeto_base_dir = dirname(__FILE__);
$creativeto_prefix = "creativeto_";
define("CREATIVETO_DOMAIN","creativeto");
if(!defined('CREATIVETO_PLUGIN_DIR')) { define('CREATIVETO_PLUGIN_DIR', plugin_dir_url( __FILE__ ));}

/* ----------------------------------------
* plugin text domain for translations
----------------------------------------- */
load_plugin_textdomain( CREATIVETO_DOMAIN , false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/* ----------------------------------------
* Includes
----------------------------------------- */
//if( isset($_GET['page']) && $_GET['page'] == 'creativeto-settings' && 2==3) {
	include_once($creativeto_base_dir . '/includes/styles.php');
	include_once($creativeto_base_dir . '/includes/creative_options.php');
	include_once($creativeto_base_dir . '/includes/functions/creativeto_functions.php');
		//include($creativeto_base_dir . '/includes/demo_data.php');
	include_once($creativeto_base_dir . '/includes/scripts.php');
	include_once($creativeto_base_dir . '/includes/help.php');
		//include($creativeto_base_dir . '/includes/plugins.php');
//}
include($creativeto_base_dir . '/includes/shortcodes.php');

/* ----------------------------------------
* load plugin data
----------------------------------------- */
$creativeto_settings = get_option( 'creativeto_settings' );
$creativeto_options = get_option('creativeto_settings');
/* ----------------------------------------
* add subpage in appearance menu
----------------------------------------- */
if(!function_exists("creativeto_settings_init_panel_menu")){
function creativeto_settings_init_panel_menu() {
	add_menu_page('Creative Theme Options Settings', 'Creative', 'manage_options', 'creativeto-settings', 'creativeto_settings_page');
	// add import export page
	add_submenu_page(
					'creativeto-settings', 
					__('Creative Theme Options import / export', CREATIVETO_DOMAIN), 
					__('Import / Export', CREATIVETO_DOMAIN),
					'manage_options', 
					'creativeto-import-export', 
					'creativeto_import_export_page');
}
add_action('admin_menu', 'creativeto_settings_init_panel_menu');
}

/* ----------------------------------------
* register the plugin settings
----------------------------------------- */

if(!function_exists("creativeto_register_settings")){
function creativeto_register_settings() {
	// create whitelist of options
	register_setting( 'creativeto_settings_group', 'creativeto_settings' );
	//register_setting( 'creativeto_settings_group', 'creativeto_settings' );
}
//call register settings function
add_action( 'admin_init', 'creativeto_register_settings');
}


/* ----------------------------------------
* create the submenu links in plugins page
----------------------------------------- */

if(!function_exists("creativeto_plugin_action_links")){
function creativeto_plugin_action_links($links, $file) {
    static $this_plugin;
 
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
 
    // check to make sure we are on the correct plugin
    if ($file == $this_plugin) {
 
		// link to what ever you want
        $plugin_links[] = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/themes.php?page=creativeto-settings">'.__('Creative Theme Options',CREATIVETO_DOMAIN).'</a>';
 
        // add the links to the list of links already there
		foreach($plugin_links as $link) {
			array_unshift($links, $link);
		}
    }
 
    return $links;
}
}
add_filter('plugin_action_links', 'creativeto_plugin_action_links', 10, 2);

/* ------------------------------------------------------------------*/
/* GET AN IMAGE FROM GLOBAL STRING */
/* ------------------------------------------------------------------*/

if(!function_exists("creativeto_image")){
function creativeto_image($field_id,  $width = '', $height = '') {
	
	global $creativeto_options;
	
	if( isset($field_id) ) {
	
		// Get attachment data
		$image_data = wp_get_attachment_image_src( $creativeto_options["$field_id"], '' );
		
		//print_r( $image_data );
		
		// get URL
		$url = $image_data[0];
		
		// Height and width
		if( $height != '' && $width != '' ) {
			$height = $height;
			$width 	= $width;
		} else {
			$width = $image_data[1];
			$height = $image_data[2];
		}

		echo '<img src="'.$url.'" with="'.$width.'" height="'.$height.'"/>'; 
		
	}
}
}

if ( ! function_exists( 'ct_get_option' ) ) {

	/**
	 * Get Option.
	 *
	 * Helper function to return the theme option value.
	 * If no value has been saved, it returns $default.
	 * Needed because options are saved as serialized strings.
	 */
	 
	function ct_get_option( $name, $default = false ) {
		$name = 'creativeto_'.$name;
		$config = get_option( 'creativeto_settings' );

		if ( ! isset( $config[$name] ) ) {
			return $default;
		}

		//$options = apply_filters( 'ct_af_get_option', get_option( $config['id'] ), $name ); // af - apply filters

		//if ( isset( $options[$name] ) ) {
		//	return $options[$name];
		//}
		if ( isset( $config[$name] ) ) {
			return $config[$name];
		}

		return $default;
	}
}

/* ------------------------------------------------------------------*/
/* RETURN AN IMAGE URL FROM GLOBAL STRING */
/* ------------------------------------------------------------------*/

if(!function_exists("creativeto_get_image")){
function creativeto_get_image($field_id) {
	
	global $creativeto_options;
	
	if( isset($field_id) ) {
	
		// Get attachment data
		$image_data = wp_get_attachment_image_src( $creativeto_options["$field_id"], '' );
		
		// get URL
		$url = $image_data[0];
	
		return $url;
		
	}
}
}

/* ----------------------------------------
* function to retrieve the get_option() value
----------------------------------------- */

if(!function_exists("creativeto_get_option")){
function creativeto_get_option($option_name) {
	$option_name = 'creativeto_'.$option_name;
	$creativeto_options = get_option('creativeto_settings');
	if($creativeto_options){
		return $creativeto_options[$option_name];
		}
	}
}

if(!function_exists("creativeto")){
function creativeto() {
	return true;
	}
}


/* ----------------------------------------
* create the settings page layout
----------------------------------------- */

if(!function_exists("creativeto_settings_page")){
function creativeto_settings_page() {
	
	global $creativeto_options, $creativeto_base_dir;
		
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php  _e('Creative Theme Options Settings', CREATIVETO_DOMAIN); ?></h2>
		<?php 
		if ( ! isset( $_REQUEST['settings-updated'] ) )
			$_REQUEST['settings-updated'] = false;
		?>
		<?php  if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php  _e( 'Параметры сохранены', CREATIVETO_DOMAIN ); ?></strong></p></div>

		<?php  endif; ?>

		<form method="post" action="options.php" class="creativeto_options_form">
			<?php  settings_fields( addslashes('creativeto_settings_group') ); ?>			
			<?php  creativeto_show_custom_tabs(); ?>
        <div id="creativeto-content">
        <?php  ?><span class="submit top"><input type="submit" class="button-secondary" value="Сохранить параметры"><img class="loading" src="<?php echo CREATIVETO_PLUGIN_DIR.'/includes/assets/images/loading.gif';?>"></span>
<div class="clear-right"></div><?php  ?>
			<?php  creativeto_show_custom_fields(); ?>
			
			<?php  /*<!-- save the options -->
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php  _e( 'Сохранить параметры', CREATIVETO_DOMAIN ); ?>" />
			</p>
			*/?>
			
        </div><!--end #creativeto-content -->
        <div class="submit_footer">
            <span class="submit bottom"><input class="button-secondary" type="submit" value="<?php  _e( 'Сохранить параметры', CREATIVETO_DOMAIN ); ?>"><img class="loading" src="<?php echo CREATIVETO_PLUGIN_DIR.'/includes/assets/images/loading.gif';?>">
                <a class="button" style="vertical-align:middle" onclick="return confirm('<?php  _e('Вы уверены, что хотите установить демо-данные?', CREATIVETO_DOMAIN) ?>')" href="<?php  echo home_url() ?>/wp-admin/admin.php?page=creativeto-settings&creativeto_install=creative-shop"><?php  _e('Установите демонстрационные страницы', CREATIVETO_DOMAIN) ?></a>
            </span>
				</div>
		
		</form>		
			</div>
			<div class="clear"></div></div><!-- wpbody-content -->
			<div class="clear"></div>
			</div>
        
	</div><!--end .wrap-->
	<?php 
}
}
/*
function myplugin_help() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
}
*/
/* ----------------------------------------
* create the settings page layout
----------------------------------------- */
if(!function_exists("creativeto_import_export_page")){
function creativeto_import_export_page() {

	$creativeto_settings = get_option( 'creativeto_settings' );
	$currentsettings = "";
	if ( isset( $_POST['import'] ) && trim($_POST['creativeto_import_settings']) != "" ) {
		$currentsettings = $_POST['gpp_import_settings'];
	} elseif ( isset( $creativeto_settings ) && ( $creativeto_settings != "" ) ) {	
		$currentsettings = base64_encode( serialize( $creativeto_settings ) );		
	} 
		
	?>
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php  _e('creativeto Theme Options - Import / Export', CREATIVETO_DOMAIN); ?></h2>
		<?php  if ( isset( $_POST['import'] ) && $_POST['creativeto_import_settings'] != "" ) { ?>
		<div class="updated fade"><p><strong><?php  _e('Settings imported successfully!', CREATIVETO_DOMAIN); ?></strong></p></div>
		<?php  } ?>
		
	<div class="wrap" id="transport_settings">

		<p class="description"><?php  _e('Here you can import and export creativeto Theme Options settings from one installation to another.', CREATIVETO_DOMAIN); ?></p>
		<div class="option option-textarea">
			<div class="option-inner">
				<label class="titledesc"><h3><?php  _e('Import Options', CREATIVETO_DOMAIN); ?></h3></label>
				<div class="formcontainer">
					<div class="forminp">
						<form id="impexp" method="post" action="#">
						<textarea rows="8" cols="60" id="creativeto_import_settings" name="creativeto_import_settings" class=""></textarea><br />
						<div class="desc"><?php  _e('Paste the encoded text from export options field from your development site or another installation.', CREATIVETO_DOMAIN); ?></div>
						<input type="submit" value="<?php  _e('Import', CREATIVETO_DOMAIN); ?>" id="import" name="import" class="button-primary" onClick="return confirm('<?php  _e('Are you sure you want to import the settings?', CREATIVETO_DOMAIN); ?>')"> 
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<div class="option option-textarea">
			<div class="option-inner">
				<label class="titledesc"><h3><?php  _e('Export Options', CREATIVETO_DOMAIN); ?></h3></label>
				<div class="formcontainer">
					<div class="forminp">
						<textarea rows="8" cols="60" id="creativeto_export_settings" name="creativeto_export_settings" class="" readonly="readonly"><?php  echo $currentsettings; ?></textarea>					
					</div>
					<div class="desc"><?php  _e('Copy this text to import settings into another installation.', CREATIVETO_DOMAIN); ?></div>
				</div>
			</div>
		</div>
	 </div>

	</div><!--end .wrap-->
	<?php 
}
}

if(!function_exists("creativeto_import_settings")){
function creativeto_import_settings(){
	
	global $creativeto_prefix;

	if ( isset( $_POST['import'] ) && trim($_POST['creativeto_import_settings']) != "" ) {	
	$currentsettings = unserialize( base64_decode(  $_POST['creativeto_import_settings'] ) );	
		//update_option( $creativeto . 'settings', $_POST['creativeto_import_settings'] );
		update_option( $creativeto_prefix . 'settings', $currentsettings );
		//update_option( 'creativeto_settings', $_POST['creativeto_import_settings'] );
	}
}
add_action( 'admin_menu', 'creativeto_import_settings' );
}
/* ------------------------------------------------------------------*/
/* UNINSTALL PLUGIN */
/* ------------------------------------------------------------------*/

if(!function_exists("creativeto_uninstall")){
function creativeto_uninstall () 
{
    // Uncomment the line above to delete all data at plugin uninstall
    /* delete_option('creativeto_settings'); */
}
register_deactivation_hook( __FILE__, 'creativeto_uninstall' );
}

/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */
 
//add_action( 'customize_register', 'options_theme_customizer_register',10,1);

if(!function_exists("options_theme_customizer_register")){
function options_theme_customizer_register($wp_customize) {

	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	 
	$options = get_option( 'creativeto_settings' );
	
	/* Basic */

	$wp_customize->add_section( 'options_theme_customizer_basic', array(
		'title' => __( 'Basic', 'options_theme_customizer' ),
		'priority' => 100
	) );
	$wp_customize->add_setting( 'options_theme_customizer[basic name]', array(
		'default' => $options['example_text']['std'],
		'type' => 'option'
	) );

	/*
	$wp_customize->add_control( 'options_theme_customizer_example_text', array(
		'label' => $options['example_text']['name'],
		'section' => 'options_theme_customizer_basic',
		'settings' => 'options_theme_customizer[example_text]',
		'type' => $options['example_text']['type']
	) );
	
	$wp_customize->add_setting( 'options_theme_customizer[example_select]', array(
		'default' => $options['example_select']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'options_theme_customizer_example_select', array(
		'label' => $options['example_select']['name'],
		'section' => 'options_theme_customizer_basic',
		'settings' => 'options_theme_customizer[example_select]',
		'type' => $options['example_select']['type'],
		'choices' => $options['example_select']['options']
	) );
	*/
}
}


// get google fonts list and cache it
function ct_get_google_fonts_list() {
	$default_list = array(
		'PT Sans:700&subset=latin-ext'	=> 'PT Sans bold(700) latin-ext',
		'Bitter&subset=latin-ext'		=> 'Bitter latin-ext',
		'PT Sans:700'					=> 'PT Sans bold(700)',
		'Niconne&subset=latin-ext'		=> 'Niconne latin-ext',
		'PT Sans'						=> 'PT Sans',
		'Bitter'						=> 'Bitter',			
		'Playball&subset=latin-ext'		=> 'Playball latin-ext',
		'Alice'							=> 'Alice',
		'Allerta'						=> 'Allerta',
		'Arvo'							=> 'Arvo',
		'Antic'							=> 'Antic',

		'Bangers'						=> 'Bangers',
		'Bitter'						=> 'Bitter',
		
		'Cabin'							=> 'Cabin',
		'Cardo'							=> 'Cardo',
		'Carme'							=> 'Carme',
		'Coda'							=> 'Coda',
		'Coustard'						=> 'Coustard',
		'Gruppo'						=> 'Gruppo',

		'Damion'						=> 'Damion',
		'Dancing Script'				=> 'Dancing Script',
		'Droid Sans'					=> 'Droid Sans',
		'Droid Serif'					=> 'Droid Serif',
		
		'EB Garamond'					=> 'EB Garamond',
		
		'Fjord One'						=> 'Fjord One',
		
		'Inconsolata'					=> 'Inconsolata',
		
		'Josefin Sans'					=> 'Josefin Sans',
		'Josefin Slab'					=> 'Josefin Slab',
		
		'Kameron'						=> 'Kameron',
		'Kreon'							=> 'Kreon',
		
		'Lobster'						=> 'Lobster',
		'League Script'					=> 'League Script',

		'Mate SC'						=> 'Mate SC',
		'Mako'							=> 'Mako',
		'Merriweather'					=> 'Merriweather',
		'Metrophobic'					=> 'Metrophobic',
		'Molengo'						=> 'Molengo',
		'Muli'							=> 'Muli',

		'Nobile'						=> 'Nobile',
		'News Cycle'					=> 'News Cycle',

		'Open Sans'						=> 'Open Sans',
		'Orbitron'						=> 'Orbitron',
		'Oswald'						=> 'Oswald',
		
		'Pacifico'						=> 'Pacifico',
		'Poly'							=> 'Poly',
		'Podkova'						=> 'Podkova',

		'Quattrocento'					=> 'Quattrocento',
		'Questrial'						=> 'Questrial',
		'Quicksand'						=> 'Quicksand',
		
		'Raleway'						=> 'Raleway',

		'Salsa'							=> 'Salsa',
		'Sunshiney'						=> 'Sunshiney',
		'Signika Negative'				=> 'Signika Negative',


		'Tangerine'						=> 'Tangerine',
		'Terminal Dosis'				=> 'Terminal Dosis',
		'Tenor Sans'					=> 'Tenor Sans',

		'Varela Round'					=> 'Varela Round',
		
		'Yellowtail'					=> 'Yellowtail'
	);

	$fonts_lst = array();
	if ( false === ( $fonts_lst = get_transient( 'ct_admin_fonts_list' ) ) ) {
		$f_list = wp_remote_fopen( esc_url( 'https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha' ) );
		if ( $f_list && function_exists( 'json_decode' ) ) {
	
			$dec_arr = json_decode( $f_list, true );					
			foreach( $dec_arr['items'] as $item ) {
				$subsets = $variants = array();
					
				if ( isset( $item['variants'] ) ) {
					foreach( $item['variants'] as $v ) {
						if ( 'regular' == $v ) { $fonts_lst[ $item['family'] ] = $item['family']; continue; }
						
						$vars = explode( 'italic', $v );
						$bold = ! empty( $vars[0] ) ? 'bold (' . $vars[0] . ')' : '';
						$italic = isset( $vars[1] ) ? 'italic' : '';
						
						if ( $italic && ! $bold ) { $v = '400' . $v; }
						$variants[ $v ] = $bold . ' ' . $italic;
							
						$fonts_lst[ $item['family'] . ':' . $v ] = $item['family'] . ' ' . $variants[ $v ];
					}
				}

				if ( isset( $item['subsets'] ) && count( $item['subsets'] ) > 1 ) {
					foreach ( $item['subsets'] as $s ) {
						if ( 'latin' == $s ) { continue; }
						$fonts_lst[ $item['family'] . '&subset=' . $s ] = $item['family'] . ' ' . $s;
						$subsets[] = $s;
					}
				}

				foreach ( $variants as $v=>$str ) {
					foreach ( $subsets as $s ) {
						$fonts_lst[ $item['family']. ':'. $v. '&subset='. $s ] = $item['family'] . ' ' . $str . ' ' . $s;
					}
				}
			}
		}
		
		$life_time = 60*60*24*7;
		if ( empty( $fonts_lst ) ) {
			$fonts_lst = $default_list;
			$life_time = 60*30;
		}
		set_transient( 'ct_admin_fonts_list', $fonts_lst, $life_time );
	}
	
	return $fonts_lst;
}