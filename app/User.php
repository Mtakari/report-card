<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    
    public function accounts() {
        return $this->hasMany(Account::class);
    }
    
    public function getSumAmountByAccountClass($account_class_number ,$year , $month) {
        $query = $this->transactions()
        ->select(\DB::raw("sum(amount) as total_amount"))
        ->join("accounts","transactions.account_id","=","accounts.id")
        ->where("account_class_id",$account_class_number)
        ->whereYear("day",$year);
        if($month != 13) {
            $query->whereMonth("day",$month); 
        }
            $sum = $query->first() ;
            //dd($sum);
            return $sum->total_amount;
            
    }
    
    public function getSumAmountByAccount($account_id , $year , $month) {
        $query = $this->transactions()
        ->select(\DB::raw("sum(amount) as total_amount"))
        ->join("accounts","transactions.account_id","=","accounts.id")
        ->where("accounts.id",$account_id)
        ->whereYear("day", $year);
        if($month != 13) {
            $query->whereMonth("day" , $month);
        }
        
            $sum = $query->first() ;
            //dd($sum);
            return $sum->total_amount;
            
    }
    
    
}
