<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   // 1 review thuộc về 1 user 
   public function user() {
    return $this->belongsTo(User::class, 'userId'); 
   }
 // 1 review thuộc về 1 product
 public function product() {
    return $this->belongsTo(Product::class, 'productId');
 }

 // 1 review thuộc về 1 order
 public function order() {
    return $this->belongsTo(Order::class, 'orderId'); 
 }

}
