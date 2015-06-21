<?php namespace App\Http\Controllers;

use Input;
use App\User;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\TaskCreatorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Validators\ValidationException;


class TaskController extends Controller {

	protected $taskCreator;

	/**
	 * Create an instance of TaskController
	 */
	public function __construct(TaskCreatorService $taskCreatorService)
	{
		$this->taskCreator = $taskCreatorService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = Task::with('user')->orderBy('created_at', 'desc')->get();

		$users = User::lists('name', 'id');

		return view('tasks.index', compact('tasks', 'users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$this->taskCreator->make(Input::all());

		} catch( ValidationException $e)
		{
			return redirect()->back()->withInput()->withErrors($e->getErrors());
		}
			
		return redirect()->route('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name, $id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$task = Task::find($id);

		$task->completed = $request->input('completed') ? $request->input('completed') : 0;

		$task->save();

		return redirect()->route('home');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
