<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // categories permission
            ['name' => 'read-category', 'title' => 'read-category', 'lable' => 'مشاهده دسته بندی'],
            ['name' => 'create-category', 'title' => 'create-category', 'lable' => 'ایجاد دسته بندی'],
            ['name' => 'update-category', 'title' => 'update-category', 'lable' => 'ویرایش دسته بندی'],
            ['name' => 'delete-category', 'title' => 'delete-category', 'lable' => 'حذف دسته بندی'],

            // brands permission
            ['name' => 'read-brand', 'title' => 'read-brand', 'lable' => 'مشاهده برند'],
            ['name' => 'create-brand', 'title' => 'create-brand', 'lable' => 'ایجاد برند'],
            ['name' => 'update-brand', 'title' => 'update-brand', 'lable' => 'ویرایش برند'],
            ['name' => 'delete-brand', 'title' => 'delete-brand', 'lable' => 'حذف برند'],

            // products permission
            ['name' => 'read-product', 'title' => 'read-product', 'lable' => 'مشاهده محصول'],
            ['name' => 'create-product', 'title' => 'create-product', 'lable' => 'ایجاد محصول'],
            ['name' => 'update-product', 'title' => 'update-product', 'lable' => 'ویرایش محصول'],
            ['name' => 'delete-product', 'title' => 'delete-product', 'lable' => 'حذف محصول'],

            // discounts permission
            ['name' => 'read-discount', 'title' => 'read-discount', 'lable' => 'مشاهده تخفیف'],
            ['name' => 'create-discount', 'title' => 'create-discount', 'lable' => 'ایجاد تخفیف'],
            ['name' => 'update-discount', 'title' => 'update-discount', 'lable' => 'ویرایش تخفیف'],
            ['name' => 'delete-discount', 'title' => 'delete-discount', 'lable' => 'حذف تخفیف'],

            // pictures permission
            ['name' => 'read-picture', 'title' => 'read-picture', 'lable' => 'مشاهده گالری'],
            ['name' => 'create-picture', 'title' => 'create-picture', 'lable' => 'ایجاد گالری'],
            ['name' => 'update-picture', 'title' => 'update-picture', 'lable' => 'ویرایش گالری'],
            ['name' => 'delete-picture', 'title' => 'delete-picture', 'lable' => 'حذف گالری'],

            // affer permission
            ['name' => 'read-affer', 'title' => 'read-affer', 'lable' => 'مشاهده کد تخفیف'],
            ['name' => 'create-affer', 'title' => 'create-affer', 'lable' => 'ایجاد کد تخفیف'],
            ['name' => 'update-affer', 'title' => 'update-affer', 'lable' => 'ویرایش کد تخفیف'],
            ['name' => 'delete-affer', 'title' => 'delete-affer', 'lable' => 'حذف کد تخفیف'],

            // roles permission
            ['name' => 'read-role', 'title' => 'read-role', 'lable' => 'مشاهده نقش'],
            ['name' => 'create-role', 'title' => 'create-role', 'lable' => 'ایجاد نقش'],
            ['name' => 'update-role', 'title' => 'update-role', 'lable' => 'ویرایش نقش'],
            ['name' => 'delete-role', 'title' => 'delete-role', 'lable' => 'حذف نقش'],

            // برای ورد به داشبورد هست مه فقط ادمین بتونه وارد شه
            ['name' => 'view-dashboard', 'title' => 'view-dashboard', 'lable' => 'مشاهده داشبورد'],
        ];
        // با این روش:ستون الزامی guard_name همیشه پر می‌شود → خطاهای MySQL برطرف می‌شوبرنداجرای چبرندباره seed بدون مشکل انجام می‌شود

        // foreach ($permissions as $permission) روی هر المان آرایه $permissions یک بار تکرار می‌کبرند.
        // هر $permission خودش یک آرایه است که شامل name, title, lable می‌باشد.
        foreach ($permissions as $permission) {

            // متد firstOrCreate می‌گوید:ابتدا بررسی کن آیا رکوردی با ستون‌های شرط اول (name) وجود دارد یا نه.
// اگر وجود داشت → همان رکورد را برگردابرند و چیزی اضافه نمی‌شود.اگر وجود برنداشت → یک رکورد جدید بساز با مقادیر ستون‌های آرایه دوم (title, lable, guard_name).
// آرایه اول ['name' => $permission['name'] شرط جستجو در دیتابیس است، یعنی رکورد باید با name مشخص شود.
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                [
                    // مقادیری که اگر رکورد جدید ساخته شود، باید این ستون‌ها با این مقدار پر شوبرند.
                    'title' => $permission['title'],
                    'lable' => $permission['lable'],
                    'guard_name' => 'web', // حتماً باید داشته باشد
                ]
            );
}
    }
}
