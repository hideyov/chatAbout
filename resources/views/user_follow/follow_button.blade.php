@if (Auth::id() != $user->id)
	@if (Auth::user()->is_following($user->id))
		{!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
			{!! Form::submit('Unfollow', ['class' => "btn-sm btn-danger btn-block mt-2 w-50"]) !!}
		{!! Form::close() !!}
	@else
		{!! Form::open(['route' => ['user.follow', $user->id]]) !!}
			{!! Form::submit('Follow', ['class' => "btn-sm btn-success btn-block mt-2 w-50"]) !!}
		{!! Form::close() !!}
	@endif
@endif