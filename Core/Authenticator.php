<?php

namespace Core;

class Authenticator {
	public static function attemptLogin(string $email, string $password): bool {
		$db = App::resolve(Database::class);

		$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

		if($user) {
			if(password_verify($password, $user['password'])) {
				self::login(['email' => $email]);

				return true;
			}
		}

		return false;
	}

	protected static function login($user): void {
		$_SESSION['user'] = [
			'email' => $user['email']
		];
	
		session_regenerate_id(true);
	}

	public static function logout(): void {
		Session::destroy();
	}
}