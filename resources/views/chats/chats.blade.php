<ul class="list-unstyled">
	@foreach($chats as $chat)
		<li class="media mb-3">
			<img class="mr-2 rounded" src="{{ Gravatar::src($chat->user->email, 50) }}" alt="">
			<div class="media-body">
				<div>
					{!! link_to_route('users.show', $chat->user->name, ['id' => $chat->user->id]) !!}<span class="text-muted">posted at {{ $chat->created_at }}</span>
				</div>
				<div>
					<p class="mb-0">{!! nl2br(e($chat->content)) !!}</p>
				</div>
				<div>
					@if (Auth::id() == $chat->user_id)
						{!! Form::open(['route' => ['chats.destroy', $chat->id], 'method' => 'delete']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
						{!! Form::close() !!}
					@endif
				</div>
			</div>
		</li>
	@endforeach
</ul>
{{ $chats->render('pagination::bootstrap-4') }}