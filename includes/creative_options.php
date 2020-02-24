<?php
/***************************************************************************
						FoxApp Options Page
***************************************************************************/
$prefix = 'creativeto_';
$creativeto_version = "1.0";
$creativeto_modules_instaled = array();
$creativeto_version_compatible = array( 0 => "0.9" , 1 => "1.0");
$creativeto_version_type = "free plugin";
define("CREATIVETOPATCH",plugins_url('', __FILE__));
define("CREATIVETOCUSTOMPLUGINPATCH",plugins_url('', __FILE__)."/custom_plugins");
global $creativeto_custom_meta_fields, $creativeto_custom_tabs, $creativeto_base_dir, $creativeto_modules_instaled;
$creativeto_custom_meta_fields = $creativeto_custom_tabs = array();
/*****************************************************************************
									INIT PLUGINS
******************************************************************************/
function exclude_files($dir, &$dir_array, $find_file)
{
    // Create array of current directory
    $files = scandir($dir);
    if(is_array($files))
    {
        foreach($files as $val)
        {
            // Skip home and previous listings
            if($val == '.' || $val == '..') continue;
            // If directory then dive deeper, else add file to directory key
            if(is_dir($dir.'/'.$val))
            {
                // Add value to current array, dir or file
                $dir_array[$dir][] = $val;
                find_files($dir.'/'.$val, $dir_array, $find_file);
            }
            else
            {
                $dir_array[$dir][] = $val;
				if ( substr($val, -4) == '.php') {
					if( !in_array( $val , $find_file ) ){
						include_once($dir.'/'.$val);
					}
            	}
            }
        }
    }
    ksort($dir_array);
}
function find_files($dir, &$dir_array, $find_file)
{
    // Create array of current directory
    $files = scandir($dir);
    if(is_array($files))
    {
        foreach($files as $val)
        {
            // Skip home and previous listings
            if($val == '.' || $val == '..') continue;
            // If directory then dive deeper, else add file to directory key
            if(is_dir($dir.'/'.$val))
            {
                // Add value to current array, dir or file
                $dir_array[$dir][] = $val;
                find_files($dir.'/'.$val, $dir_array, $find_file);
            }
            else
            {
                $dir_array[$dir][] = $val;
				if ( substr($val, -4) == '.php') {
					if( in_array( $val , $find_file ) ){
						include_once($dir.'/'.$val);
					}
            	}
            }
        }
    }
    ksort($dir_array);
}
$folder_list = array();
find_files($creativeto_base_dir."/includes/custom_plugins/", $folder_list, array('install.php'));
$folder_list = array();
find_files($creativeto_base_dir."/includes/custom_plugins/", $folder_list, array('functions.php'));
$sortPluginsArray = array();
foreach($creativeto_custom_tabs as $menuPluginItem){
    foreach($menuPluginItem as $key=>$menuPluginItemValue){
        if(!isset($sortPluginsArray[$key])){
            $sortPluginsArray[$key] = array();
        }
        $sortPluginsArray[$key][] = $menuPluginItemValue;
    }
}
$orderPluginsByColumn = "menu_position";
array_multisort($sortPluginsArray[$orderPluginsByColumn],SORT_ASC,$creativeto_custom_tabs);
//include_once($creativeto_base_dir . '/includes/custom_plugins/init_plugins_functions.php');
?>
