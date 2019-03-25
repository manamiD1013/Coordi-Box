@extends('layouts.app')

@section('content')
    <div class="user-header">
        @include('users.header', ['user' => $user])
    </div>
    <div class="user-nav bookmarks">@include('users.navbar', ['user' => $user])</div>
    <div class="index　show">
        @include('posts.posts', ['posts' => $posts])
        {{ $posts->links() }}
        <div style="
            margin: auto;
            text-align: center;
        ">
        @if (count($posts) == 0)
            <p>まだブックマークがありません。</p>
        @endif
        </div>
    </div>
    
@endsection