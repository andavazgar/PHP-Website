<?php

use Core\App;
use Core\Database;


spl_autoload_register(function ($class) {
	$class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

	require base_path("{$class}.php");
});


require_once base_path('routes.php');


App::bind(Database::class, function() {
	$config = require base_path('config.php');

	return new Database($config['database']);
});