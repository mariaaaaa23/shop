<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // چون میخواییم دسته والد را در صفحه ایندکس نمایش بدیم parent دسته بندی والد هست
    public function parent()
    {
        
        // هر دسته‌بندی (Category) می‌تواند یک دسته‌بندی والد داشته باشد.// ستون category_id در جدول category‌ها، آیدی والد را نگه می‌دارد.
// با استفاده از این تابع، می‌توانی از یک دسته به والدش دسترسی داشته باشی.
// «این دسته‌بندی، متعلق است به یک دسته‌ی دیگر که والد آن است.
// belongsTo  هر فرزند یک والد رابطه چند به چند
        return $this->belongsTo(Category::class,'category_id');
    }

    // برای زیر دسته
    public function children()
    {
        // hasMany یک دسته چند فرزند دارد → یک به چند
        return $this->hasMany(Category::class,'category_id');
    }
}
