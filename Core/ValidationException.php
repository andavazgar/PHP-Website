<?php

namespace Core;

class ValidationException extends \Exception {
	public readonly array $errors;
	public readonly array $old;

	public static function throw(array $errors, array $old): void {
		$instance = new self('The form failed to validate.');

		$instance->errors = $errors;
		$instance->old = $old;

		throw $instance;
	}
}