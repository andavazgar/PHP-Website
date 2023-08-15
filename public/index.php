<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'Core/functions.php';
require_once base_path('bootstrap.php');


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

Core\Router::route($uri, $method);