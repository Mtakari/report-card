<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()){
            
            $user = \Auth::user();
            
            $accounts = $user->accounts()->orderBy("created_at","desc")->pagenate("100");
            
            return view("accounts.index",[
                "accounts" => $accounts,    
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
        $account = new Account;
        
        return view("accounts.create",[
            "account" => $account,    
        ]);
        
        //return redirect()->route("accounts.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",   
        ]);
        
        $account->user()->accounts()->create([
            "name" => $request->name,    
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
        
        return view("accounts.edit",[
            "account" => $account,    
        ]);
        
        return redirect()->route("accounts.index");
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
        $account->save();
        
        return redirect()->route("accounts.index");
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
