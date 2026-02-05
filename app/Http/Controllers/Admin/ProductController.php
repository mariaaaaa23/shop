<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateReques;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index',[
            // نمایش محصولات
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create',[
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $path = $request->file('image')->storeAs('image', $request->file('image')->getClientOriginalName(), 'public');


        Product::query()->create([
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'brand_id' => $request->get('brand_id'),
            'category_id' => $request->get('category_id'),
            'cost' => $request->get('cost'),
            'description' => $request->get('description'), 
            'image' => $path,
        ]);
        
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',[
            'product'=>$product,
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateReques $request, Product $product)
    {
        // برای اینکه چک کنیم اسلاگ هنگام ویرایش یونیک میمونه یا خیر یعنی چک میکنه اگه اسلاگ با اسلاگ فیلدهای دیگه یا اسلاگ محصولات دیگه یکی بود جلوش میگیره
        $slugIsUsed=Product::query()
        ->where('slug', $request->get('slug'))
        ->where('id', '!=', $product->id)
        ->exists();

        // اگه اسلاگ تکراری بود خطا میده
        if($slugIsUsed){
            return back()->withErrors(['slug'=>'slug alrealy been token']);
        }
        


        $path=$product->image;

         // چک میکنه آیا فایلی آپلود شده یا خیر
         if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->storeAs('image', $request->file('image')->getClientOriginalName(), 'public');
         }


        $product->update([
            // get('name', $product->name), یعنی اگر کاربر نام را تغییر نداد از همون نام قبلی استفاده کنه
            'name'=>$request->get('name', $product->name),
            'slug'=>$request->get('slug', $request->slug),
            'brand_id' => $request->get('brand_id', $request->brand_id),
            'category_id' => $request->get('category_id', $request->category_id),
            'cost' => $request->get('cost', $request->cost),
            'description' => $request->get('description', $request->description), 
            'image' => $path,
        ]);
        return redirect(route('products.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'));
    }
}
