<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPictureRequest;
use App\Models\Picture;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // چرا به‌عنوان ورودی Product $product داده‌ایم؟
// چون Picture به Product وابسته است یعنی هر Product چند تا Picture دارد
    public function index(Product $product)
    {
       return view('admin.pictures.index',[

        // متغیر $product را با نام product به ویو ارسال می‌کنیم  داخل فایل Blade می‌توانی بنویسی {{ $product->name }}
        'product'=>$product,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // (Product $product) چون می‌خواهی تصویر جدید برای همین محصول ثبت کنی
    public function create(Product $product)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // (Product $product) چون تصویر جدید باید به همین محصول ذخیره شود:
    // این متد برای ذخیره تصویر جدید استفاده می‌شود $request یک Request اختصاصی است که اعتبارسنجی (validation) آپلود تصویر را انجام می‌دهد $product محصولی است که قرار است تصویر به آن اضافه شود
    public function store(ProductPictureRequest $request , Product $product)
    {
        // روی محصول فعلی یک متد به نام addPicture صدا زده می‌شود این متد فایل تصویر را ذخیره می‌کند یک رکورد جدید در جدول pictures ایجاد می‌کند تصویر را به همین محصول وصل می‌کند
        $product->addPicture($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // (Product $product , Picture $picture) به عنوان ورودی اینارو در نظر میگیریم چون قراره تصویر یک محصولی حذف بشه یعنی از گالری های محصول
    public function destroy(Product $product , Picture $picture)
    {
        $product->deletePicture($picture);

        

       return Redirect()->back();
    }
}
