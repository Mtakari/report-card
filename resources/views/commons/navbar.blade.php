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
                        <a class="dropdown-item" href="#">売上原価</a>
                        <a class="dropdown-item" href="#">水道光熱費</a>
                        <a class="dropdown-item" href="#">通信費</a>
                        <a class="dropdown-item" href="#">接待交際費</a>
                        <a class="dropdown-item" href="#">地代家賃</a>
                        <a class="dropdown-item" href="#">旅費交通費</a>
                        <a class="dropdown-item" href="#">リース料</a>
                        <a class="dropdown-item" href="#">会議費</a>
                        <a class="dropdown-item" href="#">雑費</a>
                        <a class="dropdown-item" href="#">消耗品費</a>
                        <a class="dropdown-item" href="#">受取利息</a>
                        <a class="dropdown-item" href="#">受取配当金</a>
                        <a class="dropdown-item" href="#">受取地代</a>
                        <a class="dropdown-item" href="#">為替差益</a>
                        <a class="dropdown-item" href="#">雑収入</a>
                        <a class="dropdown-item" href="#">支払利息</a>
                        <a class="dropdown-item" href="#">支払手数料</a>
                        <a class="dropdown-item" href="#">手形売却損</a>
                        <a class="dropdown-item" href="#">雑損失</a>
                        <a class="dropdown-item" href="#">保険差益</a>
                        <a class="dropdown-item" href="#">固定資産売却益</a>
                        <a class="dropdown-item" href="#">固定資産売却損</a>
                        <a class="dropdown-item" href="#">投資有価証券売却損</a>
                        <a class="dropdown-item" href="#">法人税住民税及び事業税</a>
                        <a class="dropdown-item" href="#">法人税等調整額</a>
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