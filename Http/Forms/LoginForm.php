<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;


class LoginForm {
	protected array $errors = [];
	protected array $attributes = [];

	public function __construct(array $attributes) {
		$this->attributes = $attributes;

		// Validate the login form
		if(!Validator::email($attributes['email'])) {
			$this->errors['email'] = 'Please provide a valid email address.';
		}
	
		if(!Validator::string($attributes['password'])) {
			$this->errors['password'] = 'Please provide a valid password.';
		}
	}

	public static function validate(array $attributes): self {		
		$instance = new self($attributes);

		return $instance->failed() ? $instance->throw() : $instance;
	}

	public function throw():void {
		ValidationException::throw($this->errors, $this->attributes);
	}

	public function failed(): bool {
		return !empty($this->errors);
	}

	public function errors(): array {
		return $this->errors;
	}

	public function addError(string $field, string $message): self {
		$this->errors[$field] = $message;

		return $this;
	}
}