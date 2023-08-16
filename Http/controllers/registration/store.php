<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

// Validate the registration form
if(!Validator::email($email)) {
	$errors['email'] = 'Please provide a valid email address.';
}

if(!Validator::string($password, 8, 255)) {
	$errors['password'] = 'Please provide a password of at least 8 characters.';
}


if(!empty($errors)) {
	return view('registration/create.view.php', [
		'form' => $_POST,
		'errors' => $errors
	]);
}


// The registration form is valid. Check if email exists
$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if($user) {
	// The user already exists. Show login page instead.

	header('Location: /login');
	exit();
}


$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
	'email' => $email,
	'password' => password_hash($password, PASSWORD_BCRYPT)
]);


// Login user by creating a SESSION variable
$_SESSION['user'] = [
	'email' => $email
];

header('Location: /');
exit();