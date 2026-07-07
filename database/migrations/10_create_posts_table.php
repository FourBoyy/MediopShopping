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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Khóa ngoại liên kết tới bảng danh mục ở file 09
            $table->foreignId('category_post_id')->nullable()->constrained('categories_post')->onDelete('set null');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('content'); // Nội dung bài viết (chứa text và thẻ img sử dụng link Cloudflare R2)
            $table->string('thumbnail')->nullable(); // Ảnh đại diện bài viết
            $table->string('facebook_url_source')->nullable(); // Link gốc bài viết Facebook để đối chiếu
            $table->string('status')->default('draft'); // Trạng thái: draft (nháp), published (xuất bản)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
