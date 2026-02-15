<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

     // رابطه با محصولات
     public function products()
     {
         return $this->hasMany(Product::class); // فرض بر اینه مدل محصولات اسمش Product هست
     }



    // چون میخواییم دسته والد را در صفحه ایندکس نمایش بدیم parent دسته بندی والد هست
    public function parent()
    {
        
        // هر دسته‌بندی (Category) می‌تواند یک دسته‌بندی والد داشته باشد.// ستون category_id در جدول category‌ها، آیدی والد را نگه می‌دارد.
// با استفاده از این تابع، می‌توانی از یک دسته به والدش دسترسی داشته باشی.
// «این دسته‌بندی، متعلق است به یک دسته‌ی دیگر که والد آن است.
// belongsTo  هر فرزند یک والد رابطه چند به یک
        return $this->belongsTo(Category::class,'category_id');
    }

    // برای زیر دسته
    public function children()
    {
        // hasMany یک دسته چند فرزند دارد → یک به چند
        return $this->hasMany(Category::class,'category_id');
    }
    
    // وقتی دسته بندی اصلی داریم هر دسته بندی که باشه این تابع میاد و اگه اون دسته بندی چایلدی که داشته باشه میاد اون محصولاد همه چایلد های اون دسته بندی رو برامون برمیگردونه 
    public function getAllSubCategoryProducts()
    {
        // ایدی فرزندان کتگوری خاص رو برامون برگردون
        $childrenIds=$this->children()->pluck('id');

        // همه‌ی محصولاتی را بگیر که یا داخل زیر‌دسته‌ها هستند یا مستقیماً متعلق به خودِ این دسته‌اند

        // یعنی: «یک کوئری جدید روی مدل Product بساز»
        return Product::query()
        // محصولاتی را انتخاب کن که category_id آن‌ها داخل آرایه‌ی $childrenIds باشد (معمولاً آی‌دیِ زیر‌دسته‌ها)
        ->whereIn('category_id', $childrenIds)
        // محصولاتی که category_id  آن‌ها برابر با آیدی همین دسته فعلی است  یعنی خود دسته بندی های زنانه و مردانه و غیره
        ->orWhere('category_id', $this->id)
        // کوئری اجرا شود و نتیجه‌ها به صورت یک Collection برگردانده شود
        ->get();
    }

    // این تابع برای نمایش زیر دسته های سایدبار
    public function getHasChildrenAttribute()
    {
        return $this->children()->count()>0;
    }

    
    // رابطه دسته بندی ها با ویژگی ها چند به چند هست هر دسته بندی میتونه چند ویژگی و هر ویژگی ممکنه متعلق یه چند دسته بندی باشه
    public function propertyGroups()
    {
        return $this->belongsToMany(PropertyGroup::class);
    }

    // این تابع برای اینکه اگه از قبل برای ایجد دسته بندی جدید گروه ویژگی انتخاب کرده بودیم وقتی میخواییم ویرایش کنیم ویژگی هایی که انتخاب کردیم قبلا تیکش خورده باشه که بفهمیم کدوم ویژگی انتخاب کردیم
    public function hasPropertyGroup(PropertyGroup $propertyGroup)
    {
        // exists() چک میکنه ببینم وجود داره یانه
        // بررسی میکنه که آیا این پروپرتی یا گروه ویژگی ها وجود داره یا نه برای دسته بندی
        return $this->propertyGroups()->where('property_group_id', $propertyGroup->id)->exists();
    }
}
