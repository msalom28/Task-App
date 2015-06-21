@extends('layouts.default')

@section('content')
	
	<div class="col-md-6">
		<h2>All tasks</h2>
		<ul class="media-list list-group">
		@foreach($tasks as $task)			
				
					<li class="media list-group-item {!! $task->completed ? 'list-group-item-success' : '' !!}">
					  <div class="media-left media-middle">
					    <a href="/{!! $task->user->name.'/tasks' !!}">
							<img class="media-object" src="{!! App::make('GetAvatar')->gravatar_url() !!}" alt="{!! $task->user->name !!}">
					    </a>
					      
					    
					  </div>
					  <div class="media-body">
					  	<a href="/{!! $task->user->name.'/tasks/'.$task->id !!}">					  	
					    	<h4 class="media-heading media-left">{!! $task->title !!}</h4>				
					    </a>
					  </div>
					  {!! Form::model($task, ['method' => 'PUT', 'route' => ['task.update', $task->id]]) !!}
					  {!! Form::checkbox('completed') !!}
					  {!! Form::submit('update') !!}
					  {!! Form::close() !!}

					</li>
				
		@endforeach
		</ul>
	</div>
	<div class="col-md-6">
		@if(isset($users))
			<h2>Add new</h2>
			@include('tasks/partials/form')
		@endif
	</div>		
	  
@stop