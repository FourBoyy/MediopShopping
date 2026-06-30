<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // 1 product thì thuộc 1 category 
    public function category() {
        return $this->belongsTo(Category::class, 'categoryid'); 
    }

    // 1 product thuộc về nhiều order_detail

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'productId'); 
    }

    // product có nhiêu đơn hàng
    public function orders(){
        return $this->belongsToMany(Order::class, 'order_details', 'productId', 'orderId'); 
    } 

    // 1 product có nhiều review 
    public function reviews() {
        return $this->hasMany(Review::class, 'productId'); 
    }
}
