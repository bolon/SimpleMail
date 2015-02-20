<?php
// array to store some default values
$config = array(
	// database configuration values
	'db_config' => array(
		'host' => '127.0.0.1',
		'port' => '3306',
		'username' => 'user',
		'password' => 'user',
		'database' => 'ibad_uts',
	),
	// list of autoload target files
	'autoload_files' => array('../functions/common_functions.php','../functions/db_functions.php'),	
	// to activate/deactivate debug mode
	'show_debug' => TRUE,
);

// mysqli resource object
$mysqli = NULL;

// reads and returns a value in the configuration array
function get_config($_key) {
	global $config;
	return($config[$_key]);
}
?>