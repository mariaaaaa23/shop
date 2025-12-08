<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home',[

            // دسته‌های اصلی را از جدول categories پیدا می‌کند به ویوی client.home می‌فرستد در ویو شما می‌توانید به صورت:
            // همه دسته‌هایی را بیاور که ستون category_id آن‌ها null است یعنی دسته‌های اصلی (Parent categories)
           //  get() تمام نتایج را از دیتابیس بگیر و داخل $categories بریز.
           
            'categories'=>Category::query()
               ->where('category_id', null)
               ->get()
        ]);
    }
}
