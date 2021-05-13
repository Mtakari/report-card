<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        "name"    
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function account_class() {
        return $this->belongsTo(Account_class::class);
    }
    
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
