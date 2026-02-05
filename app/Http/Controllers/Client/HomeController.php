<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\FeaturedCategory;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home', [
                        // برای گرفتن کتگوری محصولا ویژه که در مدل featuredcategory رابطشون تعرف شده
            'featuredCategory'=>FeaturedCategory::getCatgory(),
            // گرفتن اسلایدر ها از دیتابیس و نمایش آنها
            'sliders'=>Slider::all()
        ]);
    }
}
