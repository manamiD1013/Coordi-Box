@foreach ($post->comments as $comment)
    <div class="post-comment">    
        <div class="icon float-left">
            @if($comment->user->icon_url == null)
                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="40" height="40"></a>
            @else
                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$comment->user->icon_url}}" class="user-icon" width="40" height="40"></a>
            @endif
        </div>
        <div class="comment-content float-left">
            <p style="font-size:12px">{{$comment->user->name}}</p>
            <p>{!! nl2br(e($comment->comment)) !!}</p>                        
        </div>
    </div>
@endforeach@foreach ($post->comments as $comment)
    <div class="post-comment">    
        <div class="icon float-left">
            @if($comment->user->icon_url == null)
                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="40" height="40"></a>
            @else
                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}"><img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{$comment->user->icon_url}}" class="user-icon" width="40" height="40"></a>
            @endif
        </div>
        <div class="comment-content float-left">
            <p style="font-size:12px">{{$comment->user->name}}</p>
            <p>{!! nl2br(e($comment->comment)) !!}</p>                        
        </div>
    </div>
@endforeach