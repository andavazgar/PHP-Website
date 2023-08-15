<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

// Validate the login form
if(!Validator::email($email)) {
	$errors['email'] = 'Please provide a valid email address.';
}

if(!Validator::string($password)) {
	$errors['password'] = 'Please provide a valid password.';
}


if(!empty($errors)) {
	return view('session/create.view.php', [
		'form' => $_POST,
		'errors' => $errors
	]);
}


// The login form is valid. Check if user exists
$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if($user) {
	if(password_verify($password, $user['password'])) {
		login(['email' => $email]);

		header('Location: /');
		exit();
	}
}


return view('session/create.view.php', [
	'form' => $_POST,
	'errors' => [
		'wrongLoginCredentials' => 'No matching account found for that email address and password.'
	]
]);