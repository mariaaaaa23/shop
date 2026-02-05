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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // در ساختار جدول پروداکت ابتدا باید دسته بندی داشته باشد
            $table->foreignId('category_id')->constrained();
            // برای برند محصول
            $table->foreignId('brand_id')->constrained();
            $table->string('name');
            // کاربرد slug به url مون کمک میکه که راحت تر و خوانا تر باشه به جای اینکه ما در یو آر المون آیدی فقط فراخوانی کنیم برای گرغتن یک آبجکت خاصی از اسلاگ استفاده میکنیم
        //    slug باید یونیک باشه چون فقط باید نشانگر یک محصول باشه
            $table->string('slug')->unique;
            // قیمت
            $table->integer('cost');
            $table->string('image');
            // توضیحات محصول
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
