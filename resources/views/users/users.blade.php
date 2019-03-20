@if (count($users) > 0)
    <div class="show-users row ">
        @foreach ($users as $user)    
            <div class="col-lg-6 col-md-6 col-sm-12 users">
                <div class="user">
                    <div class="icon">
                        @if($user->icon_url == null)
                            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="80" height="80">
                        @else
                            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$user->icon_url}}" class="user-icon" width="80" height="80">
                        @endif
                    </div>
                    <div class="content">
                        <div class="user-name">
                            <h5>{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</h5>
                        </div>
                        <div class="pc-only">
                            <ul class="list-inline">
                            <li class="list-inline-item"><a href="{{ route('users.show', ['id' => $user->id]) }}"><span>{{ $user->posts->count() }}投稿</span></a></li>
                            <li class="list-inline-item"><a href="{{ route('users.followers', ['id' => $user->id]) }}" class=" {{ Request::is('users/*/followers') ? 'active' : '' }}"><span>{{ $user->followers->count() }}</span>フォロワー</a></li>
                           </ul> 
                        </div>
                    </div>
                    @if (Auth::check())
                        @if (Auth::id() != $user->id)
                            <div class="follow-button float-right">
                                @if (Auth::user()->is_following($user->id))
                                    {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                        {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        @elseif(Auth::id() == $user->id)
                        
                        @endif
                    @else
                        <div class="follow-button float-right">
                            {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                            {!! Form::close() !!}
                        </div>
                    @endif 
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $users->render('pagination::bootstrap-4') }}
    </div>
@endif