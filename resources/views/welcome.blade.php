<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Coordi Box</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ secure_asset('css/fakeLoader.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/hiraku.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/main.css') }}">
        
    </head>
    <style type="text/css">
        .main-image{
  padding-top:56px;
  position: relative;
  background-color: black;
}
.main-image>img{
  height: 200px;
  width: 100%;
  object-fit: cover;
  opacity:0.8;
}
.main-image>div{
  position: absolute;
  top: calc(50% + 40px);
  left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  margin:0;/*余計な隙間を除く*/
  padding:0;/*余計な隙間を除く*/
  color: white;
  text-align:center;
  width:100%;
}
.main-image>div>ul>li>a{
  color:white;
}
        @media (max-width: 575.98px) {
            .main-image > img{
                height: 150px;
            }
            .main-image>div>h1{
                font-size:16px;
            }
            .main-image>div>ul>li>a{
                font-size:14px;
            }
        }
    </style>
    <body>
        <script src="{{ secure_asset('js/jquery-3.3.1.js') }}"></script>
        <script src="{{ secure_asset('js/ofi.js') }}"></script>
        <script src="{{ secure_asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ secure_asset('js/fakeLoader.js') }}"></script>
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
        <div class="main-image">
            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/main.png"></img>
            <div>
                <h1>お気に入りのコーディネートを共有しよう</h1>
                <ul class="list-inline">
                    <li class="list-inline-item">{!! link_to_route('signup.get', '会員登録') !!}</li>
                    <li class="list-inline-item">{!! link_to_route('login', 'ログイン') !!}</li>
                </ul>
            </div>
            
        </div>
        <div class="container col-lg-9 col-md-10 col-12 mx-auto clearfix" style="padding-top:20px">
        <div class="clearfix">
            <div class="main .col-xl-9 col-lg-8 col-md-8 col-sm-12 float-right">
            <div class="new-post index">
                <h1>新着</h1>
                @if (count($posts) > 0)
                    
                    <div class="row" style="padding-left:15px; padding-right:10px;">
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