<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Coordi Box</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ secure_asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/hiraku.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/fakeLoader.css') }}">
        <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
        <style type="text/css">
       
@media (max-width: 575.98px) {
  .upload-image{
  margin: 0 auto;
  width: 180px;
  height: 180px;
}
.upload-image img{
  width: 180px;
  height: 180px;
}
.file-button{
  width: 130px;
  margin: 20px auto 0;
}
.modal-footer >.contribute-button{
  width: 80px;
  height: 40px;
  color: #fff;
  background-color: #6EB7DB;
  border: none;
  border-radius: 5px;
  margin:0;
} 

}

@media (min-width: 576px) and (max-width: 767.98px) {
  .upload-image{
  width: 200px;
  height: 200px;
}
.upload-image img{
  width: 200px;
  height: 200px;
}
.file-button{
position: relative;
top: 50%;
left: 100%;
-webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
}
.modal-footer > .contribute-button{
  width: 80px;
  height: 40px;
  color: #fff;
  background-color: #6EB7DB;
  border: none;
  border-radius: 5px;
  margin:0;
} 
}

@media (min-width: 768px) and (max-width: 991.98px) {
  .upload-image{
  width: 200px;
  height: 200px;
 
}
	.upload-image img{
  width: 200px;
  height: 200px;
}
.file-button{
position: relative;
top: 50%;
left: 100%;
-webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
}
.modal-footer >.contribute-button{
  width: 80px;
  height: 40px;
  color: #fff;
  background-color: #6EB7DB;
  border: none;
  border-radius: 5px;
  margin:0;
}
}

@media (min-width: 992px) and (max-width: 1199.98px) {

  .upload-image{
  width: 200px;
  height: 200px;
  background-size: contain;
}
.upload-image img{
  width: 200px;
  height: 200px;
}
.file-button{
position: relative;
top: 50%;
left: 100%;
-webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
}
.modal-footer >.contribute-button{
  width: 80px;
  height: 40px;
  color: #fff;
  background-color: #6EB7DB;
  border: none;
  border-radius: 5px;
  margin:0;
}
}

@media (min-width: 1200px) {
  .upload-image{
  width: 200px;
  height: 200px;
}
.upload-image img{
  width: 200px;
  height: 200px;
  border-radius: 50%;
}
.file-button{
position: relative;
top: 50%;
left: 100%;
-webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
}
.modal-footer >.contribute-button{
  width: 80px;
  height: 40px;
  color: #fff;
  background-color: #6EB7DB;
  border: none;
  border-radius: 5px;
  margin:0;
}
}
        </style>
    </head>

    <body>
        <script src="{{ secure_asset('js/jquery-3.3.1.js') }}"></script>
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
        <script src="{{ secure_asset('js/bootstrap.bundle.min.js') }}"></script>
        @include('commons.navbar')
        
        <div class="container col-10 mx-auto">
            @include('commons.error_messages')
            @include('commons.createbutton')
        <div>
        <h1>プロフィール編集</h1>
    </div>
    
    <div class="row">
        <div class="col-lg-9 col-sm-10 col-12 mx-auto">
          {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group row">
                    {!! Form::label('image', '画像', ['class' => 'form-title col-lg-2 col-xs-12']) !!}
                    <div class="image col-lg-10 col-md-12 col-xs-12 mx-auto">
                        <div class="upload-image">
                            @if($user->icon_url == null)
                                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon">
                            @else
                                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$user->icon_url}}" class="user-icon">
                            @endif
                        </div>
                        <div class="button">
                          <div class="file-button">
                            <label for="file-upload" class="select-image">
                                画像を選択
                                <input type="file" id="file-upload" class="file-upload" name="image">
                            </label>
                        </div> 
                        </div>
                        
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('uid', 'ユーザーID', ['class' => 'form-title col-lg-2 col-xs-12 uid']) !!}
                    <div class="col-lg-5 col-xs-12">
                        {!! Form::text('uid', null,['class' => 'form-control uid']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('name', 'ユーザー名', ['class' => 'form-title col-lg-2 col-xs-12 user-name']) !!}
                    <div class="col-lg-5 col-xs-12">
                        {!! Form::text('name', null,['class' => 'form-control user-name']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('introduce', '自己紹介', ['class' => 'form-title col-lg-2 col-xs-12 introduce']) !!}
                    <div class="caption-group col-lg-10 col-xs-12">
                        {!! Form::textarea('introduce', null,['class' => 'form-control introduce']) !!}
                    </div>
                </div>
                
                {!! Form::submit('保存', ['class' => 'btn btn-block contribute-button col-4 mx-auto', 'id' => 'submit-button']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <!-- モーダルの設定 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">画像の切り抜き</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="resizer"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        <button type="button" class="btn contribute-button" id="crop-button">完了</button>
      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
    <footer class="footer"><small>©️Coordi Box</small></footer>
        <script src="{{ secure_asset('js/infinite-scroll.pkgd.min.js') }}"></script>
        <script src="{{ secure_asset('js/mobile-detect.js') }}"></script>
        <script src="{{ secure_asset('js/animatedModal.js') }}"></script>
        <script src="{{ secure_asset('js/hiraku.js') }}"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script>
        <script src="{{ secure_asset('js/all.js') }}"></script>
        <script src="{{ asset('js/croppie.js') }}"></script>
        

<script type="text/javascript">
    var infScroll = new InfiniteScroll( '.scroll_area', {
        path : ".pagination a[rel=next]",
        append : ".post"
    });
    $(".offcanvas-left").hiraku({
    btn:"#offcanvas-btn-left",
    direction:"left"
　　});
　　$.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    });
  
　　var resize = $('#resizer').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { 
        width:　200,
        height: 200,
        type: 'circle',
        
    },
    boundary: {
        width: 200,
        height: 200
    }
    });
    
   $("#file-upload").on("change", function() {
  $("#myModal").modal();
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


$('#crop-button').on('click', function (ev) {
    $("#myModal").modal("hide");
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport',
    quality: 1,
  }).then(function (img) {
    console.log(img);
      html = '<img src="' + img + '" />';
      
     $(".upload-image").html(html);
     $.ajax({
			url: "{{ route('crop') }}",
			type: "POST",
			data: {"image":img},
			
			success: function (data) {
	      console.log("!");
			}
		});
     });
  });



</script>
    </body>
</html>