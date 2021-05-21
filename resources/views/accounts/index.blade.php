@extends("layouts.app")

@section("content")
    <h1>勘定科目一覧ページ</h1>
    
    @if(count($accounts) > 0)
    
        <table class = "table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>勘定科目</th>
                    <th>勘定科目分類</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accounts as $account)

                <tr>
                    <td>{!! link_to_route("accounts.show" , $account->id , ["account" => $account->id]) !!}</td>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->account_class->class }}</td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    @endif
   
    
    
    {{ $accounts->links() }}
    {!! link_to_route("accounts.create","新規勘定科目の入力",[],["class" =>"btn btn-primary" ]) !!}
    
@endsection