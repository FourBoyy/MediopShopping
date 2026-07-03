<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(30),
            'price' => $this->faker->numberBetween(5, 150) * 10000, // Giá từ 50k - 1.5M
            'stock' => $this->faker->numberBetween(10, 100),
            // Lấy ngẫu nhiên id danh mục có sẵn
            'categoryId' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}