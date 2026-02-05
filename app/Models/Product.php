<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $guarded = [];

    // لاراول به صورت پیش فرض فقط ستون جداول دیتابیس به صورت خودکار به json یا array تبدیل میکنه
    protected $appends = [
        'cost_whith_discount',
        'image_path'
    ];

    public function brand(){
        // رابطه یک به چند
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        // رابطه یک به چند
        return $this->belongsTo(Category::class);
    }

    // رابطه چند به جند بخاطر همین اسم متغییر جمع picturs()
    public function pictures()
    {
        // رابطه چند به چند
        return $this->hasMany(Picture::class);
    }

    // addPicture برای تصویر جدید 
    public function addPicture(Request $request)
    {
        // مسیر ذخیره شدن فایل تصویر
        $path = $request->file('image')->storeAs(
            'products/pictures',
            $request->file('image')->getClientOriginalName(),
            'public'
        );
        

        // $this → همین شیء فعلی (مثلاً محصول فعلی) pictures() → رابطه‌ی hasMany بین Product و Picture یعنی: «تصاویر مربوط به این محصول»
    //  create  یک رکورد جدید در جدول pictures بساز و آن را به همین محصول وصل کن
        $this->pictures()->create([
            'path'=>$path,
            // getClientMimeType نوع فایل آپلود شده
            'mime'=>$request->file('image')->getClientMimeType(),
        ]);
    }

    public function deletePicture(Picture $picture)
    {
        //برای اینکه موقع حذف عکس از پوشه عکسا هم حذف بشه اگر این کد نباشه از پوشه عکس ها حذف نمیشه و باقی میمونه    ا
    //   فساد استوریج در لاراول یعنی  فایل آپلود می‌شه ولی حذف نمی‌شه نمایش داده نمی‌شه مسیرش اشتباهه لینک بین storage و public قطع شده دسترسی (permission) به پوشه‌ها درست نیست
        Storage::disk('public')->delete($picture->path);


       $picture->delete();
    }

    public function discount()
    {
        // hasOne چون رابطه یک به یک هست یعنی یک محصول یک تخفیف داره
        return $this->hasOne(Discount::class);
    }
    // Request $request  ورودی ریکوئست چون در ریکوئست مقداد تخفیف رو مشخص کردیم
    public function addDiscount(Request $request)
    {
        
        // اگر هیچ تخفیفی برای این محصول ثبت نشده بود
        if(!$this->discount()->exists()){
            // در صورتی که وجود نداشت کیریت یا ایجاد میکنیم برای این محصولمون 
            // discount()  وقتی پرانتز داره نتیجش یم کوئری هست یعنی یک کوئری برامون برمیگردونه
            $this->discount()->create([
                'value'=> $request->get('value')
            ]);
        }
        else{
            // discount وقتی پرانتز نداره نتیجش یک رکوردیه یک رکوردی رو برمیگردونه
            $this->discount->update([
                'value' => $request->get('value')
            ]);
        }
    }

    // برای حذف تخفیف
    public function deleteDiscount()
    {
        $this->discount()->delete();
    }

    
// برای محاسبه مقدار تخفیف
    public function getCostWhithDiscountAttribute()
    {
        // اگر محصول تخفیف نداشت
        if(!$this->discount()->exists()){
            // قیمت اصلی را نمایش بده
            return $this->cost;
        }

        // محابسه قیمت تخفیف خورده
        // اگر قیمت محصولی 100باشه 25 درصد تخفیف خورده باشه 100 ضربدر 25 میشه قیمت اصلی محصول که از 100 از 25 درصد که تخفیف خورده کم میکه یعنی 100 منهای 25 در نهایت قیمت تخفیف نمایش داده میشه
        return $this->cost - $this->cost * $this->discount->value / 100;
    }

    // بررسی میکنه که ببینم این محصول تخفیف داره یانه
    public function getHasDiscountAttribute()
    {
        return $this->discount()->exists();
    }

    // برای مقدار تخفیف
    public function getDiscountValueAttribute()
    {
        // چک میکنه اگه تخفیف داشت محصول مقدارشو نمایش میده
        if($this->has_discount){
            return $this->discount->value;
        }
        // وگرنه null برمیگردونه
        return null;
    }

    // رابطه چند به چند هست چون هر محصول ممکنه چندین ویژگی و هر ویژگی میتونه متعلق به چندین محصول باشه
    public function properties()
    {
        return $this->belongsToMany(Property::class)
        // withPivot چون به جز آیدی محصولات و آیدی ویژگی ها فیلد های دیگه هم میخواییم که اضاف بشه مثل ولیو که مقدار هست
        ->withPivot(['value'])
        // برای اضافه کردن فیلدای created_at و updated_at
        ->withTimestamps();
    }

    // هر محصول چندتا کامنت داره پس یک به چند
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    // هر محصول میتونه توسط چندتا کاربر  لایک بشه پس رابطه چند به چند
    public function likes()
    {
        return $this->belongsToMany(User::class,'likes')
        ->withTimestamps();
    }

    // این تابع بررسی میکنه که محصول توسط کاربر فعای لایک شده یانه
    // این تابع یک بولیین هست چون جوابش یا اره یا نه
    public function getIsLikedAttribute()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    // فیلد مجازی نمایش عکس
    public function getImagePathAttribute()
    {
        return  asset('storage/' . $this->image);
    }
}
