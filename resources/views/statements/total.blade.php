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
            
            
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class ="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">年度更新</a>
                            <div class="dropdown-menu">
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2017年度" , ["month" => $month , "year" => 2017]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2018年度" , ["month" => $month  ,"year" => 2018]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2019年度" , ["month" => $month  ,"year" => 2019]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2020年度" , ["month" => $month  ,"year" => 2020]) !!}</a>
                                <a class ="dropdown-item">{!! link_to_route("statements.total" , "2021年度" , ["month" => $month  ,"year" => 2021]) !!}</a>
                            </div>
                    </li>        
                </ul>            
            
            
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
            </div>
        </header>
        
    <div class = "container"> 
<?php
    
    if($month == 13){
        $monthLabel = "確定申告";     
    }else{
        $monthLabel = $month. "月";
    }
    
    
?>
    <h1>損益計算書{{ $year."年度". $monthLabel }}</h1>
    
        @if (count($account_classes) > 0)
        @foreach($account_classes as $account_class)
            <div class ="row">
                <div class = "col-md-2 pl-2 pt-2 text-danger border-bottom">{{ $account_class->class }}</div>
                {{--<div class = "offset-md-2 col-md-1 pt-2 text-danger border-bottom ">{{ \Auth::user()->getSumAmountByAccountClass($account_class->id , $month) }}</div>--}}
                <div class = "offset-md-2 col-md-1 pt-2 text-danger border-bottom ">{{ number_format($sums[$account_class->number]) }}</div>
            </div>
             
            @foreach($account_class->accounts()->where("user_id",Auth::user()->id)->get() as $account)
                <div class = "row">
                    <div class = "col-md-2 pr-2">{{ $account->name }}</div>
                    <div class = "offset-md-2 col-md-1">{{ number_format (\Auth::user()->getSumAmountByAccount($account->id , $year , $month ))}}</div>
                    {{--<div class = "offset-md-2 col-md-1 pt-2 text-danger border-bottom ">{{ $sums[$account->id] }}</div>--}}
                </div>
        @endforeach
        
            @endforeach
            
    　　@endif
    　　
    </div>　 
@endsection


