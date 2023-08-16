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

function redirect(string $path) {
	header("Location: {$path}");
	exit();
}

function old(string $key, mixed $default = ''): mixed {
	return \Core\Session::get('old')[$key] ?? $default;
}