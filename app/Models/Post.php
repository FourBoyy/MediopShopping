<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'content',
        'thumbnail',
        'facebook_url_source',
        'status',
    ];

    // Mối quan hệ: Bài viết thuộc về một Danh mục (Nhiều-Một)
    public function category()
    {
        return $this->belongsTo(CategoryPost::class, 'category_id');
    }

    // Mối quan hệ: Một bài viết có nhiều hình ảnh đính kèm (Một-Nhiều)
    public function media()
    {
        return $this->hasMany(PostMedia::class, 'post_id');
    }
}