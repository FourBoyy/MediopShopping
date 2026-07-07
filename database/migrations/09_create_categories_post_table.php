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
        Schema::create('categories_post', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Tên danh mục (ví dụ: Tuyển sinh)
            $table->string('slug')->unique(); // Đường dẫn (tuyen-sinh)
            $table->text('keywords')->nullable(); // Lưu mảng JSON từ khóa nhận diện: ["tuyển sinh", "#tuyensinh"]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
