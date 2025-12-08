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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // یک ستون به نام category_id در جدول ایجاد می‌کند که نوعش BIGINT unsigned است.
            // با ->constrained() لاراول به‌طور خودکار می‌فهمد این ستون باید به جدول categories وصل شود (بر اساس نام ستون یعنی category_id).
            // یعنی یک کلید خارجی ایجاد می‌کند: این کلید خارجی باعث می‌شود هر رکورد فقط زمانی معتبر باشد که category_id در جدول categories وجود داشته باشد.
            // nullable() یعنی بدون مقدار
            
            $table->foreignId('category_id')->nullable()->constrained();
            $table->string('title')->unique();
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
