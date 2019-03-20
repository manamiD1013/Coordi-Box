<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Coordi Box</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hiraku.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fakeLoader.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
<style type="text/css">
 .container{
     padding:0;
 }      
@media (max-width: 575.98px) {
    .tag-header{
        padding-top: 56px;
        border-bottom: 1px solid #a9a9a9;
        margin-bottom: 20px;
    }
    .tag-header > div{
        padding:15px 15px;
        display: flex;
        height: auto;
    }
    .tag-name{
        width: 75%;
        display: flex;
    }
    .tag-name>h1{
        margin: auto 0;
        word-break: break-all; 
        font-size:14px;
    }
    .tag-count{
        width: 25%;
        text-align:right;
        padding-left:5px;
        display: flex;
    }
    .tag-count>h1{
        margin: auto; 
        font-size:12px;
    }
    .tag-count>h1>span{
        font-size:10px;
    }
}

@media (min-width: 576px) and (max-width: 767.98px) {
    .tag-header{
        padding-top: 56px;
        border-bottom: 1px solid #a9a9a9;
        margin-bottom: 20px;
    }
    .tag-header > div{
        padding:15px 15px;
        display: flex;
        height: auto;
    }
    .tag-name{
        width: 80%;
        display: flex;
    }
    .tag-name>h1{
        margin: auto 0;
        word-break: break-all; 
        font-size:14px;
    }
    .tag-count{
        width: 20%;
        text-align:right;
        padding-left:5px;
        display: flex;
    }
    .tag-count>h1{
        margin: auto; 
        font-size:12px;
    }
    .tag-count>h1>span{
        font-size:10px;
    }
}

@media (min-width: 768px) and (max-width: 991.98px) {
    .tag-header{
        padding-top: 56px;
        border-bottom: 1px solid #a9a9a9;
        margin-bottom: 20px;
    }
    .tag-header > div{
        padding:25px 15px;
        display: flex;
        height: auto;
    }
    .tag-name{
        width: 80%;
        display: flex;
    }
    .tag-name>h1{
        margin: auto 0;
        word-break: break-all;
    }
    .tag-count{
        width: 20%;
        text-align:right;
        padding-left:5px;
        /*display: flex;*/
    }
    .tag-count>h1{
        margin: auto;
        fonr-size:18px
    }
    .tag-count>h1>span{
        font-size:14px;
    }
}

@media (min-width: 992px) and (max-width: 1199.98px) {
    .tag-header{
        padding-top: 56px;
        border-bottom: 1px solid #a9a9a9;
        margin-bottom: 20px;
    }
    .tag-header > div{
        padding:25px 15px;
        display: flex;
        height: auto;
    }
    .tag-name{
        width: 80%;
        display: flex;
    }
    .tag-name>h1{
        margin: auto 0;
        word-break: break-all;
    }
    .tag-count{
        width: 20%;
        text-align:right;
        padding-left:5px;
        /*display: flex;*/
    }
    .tag-count>h1{
        margin: auto; 
        font-size:18px
    }
    .tag-count>h1>span{
        font-size:16px;
    }
}

@media (min-width: 1200px) {
    .tag-header{
        padding-top: 56px;
        border-bottom: 1px solid #a9a9a9;
        margin-bottom: 20px;
    }
    .tag-header > div{
        padding:25px 15px;
        display: flex;
        height: auto;
    }
    .tag-name{
        width: 80%;
        display: flex;
    }
    .tag-name>h1{
        margin: auto 0;
        word-break: break-all;
    }
    .tag-count{
        width: 20%;
        text-align:right;
        padding-left:5px;
        /*display: flex;*/
    }
    .tag-count>h1{
        margin: auto; 
        font-size:18px
    }
    .tag-count>h1>span{
        font-size:16px;
    }
}
        </style>
    <body>
        <div class="fakeLoader"></div>
        @include('commons.navbar')
        @include('commons.createbutton')
        <div class="tag-header">
            <div class="col-lg-9 col-md-10 col-12 mx-auto " style="
                display: flex;
                height: auto;
            ">
                <div class="tag-name">
                <h1>#{{ $tag->tag_name }}</h1>
            </div>
            <div class="tag-count">
                <h1>
                    @if($tag->posts->count() > 999)
                        1000<span>件以上</span>
                    @else
                        {{ $tag->posts->count()}}<span>件</span>
                    @endif
                </h1>
            </div>
            </div>
        </div>
        <div class="container col-lg-9 col-md-10 col-12 mx-auto clearfix">
            @include('commons.createbutton')
        <div class="index">
            @include('posts.posts', ['posts' => $posts])
        </div>
        </div>
      
        <footer class="footer"><small>©️Coordi Box</small></footer>
      
        <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="{{ asset('js/fakeLoader.js') }}"></script>
        <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
        <script src="{{ asset('js/mobile-detect.js') }}"></script>
        <script src="{{ asset('js/animatedModal.js') }}"></script>
        <script src="{{ asset('js/hiraku.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
        
        
        

<script type="text/javascript">
    
    $.fakeLoader({
      timeToHide: 1200, //ローディング画面が消えるまでの時間
      zIndex: 999, //z-indexの値
      spinner: "spinner2", //ローディングアニメーションの種類。spinner1～7が指定可能
      bgColor: "#ffffff", //背景色
    });
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