@extends('layouts.app')

@section('content')
	<div class="row">
		<aside class="col-sm-4 col-md-3">
			@include('users.card', ['user' => $user])
		</aside>
		<div class="col-sm-8 col-md-9">
			@include('users.navtabs', ['user' => $user])
			@include('users.users', ['users' => $users])
		</div>
	</div>
@endsection