<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand">{!! link_to_route('statements.total', "1",["month" => 1]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "2",["month" => 2]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "3",["month" => 3]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "4",["month" => 4]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "5",["month" => 5]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "6",["month" => 6]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "7",["month" => 7]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "8",["month" => 8]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "9",["month" => 9]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "10",["month" => 10]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "11",["month" => 11]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "12",["month" => 12]) !!}</a>
        <a class="navbar-brand">{!! link_to_route('statements.total', "確定申告",["month" => 13]) !!}</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
        @if(Auth::check())        
            <li class="navbar-brand">{!! link_to_route('transactions.index', "取引一覧") !!}</li>
            <li class="navbar-brand">{!! link_to_route('accounts.index', '勘定科目一覧') !!}</li>    
            <li class="navbar-brand">{!! link_to_route('logout.get', 'Logout') !!}</li>
        @else
            
                <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
        @endif
            </ul>
        
    </nav>
</header>