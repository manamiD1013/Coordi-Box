@extends('layouts.app')

@section('content')
    <div class="user-header">
        @include('users.header', ['user' => $user])
    </div>
    <div class="user-nav followers">@include('users.navbar', ['user' => $user])</div>
    <div class="follower">
        @include('users.users', ['users' => $users])
    </div>
@endsection