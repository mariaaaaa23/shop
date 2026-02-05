<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    // (Product $product) ورودی از نوع محصول چون برای محصول است
    public function index(Product $product)
    {
        return view('admin.productProperty.index',[
            'product'=>$product
        ]);
    }

    public function create(Product $product)
    {
       return view('admin.productProperty.create',[
        'product'=>$product
       ]);
    }
     

    public function store(Request $request, Product $product)
    {
        // ارایه ای که از فرم فرستادیم تبدیل میکنه بخ کالکشن لاراول
        // filter(function ($item) روی تک تک آیتم های properties حلقه میزنه
        $properties = collect($request->get('properties'))->filter(function ($item) {

            // اگر ولیو یا مقدار خالی نباشه یعنی کاربر برای این محصول مقدار ویژگی وارد کرده پس این ایتم نگه میداره
            // ولی اگه ولیو یا مقدار خالی باشه چیزی  انجام نمیشه پس فیلتر filter(function ($item) اونو حذف میکنه
           if(!empty($item['value'])) {
              return $item;
           }
        //    یعمی در واقع کد های بالا از بین مشخصات ارسال شده اونایی را نگه میداره که کاربر براشون مقدار وارد کرده
        });

        
        // sync()  چون برای استور و ویرایش از همین موارد قراره استفاده کنیم قرار نیست برای هرکدام جداگانه یه صفحه دیگه اختصاص بدیم
        $product->properties()->sync($properties);


        return redirect(route('products.index'));
    }
}
