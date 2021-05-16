@extends("layouts.app")

@section("content")

    <h1>勘定科目編集ページ</h1>
    
    <div class = "row">
        <div class = "col-6">
            {!! Form::model($account["route" =>["accounts.update",$account->id],"method" => "put"]) !!}
            
            <div class = "form-group">
                {!! Form::label("name","勘定科目:") !!}
                {!!Form::text("name",null,["class" => "form-control"]) !!}
            </div>
            
    <h1>勘定科目分類編集選択</h1> 
            <a class = "nav-link dropdown-toggle" data-toggle = "dropdown">科目分類</a>
            
                <div class = "dropdown-menu">
                    <a class = "dropdown-item">売上高</a>
                    <a class = "dropdown-item">売上原価</a>
                    <a class = "dropdown-item">販売費及び一般管理費</a>
                    <a class = "dropdown-item">営業外収益</a>
                    <a class = "dropdown-item">営業外費用</a>
                    <a class = "dropdown-item">特別利益</a>
                    <a class = "dropdown-item">特別損失</a>
                </div>
                
                {!! Frorm::submit("編集", ["class" => "btn btn-primary"]) !!} 
                {!! Form::close() !!}
        </div>
    </div>    
    
@endsection