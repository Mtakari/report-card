@extends("layouts.app")

@section("content")

    <h1>id = {{ $account->id }}勘定科目詳細ページ</h1>
    
    <table class = "table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $account->id }}</td>
        </tr>
        <tr>
            <th>name</th>
            <td>{{ $account->name }}</td>
        </tr>
    </table>
    
    {!! link_to_route('accounts.edit', 'この勘定科目を編集', ['account' => $account->id], ['class' => 'btn btn-light']) !!}
    {!! Form::model($account, ['route' => ['accounts.destroy', $account->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}

@endsection