<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;


class CartController extends Controller
{


    public function index()
    {
        return view('client.cart.index',[
            // برای گرفتن خود محصول داخل سبد خرید
            $items = Cart::getItems(),
        // مبلغ کل محصولات
        $totalAmount = Cart::totalAmount(),
        // تعداد کل محصولات
        $totalItems = Cart::totalItems()
        ]);
    }

    public function store(CartRequest $request, Product $product)
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


//    این تابع میاد سبدخرید (items) رو میگیره میبره داخل دیتابیس ذخیره میکنه
    public function syncCartToDatabase($items)
    {
//        برای این کاربر یک سفارش پیدا کن اگه نبود بساز
        $order = Order::firstOrCreate([
            'user_id' => Auth::id(),
            'payment_status' => 'unknown',
            ]);

//        روی تک تک محصول های داخل سبدخرید حلقه بزن
        foreach ($items as $item) {
//            محصول واقعی رو از دیتابیس پیدا کن
            $product = Product::find($item['product_id']);

//            اگه این موحصول وجود نداشت بیخیالش شو و برو بعدی
            if (!$product) continue;

//            ببین این محصول قبلا داخل همین سفارش هست یا نه
            $exist = $order->details()
                ->where('product_id', $item['product_id'])
                ->first();

//            اگه قبلا این محصول داخل سفارش بوده
            if ($exist) {
//                تعدادش رو اضاف کن
                $exist->increment('count', $item['quantity']);
//                وگرنه اگه محصول داخل سبد خرید نیست
            } else {
//                این محصول رو به سفارش اضافه کن
                $order->details()->create([
//                    داخلش ایدی محصول و قیمت تکی محصول و تعداد و جمع کل قیمت ذخیره میشه
                    'product_id' => $product->id,
                    'unit_amount' => $product->cost_whith_discount,
                    'count' => $item['quantity'],
                    'total_amount' => $item['quantity'] * $product->cost_whith_discount
                ]);
            }
        }
        //  پاک کردن سبد فقط بعد از انتقال
//     سبد رو خالی کن چون چون همه چیز منتقل شد به دیتابیس
            Cart::clear();
    }
    }
