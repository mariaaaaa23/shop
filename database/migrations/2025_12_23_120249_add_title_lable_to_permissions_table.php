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
        // Schema::table('permissions', ...) میگه ما می‌خوایم جدول موجود permissions رو تغییر بدیم، نه اینکه جدول جدید بسازیم.
        Schema::table('permissions', function (Blueprint $table) {

           // nullable() یعنی می‌تونه خالی باشه.
           $table->string('title')->nullable()->after('name');
           $table->string('lable')->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    // down() برای برگرداندن تغییرات migration است
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            
            $table->dropColumn(['title', 'lable']);
        });
    }
};
