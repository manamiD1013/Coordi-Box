<header class="mb-4 header">
    <nav class="navbar navbar-expand-sm navbar-light bg-lignt col-lg-9 mx-auto"> 
    <div class="sp-menu">
        <button class="hiraku-open-btn" id="offcanvas-btn-left" data-toggle-offcanvas="#js-hiraku-offcanvas-1">
            <span class="hiraku-open-btn-line"></span>
        </button>
    </div>
        
      
        <a class="navbar-brand" href="/">Coordi Box</a>
      
        <nav class="collapse pc-nav" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->icon_url == null)
                                <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="40" height="40">{{ Auth::user()->name }}
                            @else
                                  <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{Auth::user()->icon_url}}" class="user-icon" width="40" height="40">{{ Auth::user()->name }}
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'マイページ', ['id' => Auth::user()->id]) !!}</li>
                            <li class="dropdown-item">{!! link_to_route('timeline', 'タイムライン') !!}</li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                            
                        </ul>
                    </li>
                    <li>{!! link_to_route('posts.create', '投稿', [], ['class' => 'btn contribute-button']) !!}</li>
                    
                    
                @else
                    <li>{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
 
		<div class="offcanvas-left">
          <ul class="sp-menu-item" style="margin-top: 20px">
            @if (Auth::check())
                    <li class="nav-item">
                        @if(Auth::user()->icon_url == null)
                            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/dafault_icon.png" class="user-icon" width="50" height="50">{{ Auth::user()->name }}
                        @else
                            <img src="https://s3-ap-northeast-1.amazonaws.com/coordi-box/{{Auth::user()->icon_url}}" class="user-icon" width="50" height="50">{{ Auth::user()->name }}
                        @endif   
                    </li>
                    <li class="nav-item">{!! link_to_route('users.show', 'マイページ', ['id' => Auth::user()->id], ['class' => 'nav-link'])!!}</li>
                    <li class="nav-item">{!! link_to_route('timeline', 'タイムライン', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                    <li class="dropdown-divider"></li>
                    <li class="nav-item">{!! link_to_route('posts.index', 'コーディネートを探す', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザーを探す', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('tags.index', 'タグから探す', [], ['class' => 'nav-link']) !!}</li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    <li class="dropdown-divider"></li>
                    <li class="nav-item">{!! link_to_route('posts.index', 'コーディネートを探す', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザーを探す', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('tags.index', 'タグから探す', [], ['class' => 'nav-link']) !!}</li>
                @endif
          </ul>
        </div>
</header>