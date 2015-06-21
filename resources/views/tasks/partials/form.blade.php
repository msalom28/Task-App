{!! Form::open(['url' => '/tasks', 'class' => 'form']) !!}
	<p class="text-danger">{!! $errors->first('assign') !!}</p>
	<div class="form-group">
		{!! Form::label('assign', 'Assign To:', ['class' => 'pull-left']) !!}
		{!! Form::select('assign', $users, null, ['class' => 'form-control']) !!}
	</div>
	<p class="text-danger">{!! $errors->first('title') !!}</p>
	<div class="form-group">		
		{!! Form::label('title', 'Title:', ['class' => 'pull-left']) !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}		
	</div>
	<p class="text-danger">{!! $errors->first('body') !!}</p>
	<div class="form-group">		
		{!! Form::label('body', 'Body:', ['class' => 'pull-left']) !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}		
	</div>
	<div>
		{!! Form::submit('Create Task', ['class' => 'btn btn-primary form-control']) !!}

	</div>

{!! Form::close() !!}