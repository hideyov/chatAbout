@extends('layouts.app')

@section('content')
	@if (Auth::check())
		{{ Auth::user()->name }}
		<br>
		{{ Auth::user()->email }}
	@else
		<div class="center jumbotron bg-primary text-light">
			<div class="text-center">
				<h1>chatting about web service</h1>
				{!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-success']) !!}
			</div>	
		</div>
	@endif
@endsection
