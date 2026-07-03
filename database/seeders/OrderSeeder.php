<?php

namespace Database\Seeders;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Order::factory(50)->create()->each(function ($order) {
            // 5. Cứ với mỗi đơn hàng được sinh ra, tự động tạo từ 1 đến 3 món hàng chi tiết bên trong
            OrderDetail::factory(rand(1, 3))->create([
                'orderId' => $order->id
            ]);
        });
    }
}
