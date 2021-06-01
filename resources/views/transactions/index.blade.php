@extends("layouts.app")
@section("content")
    <header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <a class="navbar-brand">{!! link_to_route('statements.total', "1",["month" => 1 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "2",["month" => 2 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "3",["month" => 3 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "4",["month" => 4 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "5",["month" => 5 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "6",["month" => 6 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "7",["month" => 7 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "8",["month" => 8 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "9",["month" => 9 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "10",["month" => 10 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "11",["month" => 11 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "12",["month" => 12 , "year" => $year]) !!}</a>
                <a class="navbar-brand">{!! link_to_route('statements.total', "確定申告",["month" => 13 , "year" => $year]) !!}</a>
            
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class ="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">年度更新</a>
                            <div class="dropdown-menu">
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2017" , ["month" => $month , "year" => 2017]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2018" , ["month" => $month  ,"year" => 2018]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2019" , ["month" => $month  ,"year" => 2019]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2020" , ["month" => $month  ,"year" => 2020]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2021" , ["month" => $month  ,"year" => 2021]) !!}</a>
                            </div>
                    @if(Auth::check())
                        <li class="navbar-brand">{!! link_to_route('transactions.index', "取引一覧") !!}</li>
                        <li class="navbar-brand">{!! link_to_route('accounts.index', '勘定科目一覧') !!}</li>    
                        <li class="navbar-brand">{!! link_to_route('logout.get', 'Logout') !!}</li>
                    @else
            
                        <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                        <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                    @endif
                    </li>
                </ul>    
            </nav>
            </div>
        </header>   
    <h1>取引一覧ページ</h1>
    
    @if(count($transactions) > 0) 
        <table class = "table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>勘定科目</th>
                    <th>日付</th>
                    <th>金額</th>
                    <th>摘要</th>
                    <th>ファイル</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ link_to_route("transactions.show",$transaction->id,["transaction" => $transaction->id])  }}</td>
                    <td>{{ $transaction->account->name }}</td>
                    <td>{{ $transaction->day }}</td>
                    <td>{{ number_format($transaction->amount) }}</td>
                    <td>{{ $transaction->description }}</td>
                    @if($transaction->pdf)
                    <td><a href="{{ Storage::disk('s3')->url($transaction->pdf) }}" >ファイル</a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $transactions->links() }}
    {!! link_to_route("transactions.create","新規取引の入力",[],["class" =>"btn btn-primary" ]) !!}
    
@endsection