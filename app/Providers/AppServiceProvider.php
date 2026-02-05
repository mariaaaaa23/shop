<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use App\Observers\CategoryObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

      //    این متد موقع اجرای برنامه اجرا میشه برای تنظیمات کلی برنامه استفاده میشه مثل: ارسال دیتا به ویوها، تنظیم observer، view composer و …
    public function boot(): void
    {

        // View::share('categories', Category::query()->where('category_id', null) ->get());
        // View::share('brands', Brand::all());


        
   
    //    چرا View::share را استفاده نکردیم؟
    // دیتا را به همه ویوها می‌فرستد حتی ویوهای ادمین، لاگین و ما نمی‌خواستیم همه‌جا ارسال بشه، فقط ویوهای خاص  پس بهتره از View Composer استفاده کنیم
   
    // با ویوهای سمت کلاینتم این کوئری هارو شیر کن
    View()->composer(['client.*'], function($view){
            
            // این کد باعث میشه دسته‌بندی‌ها (categories) و برندها (brands)به صورت خودکار به بعضی ویوها ارسال بشن، بدون اینکه توی هر کنترلر جداگانه بنویسی.

            $view->with([

                // در جدول categories اگر category_id = null باشد یعنی دسته اصلی (Parent Category) است زیرمجموعه نیست
            'categories'=>Category::query()->where('category_id', null) ->get(),
            'brands'=>Brand::all(),
            ]);

        });

        // فراخوانی observe
        Category::observe(CategoryObserver::class);
    }
}
