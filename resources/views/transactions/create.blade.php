@extends("layouts.app")

@section("content")

    <h1>取引入力ページ</h1>
    <div class ="row"> 
        <div class = "col-6">
            <a>勘定科目選択:</a>
            {!! Form::model($transaction,["route" => "transactions.store","files" => true]) !!}
            
                {{ Form::select('account_id',$accounts,null, ["class" => "form" ,"id" => "account_id"]) }}
            
            <div class = "form-group">
                {!! Form::label("day","日付:") !!}
                {!! Form::text("day",null,["class"=>"form-control"]) !!}
            </div>
            <div class = "form-group">
                {!! Form::label("amount","金額:") !!}
                {!! Form::text("amount",null,["class"=>"form-control"]) !!}
            </div>
            <div class = "form-group">
                {!! Form::label("description","摘要:") !!}
                {!! Form::text("description",null,["class"=>"form-control"]) !!}
            </div>
            <a>画像:</a>
            
            <div>
                <input type="file" name="pdf">
                {{ csrf_field() }}
            </div>
            
    {!! Form::submit("作成",["class" => "btn btn-primary"]) !!}
            
    {!! Form::close() !!}
    
        </div>
    </div>
    
@endsection