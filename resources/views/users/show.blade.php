@extends('layouts.app')

@section('content')
    <div class="user-header">
        @include('users.header', ['user' => $user])
    </div>
    <div class="user-nav shows">@include('users.navbar', ['user' => $user])</div>
    <div class="index">
        @include('posts.posts', ['posts' => $posts])
        {{ $posts->links() }}
        <div style="
            margin: auto;
            text-align: center;
        ">
        @if (count($posts) == 0)
            <p>まだ投稿がありません。</p>
            @if(Auth::check())
                @if(Auth::user()->id == $user->id)
                    <p>コーディネートを共有しよう</p>
                    {!! link_to_route('posts.create', '投稿', [], ['class' => 'btn contribute-button']) !!}
                @endif
            @endif
        @endif
        </div>
    </div>
@endsection