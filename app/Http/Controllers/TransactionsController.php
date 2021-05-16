<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;

use storage;

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
            
            $transactions = $user->transactions()->orderBy("created_at","desc")->paginate(100);
            
            return view("transactions.index",[
                "transactions" => $transactions,
                
            ]); 
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
        
        $accounts = $accounts -> name('', '');
        
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $transaction->pdf = Storage::disk('s3')->url($path);
        $transaction->save();
        
        return view("transactions.create",[
            "transaction" => $transaction,    
        ])->with(['accounts' => $accounts]);
        
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
            "amount" => "required|digits",
            "description" => "required|max:255",
            "pdf" => "image",
        ]);
        
        $transaction = $user->transactions()->create([
            "day" => $request->day,
            "amount" => $request->amount,
            "destroy" => $request->description,
            "pdf" => $request->pdf,
        ]);
        
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
        $transaction = Transaction::findOrFail($id);
        
        return view("transactions.edit",[
            "transaction" => $transaction,    
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
        $request->validate([
            "day" => "required|max:255", 
            "amount" => "required|digits",
            "description" => "required|max:255",
            "pdf" => "image",
        ]);
        
        $transaction = Transaction::findOrFail($id);
        $transaction->day = $request->day;
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->pdf = $request->pdf;
        $transaction->save();
        
        return redirect()->route("transactions.index");
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
        $transaction->delete();
        
        return redirect()->route("transactions.index");
    }
}
