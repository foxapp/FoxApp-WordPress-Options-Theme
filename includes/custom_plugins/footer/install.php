<?php
/*********************************************************************
	INCLUDE ALL PHP FILES BUT NOT INSTALL.PHP AND FUNCTIONS.PHP
**********************************************************************/
$fl = array();//File List 
exclude_files(dirname(__FILE__), $fl, array('install.php','functions.php'));
?>