@extends("layouts.app")

@section("content")

    <h1>id = {{ $transaction->id }}勘定科目詳細ページ</h1>
    
    <table class = "table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $transaction->id }}</td>
        </tr>
        <tr>
            <th>name</th>
            <td>{{ $transaction->account->name }}</td>
        </tr>
        <tr>
            <th>day</th>
            <td>{{ $transaction->day }}</td>
        </tr>
        <tr>
            <th>amount</th>
            <td>{{ number_format($transaction->amount) }}</td>
        </tr>
        <tr>
            <th>description</th>
            <td>{{ $transaction->description }}</td>
        </tr>
        <tr>
            <th>pdf</th>
            <td>{{ $transaction->pdf }}</td>
        </tr>
    </table>
    
    {!! link_to_route('transactions.edit', 'この取引を編集', ['transaction' => $transaction->id], ['class' => 'btn btn-light']) !!}
    {!! Form::model($transaction, ['route' => ['transactions.destroy', $transaction->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}

@endsection