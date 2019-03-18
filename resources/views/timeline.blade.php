@extends('layouts.app')

@section('content')
        <div class="main pc-timeline col-lg-9 col-md-8 float-right">
            <span style="font-size:18px;">フォロー中のユーザーの投稿</span>
            <div class="timeline" style="margin-top:10px">
                @if (count($posts) > 0)
                    <div class="row" id="infinite-scroll">
                        @foreach ($posts as $post)    
                            <div class="col-md-4 col-lg-４ post">
                                
                                <div class="image-holder">
                                    <a href="{{ route('posts.show', ['id' => $post->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$post->image_url}}" class="user-image"></a>
                                    <div class="user">
                                    <div class="icon">
                                        @if($post->user->icon_url == null)
                                        <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon"></a>
                                    @else
                                        <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$post->user->icon_url}}" class="user-icon"></a>
                                    @endif 
                                    </div>
                                    <div class="user-name">
                                        <p>{{$post->user->name}}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="side-bar col-lg-3 col-md-4 float-left">
            <div class="search">
            <h1>探す</h1>
            <li>{!! link_to_route('posts.index', 'コーディネートを探す') !!}</li>
            <li>{!! link_to_route('users.index', 'ユーザーを探す') !!}</li>
            <li>{!! link_to_route('tags.index', 'タグから探す') !!}</li>
            </div>
        </div>
        
    <div class="sp-timeline">
        @if (count($posts) > 0)
                    <div class="row" id="infinite-scroll">
                        @foreach ($posts as $post)    
                            <div class="col-sm-6 col-12 post">
                                
                                <div class="image-holder">
                                    <div class="user">
                                    <div class="icon">
                                        @if($post->user->icon_url == null)
                                        <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon"></a>
                                    @else
                                        <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$post->user->icon_url}}" class="user-icon"></a>
                                    @endif 
                                    </div>
                                    <div class="user-name">
                                        <p>{{$post->user->name}}</p>
                                    </div>
                                </div>
                                    <a href="{{ route('posts.show', ['id' => $post->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$post->image_url}}" class="user-image"></a>
                                <div class="function-button">
                    <ul class="like-comment" style="width:auto">
                        <li class="list-inline-item like-button" style="display:flex;">
                            @if (Auth::check())
                                    @if(Auth::user()->is_likes($post->id))
                                        {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
                                            {{ Form::button('<i class="fas fa-heart fa-2x" style="height:28px; color: #dc143c;"></i>', ['type' => 'submit' , 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                        <span style="padding-top: 6px;padding-left: 2px;">{{$post->like_user->count()}}</span>
                                    @else
                                        {!! Form::open(['route' => ['likes.like', $post->id]])!!}
                                            {{ Form::button('<i class="far fa-heart fa-2x" style="height:28px;"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                        <span style="padding-top: 6px;padding-left: 2px;">{{$post->like_user->count()}}</span>
                                    @endif
                                
                            @else 
                                {!! Form::open(['route' => ['likes.like', $post->id]])!!}
                                    {{ Form::button('<i class="far fa-heart" style="height:28px;"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                {!! Form::close() !!}
                                <span style="padding-top: 6px;padding-left: 2px;">{{$post->like_user->count()}}</span>
                            @endif     
                        </li> 
                        <li class="comment" style="display:flex; width:auto;"><a href="#sp-comment"><i class="far fa-comment fa-2x" style="height:28px;"></i></a><span style="padding-top:1px; padding-left:2px">{{$post->comments->count()}}</span></li>
                    </ul>
                    <ul class="bookmark">
                        <li class="bookmark-button">
                            @if (Auth::check())
                                
                                    @if(Auth::user()->is_bookmarks($post->id))
                                        {!! Form::open(['route' => ['bookmarks.unbookmark', $post->id], 'method' => 'delete']) !!}
                                            {{ Form::button('<i class="fas fa-bookmark fa-2x" style="height:28px;"></i>', ['type' => 'submit' , 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['route' => ['bookmarks.bookmark', $post->id]])!!}
                                            {{ Form::button('<i class="far fa-bookmark fa-2x" style="height:28px;"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                    @endif
                                
                            @else 
                                {!! Form::open(['route' => ['bookmarks.bookmark', $post->id]])!!}
                                    {{ Form::button('<i class="far fa-bookmark fa-2x" style="height:28px;"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                {!! Form::close() !!}
                            @endif
                        </li>
                    </ul>
                </div>
                                </div>
                                
                            </div>
                            
                        @endforeach
                    </div>
                @endif
    </div>
    
@endsection