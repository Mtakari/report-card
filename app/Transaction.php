<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "day" , "amount" , "description" , "pdf"    
    ];
        
    public function user() {
        return $this->belongsTo(User::class);    
    }  
    
    public function account() {
        return $this->belongsTo(Account::class);    
    }
}
