<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_class extends Model
{
    protected $fillable = [
        "class" , "number",    
    ];
    
    public function accounts() {
        return $this->hasMany(Account::class);
    }
        
}
