@extends('layouts.app')

@section('content')
	<div class="text-center">
		<h1>edit your chat</h1>
	</div>
	
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
		{!! Form::open(['route' => ['chats.update', $id], 'method' => 'put']) !!}
			<div class="form-group">
				<textarea name='content' class="form-control" rows="2" autofocus>{{ $chat->content }}</textarea>
				<div class="d-flex">
				{!! Form::submit('Update', ['class' => 'btn btn-success btn-lg py-1 px-5 mx-auto my-2']) !!}
				</div>
			</div>
		{!! Form::close() !!}
		</div>
	</div>
@endsection
