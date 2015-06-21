<?php namespace App\Validators;

use Validator;

abstract class BaseValidator
{
	protected $errors;

	public function isValid(array $attributes)
	{
		$v = Validator::make($attributes, static::$rules);

		if($v->fails())
		{
			$this->errors = $v->messages();

			return false;
		}

		return true;
	}

	public function getErrors()
	{
		return $this->errors;
	}
}