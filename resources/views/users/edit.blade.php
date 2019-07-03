@section('content')
    <h3>profile</h3>
	<div>
        <p class="mb-0">{!! nl2br(e($user->profile)) !!}</p>
    </div>
	
	@if (Auth::id() == $user->id)
		{!! Form::open(['route' => ['profile.edit', $user->id], 'method' => 'get']) !!}
			<div class="form-group">
				{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
				{!! Form::submit('Edit Profile', ['class' => 'btn btn-success btn-block']) !!}
			</div>
		{!! Form::close() !!}
	@endif
@endsection


