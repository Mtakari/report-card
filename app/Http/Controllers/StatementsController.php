<?php

use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;

use App\AccountClass;

use App\Transaction;

class StatementsController extends Controller
{
    public function total($month=1){
        if(\Auth::check()) {
            
            $accounts = [];
            $user = \Auth::user();
        
            for($i = 1; $i<=7; $i++ ) {
                $accounts[$i] = $user->accounts()->where("account_class_id",$i)->get(); 
            }
            
            $totals = $user->transactions()->select(\DB::raw("sum(amount) as total_amount,account_id"))
            ->whereMonth("day",$month)
            ->groupBy("account_id")       
            ->get();
            
            
            
            
            return view("statements.total",[
                "totals" => $totals,
                "accounts" => $accounts,
            ]);
        
        }
    }
    
   
}
