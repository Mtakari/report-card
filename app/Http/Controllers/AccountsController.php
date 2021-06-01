<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;

use App\AccountClass;


class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year=2021 , $month=1)
    {
        if(\Auth::check()){
            
            $user = \Auth::user();
            
            $accounts = $user->accounts()->orderBy("account_class_id")->paginate(25);
            
            $account_classes = AccountClass::all();
            
            
            return view("accounts.index",[
                "accounts" => $accounts,
                'account_classes' => $account_classes,
                "year" => $year,
                "month" => $month,
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
        
        $account = new Account;
        
        $account_classes = \App\AccountClass::orderBy("number","asc")->pluck("class","id");
        
        return view("accounts.create",[
            "account" => $account,
            'account_classes' => $account_classes,
        ]);
        
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
            "name" => "required|max:255",   
        ]);
        
        $account=$user->accounts()->create([
            "name" => $request->name,
            "account_class_id" => $request->account_class_id,
        ]);
        
        
        return redirect()->route("accounts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::findOrFail($id);
        $account_classes = AccountClass::all();
        
        if(\Auth::id() === $account->user_id) {
            
            return view("accounts.show",[
                "account" => $account,    
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
        $account = Account::findOrFail($id);
        $account_classes = \App\AccountClass::orderBy("number","asc")->pluck("class","id");
        
        return view("accounts.edit",[
            "account" => $account,
            "account_classes" => $account_classes
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
            "name"=> "required|max:255",        
        ]);
        
        $account = Account::findOrFail($id);
        $account->name = $request->name;
        $account->account_class_id = $request->account_class_id;
        $account->save();
        
        $account_classes = \App\AccountClass::orderBy("number","asc")->pluck("class","id");
        //$account_classes->account_class_id = $request->account_class_id;
        
        
        return redirect()->route("accounts.index")->with(['account_classes' => $account_classes]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        
        $account->delete();
        
        return redirect()->route("accounts.index");
    }
}
