<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index',[
            // نمایش نقش ها
            'roles'=>Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create', [
            // برای نمایش دسترسی ها
            'permissions'=>Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        

        //ایجاد رول جدید
        // از جدول roles اول بگرد ببین رکوردی با این شرایط وجود دارد یا نه اگر وجود داشت → همان را برگردان اگر نبود → بساز
        $role = Role::firstOrCreate(
            [
                
                'name' =>$request->title,
                'guard_name' => 'web',
            ],
            [
                'title' => $request->title,
            ]
        );
        
        // از جدول permissions تمام پرمیشن‌هایی که id آن‌ها داخل آرایه ارسالی فرم هست را پیدا کن
        $permissions = Permission::whereIn('id', $request->permissions ?? [])
        // فقط ستون name را بردار نه کل آبجکت‌ها
        ->pluck('name')
        // به آرایه تبدیل میکند
        ->toArray();

        // تمام پرمیشن‌های قبلی این نقش را پاک کن و دقیقاً همین لیست جدید را جایگزین کن اگر قبلاً پرمیشنی داشته → حذف می‌شود فقط این‌ها می‌مانند
        $role->syncPermissions($permissions);


        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit',[

            'role' => $role,
            'permissions'=>Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
                
               'name' => $request->title,
               'guard_name' => 'web',
               'title' => $request->title,
       ] );

        
        // از جدول permissions تمام پرمیشن‌هایی که id آن‌ها داخل آرایه ارسالی فرم هست را پیدا کن
        $permissions = Permission::whereIn('id', $request->permissions ?? [])
        // فقط ستون name را بردار نه کل آبجکت‌ها
        ->pluck('name')
        // به آرایه تبدیل میکند
        ->toArray();

        // تمام پرمیشن‌های قبلی این نقش را پاک کن و دقیقاً همین لیست جدید را جایگزین کن اگر قبلاً پرمیشنی داشته → حذف می‌شود فقط این‌ها می‌مانند
        $role->syncPermissions($permissions);

        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // حذف دسترسی ها
        $role->permissions()->detach();

        $role->delete();

        return redirect(route('roles.index'));
    }
}
