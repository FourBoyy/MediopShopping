<?php

namespace Database\Seeders;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostProjectSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tạo dữ liệu danh mục mẫu chuẩn xác
        $categories = [
            ['name' => 'Tuyển sinh', 'keywords' => ['tuyển sinh', 'xét tuyển', 'học bạ', '#tuyensinh']],
            ['name' => 'Hoạt động sinh viên', 'keywords' => ['hoạt động', 'ngoại khóa', 'clb', 'tình nguyện', '#sv']],
            ['name' => 'Thông báo đào tạo', 'keywords' => ['thông báo', 'lịch thi', 'học phí', 'đăng ký tín chỉ']],
            ['name' => 'Tin tức chung', 'keywords' => ['tin tức', 'sự kiện', 'hội thảo', '#tintuc']],
        ];

        foreach ($categories as $cat) {
            CategoryPost::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'keywords' => $cat['keywords']
            ]);
        }

        // 2. Tạo 20 bài viết mẫu ngẫu nhiên gán vào các danh mục trên
        Post::factory()->count(20)->create();
    }
}