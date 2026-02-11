<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;

class Cart 
{
    // افزودن محصول به سبد خرید
    public static function new(Product $product, Request $request)
    {

        // از درخواست مقدارquantity تعداد رو میگیره
        $quantity = (int) $request->get('quantity', 1);

        // اگه کاربر لاگین است در دیتابیس ذخیره کنه
        // یعنی کاربرانی که وارد شدن میتونن محصول رو در دیتابیس ذخیره کنن
        if(Auth::check()){
            // دنبال رکوردی میگرده که همان محصول و خمان کاربر قبلا در سبد خرید وجود داشته باشه
            $carItem = CartModel::where('user_id', Auth::id())
            ->where('product_id', $product->id)->first();

            // اگه قبلا این محصول رو داشته تو سبد خریدش فقط تعدادش اپدیت میشه
            if($carItem){
                // فقط تعدادش رو افزایش میده
                $carItem->increment('quantity', $quantity);
                // اگه محصول قبلا تو سبد خرید نبود
            }else{
                // یک رکورد جدید تو جدول کارتس ایجاد میکنه
                CartModel::create([
                    // مشخص میکنه این محصول برای چه کاربریه و تعدادش چقدره
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $quantity
                ]);

            }

            // بعد از انجام همه کارها متد تموم میشه و چیزی بر نمیگردونه
            return;

        }


        // کاربر لاگین نیست در سشن ذخیره میکنه
        // سب.د خرید فعلی کاربر از سشن میگیریم اگه هنوز سبد خرید وجود نداشت ارایه خالی میسازه
        $cart = session()->get('cart', []);

        // یعنی اگه یه محصول چند بار اضاف چای قبلیش رو آپدیت میکنه در واقع کلید محصول ایدی محصول هست
        $cart[$product->id] = [
            // اطلاعات محصول از دیتابیس
            'product'  => $product,
            // تعداد محصول
            'quantity' => (int) $request->get('quantity', 1),
        ];

        
        // بروزرسانی مجموع مبلغ و تعداد کل
    // (در صورت نیاز می‌توان اینها را جداگانه در session نگه داشت)
    //    $cart['total_amount'] = self::totalAmount();
    //    $cart['total_items'] = self::totalItems();



        // سب.د خرید نهایی رو از سشن ذخیره میکنیم و با رفرش صفحه باقی میمونه
        session()->put('cart', $cart);
    }

    
    // کل کارت رو میگیریم یعنی کل آیتم های سبد خرید
    public static function getCart(): array
    {
        // اگه کارت وجود داشت برمیگردونه اگه نبود آرایه خالی
        return session()->get('cart', []);
    }

    // مجموع مبلغ سبد خرید
    public static function totalAmount(): int
    {  
        // این متغییر برای جمع مبلغ کل محصولات تو سبد خرید
          $total = 0; 

        //   حلقه میزنه روی همه ایتم های سبد خرید
        // self::getItems() متدی که همه محصولات و تعدادشون تو سبد خرید رو برمیگردونه
        foreach (self::getItems() as $item) { 
            // از هر ایتم محصولش رو جدا میکنه
              $product = $item['product'];  
            //   و تعدادش رو میگیره اگه تعدادش تعریف نشده باشه صفر فرض میکنه
             $quantity = $item['quantity'] ?? 0;

            //  اگه محصوا وجود داشته باشه
             if ($product) {
                // قیمت هر محصول رو در تعداد ضرب میکنه
                // اگه قیمت تعریف نشده باشه صفر فرض میکنه
                   $total += ($product->cost ?? 0) * $quantity; 
            }
        }   
         return $total;
    }

    // مجموع تعداد محصولات (بر اساس quantity)
    public static function totalItems(): int
    {
         $total = 0;

         //   حلقه میزنه روی همه ایتم های سبد خرید
        // self::getItems() متدی که همه محصولات و تعدادشون تو سبد خرید رو برمیگردونه
         foreach (self::getItems() as $item) {
            // از هر ایتم  و تعدادش رو میگیره اگه تعدادش تعریف نشده باشه صفر فرض میکنه
                 $quantity = $item['quantity'] ?? 0;
                //  اگه 2تا از محصولی در سبد خرید باشه 2تای دیگه از همون محصول به سبد خرید اضاف کنیم میشه 4تا محصول
                 $total += $quantity;
         } 
           return $total;
        }
    // برای گرفتن خود محصول داخل سبد خرید
    public static function getItems()
    {
        // بررسی میکنه کاربر لاگین کرده یانه اگه لاگین کرده باشه اطلاعات سبد از دیتابیس گرفته میشه
        if (Auth::check()) {
            // همه رکورد های سبد خرید کاربر لاگین کرده رو میگیره
            $items = CartModel::with('product')
            // مطمعن میشه که اطلاعات محصول هم بارگذاری بشه
            ->where('user_id', Auth::id())->get();

            // یه ارایه خالی میسازه تا ایتم هارو داخلش بریزه
            $cart = [];  

            // روی هر رکورد سبد حلقه میزنه
         foreach ($items as $item) {
            // اگه محصول وجود داشته باشه
            if ($item->product) { 
                //  محصول و تعدادش رو داخل ارایه کارت ذخیره میکنه          
              $cart[$item->product_id] = [
                  'product' => $item->product,
                  'quantity' => $item->quantity
               ];           
            }    
      } 
              //   در نهایت سبدخرید کاربر وارد شده رو برمیگردونه
              return $cart; 
              }
        // مهمان   
         return session()->get('cart', []);
        } 


    // حذف محصول از سبد خرید
    public static function remove(Product $product)
    {
        // بررسی میکنه ایا کاربر لاگین کرده یانه
        if (Auth::check()) {
            // اگه کاربر وارد شده باشه رکورد مربوط به این محصول و کاربر رو از دیتابیس حذف میکنه
            CartModel::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->delete();
            return;
        }
        //  حذف از session برای مهمان
        $cart = session()->get('cart', []);

        // بررسی میکنه ایا محصول مورد نظر تو سبد خرید هست
        if (isset($cart[$product->id])) {
            // اگه هست حذفش میکنه
            unset($cart[$product->id]);
        }
        session()->put('cart', $cart);
    }

//   حذف همه ایتم ها 
   public static function removeAll()
   {
     session()->forget('cart');
   }
  
}
