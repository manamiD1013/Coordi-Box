<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Coordi Box</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hiraku.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fakeLoader.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>

    <body>
        <div class="fakeLoader"></div>
        @include('commons.navbar')
        
        <div class="container col-lg-9 col-md-10 col-12 mx-auto clearfix">
            @include('commons.error_messages')
            @include('commons.createbutton')
            @yield('content')
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