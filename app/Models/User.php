<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users'; 
    
    // 1 user thuộc về 1 role
    public function role () {
        return $this->belongsto(Role::class, 'roleId'); 
    }

    // 1 user có nhiều address

    public function address() {
        return $this->hasMany(Address::class, 'userId'); 
    }

    //1 user có nhiều order
    public function orders() {
        return $this->hasMany(Order::class, 'userId'); 
    }

    // 1 user có thể có nhiều review;
    public function reviews() {
        return $this->hasMany(Review::class, 'userId'); 
    }






    
}
