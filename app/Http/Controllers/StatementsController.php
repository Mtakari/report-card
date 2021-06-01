<?php

use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;

use App\AccountClass;

use App\Transaction;

class StatementsController extends Controller
{
    public function total( $year=2021 , $month=1 ){
        
        
        if(\Auth::check()) {
            $user = \Auth::user();
            
            $account_classes = AccountClass::orderBy("number")->get();
            
            
            $sums = [];
            foreach($account_classes as $account_class)
                
                if($account_class->number == 3) {
                    $sums[$account_class->number] = $sums[1] - $sums[2] ;    
                }elseif($account_class->number == 5){
                    $sums[$account_class->number] = $sums[3] -$sums[4] ;    
                }elseif($account_class->number == 8) {
                    $sums[$account_class->number] = $sums[5] + $sums[6] - $sums[7] ;    
                }elseif($account_class->number == 11) {
                    $sums[$account_class->number] = $sums[8] + $sums[9] - $sums[10] ;    
                }elseif($account_class->number == 13) {
                    $sums[$account_class->number] = $sums[11] - $sums[12] ;
                }else{
                    $sums[$account_class->number] = $user->getSumAmountByAccountClass($account_class->number , $year , $month);
                }
                //dd($sums);    
           
            
            
            return view("statements.total",[
                "account_classes" => $account_classes,
                "month" => $month,
                "sums" => $sums,
                "year" => $year,
            ]);
        
        }
    }
    
    
    
   
}
