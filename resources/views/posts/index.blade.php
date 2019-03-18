@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h1>コーディネート一覧</h1>
    </div>
    <div class="index">
        @include('posts.posts', ['posts' => $posts])
        {{ $posts->links() }}
    </div>
    
@endsection