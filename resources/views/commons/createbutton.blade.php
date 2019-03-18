@if (Auth::check())
    <a href="{{ route('posts.create') }}" id="create-button"><i class="far fa-edit color"></i></a>
@endif