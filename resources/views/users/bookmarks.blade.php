@extends('layouts.app')

@section('content')
    <div class="user-header">
        @include('users.header', ['user' => $user])
    </div>
    <div class="user-nav bookmarks">@include('users.navbar', ['user' => $user])</div>
    <div class="index">
        @include('posts.posts', ['posts' => $posts])
        {{ $posts->links() }}
    </div>
    
@endsection