<?php

use Core\Router;
use Core\Response;


function dd($variable, $die = true) {
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";

	if ($die)
		die();
}

function urlIs(string $value): bool {
	return $_SERVER['REQUEST_URI'] === $value;
}

function authorize(bool $condition, int $statusCode = Response::FORBIDDEN): void {
	if(! $condition) {
		Router::abort($statusCode);
	}
}

function base_path(string $path): string {
	return BASE_PATH . $path;
}

function view(string $path, array $attributes = []): void {
	extract($attributes);

	require base_path("views/{$path}");
}

function login($user) {
	$_SESSION['user'] = [
		'email' => $user['email']
	];

	session_regenerate_id(true);
 }

 function logout() {
	$_SESSION = [];
	session_destroy();

	$params = session_get_cookie_params();
	setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}