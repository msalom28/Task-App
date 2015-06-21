<?php namespace App\Validators;

class TaskValidator extends BaseValidator{

	protected static $rules = [

		'title'  => 'required',
		'body'	 => 'required',
		'assign' => 'required'
	];
}