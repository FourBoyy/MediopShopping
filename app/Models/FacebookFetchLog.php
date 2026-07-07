<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacebookFetchLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook_url',
        'admin_id',
        'status',
        'error_message',
        'fetched_data',
    ];

    // Tự động ép kiểu chuỗi JSON trong DB thành mảng PHP khi tương tác
    protected $casts = [
        'fetched_data' => 'array',
    ];
}