<?php namespace App\Validators;

use Exception;

class ValidationException extends Exception
{
	protected $errors;

	public function __construct($message, $errors, $code = 0)
	{
		$this->errors = $errors;

		parent::__construct($message, $code);
	}

	public function getErrors()
	{
		return $this->errors;
	}

}