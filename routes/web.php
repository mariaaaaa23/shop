<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/',[HomeController::class,'index']);




// برای اینکه در لینک دهی مسیر کتگوری adminpanel تکرار میشود این کد بخاطر این هست هی تکرار نشود ادمین پنل در لینک دهی مسیرها
Route::prefix('/adminpanel')->group(function(){

    Route::get('/', function(){
        return View('admin.home');
    });
    
    // به جای اینکه تمام مسیر روت ها تک به تک بنویسیم با این یک کد همه مسیر روت های کتگوری خودش ایجاد میکند
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);

  
});