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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            // integer → نوع ستون عدد صحیح است (عدد بدون اعشار) unsigned → فقط اعداد مثبت یا صفر را می‌پذیرد value → نام ستون در جدو
            // چون unsignedInteger است: حداقل: 0 حداکثر: 4,294,967,295
        //    از این نوع فیلد معمولاً برای موارد   قیمت (بدون اعشار) و  امتیاز و تعداد  و   درصد و مقدار اعتبار یا موجودی و تعداد لایک / بازدید استفاده می‌شود

            $table->foreignId('product_id')->constrained();
            $table->unsignedInteger('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounds');
    }
};
