<ul class="list-inline">
    <li class="list-inline-item show"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link"><span>投稿<br><span>{{ $user->posts->count() }}</span></span></a></li>
    <li class="list-inline-item follow pc-only"><a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}"> <span>フォロー<br><span>{{ $user->followings->count() }}</span></span></a></li>
    <li class="list-inline-item follower pc-only"><a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}"><span>フォロワー<br><span>{{ $user->followers->count() }}</span></span></a></li>
    <li class="list-inline-item bookmark"><a href="{{ route('users.bookmarks', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/bookmarks') ? 'active' : '' }}"> <span>ブックマーク<br><span>{{ $user->bookmarks->count() }}</span></span></a></li>
</ul>