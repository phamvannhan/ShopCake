<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function order_detail(){
    	return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function customers()
    {
    	return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
