<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyGroupRequest;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PropertyGroupController extends Controller
{
    public static function middleware(): array
    {
        return [
            // اعمال پرمیشن‌ها به متدهای خاص
            new Middleware('permission:read-PropertyGroup', only: ['index']),
            new Middleware('permission:create-PropertyGroup', only: ['create', 'store']),
            new Middleware('permission:edit-PropertyGroup', only: ['edit', 'update']),
            new Middleware('permission:delete-PropertyGroup', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.propertyGroups.index',[
            'properties' => PropertyGroup::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.propertyGroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyGroupRequest $request)
    {
        PropertyGroup::query()->create([
            'title'=>$request->get('title')
        ]);
        return redirect(route('propertyGroups.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyGroup $propertyGroup)
    {
        return view('admin.propertyGroups.edit', [
            'property'=>$propertyGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyGroupRequest $request, PropertyGroup $propertyGroup)
    {
        $propertyGroup->update([
            // $propertyGroup->title) و یا مقدار قبلی ذخیره میکنیم
            'title'=>$request->get('title', $propertyGroup->title),
        ]);
        
        return redirect(route('propertyGroups.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyGroup $propertyGroup)
    {
        //
    }
}
