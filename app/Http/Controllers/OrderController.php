<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        return view('client.orders.create', [
            // برای گرفتن خود محصول داخل سبد خرید
            'items'=>Cart::getItems(),
            // مبلغ کل محصولات
            'totalAmount'=>Cart::totalAmount(),
            // تعداد کل محصولات
            'totalItems'=>Cart::totalItems()
        ]);
    }

    public function store(OrderRequest $request)
    {
//        یک سفارش جدید برای این کاربر بساز
        $order = Order::create([
            'user_id' => Auth::id(),
            'payment_status' => 'unknown',
            ]);

//        روی همه محصولای داخل سبد خرید حلقه میزنه
            foreach (Cart::getItems() as $item) {
//                محصول واقعی رو از دیتابیس پیدا کن
                $product = Product::find($item['product_id']);

//                اگه این محصول وجود نداشت ردش کن برو بعدی
                if (!$product) continue;

//                ببین این محصول قبلا داخل همین سفارش هست
                $exist = $order->details()
                    ->where('product_id', $item['product_id'])
                    ->first();

//                اگه این این محصول قبلا داخل سفارش بوده
                if ($exist) {
//                    تعدادش رو زیاد کن
                    $exist->increment('count', $item['quantity']);
//                    وگرنه
                } else {
//                    این نحصول رو به سفارش اضاف کن
                    $order->details()->create([
                        'product_id' => $product->id,
                        'unit_amount' => $product->cost_whith_discount,
                        'count' => $item['quantity'],
                        'total_amount' => $item['quantity'] * $product->cost_whith_discount
                    ]);
                }
            }
//            سبد رو خالی کن چون همه چیز تبدیل به سفارش شد
            Cart::clear();


        // درگاه پرداخت
        // ایجاد صورت حساب
        $invoice =(new Invoice)->amount($order->amount);

        // برای اینکه پرداخت انجام بشه
        // $driver از چه درگاه پرداختی میخواییم استفاده کنیم زرین پال هست یا خیر؟
        // transactionId خود پکیج برامون تولید میکنه
        // هدایت به سمت درگاه پرداخت
        return Payment::purchase($invoice, function($driver, $transactionId)use($order){
            // آپدیت کردن سفارشات
            $order->update([
                'transaction_id' => $transactionId,
            ]);
        })->pay()->render();





        return redirect()->back();
    }

    // درسته از توع گت هست ولی میخواییم از طریق آیجکت رکوئست به دیتایی که درگاه پرداخت برای ما میفرسته دسترسی داشته باشیم
    //(Request $request) بخاطر همین ورودی ریکوئست
    public function callback(Request $request)
    {
        // سفارشی رو پیدا کن که کد تراکنشش همونی باشه که در گاه الان برگردونده
        // Authority یه کد یکتایی که درگاه وقتی کاربر میره صفحه پرداخت به سایتمون میده
       $order = Order::query()->where('transaction_id',
           $request->get('Authority'))
           ->first();


       if(!$order){
        return redirect(route('client.index'))->withErrors(['msg'=>'سفارش پیدا نشد']);
       }





    //    اگه پرداخت موفق بود ایمیل میاد پرداخت با موفقیت انجام شد
    if($request->get('Status') === 'OK'){
        $order->update([
            'payment_status' => $request->get('Status'),
        ]);

        // بعد از اینکه کاربر برای ثبت سفارش دکمه ثبت رو زد باید سبدخریدمون خالی بشه که سفارشای قبلی دیگه ثبت نشه
        // پاک کردن همه ایتم ها
        Cart::removeAll();

        // ارسال ایمیل فقط در صورتی که کاربر لاگین باشد
        if($order->user){
            $user=$order->user;
        Mail::to($user->email)->send(new PaymentSuccessMail($user, $order));
    }
}



       return redirect(route('client.orders.show', $order));
    }

    public function show(Order $order)
    {
        return view('client.orders.show', [
            'order' => $order,
        ]);
    }
}
