<?php

namespace Core;

class Session {
	private const TEMP_KEY = 'TEMP';

	public static function get(string $key, mixed $default = null): mixed {
		return $_SESSION[self::TEMP_KEY][$key] ?? $_SESSION[$key] ?? $default;
	}

	public static function put(string $key, mixed $value): void {
		$_SESSION[$key] = $value;
	}

	public static function has($key): bool {
		return (bool) self::get($key);
	}

	public static function flash(string $key, mixed $value): void {
		$_SESSION[self::TEMP_KEY][$key] = $value;
	}

	public static function unflash(): void {
		unset($_SESSION[self::TEMP_KEY]);
	}

	public static function clear(): void {
		$_SESSION = [];
	}

	public static function destroy(): void {
		self::clear();
		session_destroy();

		$params = session_get_cookie_params();
		setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
	}
}