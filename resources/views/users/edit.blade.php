@extends('layouts.app')

@section('content')

	@if (Auth::id() == $user->id)
		{!! Form::open(['route' => ['profile.edit', $user->id], 'method' => 'get']) !!}
			<div class="form-group">
				{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
				{!! Form::submit('Post', ['class' => 'btn btn-success btn-block']) !!}
			</div>
		{!! Form::close() !!}
	@endif
@endsection
