<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeacturedCategoryRequest;
use App\Models\Category;
use App\Models\FeaturedCategory;
use Illuminate\Http\Request;

class FeaturedCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        // دسته بندی های ویژه باید حتما از دسته بندی های والد باشه
        return view('admin.featuredCategory.create',[
            // برای نمایش محصولات ویژه هنگام ویرایش دسته بندی ویژه اگه دسته بندی انتخاب شده باشه نمایش میده 
            'featuredCategory'=>FeaturedCategory::query()->first(),
            // برگردوندن کتگوری های اصلی
            'categories'=>Category::query()->where('category_id', null)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeacturedCategoryRequest $request)
    {
        // قبل از اینکه کتگوری آیدیمون ایجاد بشه باید همه قبلیا رو حذف کنیم که هیچ رکورد جدایی وجود نداشته باشه
        FeaturedCategory::query()->delete();

        FeaturedCategory::query()->create([
            'category_id'=>$request->get('category_id')
        ]);

        return redirect(route('featuredCategory.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeaturedCategory $featuredCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeaturedCategory $featuredCategory)
    {
        //
    }
}
