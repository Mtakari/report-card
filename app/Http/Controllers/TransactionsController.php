<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;

use Storage;

use App\Account;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()) {
            
            $user = \Auth::user();
            
            $transactions = $user->transactions()->orderBy("account_id")->paginate(100);
            
            $accounts = Account::all();
            
            return view("transactions.index",[
                "transactions" => $transactions,
            ])->with(['accounts' => $accounts]); 
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = \Auth::user();
        
        $transaction = new Transaction ;
        if(\Auth::check()){
        
        $accounts=$user->accounts()->orderBy("id","asc")->pluck("name","id");
    
        
        return view("transactions.create",[
            "transaction" => $transaction,
            "accounts" => $accounts,
        ]);
        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        
        $request->validate([
            "day" =>"required",
            "amount" => "required|integer",
            "description" => "required|max:255",
            
        ]);
        
        $transaction = $user->transactions()->create([
            "day" => $request->day,
            "amount" => $request->amount,
            "description" => $request->description,
            "pdf" => $request->pdf,
            "account_id" => $request->account_id,
        ]);
        
        $pdf = $request->file('pdf');
        $path = Storage::disk('s3')->putFile('pdf', $pdf, 'public');
        $transaction->pdf = $path;
        $transaction->save();
        
        return redirect()->route("transactions.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        
        
        if(\Auth::id() ===$transaction->user_id) {
        
            
            
            return view("transactions.show",[
                "transaction" => $transaction,    
            ]);    
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::user();
        
        $transaction = Transaction::findOrFail($id);
        
        $accounts=$user->accounts()->orderBy("id","asc")->pluck("name","id");
        
        return view("transactions.edit",[
            "transaction" => $transaction,
            "accounts" => $accounts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \Auth::user();
        
        $request->validate([
            "day" => "required|max:255", 
            "amount" => "required|integer",
            "description" => "required|max:255",
        ]);
        
        $transaction = Transaction::findOrFail($id);
        
        $pdf = $request->file('pdf');

        $s3_delete = Storage::disk('s3')->delete($transaction->pdf);
        
        if($s3_delete === true ){
            $path = Storage::disk('s3')->putFile('pdf', $pdf, 'public');
            
            $transaction->pdf = $path;
            $transaction->account_id =$request->account_id;
            $transaction->day = $request->day;
            $transaction->amount = $request->amount;
            $transaction->description = $request->description;
            
            $transaction->save();   
        }else{
            echo "画像の変更ができていません" . PHP_EOL;
        }
    
        
        $accounts = $user->accounts()->orderBy("id","asc")->pluck("id","name");
        
        
        
        return redirect()->route("transactions.index")->with(['accounts' => $accounts]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        
        if($transaction->pdf != null) {
            
            Storage::disk('s3')->delete($transaction->pdf);
        }
        
            $transaction->delete();
        
            return redirect()->route("transactions.index");
    }
}
