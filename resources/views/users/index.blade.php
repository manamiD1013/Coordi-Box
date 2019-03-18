@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h1>ユーザー一覧</h1>
    </div>
    @include('users.users', ['users' => $users])
@endsection