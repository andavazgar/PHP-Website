<?php

namespace Core;

class Router {
	protected static array $routes = [];

	protected static function addRoute(string $method, string $uri, string $controller): void {
		self::$routes[$uri][$method] = $controller;
	}

	public static function get(string $uri, string $controller): void {
		self::addRoute("GET", $uri, $controller);
	}

	public static function post(string $uri, string $controller): void {
		self::addRoute("POST", $uri, $controller);
	}

	public static function delete(string $uri, string $controller): void {
		self::addRoute("DELETE", $uri, $controller);
	}

	public static function patch(string $uri, string $controller): void {
		self::addRoute("PATCH", $uri, $controller);
	}

	public static function put(string $uri, string $controller): void {
		self::addRoute("PUT", $uri, $controller);
	}

	public static function route(string $uri, string $method): void {
		if(array_key_exists($uri, self::$routes) && array_key_exists($method, self::$routes[$uri])) {
			require base_path(self::$routes[$uri][$method]);
		} else {
			self::abort();
		}
	}

	public static function abort(int $code = 404) {
		http_response_code($code);
	
		require base_path("views/{$code}.php");
		die();
	}
}