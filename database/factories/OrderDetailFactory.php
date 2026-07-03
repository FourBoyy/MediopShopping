<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'orderId' => Order::factory(), 
            // Lấy ngẫu nhiên một sản phẩm có sẵn trong database
            'productId' => Product::inRandomOrder()->first()?->id ?? 1, 
            'quantity' => $this->faker->numberBetween(1, 5), // Mua từ 1 đến 5 cái
            'price' => $this->faker->randomFloat(0, 50000, 2000000), // Giá ngẫu nhiên từ 50k đến 2 triệu
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}