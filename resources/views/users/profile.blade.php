<div class="profile mt-3">
	<h5 class="text-primary pl-2 py-1">user profile</h5>
	<div class="profile-content mb-0 px-2 py-1">
		<p>{!! nl2br(e($user->profile)) !!}</p>
	</div>
</div> 

@if (Auth::id() == $user->id)
	@if ($user->profile == '')
	{!! Form::open(['route' => ['profile.edit', $user->id], 'method' => 'get']) !!}
	<div class="form-group d-flex flex-row-reverse">
		{!! Form::submit('Post Profile', ['class' => 'btn btn-success py-1 px-4 mt-1']) !!}
	</div>
	{!! Form::close() !!}

	@else

	{!! Form::open(['route' => ['profile.edit', $user->id], 'method' => 'get']) !!}
	<div class="form-group d-flex flex-row-reverse">
		{!! Form::submit('Edit Profile', ['class' => 'btn btn-success py-1 px-4 mt-1']) !!}
	</div>
	{!! Form::close() !!}
	@endif
@endif
