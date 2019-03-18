@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h1>「{{ $tag->tag_name }}」のコーディネート</h1>
    </div>
    <div class="index">
        @include('posts.posts', ['posts' => $posts])
    </div>
    
@endsection