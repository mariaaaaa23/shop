<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function propertyGroup()
    {
        // چند به یک هر ویژگی یک گروه مشخصات میتونه داشته باشه
        return $this->belongsTo(PropertyGroup::class);
    }

    // رابطه چند به چند هست چون هر محصول ممکنه چندین ویژگی و هر ویژگی میتونه متعلق به چندین محصول باشه
    public function products()
    {
        return $this->belongsToMany(Product::class)
        // withPivot چون به جز آیدی محصولات و آیدی ویژگی ها فیلد های دیگه هم میخواییم که اضاف بشه مثل ولیو که مقدار هست
        ->withPivot(['value'])
        // برای اضافه کردن فیلدای created_at و updated_at
        ->withTimestamps();
    }

    // این تابع برای اینکه وقتی برای محصولی مقداری وجود داره بیاییم و برای محصول مقداره رو نمایش بدیم
    public function getValueForProduct(Product $product)
    {
        // بررسی محصولی که انتخاب کردیم
        $productPropertyQuery=$this->products()->where('product_id', $product->id);

        // اگه ویژگی برای این محصول وجود نداشت نال برمیگردونه
        if(!$productPropertyQuery->exists()){
            return null;
        }
        // چون رابطه مقدار با محصول یک به یک هست از  pivot استفاده میکنیم
        // اگه داشت مقدار ثبت در جدول واسط value رو بر میگردونیم جدول product_property
        return $productPropertyQuery->first()->pivot->value;
    }
}
