@extends('layouts.app')

@section('content')
	@if (Auth::check())
		<div class="row">
			<aside class="col-sm-4">
				@include('users.card', ['user' => Auth::user()])
			</aside>
			<div class="col-sm-8">
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
	@else
		<div class="center jumbotron bg-primary text-light">
			<div class="text-center">
				<h1>chatting about web service</h1>
				{!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-success']) !!}
			</div>	
		</div>
	@endif
@endsection
