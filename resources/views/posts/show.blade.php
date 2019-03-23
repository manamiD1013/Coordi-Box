<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Coordi Box</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hiraku.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fakeLoader.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <style>
        @media (max-width: 575.98px) {
            .container{
                padding-top:56px;
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            .container{
                padding-top:56px;
            }
        }

    </style>
    <body>
        <script src="{{ secure_asset('js/jquery-3.3.1.js') }}"></script>
        <script src="{{ secure_asset('js/fakeLoader.js') }}"></script>
        <script src="{{ secure_asset('js/bootstrap.bundle.min.js') }}"></script>
        <div class="fakeLoader"></div>
        <script>
            $.fakeLoader({
            timeToHide: 1200, //ローディング画面が消えるまでの時間
            zIndex: 999, //z-indexの値
            spinner: "spinner2", //ローディングアニメーションの種類。spinner1～7が指定可能
            bgColor: "#ffffff", //背景色
             });
        </script>
        
        @include('commons.navbar')
        @include('commons.createbutton')
        
        <div class="container col-lg-9 col-md-10 col-12 mx-auto clearfix">
            
        <div class="pc-show">
            <div class="main col-lg-7 col-md-7 float-left">
                <div class="show-image">
                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{ $post->image_url }}">        
                </div> 
                <div class="function-button">
                    <ul class="list-inline like-comment" style="width:auto">
                        <li class="list-inline-item like-button" style="display:flex">
                            @if (Auth::check())
                                
                                    @if(Auth::user()->is_likes($post->id))
                                        {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
                                            {{ Form::button('<i class="fas fa-heart fa-2x" style="color: #dc143c;"></i>', ['type' => 'submit' , 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                        <span style="padding-top: 4px;padding-left: 2px;">{{$post->like_user->count()}}</span>
                                    @else
                                        {!! Form::open(['route' => ['likes.like', $post->id]])!!}
                                            {{ Form::button('<i class="far fa-heart fa-2x"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                        <span style="padding-top: 4px;padding-left: 2px;">{{$post->like_user->count()}}</span>
                                    @endif
                                
                            @else 
                                {!! Form::open(['route' => ['likes.like', $post->id]])!!}
                                    {{ Form::button('<i class="far fa-heart fa-2x"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                {!! Form::close() !!}
                                <span style="padding-top: 4px;padding-left: 2px;">{{$post->like_user->count()}}</span>
                            @endif     
                        </li> 
                        <li class="comment" style="display:flex; width:auto;"><a href="#sp-comment"><i class="far fa-comment fa-2x"></i></a><span style="padding-top:5px; padding-left:5px">{{$post->comments->count()}}</span></li>
                    </ul>
                    <ul class="bookmark">
                        <li class="bookmark-button">
                            @if (Auth::check())
                                
                                    @if(Auth::user()->is_bookmarks($post->id))
                                        {!! Form::open(['route' => ['bookmarks.unbookmark', $post->id], 'method' => 'delete']) !!}
                                            {{ Form::button('<i class="fas fa-bookmark fa-2x"></i>', ['type' => 'submit' , 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['route' => ['bookmarks.bookmark', $post->id]])!!}
                                            {{ Form::button('<i class="far fa-bookmark fa-2x"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                        {!! Form::close() !!}
                                    @endif
                               
                            @else 
                                {!! Form::open(['route' => ['bookmarks.bookmark', $post->id]])!!}
                                    {{ Form::button('<i class="far fa-bookmark fa-2x"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                {!! Form::close() !!}
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="comment" id="comment">
                    <h5>この投稿へのコメント</h5>
                        <div class="comment-holder" style="overflow: scroll; ">
                            @if ($post->comments->count() > 0)
                                @include('posts.comments', ['comments' => $comments])
                        @else  
                            まだコメントがありません。
                        @endif
                        </div>
                        
                </div>
                <div class="comment-form">
                    @if(Auth::check())
                        {!! Form::open(['route' => ['comments.store', $post->id], 'onsubmit' => 'return false;']) !!}
                            <div class="icon float-left" style="margin:0;">
                                @if(Auth::user()->icon_url == null)
                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="40" height="40">
                                @else
                                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{Auth::user()->icon_url}}" class="user-icon" width="40" height="40">
                                @endif
                            </div>
                            <div class="form float-left">
                                {!! Form::text('comment', null,['class' => 'form-control']) !!}    
                            </div>
                            <div class="comment-button float-right">
                                <input type="button" value="送信" onclick="submit();" class="btn btn-block btn-primary", id="submit-button" style="width:100%;">
                            </div>
                            
                        {!! Form::close() !!}
                    @else
                        <div class="guest" style="display:flex; height:100%;margin:auto;">
                            <p style="margin:auto;">コメントをするには{!! link_to_route('signup.get', '会員登録',[],['class' => 'link']) !!}、もしくは{!! link_to_route('login', 'ログイン',[],['class' => 'link']) !!}をしてください。</p>   
                        </div>
                        
                    @endif
                </div>
                
            </div>
            
            <div class="sub col-lg-5 col-md-5 float-right">
                <div class="user">
                    <div class="icon">
                        @if($post->user->icon_url == null)
                            <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="50" height="50"></a>
                        
                        @else
                            <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$post->user->icon_url}}" class="user-icon" width="50" height="50"></a>
                        @endif   
                    </div>
                    <div class="user-name">
                        <p style="word-break: break-all;">{{ $post->user->name }}</p>
                    </div>
                    
                        @if (Auth::check())
                            @if (Auth::id() != $post->user->id)
                                <div class="follow-button float-right">
                                    @if (Auth::user()->is_following($post->user->id))
                                        {!! Form::open(['route' => ['user.unfollow', $post->user->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['route' => ['user.follow', $post->user->id]]) !!}
                                            {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            @elseif(Auth::id() == $post->user->id)
                                <li class="nav-item dropdown" style="    margin: auto;">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item">
                                            {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('削除',['class' => 'btn','style'=>'border:none;padding:0;']) !!}
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </li>    
                            @endif
                        @else
                            <div class="follow-button float-right">
                                {!! Form::open(['route' => ['user.follow', $post->user->id]]) !!}
                                    {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                {!! Form::close() !!}
                            </div>
                        @endif     
                    
                </div>
                <div class="show-content">
                    <div class="content" style="padding-bottom:5px;">
                        <p style="word-break: break-all;">{!! nl2br(e($post->content)) !!} </p>  
                    </div>
                    <div class="time" style="padding-top:5px;">
                        <p>{{ $post->created_at }}</p>
                    </div>
                </div>
                <div class="show-tag">
                    <h5>タグ</h5>
                    <ul class="list-inline">
                        @foreach ($post->tags as $tag)
                                <li class="list-inline-item">{!! link_to_route('tags.show', $tag->tag_name, ['id' => $tag->id]) !!}</li>    
                        @endforeach
                    </ul>   
                </div>
            </div>
        </div>
        
        
        <div class="sp-show row">
            <div class="user row mx-auto">
                <div class="icon">
                    @if($post->user->icon_url == null)
                        <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="50" height="50"></a>
                    
                    @else
                        <a href="{{ route('users.show', ['id' => $post->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$post->user->icon_url}}" class="user-icon" width="50" height="50"></a>
                    @endif   
                </div>
                <div class="user-name">
                    <p style="word-break: break-all;">{{ $post->user->name }}</p>
                </div>
                @if (Auth::check())
                    @if (Auth::id() != $post->user->id)
                        <div class="follow-button float-right">
                            @if (Auth::user()->is_following($post->user->id))
                                {!! Form::open(['route' => ['user.unfollow', $post->user->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('フォロー中', ['class' => "unfollow"]) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['route' => ['user.follow', $post->user->id]]) !!}
                                    {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    @elseif(Auth::id() == $post->user->id)
                        <li class="nav-item dropdown" style="    margin: auto;">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item">
                                            {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('削除',['class' => 'btn','style'=>'border:none;padding:0;']) !!}
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </li>               
                    @endif
                @else
                    <div class="follow-button float-right">
                        {!! Form::open(['route' => ['user.follow', $post->user->id]]) !!}
                            {!! Form::submit('フォロー', ['class' => "follow"]) !!}
                        {!! Form::close() !!}
                    </div>
                @endif  
            </div>
            <div class="show-image">
                    <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{ $post->image_url }}">        
            </div> 
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
                                    {{ Form::button('<i class="far fa-heart  fa-2x" style="height:28px; "></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
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
        <div class="sp-show row">
            <div class="show-content">
                    <div class="content">
                        <p style="word-break: break-all;">{!! nl2br(e($post->content)) !!} </p>  
                    </div>
                    <div class="time">
                        <p>{{ $post->created_at }}</p> 
                    </div>
                </div>
                    <div id="sp-comment" class="show-comment">
                        <a href="#modal-01" id="open-01" style="font-size:14px">この投稿へのコメントを見る</a>
                    <div id="modal-01">
                        <span class="close-modal-01 clearfix"><i class="fas fa-times fa-2x float-right"></i></span>
                        
                        <div class="comment">
                            <h5>この投稿へのコメント</h5>
                            <div class="comment-holder" style="overflow: scroll; ">
                                @if ($post->comments->count() > 0)
                                    @include('posts.comments', ['comments' => $comments])
                            @else  
                                まだコメントがありません。
                            @endif
                            </div>
                        
                        </div>
                        
                        <div class="comment-form">
                            @if(Auth::check())
                                {!! Form::open(['route' => ['comments.store', $post->id], 'onsubmit' => 'return false;']) !!}
                                    <div class="icon float-left" style="margin:0;">
                                        @if(Auth::user()->icon_url == null)
                                            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="40" height="40">
                                        @else
                                            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{Auth::user()->icon_url}}" class="user-icon" width="40" height="40">
                                        @endif
                                    </div>
                                    <div class="form float-left">
                                        {!! Form::text('comment', null,['class' => 'form-control']) !!}    
                                    </div>
                                    <div class="comment-button float-right" style="width:20%;">
                                        <input type="button" value="送信" onclick="submit();" class="btn btn-block btn-primary", id="submit-button" style="width:100%;">
                                    </div>
                                    
                                {!! Form::close() !!}
                            @else
                                <div class="guest" style="display:flex; height:100%;">
                                    <p style="margin:auto;">コメントをするには{!! link_to_route('signup.get', '会員登録',[],['class' => 'link']) !!}、もしくは{!! link_to_route('login', 'ログイン',[],['class' => 'link']) !!}をしてください。</p>   
                                </div>
                            @endif
                        </div>
                    </div>
                    </div>
                    
                    <div class="show-tag">
                    <h5>タグ</h5>
                    <ul class="list-inline">
                        @foreach ($post->tags as $tag)
                            <li class="list-inline-item">{!! link_to_route('tags.show', $tag->tag_name, ['id' => $tag->id]) !!}</li>    
                        @endforeach
                    </ul>   
                </div>
            </div>
        </div>
</div>
        
        <footer class="footer"><small>©️Coordi Box</small></footer>
    
        
        
        <script src="{{ secure_asset('js/infinite-scroll.pkgd.min.js') }}"></script>
        <script src="{{ secure_asset('js/mobile-detect.js') }}"></script>
        <script src="{{ secure_asset('js/animatedModal.js') }}"></script>
        <script src="{{ secure_asset('js/hiraku.js') }}"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script>
        <script src="{{ secure_asset('js/all.js') }}"></script>
        
        
        
        

<script type="text/javascript">
    var infScroll = new InfiniteScroll( '.scroll_area', {
        path : ".pagination a[rel=next]",
        append : ".post"
    });
    $(".offcanvas-left").hiraku({
    btn:"#offcanvas-btn-left",
    direction:"left"
　　});

    $(function(){
	$("#open-01").animatedModal({
		modalTarget:'modal-01',	// ポップアップさせるモーダルウィンドウを指定
		animatedIn: 'zoomIn',	// モーダルウィンドウが開くときの動きを設定
		animatedOut: 'zoomOut',	// モーダルウィンドウが閉じるときの動きを設定
		animationDuration: '0.3s',	// アニメーションに要する時間
		color: '#fff', 	// モーダルウィンドウの背景色
	});
	});
	$(function(){
	$("#open-02").animatedModal({
		modalTarget:'modal-02',	// ポップアップさせるモーダルウィンドウを指定
		animatedIn: 'zoomIn',	// モーダルウィンドウが開くときの動きを設定
		animatedOut: 'zoomOut',	// モーダルウィンドウが閉じるときの動きを設定
		animationDuration: '0.3s',	// アニメーションに要する時間
		color: '#fff', 	// モーダルウィンドウの背景色
	});
	});
	$(function(){
	$("#open-03").animatedModal({
		modalTarget:'modal-03',	// ポップアップさせるモーダルウィンドウを指定
		animatedIn: 'zoomIn',	// モーダルウィンドウが開くときの動きを設定
		animatedOut: 'zoomOut',	// モーダルウィンドウが閉じるときの動きを設定
		animationDuration: '0.3s',	// アニメーションに要する時間
		color: '#fff', 	// モーダルウィンドウの背景色
	});
	});
	$(function(){
	$("#open-04").animatedModal({
		modalTarget:'modal-04',	// ポップアップさせるモーダルウィンドウを指定
		animatedIn: 'zoomIn',	// モーダルウィンドウが開くときの動きを設定
		animatedOut: 'zoomOut',	// モーダルウィンドウが閉じるときの動きを設定
		animationDuration: '0.3s',	// アニメーションに要する時間
		color: '#fff', 	// モーダルウィンドウの背景色
	});
	});
    
</script>

    </body>
</html>