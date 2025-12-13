<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brands.index',[
            'brands'=>Brand::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        // $request->file('image')->store();  برای آپلود تصویر
        // storeAs('image', $request->file('image')->getClientOriginalName())  عکس ها را به اسم اصلی نمایش میدهد و دیگر به صورت هش شده نام عکس ها را نمایش نمیدهد
        $path=$request->file('image')->storeAs('public/image', $request->file('image')->getClientOriginalName());

        // ذخیره نام و تصویر برند در دیتابیس
        Brand::query()->create([
            'name'=>$request->get('name'),
            'image'=>$path
        ]);
        return redirect(route('brands.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return View('admin.brands.edit',[
            // نام برندها قراره ادیت کنیم و براش بفرستیم
            'brand'=>$brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        
        
        $path = $brand->image;

        // چک میکنه آیا فایلی آپلود شده یا خیر
        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->storeAs('image', $request->file('image')->getClientOriginalName(), 'public');
            
        }

        
        // اپدیت کردن برند
        $brand->update([
            'name'=>$request->get('name'),
            'image'=>str_replace('public/', '', $path)
        ]);
        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect(route('brands.index'));
    }
}
