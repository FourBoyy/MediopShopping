<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(10);
        return [
            // Lấy ngẫu nhiên một ID từ bảng danh mục bài viết
            'category_id' => CategoryPost::inRandomOrder()->first()?->id ?? CategoryPost::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => $this->faker->paragraph(2),
            'content' => '<p>' . implode('</p><p>', $this->faker->paragraphs(4)) . '</p>',
            'thumbnail' => 'https://picsum.photos/800/600', // Tạo link ảnh demo ngẫu nhiên công khai
            'facebook_url_source' => 'https://www.facebook.com/permalink.php?story_fbid=' . $this->faker->randomNumber(8),
            'status' => $this->faker->randomElement(['draft', 'published']),
        ];
    }
}