<div class="card mt-3">
	<div class="card-header">
		<h4>profile</h3>
	</div>
	<div class="card-body">
		<p class="mb-0">{!! nl2br(e($user->profile)) !!}</p>
	</div>
</div> <!-- .card -->

@if ($user->profile == '')
{!! Form::open(['route' => ['profile.edit', $user->id], 'method' => 'post']) !!}
<div class="form-group">
	<!--
	{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
	-->
	{!! Form::submit('Post Profile', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}

@else

{!! Form::open(['route' => ['profile.put', $user->id], 'method' => 'put']) !!}
<div class="form-group">
	<!--
	{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
	-->
	{!! Form::submit('Edit Profile', ['class' => 'btn btn-success btn-block']) !!}
</div>
{!! Form::close() !!}
@endif

