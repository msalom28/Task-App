<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;

class Task extends Model 
{	
	/**
	 * The the inputs that can be mass assigned
	 */
	protected $fillable = ['title', 'body', 'user_id'];

	/**
	 * A task belongs to one user
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}


	/**
	 * Fetch Task that belongs to user by id
	 */
	public static function find($id, $name = null)
	{
		$task = static::with('user')->find($id);

		if($name and $task->user->name !== $name)

			throw new ModelNotFoundException;

		return $task;
	}

	/**
	 * Fetch all tasks that belong to a user
	 */
	public static function byName($name)
	{
		return User::byName($name)->tasks;
	}
}
