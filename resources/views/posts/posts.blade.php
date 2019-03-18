@if (count($posts) > 0)
    <div class="row mx-auto scroll_area col-12"
  data-infinite-scroll='{
    "path": ".pagination a[rel=next]",
    "append": ".post"
  }'>
        @foreach ($posts as $post)    
            <div class="col-6 col-sm-4 col-md-3 col-lg-3 post">
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