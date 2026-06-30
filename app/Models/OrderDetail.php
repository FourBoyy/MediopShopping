<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
   protected $table = 'order_details'; 

    // ... các thuộc tính khác như $fillable ...

    // Mối quan hệ thuộc về 1 Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId', 'id');
    }

    // Mối quan hệ thuộc về 1 Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }
}
