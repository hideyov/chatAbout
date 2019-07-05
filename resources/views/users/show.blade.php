@extends('layouts.app')

@section('content')
	<div class="row">
		<aside class="col-sm-4 col-md-3">
			@include('users.card', ['user' => $user])
		</aside>
		<div class="col-sm-8 col-md-9">
			@include('users.navtabs', ['user' => $user])
			@if (Auth::id() == $user->id)
				{!! Form::open(['route' => 'chats.store']) !!}
					<div class="form-group d-flex flex-row">
						{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2', 'autofocus' => 'autofocus']) !!}
						{!! Form::submit('Post', ['class' => 'btn btn-success btn-lg py-1 px-5 mt-4 ml-1']) !!}
					</div>
				{!! Form::close() !!}
			@endif
			@if (count($chats) > 0)
				@include('chats.chats', ['chats' => $chats])
			@endif
		</div>
	</div>
@endsection

