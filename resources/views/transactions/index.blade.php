@extends("layouts.app")

@section("content")
    <h1>取引一覧ページ</h1>
    
    @if(count($transactions) > 0) 
        <table class = "table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>勘定科目</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                @if($transaction->pdf)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->day }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td><img src="{{ $transaction->pdf }}"></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $transactions->links() }}
    {!! link_to_route("transactions.create","新規取引の入力",[],["class" =>"btn btn-primary" ]) !!}
    
@endsection