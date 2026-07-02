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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 40); 
            $table->string("avatar", 255)->nullable(); 
            $table->string('email', 60)->unique(); 
            $table->string('password', 80); 
            $table->string('phonenumber', 10);
            $table->rememberToken();
            $table->foreignId('roleId')->constrained('roles');  // thiết lập khóa ngoại
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
