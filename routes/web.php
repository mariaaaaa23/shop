<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscoundController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPropertyController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\FeaturedCategoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Client\CartController;
// هروقت از سمت کلاینت این کلاس فراخوانی شد اسمشو به ClientProductController تغییر بده
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Http\Middleware\CheckPermission;
use App\Models\FeaturedCategory;

// name('client.') برای اینکه به صفحه ادمین نره
Route::prefix('')->name('client.')->group(function(){

    Route::get('/',[HomeController::class,'index'])->name('index');

// صفحه لیست علاقه مندی  ها
    Route::get('/likes', [LikeController::class,'index'])->name('likes.index')->middleware('auth');
    // لایک محصولات
    Route::post('/likes/{product}',[LikeController::class,'store'])->name('like');
    // مسیر لیست حذف علاقه مندی  ها
    Route::delete('/likes/{product}',[LikeController::class,'destroy'])->name('likes.destroy');




    Route::get('/products/{product}', [ClientProductController::class, 'show'])->name('products.show');

    // middleware('auth') کاربر حتما باید لاگین کرده باشه که بتونه کامنت بزاره
    Route::post('/products/{product}/comments/store',[CommentController::class,'store'])->name('products.comments.store')->middleware('auth');



    // برای لاگوت
    Route::delete('/logout',[RegisterController::class,'logout'])->name('logout');
    // name('register') یعنی: به این مسیر یک نام منطقی می‌دهیم که در کد راحت‌تر قابل ارجاع باشد، بدون اینکه به آدرس /register وابسته باشیم.
//    نمایش فرم ثبت نام
    Route::get('/register', [RegisterController::class,'create'])->name('register');
    // کاربر ایمیلش رو توی فرم ثبت‌نام وارد می‌کنه فرم با متد POST ارسال می‌شه این route صدا زده می‌شه
    // متد پست چون قراره ذخیره بشه
    Route::post('/register/sendmail', [RegisterController::class,'sendMail'])->name('register.sendmail');
    // برای وارد کردن کد otp
    //   /register/otp/{user}     «این صفحه OTP مربوط به یک کاربر مشخص است»
    Route::get('/register/otp/{user}', [RegisterController::class,'otp'])->name('register.otp');
    // برای اینکه کاربر کد رو وارد کنه
    //  /register/verifyOtp/{user}    این صفحه برای وارد کردن کد otp مربوط به یک کار بر هست بخاطر همین از {user} استفاده میکنیم
    //   متد پست چون قراره ذخیره بشه
    Route::post('/register/verifyOtp/{user}', [RegisterController::class,'verifyOtp'])->name('register.verifyOtp');


    Route::get('/cart', [CartController::class,'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class,'store'])->name('cart.store')->middleware('auth');
    Route::delete('/cart/{product}', [CartController::class,'destroy'])->name('cart.destroy');


    Route::get('/orders/create', [OrderController::class,'create'])->name('orders.create');
    Route::post('/orders/store', [OrderController::class,'store'])->name('orders.store');
    Route::get('/orders/payment/callback', [OrderController::class,'callback'])->name('orders.callback');
    Route::get('/orders/{order}', [OrderController::class,'show'])->name('orders.show');
});







// برای اینکه در لینک دهی مسیر کتگوری adminpanel تکرار میشود این کد بخاطر این هست هی تکرار نشود ادمین پنل در لینک دهی مسیرها
Route::prefix('/adminpanel')->middleware(CheckPermission::class . ':view-dashboard')->group(function(){

    Route::get('/', function(){
        return View('admin.home');
    });
    
    // به جای اینکه تمام مسیر روت ها تک به تک بنویسیم با این یک کد همه مسیر روت های کتگوری خودش ایجاد میکند
    Route::resource('categories', CategoryController::class);


    Route::resource('brands', BrandController::class);

    Route::resource('sliders', SliderController::class);


    Route::resource('products',ProductController::class);
    // چون کنترلی هست که مربوط به گالری محصولاتکون هست بخاطر همین مسیرش products.pictures
    Route::resource('products.pictures',PictureController::class);
    Route::resource('products.discounts',DiscountController::class);
    // برای نمایش ویژگی های محصولات
    Route::get('/products/{product}/properies',[ProductPropertyController::class,'index'])->name('products.properties.index');
    Route::get('/products/{product}/properties',[ProductPropertyController::class,'create'])->name('products.properties.create');
    Route::post('/products/{product}/properties',[ProductPropertyController::class,'store'])->name('products.properties.store');


    Route::get('/products/{product}/comments',[AdminCommentController::class,'index'])->name('productComments.index');
    Route::delete('/comments/{comment}',[AdminCommentController::class,'destroy'])->name('comments.destroy');


    


    // برای ویژگی محصولات
    Route::resource('propertyGroups', PropertyGroupController::class);
    Route::resource('properties', PropertyController::class);

    Route::resource('offers', OfferController::class);
    


    Route::resource('roles',RoleController::class);

    
    Route::resource('users',UserController::class);

    Route::get('/featuredCategory',[FeaturedCategoryController::class,'create'])->name('featuredCategory.create');
    Route::post('/featuredCategory',[FeaturedCategoryController::class,'store'])->name('featuredCategory.store');

  
});