<?php

/**
 * Tasks
 */
Route::get('/', ['as' => 'home', 'uses' => 'TaskController@index']);

Route::post('/tasks', 'TaskController@store');

Route::put('tasks/{id}', ['as' => 'task.update', 'uses' => 'TaskController@update']);


/**
 * User name Tasks
 */
Route::get('{name}', 'UserTaskController@index');

Route::get('{name}/tasks', 'UserTaskController@index');

Route::get('{name}/tasks/{id}', 'UserTaskController@show');


// Route::get('{name}/tasks', function($name) 
// {
// 	$user =  User::with('tasks')->where('name', $name)->first();

// 	return $user;
// });


// Route::get('{name}/task/{id}', function($name, $id) 
// {
// 	$user =  User::where('name', $name)->first();
	
// 	$task = $user->tasks()->findOrFail($id);	

// 	return $task;
// });


//7:13 Validation services