<ul class="list-unstyled">
  @foreach($chats as $chat)
    <li class="media mb-3 border border-primary rounded">
      <img class="mr-2 rounded p-1" src="{{ Gravatar::src($chat->user->email, 50) }}" alt="">
      <div class="media-body">
        <div>
          {!! link_to_route('users.show', $chat->user->name, ['id' => $chat->user->id]) !!}<span class="text-muted">posted at {{ $chat->created_at }}</span>
        </div>
        <div>
          <p class="mb-0">{!! nl2br(e($chat->content)) !!}</p>
        </div>
        <div class="d-flex flex-row-reverse p-1" id="buttons">
          @if (Auth::id() == $chat->user_id)
            {!! Form::open(['route' => ['chats.destroy', $chat->id], 'method' => 'delete']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm ml-1 pb-10']) !!}
            {!! Form::close() !!}

            {!! Form::open(['route' => ['chats.edit', $chat->id], 'method' => 'get']) !!}
              {!! Form::submit('Edit', ['class' => 'btn btn-success btn-sm ml-1']) !!}
            {!! Form::close() !!}
          @endif

          @if (Auth::user()->is_favouring($chat->id))
            {!! Form::open(['route' => ['favorites.unfavorite', $chat->id], 'method' => 'delete']) !!}
              {!! Form::submit('Unavorite', ['class' => 'btn btn-secondary btn-sm ml-1']) !!}
            {!! Form::close() !!}
          @else
            {!! Form::open(['route' => ['favorites.favorite', $chat->id], 'method' => 'post']) !!}
              {!! Form::submit('Favorite', ['class' => 'btn btn-info btn-sm ml-1']) !!}
            {!! Form::close() !!}
          @endif

        </div>
      </div>
    </li>
  @endforeach
</ul>
{{ $chats->render('pagination::bootstrap-4') }}