@extends('layouts.app')

@section('content')
        <div class="main .col-xl-9 col-lg-8 col-md-8 col-sm-12 float-right">
            <div class="new-post index">
                <h1>新着</h1>
                @if (count($posts) > 0)
                    
                    <div class="row" style="padding-left:15px; padding-right:10px">
                        @foreach ($posts as $post)    
                            <div class="col-6 col-sm-4 col-md-4 col-lg-４ post">
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
                <p style="text-align:right;">{!! link_to_route('posts.new', 'もっと見る') !!}</p>
            </div>
            <div class="post-ranking index">
                <h1>ランキング</h1> 
                @if (count($post_ranking) > 0)
                    <div class="row" style="padding-left:15px; padding-right:10px">
                    @foreach ($post_ranking as $post)    
                        <div class="col-6 col-sm-4 col-md-4 col-lg-４ post">
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
            <p style="text-align:right;">{!! link_to_route('posts.ranking', 'もっと見る') !!}</p>
        </div>
        <div class="side-bar col-xl-3 col-lg-4 col-md-4 col-sm-4 float-left">
            <div class="search" style="margin-bottom:25px;">
                <h1>探す</h1>
                <li>{!! link_to_route('posts.index', 'コーディネートを探す') !!}</li>
                <li>{!! link_to_route('users.index', 'ユーザーを探す') !!}</li>
                <li>{!! link_to_route('tags.index', 'タグから探す') !!}</li>
            </div>
            <div class="separator"></div>
            <div class="user-ranking" style="margin-bottom:25px;">
                <h1>人気のユーザー</h1>
                <div class="users">
                @if (count($user_ranking) > 0)
                    @foreach ($user_ranking as $user)
                        <div class="user row">
                            <div class="icon">
                            @if($user->icon_url == null)
                                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon">
                            @else
                                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$user->icon_url}}" class="user-icon">
                            @endif
                            </div>
                            <div class="content">
                                <div class="user-name">
                                    <h5>{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</h5>
                                </div>
                                <div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="{{ route('users.show', ['id' => $user->id]) }}"><span>{{ $user->posts->count() }}投稿</span></a></li>
                                        <li class="list-inline-item"><a href="{{ route('users.followers', ['id' => $user->id]) }}"  {{ Request::is('users/*/followers') ? 'active' : '' }}><span>{{ $user->followers->count() }}フォロワー</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
            <div class="separator"></div>
            <div class="tag-ranking">
                <h1>人気のタグ</h1>
                @if (count($tag_ranking) > 0)
                <div class="show-tag">
                    <ul class="list-inline">
                        @foreach ($tag_ranking as $tag)
                            <li class="list-inline-item">{!! link_to_route('tags.show', $tag->tag_name, ['id' => $tag->id]) !!}</li>    
                        @endforeach
                    </ul> 
                </div>
                @endif
            </div>
        </div>
        <div class="sp-user-ranking">
            <h1>人気のユーザー</h1>
            @if (count($user_ranking) > 0)
            <ul class="list">
             
                @foreach ($user_ranking as $user)
                    <li class="user">
                        @if($user->icon_url == null)
                            <a href="{{ route('users.show', ['id' => $user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="90" height="90"></a>
                        @else
                            <a class="icon" href="{{ route('users.show', ['id' => $user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$user->icon_url}}" class="user-icon" width="90" height="90"></a>
                        @endif
                    </li>
                @endforeach
            </ul> 
            @endif
        </div>
@endsection