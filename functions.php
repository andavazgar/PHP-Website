<?php

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
		abort($statusCode);
	}
}