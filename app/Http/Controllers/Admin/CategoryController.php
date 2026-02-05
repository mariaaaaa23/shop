<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequest;
use App\Models\Category;
use App\Models\PropertyGroup;
use Carbon\Traits\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index',[

            // همه کتگوری ها رو برای متغیری به نام کتگوری ارسال میکنه
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create',[

            // چون میخواییم دسته بندی های دیگه وجود داشته باشه که به عنوان دسته بندی های والد انتخابشون کنیم
            'categories'=>Category::all(),
            // برای نمایش انتخاب ویژگی ها
            'properties'=>PropertyGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewCategoryRequest $request)
    {
       $category=Category::create([
            'title'=>$request->get('title'),
            'category_id'=>$request->get('categori_id'),
        ]);

        // هر گروه ویژگی که برای دسته بندی تیک زدیم ذخیره میکنه در دیتابیس
        $category->propertyGroups()->attach($request->get('properties'));

        

        return redirect('/adminpanel/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return View('admin.categories.edit',[
            'category'=>$category,

            // چون بقیه کتگوری ها هم قراره نمایش بدیم که به عنوان دسته والد قراره انتخاب بشه
            'categories'=>Category::all(),
            'properties'=>PropertyGroup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'category_id'=>$request->get('category_id'),
            'title'=>$request->get('title'),
        ]);

        // هر گروه ویژگی که تیک بزنیم موقع ویرایش دسته بندی اضافه میکنه و هر چی تیکش بر داریم حذف میکنه
        // sync ترکیبی از  attach و dettach
        $category->propertyGroups()->sync($request->get('properties'));

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

         // وقتی دسته بندی حذف میکنیم گروه ویژگی ها هم حذف میشوند
        //  قبل اینکه دسته بندی حذف بشه اول گروه ویژگی ها حذف میشه چون اول این دستور نوشتیم
         $category->propertyGroups()->detach();


        $category->delete();



        return redirect('/adminpanel/categories');
    }
}
