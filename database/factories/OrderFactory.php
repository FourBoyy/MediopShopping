<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Tạo mới một User hoặc lấy ngẫu nhiên ID của User đã có sẵn
            'userId' =>User::factory(),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'canceled']),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => now(),
        ];
    }
}