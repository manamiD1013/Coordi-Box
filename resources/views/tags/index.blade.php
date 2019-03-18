@extends('layouts.app')

@section('content')
    <div class="text-left">
        <h1>タグ一覧</h1>
    </div>
    @if (count($tags) > 0)
    <div class="row">
        @foreach ($tags as $tag)    
            <div class="col-lg-3 col-md-4 col-6 tags">
                <p><i class="fas fa-tag fa-fw"></i></i>{!! link_to_route('tags.show', $tag->tag_name, ['id' => $tag->id]) !!}</p>
            </div>
        @endforeach
    </div>
@endif
@endsection