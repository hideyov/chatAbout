@extends('layouts.app')

@section('content')
	<div class="row">
		<aside class="col-sm-3">
			@include('users.card', ['user' => $user])
		</aside>
		<div class="col-sm-9">
			@include('users.navtabs', ['user' => $user])
			@if (Auth::id() == $user->id)
				{!! Form::open(['route' => 'chats.store']) !!}
					<div class="form-group">
						{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
						{!! Form::submit('Post', ['class' => 'btn btn-success btn-block']) !!}
					</div>
				{!! Form::close() !!}
			@endif
			@if (count($chats) > 0)
				@include('chats.chats', ['chats' => $chats])
			@endif
		</div>
	</div>
@endsection