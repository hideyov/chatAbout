<div>
	<div>
		<h3 class="bg-primary pl-2 py-1 text-light rounded">{{ $user->name }}</h3>
	</div>
	<div>
		<img class="col-6 col-sm-12 col-lg-9 rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
	</div>
</div> 

@include('user_follow.follow_button', ['user' => $user])

@include('users.profile', ['user' => $user])
