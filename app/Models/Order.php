<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   use HasFactory;
   protected $table = 'orders'; 

   // 1 order thuộc về 1 user
   public function user () {
    return $this->belongsTo(User::class, 'userId'); 
   }

// bảng trung gian
// 1 order có nhiều orderDetails
   public function orderDetails() {
    return $this->hasMany(OrderDetail::class, 'orderId', 'id'); 
   }
   

// nhiều order có nhiều product 
   public function products() {
   return $this->belongsToMany(Product::class, 'order_details', 'orderId', 'productId'); 
   }
// 1 order có nhiều review
public function  reviews() {
    return $this->hasMany(Review::class, 'orderId'); 
}



}
