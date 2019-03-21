<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Coordi Box</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ secure_asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/hiraku.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/fakeLoader.css') }}">
        <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
        <style type="text/css">

        
@media (max-width: 575.98px) {
  .upload-image{
  margin: 0 auto;
  width: 100%;
  height: auto;
  background-image: url('https://s3-ap-northeast-1.amazonaws.com/coordi-box/no_image.png');
  background-size: contain;
}

	.upload-image img{
  width: 100%;
  height: auto;
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
  width: 100%;
  height: auto;
  background-size: contain;
}
.upload-image img{
  width: 100%;
  height: auto;
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

@media (min-width: 768px) and (max-width: 991.98px) {
  .upload-image{
  width: 300px;
  height: 400px;
  background-image: url('https://s3-ap-northeast-1.amazonaws.com/coordi-box/no_image.png');
  background-size: contain;
}
	.upload-image img{
  width: 300px;
  height: 400px;
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
  width: 300px;
  height: 400px;
  background-size: contain;
}
.upload-image img{
  width: 300px;
  height: 400px;
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
  width: 300px;
  height: 400px;
  background-size: contain;
}
.upload-image img{
  width: 300px;
  height: 400px;
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
        <div>
        <h1>投稿</h1>
    </div>
    
    <div class="row">
        <div class="col-lg-9 col-sm-10 col-xs-12 mx-auto">
                <div class="form-group row">
                    {!! Form::label('image', '画像', ['class' => 'form-title col-lg-2 col-xs-12']) !!}
                    <div class="image col-lg-10 col-md-12 col-xs-12 mx-auto">
                        <div class="upload-image">
                            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/no_image.png" class="submit-image"></img>
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
                    {!! Form::label('content', 'キャプション', ['class' => 'form-title col-lg-2 col-xs-12']) !!}
                    <div class="caption-group col-lg-10 col-xs-12">
                        {!! Form::label('content', 'キャプション内容') !!}
                        {!! Form::textarea('content', null,['class' => 'form-control content']) !!}
                        {!! Form::label('tag', 'タグ ') !!}
                        {!! Form::text('tag', null,['class' => 'form-control tag']) !!}
                    </div>
                </div>
                {!! Form::button('投稿', ['class' => 'btn btn-block contribute-button col-4 mx-auto', 'id' => 'submit-button']) !!}
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
        <script src="{{ asset('js/croppie.js') }}"></script>
        <script src="{{ asset('js/jquery.bootstrap-growl.js') }}"></script>
        <script src="{{ secure_asset('js/infinite-scroll.pkgd.min.js') }}"></script>
        <script src="{{ secure_asset('js/mobile-detect.js') }}"></script>
        <script src="{{ secure_asset('js/animatedModal.js') }}"></script>
        <script src="{{ secure_asset('js/hiraku.js') }}"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script>
        <script src="{{ secure_asset('js/bootstrap.bundle.min.js') }}"></script>
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
　　$.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    });
  
　　var resize = $('#resizer').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { 
        width: 300,
        height: 400,
        
    },
    boundary: {
        width: 300,
        height: 400
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
$('#submit-button').on('click', function(){
  var content = $(".content").val();
  var image =  $(".file-upload").val();
  if(content == "" && image == "" ){
    $.bootstrapGrowl("画像とキャプションは必須項目です。", {
            type: 'danger',
            align: 'center',
            offset: {from: 'top', amount: 20},
            width: 300,
            stackup_spacing: 50
          });  
  }else if (image == ""){
    $.bootstrapGrowl("画像を選択してください", {
            type: 'danger',
            align: 'center',
            offset: {from: 'top', amount: 20},
            width: 300,
            stackup_spacing: 50
          });  
  }
});

$('#crop-button').on('click', function (ev) {
    $("#myModal").modal("hide");
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport',
    quality: 1,
  }).then(function (img) {
      html = '<img src="' + img + '" />';
      console.log(html);
     $(".upload-image").html(html);
     $('#submit-button').on('click', function(){
       var content = $(".content").val();
       var tag = $(".tag").val();
        if(content == ""){
          console.log("!");
          $.bootstrapGrowl("キャプションを入力してください", {
            type: 'danger',
            align: 'center',
            offset: {from: 'top', amount: 20},
            width: 300,
            stackup_spacing: 50
          });
        }else{
        
        $.ajax({
			  url: "{{ route('posts.store') }}",
			  type: "POST",
			  data: {
			    'image': img,
			    'content': content,
			    'tag': tag
			  },
			  success: function (data) {
				  window.location.href = "{{ route('posts.create') }}";
				  
			  },
			  complete: function (data) {
			    console.log(data);
              $('#submit-button').off('click');

                    
          }
        });
        }
     });
  });
});


</script>
    </body>
</html>