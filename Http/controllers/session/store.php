<?php

use Core\Authenticator;
use Http\Forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate(['email' => $email, 'password' => $password]);

$signedIn = Authenticator::attemptLogin($email, $password);

if(!$signedIn) {
	$form->addError(
		'wrongLoginCredentials', 'No matching account found for that email address and password.'
	)->throw();
}

redirect('/');