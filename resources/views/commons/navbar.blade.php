<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">1</a>
        <a class="navbar-brand" href="/">2</a>
        <a class="navbar-brand" href="/">3</a>
        <a class="navbar-brand" href="/">4</a>
        <a class="navbar-brand" href="/">5</a>
        <a class="navbar-brand" href="/">6</a>
        <a class="navbar-brand" href="/">7</a>
        <a class="navbar-brand" href="/">8</a>
        <a class="navbar-brand" href="/">9</a>
        <a class="navbar-brand" href="/">10</a>
        <a class="navbar-brand" href="/">11</a>
        <a class="navbar-brand" href="/">12</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
        @if(Auth::check())        
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">取引一覧</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">売上高</a>
                    </li>    
                    </div>
                        {{--<li class="nav-item">{!! link_to_route('accounts.index', '勘定科目・分類一覧') !!}</li>--}}    
                        <li class="nav-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
        @else
            
                <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
        @endif
            </ul>
        </div>
    </nav>
</header>