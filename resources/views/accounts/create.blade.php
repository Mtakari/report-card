@extends("layouts.app")

@section("content")

    <h1>勘定科目新規作成ページ</h1>
    <div class ="row"> 
        <div class = "col-6">
            {!! Form::model($account,["route" => "accounts.store"]) !!}
            
            <div class = "form-group">
                
                {!! Form::label("name","科目名:") !!}
                {!! Form::text("name",null,["class"=>"form-control"]) !!}
                
            </div>
    
    <h1>勘定科目分類選択</h1>
                
        {{Form::select('account_class_id',$account_classes , null, ["class" => "form" , "id" => "account_class_id"])}}
                    
            
        {!! Form::submit("作成",["class" => "btn btn-primary"]) !!}
        
        {!! Form::close() !!}
    
        </div>
    </div>
    
@endsection