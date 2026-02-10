<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\Mail;

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

    public function store(Request $request)
    {
        
        // یک سفارش جدید در جدول اوردرس ایجاد میکنه
       $order = Order::query()->create([
        // جمع کل قیمت محصولات در سبد خرید و نشون میده
            'amount' => Cart::totalAmount(),
            // ادرس رو میگیره
            'address' => $request->get('address'),
        ]);


        // این حلقه روی همه ایتم های موجود در سبد خرید میچرخه
        // ارایه ای از محصولات و تعداد اونارو برمیگردونه
        foreach(Cart::getItems() as $item){

            // از هر آیتم محصول واقعی و تعداد خریداری شده استخراج میشه
            $product = $item['product'];
            $productQty = $item['quantity'];


            // برای هر محصول یم جزئیات سفارش ساخته میشه
            $order->details()->create([
                'product_id' => $product->id,
                // قیمت واحد محصول با حساب تخفیف
                'unit_amount' => $product->cost_whith_discount,
                // تعداد محصول خریداری شده
                'count' => $productQty,
                // مجموع قیمت محصول
                'total_amount' => $productQty * $product->cost_whith_discount
            ]);
        }
        

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


        // بعد از اینکه کاربر برای ثبت سفارش دکمه ثبت رو زد باید سبدخریدمون خالی بشه که سفارشای قبلی دیگه ثبت نشه
        // پاک کردن همه ایتم ها
        Cart::removeAll();


        return redirect()->back();
    }

    // درسته از توع گت هست ولی میخواییم از طریق آیجکت رکوئست به دیتایی که درگاه پرداخت برای ما میفرسته دسترسی داشته باشیم
    //(Request $request) بخاطر همین ورودی ریکوئست
    public function callback(Request $request)
    {
        // سفارشی رو پیدا کن که کد تراکنشش همونی باشه که در گاه الان برگردونده
        // Authority یه کد یکتایی که درگاه وقتی کاربر میره صفحه پرداخت به سایتمون میده
       $order = Order::query()->where('transaction_id', $request->get('Authority'))->first();


       if(!$order){
        return redirect(route('client.index'))->withErrors(['msg'=>'سفارش پیدا نشد']);
       }


       $order->update([
        'payment_status' => $request->get('Status'),
       ]);


    //    اگه پرداخت موفق بود ایمیل میاد پرداخت با موفقیت انجام شد
    if($request->get('Status') === 'ok'){
        $user = $order->user;

        Mail::to($user->email)->send(new PaymentSuccessMail($user, $order));
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
