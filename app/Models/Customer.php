<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = "customers";

    public function orders(){
    	return $this->hasMany(Order::class,'customer_id','id');
    }
}
