<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            "properties"=>Property::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.create',[
            // چون دسته والد برای انتخاب ویژگی نمایش دادیم که انتخاب کنیم
           'groups' =>PropertyGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        Property::query()->create([
            'property_group_id'=>$request->get('property_group_id'),
            'title'=>$request->get('title'),

        ]);

        return redirect(route('properties.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.edit',[
            // داده هاش از جدول properties میاد
            'property'=>$property,
            'groups'=>PropertyGroup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        // این همون PropertyRequest هست که قبلاً تعریف کردیم یعنی تمام داده‌های ارسالی از فرم (مثلاً title و property_group_id) توی $request موجود است.
        $property->update($request->validated());

        return redirect(route('properties.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        return redirect(route('properties.index'));
    }
}
