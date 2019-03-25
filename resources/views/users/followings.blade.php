@extends('layouts.app')

@section('content')
    <div class="user-header">
        @include('users.header', ['user' => $user])
    </div>
    <div class="user-nav followings">@include('users.navbar', ['user' => $user])</div>
    <div class="follow">
        @include('users.users', ['users' => $users])
        <div style="
            margin: auto;
            text-align: center;
        ">
        @if (count($users) == 0)
            <p>まだ誰もフォローしていません。</p>
        @endif
        </div>
    </div>
@endsection