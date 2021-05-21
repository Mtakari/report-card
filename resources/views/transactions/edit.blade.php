@extends("layouts.app")

@section("content")

    <h1>勘定科目編集ページ</h1>
    
    <div class = "row">
        <div class = "col-6">
            {!! Form::model($transaction,["route" =>["transactions.update",$transaction->id,],"method" => "put","files" => true]) !!}
            <a>勘定科目選択：</a>
            {{ Form::select("account_id",$accounts,null,["class" => "form","id" => "account_id"]) }}
            <div class = "form-group">
                {!! Form::label("day","日付:") !!}
                {!! Form::text("day",null,["class" => "form-control"]) !!}
            </div>
            <div class = "form-group">
                {!! Form::label("amount","金額:") !!}
                {!! Form::text("amount",null,["class" => "form-control"]) !!}
            </div>
            <div class = "form-group">
                {!! Form::label("description","摘要:") !!}
                {!! Form::text("description",null,["class" => "form-control"]) !!}
            </div>
            <a>画像:</a>
            
            <div>
                <input type="file" name="pdf">
                {{ csrf_field() }}
            </div>
                
                {!! Form::submit("編集", ["class" => "btn btn-primary"]) !!} 
                {!! Form::close() !!}
        </div>
    </div>    
    
@endsection