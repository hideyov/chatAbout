@extends('layouts.app')

@section('content')
	<div class="text-center">
		<h1>edit your chat</h1>
	</div>
	
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
		{!! Form::open(['route' => ['chats.update', $id], 'method' => 'put']) !!}
			<div class="form-group">
				{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
				{!! Form::submit('Update', ['class' => 'btn btn-success btn-block']) !!}
			</div>
		{!! Form::close() !!}
		</div>
	</div>
@endsection