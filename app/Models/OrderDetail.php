<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "orders_detail";

     public function products_type()
    {
    	return $this->belongsTo(ProductType::class,'products_id','id');
    }

    public function orders()
    {
    	return $this->belongsTo(Order::class,'order_id','id');
    }
}
