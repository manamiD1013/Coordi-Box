    <div class="pc-header row mb-3">
        <div class="user-sub">
        <div class="icon">
            @if($user->icon_url == null)
                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon">
            @else
                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$user->icon_url}}" class="user-icon">
            @endif    
        </div>
        <div class="follow-button row">
            @include('user_follow.follow_button', ['user' => $user])   
        </div>
    </div>
    <div class="user-main">
        <div class="name">
            <h1 style="margin:0">{{ $user->name }}</h1>
        </div>
        <div class="user-id">
            <p>&#64;{{ $user->uid }}</p>
        </div>
        <ul class="list-inline sp-only">
            <li class="list-inline-item"><a href="#modal-01" id="open-01"> <span>フォロー{{ $user->followings->count() }}</span></a>
                <div id="modal-01">
                    <span class="close-modal-01 clearfix"><i class="fas fa-times fa-2x float-right"></i></span>
                    <div style="height:100%;overflow:auto;">
                        @if ($user->followings->count() > 0)
                            <div class="show-users row"4>
                                @foreach ($user->followings as $following)    
                                    <div class="col-lg-6 col-md-6 col-sm-12 users">
                                        <div class="user">
                                            <div class="icon">
                                                @if($following->icon_url == null)
                                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="80" height="80">
                                                @else
                                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$following->icon_url}}" class="user-icon" width="80" height="80">
                                                @endif
                                            </div>
                                            <div class="content">
                                                <div class="user-name">
                                                    <h5>{!! link_to_route('users.show', $following->name, ['id' => $following->id]) !!}</h5>
                                                </div>
                                                <div>
                                                    <ul class="list-inline">
                                                    <li class="list-inline-item"><a href="#"><span>{{ $following->posts->count() }}</span>投稿</a></li>
                                                    <li class="list-inline-item"><a href="#"><span>{{ $following->followers->count() }}</span>フォロワー</a></li>
                                                   </ul> 
                                                </div>
                                            </div>
                                            @if (Auth::check())
                                                @if (Auth::id() != $following->id)
                                                    <div class="follow-button float-right">
                                                        @if (Auth::user()->is_following($following->id))
                                                            {!! Form::open(['route' => ['user.unfollow', $following->id], 'method' => 'delete']) !!}
                                                                {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
                                                            {!! Form::close() !!}
                                                        @else
                                                            {!! Form::open(['route' => ['user.follow', $following->id]]) !!}
                                                                {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                @elseif(Auth::id() == $following->id)
                                                
                                                @endif
                                            @else
                                                <div class="follow-button float-right">
                                                    {!! Form::open(['route' => ['user.follow', $following->id]]) !!}
                                                        {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif 
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                      
                </div>   
            </li>
            <li class="list-inline-item"><a href="#modal-02" id="open-02"> <span>フォロワー{{ $user->followers->count() }}</span></a>
            <div id="modal-02">
                <span class="close-modal-02 clearfix"><i class="fas fa-times fa-2x float-right"></i></span>
                <div style="height:100%;overflow:auto;">
                @if ($user->followers->count() > 0)
                        <div class="show-users row">
                            @foreach ($user->followers as $follower)    
                                <div class="col-lg-6 col-md-6 col-sm-12 users">
                                    <div class="user">
                                        <div class="icon">
                                            @if($follower->icon_url == null)
                                                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="80" height="80">
                                            @else
                                                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$follower->icon_url}}" class="user-icon" width="80" height="80">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <div class="user-name">
                                                <h5>{!! link_to_route('users.show', $follower->name, ['id' => $follower->id]) !!}</h5>
                                            </div>
                                            <div>
                                                <ul class="list-inline sp-only">
                                                <li class="list-inline-item"><a href="#"><span>{{ $follower->posts->count() }}</span>投稿</a></li>
                                                <li class="list-inline-item"><a href="#"><span>{{ $follower->followers->count() }}</span>フォロワー</a></li>
                                               </ul> 
                                            </div>
                                        </div>
                                        @if (Auth::check())
                                            @if (Auth::id() != $follower->id)
                                                <div class="follow-button float-right">
                                                    @if (Auth::user()->is_following($follower->id))
                                                        {!! Form::open(['route' => ['user.unfollow', $follower->id], 'method' => 'delete']) !!}
                                                            {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
                                                        {!! Form::close() !!}
                                                    @else
                                                        {!! Form::open(['route' => ['user.follow', $follower->id]]) !!}
                                                            {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>
                                            @elseif(Auth::id() == $user->id)
                                            
                                            @endif
                                        @else
                                            <div class="follow-button float-right">
                                                {!! Form::open(['route' => ['user.follow', $follower->id]]) !!}
                                                    {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        @endif 
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>   
            </div> 
            </li>
        </ul>
        <div class="introduce" style="margin-top:10px;">
            <p style="word-break: break-all;">{!! nl2br(e($user->introduce)) !!}</p>   
        </div>
        </div>
    </div>
    
    <div class="sp-header row mb-3">
        <div class="user-sub">
        <div class="icon">
            @if($user->icon_url == null)
                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon">
            @else
                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$user->icon_url}}" class="user-icon">
            @endif    
        </div>
        
        </div>
    <div class="user-main">
        <div class="clearfix">
        <div class="user-name">
            <div class="name">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="user-id">
            <p>&#64;{{ $user->uid }}</p>
        </div> 
        </div>
        
        <div class="follow-button">
            @include('user_follow.follow_button', ['user' => $user])   
        </div>
        </div>
           
        <ul class="list-inline sp-only">
            <li class="list-inline-item"><a href="#modal-03" id="open-03"> <span>フォロー{{ $user->followings->count() }}</span></a>
                <div id="modal-03">
                    <span class="close-modal-03 clearfix"><i class="fas fa-times fa-2x float-right"></i></span>
                    <div style="height:100%;overflow:auto;">
                        @if ($user->followings->count() > 0)
                            <div class="show-users row">
                                @foreach ($user->followings as $following)    
                                    <div class="col-lg-6 col-md-6 col-sm-12 users">
                                        <div class="user">
                                            <div class="icon">
                                                @if($following->icon_url == null)
                                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="80" height="80">
                                                @else
                                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$following->icon_url}}" class="user-icon" width="80" height="80">
                                                @endif
                                            </div>
                                            <div class="content">
                                                <div class="user-name">
                                                    <h5>{!! link_to_route('users.show', $following->name, ['id' => $following->id]) !!}</h5>
                                                </div>
                                                <div>
                                                    <ul class="list-inline">
                                                    <li class="list-inline-item"><a href="#"><span>{{ $following->posts->count() }}</span>投稿</a></li>
                                                    <li class="list-inline-item"><a href="#"><span>{{ $following->followers->count() }}</span>フォロワー</a></li>
                                                   </ul> 
                                                </div>
                                            </div>
                                            @if (Auth::check())
                                                @if (Auth::id() != $following->id)
                                                    <div class="follow-button float-right">
                                                        @if (Auth::user()->is_following($following->id))
                                                            {!! Form::open(['route' => ['user.unfollow', $following->id], 'method' => 'delete']) !!}
                                                                {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
                                                            {!! Form::close() !!}
                                                        @else
                                                            {!! Form::open(['route' => ['user.follow', $following->id]]) !!}
                                                                {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                @elseif(Auth::id() == $user->id)
                                                
                                                @endif
                                            @else
                                                <div class="follow-button float-right">
                                                    {!! Form::open(['route' => ['user.follow', $following->id]]) !!}
                                                        {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif 
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div style="
                                margin: auto;
                                text-align: center;
                            ">
                                <p>まだ誰もフォローしていません。</p>
                            </div>
                        @endif    
                    </div>
                </div>      
            </li>
            <li class="list-inline-item"><a href="#modal-04" id="open-04"> <span>フォロワー{{ $user->followers->count() }}</span></a>
                <div id="modal-04">
                    <span class="close-modal-04 clearfix"><i class="fas fa-times fa-2x float-right"></i></span>
                    <div style="height:100%;overflow:auto;">
                        @if ($user->followers->count() > 0)
                            <div class="show-users row">
                                @foreach ($user->followers as $follower)    
                                    <div class="col-lg-6 col-md-6 col-sm-12 users">
                                        <div class="user">
                                            <div class="icon">
                                                @if($follower->icon_url == null)
                                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="80" height="80">
                                                @else
                                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$follower->icon_url}}" class="user-icon" width="80" height="80">
                                                @endif
                                            </div>
                                            <div class="content">
                                                <div class="user-name">
                                                    <h5>{!! link_to_route('users.show', $user->name, ['id' => $follower->id]) !!}</h5>
                                                </div>
                                                <div>
                                                    <ul class="list-inline">
                                                    <li class="list-inline-item"><span>{{ $follower->posts->count() }}</span>投稿</li>
                                                    <li class="list-inline-item"><span>{{ $follower->followers->count() }}</span>フォロワー</a></li>
                                                   </ul> 
                                                </div>
                                            </div>
                                            @if (Auth::check())
                                                @if (Auth::id() != $follower->id)
                                                    <div class="follow-button float-right">
                                                        @if (Auth::user()->is_following($follower->id))
                                                            {!! Form::open(['route' => ['user.unfollow', $follower->id], 'method' => 'delete']) !!}
                                                                {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
                                                            {!! Form::close() !!}
                                                        @else
                                                            {!! Form::open(['route' => ['user.follow', $follower->id]]) !!}
                                                                {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                @elseif(Auth::id() == $user->id)
                                                
                                                @endif
                                            @else
                                                <div class="follow-button float-right">
                                                    {!! Form::open(['route' => ['user.follow', $follower->id]]) !!}
                                                        {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif 
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div style="
                                margin: auto;
                                text-align: center;
                            ">
                                <p>まだフォロワーがいません。</p>
                            </div>
                        @endif 
                    </div>
                </div>
            </li>
        </ul>
        
    </div>
        <div class="introduce">
            <p>{!! nl2br(e($user->introduce)) !!}</p>   
        </div>
        
    </div>
    
  
        
    
