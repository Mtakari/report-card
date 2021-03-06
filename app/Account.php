<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        "name","account_class_id"    
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function account_class() {
        return $this->belongsTo(AccountClass::class);
    }
    
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
