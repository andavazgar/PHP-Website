<?php

namespace Core;

class Router {
	protected static $routes = [];

	protected static function addRoute(string $method, string $uri, string $controller): self {
		self::$routes[] = new Route($method, $uri, $controller);

		return new self;
	}

	public static function get(string $uri, string $controller): self {
		return self::addRoute("GET", $uri, $controller);
	}

	public static function post(string $uri, string $controller): self {
		return self::addRoute("POST", $uri, $controller);
	}

	public static function delete(string $uri, string $controller): self {
		return self::addRoute("DELETE", $uri, $controller);
	}

	public static function patch(string $uri, string $controller): self {
		return self::addRoute("PATCH", $uri, $controller);
	}

	public static function put(string $uri, string $controller): self {
		return self::addRoute("PUT", $uri, $controller);
	}

	public static function only(Middleware $role): self {
		self::$routes[array_key_last(self::$routes)]->addMiddleware($role);

		return new self;
	}

	public static function route(string $uri, string $method): void {
		foreach(self::$routes as $route) {
			if($route->isRoute($method, $uri)) {
				if($route->getMiddleware() !== null) {
					$route->getMiddleware()::handle();
				}
				
				require base_path($route->getController());
				return;
			}
		}

		self::abort();
	}

	public static function abort(int $code = 404) {
		http_response_code($code);
	
		require base_path("views/{$code}.php");
		die();
	}
}