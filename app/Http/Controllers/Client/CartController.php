<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('client.cart.index',[
            // برای گرفتن خود محصول داخل سبد خرید
            'items'=>Cart::getItems(),
            // مبلغ کل محصولات
            'totalAmount'=>Cart::totalAmount(),
            // تعداد کل محصولات
            'totalItems'=>Cart::totalItems()
        ]);
    }

    public function store(Request $request, Product $product)
    {
       



        // برو داخل کلاس کارت و بگو این محصول با این تعداد رو به سبد خرید اضافه کن
        Cart::new($product, $request);

        // به مرور گر جواب بده که عملیات موفق بود و همه چیز درست انجام شد عدد200 یعنی همه چیز اوکیه
        return response([
            'msg'=>'successful',
            // نمایش محتوای کارت
            'cart'=>Cart::getCart()
        ], 200);
    }
    


    public function destroy(Product $product)
    {
       Cart::remove($product) ;

       return response([
        'msg' => 'removed',
        'cart' => Cart::getCart()
       ], 200);
    }
}
