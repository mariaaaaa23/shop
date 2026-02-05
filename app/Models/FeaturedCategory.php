<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedCategory extends Model
{
    // وقتی نمیخواییم پرایمری کیمون آیدی  اوتو اینکریمند باشه مقدارش فالس میدیم
    public $incrementing = false;

    // اگر فیلدی غیر از ایدی پرایمری کی باشه باید معرفیش کنیم
    protected $primaryKey = 'category_id';


    protected $fillable = ['category_id'];

    // رابطه بین محصول ویژه و دسته بندی هر محصول ویژه متعلق به یک دسته بندی هست
    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    // برای نمایش محصولات ویژه هنگام ویرایش دسته بندی ویژه اگه دسته بندی انتخاب شده باشه نمایش میده 
    public static function getCatgory()
    {
        return FeaturedCategory::with('category.children.products')->first();

    }
}
