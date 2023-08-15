<?php

namespace Core\Middleware;

use Core\Middleware;


class Authenticated implements Middleware {
	public static function handle(): void {
		if(! $_SESSION['user'] ?? false) {
			header('Location: /');
			exit();
		}
	}
}