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
        Schema::create('facebook_fetch_logs', function (Blueprint $table) {
            $table->id();
            $table->text('facebook_url'); // Link Facebook mà Admin dán vào form
            $table->unsignedBigInteger('admin_id')->nullable(); // ID người thực hiện (nếu hệ thống có phân quyền admin)
            $table->string('status')->default('pending'); // Trạng thái: pending, processing, completed, failed
            $table->text('error_message')->nullable(); // Lưu thông tin lỗi chi tiết nếu quá trình cào/upload thất bại
            $table->json('fetched_data')->nullable(); // Lưu tạm dữ liệu thô dạng JSON trước khi bấm Confirm lưu chính thức
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facebook_fetch_logs');
    }
};
