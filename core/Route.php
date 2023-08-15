<?php

namespace Core;

class Route {
	protected string $method;
	protected string $uri;
	protected string $controller;
	protected ?Middleware $middleware;
	
	public function __construct(string $method, string $uri, string $controller, ?Middleware $middleware = null) {
		$this->method = strtoupper($method);
		$this->uri = $uri;
		$this->controller = $controller;
		$this->middleware = $middleware;
	}
	
	public function getController(): string {
		return $this->controller;
	}
	
	public function addMiddleware(Middleware $middleware): void {
		$this->middleware = $middleware;
	}

	public function getMiddleware(): ?Middleware {
		return $this->middleware;
	}
	
	public function isRoute(string $method, string $uri): bool {
		return $this->method === strtoupper($method) && $this->uri === $uri;
	}
}