<?php

namespace Core;


class App {
	protected static array $container = [];

	public static function bind(string $key, callable $resolver): void {
		self::$container[$key] = $resolver;
	}

	public static function resolve(string $key): mixed {
		if(! array_key_exists($key, self::$container)) {
			throw new \Exception("No matching binding found for {$key}");
		}

		$resolver = self::$container[$key];

		return call_user_func($resolver);
	}

	public static function setContainer(array $container): void {
		self::$container = $container;
	}

	public static function container(): array {
		return self::$container;
	}
}