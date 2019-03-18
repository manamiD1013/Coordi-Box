@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h1>新着</h1>
    </div>
    <div class="new-post index">
        @include('posts.posts', ['posts' => $posts])
    </div>
@endsection