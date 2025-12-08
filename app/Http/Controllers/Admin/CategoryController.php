<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequest;
use App\Models\Category;
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewCategoryRequest $request)
    {
        Category::create([
            'title'=>$request->get('title'),
            'category_id'=>$request->get('categori_id'),
        ]);
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
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/adminpanel/categories');
    }
}
