<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    // Chỉ định chính xác tên bảng trong database
    protected $table = 'categories_post';

    protected $fillable = [
        'name',
        'slug',
        'keywords',
    ];

    // Ép kiểu thuộc tính keywords từ JSON sang dạng mảng (Array) khi gọi ra sử dụng
    protected $casts = [
        'keywords' => 'array',
    ];

    // Mối quan hệ: Một danh mục có nhiều bài viết (Một-Nhiều)
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}