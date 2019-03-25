@if (Auth::check())
    @if (Auth::id() != $user->id)
        @if (Auth::user()->is_following($user->id))
            {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                {!! Form::submit('フォロー', ['class' => "follow"]) !!}
            {!! Form::close() !!}
        @endif
    @elseif(Auth::id() == $user->id)
            {!! link_to_route('users.edit', '編集', ['id' => $user->id]) !!}
        
    @endif
@else
    {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
        {!! Form::submit('フォロー', ['class' => "follow"]) !!}
    {!! Form::close() !!}
@endif