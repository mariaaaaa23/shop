<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sliders.index',[
            // برگردوندن اسلاید ها
            'sliders'=>Slider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        // $request->file('image')->store();  برای آپلود تصویر
        // storeAs('image', $request->file('image')->getClientOriginalName())  عکس ها را به اسم اصلی نمایش میدهد و دیگر به صورت هش شده نام عکس ها را نمایش نمیدهد
        $path = $request->file('image')->storeAs('sliders', $request->file('image')->getClientOriginalName(), 'public');

        // ذخیره نام و تصویر برند در دیتابیس
        Slider::query()->create([
            'links'=>$request->get('links'),
            'image'=>$path
        ]);
        


        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', [
            'slider'=> $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'links'=>['required']
        ]);

        $path = $slider->image;

        // چک میکنه آیا فایلی آپلود شده یا خیر
        // چک میکنه آیا فایلی آپلود شده یا خیر
        if ($request->hasFile('image')) {
            $path = $request->file('image')
                ->storeAs('sliders', $request->file('image')->getClientOriginalName(), 'public');
         }

        
        // اپدیت کردن برند
        $slider->update([
            'links'=>$request->get('links'),
            'image'=>$path
        ]);
        

        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // حذف عکس مربوط به این اسلایدر
        Storage::delete($slider->image);

        // حذف اسلایدر
        $slider->delete();

        return redirect(route('sliders.index'));
    }
}
