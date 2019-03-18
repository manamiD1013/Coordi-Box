@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h1>ランキング</h1>
    </div>
    <div class="post-ranking index">
        @include('posts.posts', ['posts' => $posts])
    </div>
    
@endsection