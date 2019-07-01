@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favouring($chat->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $chat->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unavorite', ['class' => "btn btn-secondary btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $chat->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif