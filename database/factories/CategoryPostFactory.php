<?php

namespace Database\Factories;

use App\Models\CategoryPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryPostFactory extends Factory
{
    protected $model = CategoryPost::class;

    public function definition(): array
    {
        // Danh sách này sẽ được dùng tuần tự hoặc ngẫu nhiên trong Seeder
        $categories = [
            ['name' => 'Tuyển sinh', 'keywords' => ['tuyển sinh', 'xét tuyển', 'học bạ', '#tuyensinh']],
            ['name' => 'Hoạt động sinh viên', 'keywords' => ['hoạt động', 'ngoại khóa', 'clb', 'tình nguyện', '#sv']],
            ['name' => 'Thông báo đào tạo', 'keywords' => ['thông báo', 'lịch thi', 'học phí', 'đăng ký tín chỉ']],
            ['name' => 'Tin tức chung', 'keywords' => ['tin tức', 'sự kiện', 'hội thảo', '#tintuc']],
        ];

        // Lấy đại một danh mục để làm mặc định nếu không truyền từ Seeder vào
        $data = $this->faker->randomElement($categories);

        return [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'keywords' => $data['keywords'],
        ];
    }
}