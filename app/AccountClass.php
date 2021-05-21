<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountClass extends Model
{
    protected $fillable = [
        "class" , "number",    
    ];
    
    public function accounts() {
        return $this->hasMany(Account::class);
    }
    
    
        
}
