<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::create('post_media', function (Blueprint $table) {
            $table->id();
            // Khóa ngoại liên kết tới bảng posts. Khi xóa post, toàn bộ ảnh liên quan trong bảng này tự động xóa theo
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->string('r2_path'); // Đường dẫn ảnh trên Cloudflare R2 (ví dụ: news/2026/07/image.webp)
            $table->integer('file_size')->nullable(); // Dung lượng ảnh (KB) để theo dõi hiệu suất nén
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_media');
    }
};
