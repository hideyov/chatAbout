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
        <div class="d-flex flex-row">
          @if (Auth::user()->is_favouring($chat->id))
            {!! Form::open(['route' => ['favorites.unfavorite', $chat->id], 'method' => 'delete']) !!}
              {!! Form::submit('Unavorite', ['class' => 'btn btn-success btn-sm']) !!}
            {!! Form::close() !!}
          @else
            {!! Form::open(['route' => ['favorites.favorite', $chat->id], 'method' => 'post']) !!}
              {!! Form::submit('Favorite', ['class' => 'btn btn-info btn-sm']) !!}
            {!! Form::close() !!}
          @endif
          @if (Auth::id() == $chat->user_id)
            {!! Form::open(['route' => ['chats.destroy', $chat->id], 'method' => 'delete']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}

            {!! Form::open(['route' => ['chats.edit', $chat->id], 'method' => 'get']) !!}
              {!! Form::submit('Edit', ['class' => 'btn btn-warning btn-sm']) !!}
            {!! Form::close() !!}
          @endif

        </div>
      </div>
    </li>
  @endforeach
</ul>
{{ $chats->render('pagination::bootstrap-4') }}