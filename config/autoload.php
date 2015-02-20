<?php
include_once 'configuration.php';

// loads all configuration files
function autoload() {
	// gets values stored in configuration
	$autoload_files = get_config('autoload_files');
	foreach ($autoload_files as $file) {
		include_once $file;
	}
}

// runs the function
autoload();
?>