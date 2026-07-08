<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    use HasFactory;

    // Chỉ định chính xác tên bảng vì Laravel mặc định sẽ tìm số nhiều là post_media_table
    protected $table = 'post_media';

    protected $fillable = [
        'post_id',
        'r2_path',
        'file_size',
    ];

    // Mối quan hệ: Ảnh này thuộc về một Bài viết cụ thể
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}