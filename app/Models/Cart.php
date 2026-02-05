<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart 
{
    // افزودن محصول به سبد خرید
    public static function new(Product $product, Request $request)
    {
        // بررسی میکنه آیا سشن کاربر کلید کارت داره یانه یعنی 
        // وقتی می‌خوایم یک محصول جدید به سبد اضافه کنیم: بررسی می‌کنیم آیا کاربر قبلاً سبد خرید داشته یا نه.
        if(session()->has('cart')){
            // اگه وجود داشته باشه آیتم های موجود در کارت رو از متد گن ایتمس میگیره و داخل متغیر کارت میریزه
            // اگر سبد وجود دارد، محتوای فعلی سبد را داخل $cart می‌ریزیم تا بتوانیم محصول جدید را به آن اضافه کنیم.
            $cart=self::getItems();
        }


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
    $cart['total_amount'] = self::totalAmount();
    $cart['total_items'] = self::totalItems();



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
    $total = 0;
    // روی همه ایتم های سبدخرید حلقه میزنیم
    // self::getCart() سبدخرید رو از سشن میگیره و سپس هر ایتم سبد خرید داخل متغیرر $item قرار میگیرد
    foreach (self::getCart() as $item) {
        // بررسی میکنیم قیمت و تعداد محصول وجود داره یا نه اگه یکی از اینها نباشه وارد محاسبه نمیشه
        if (isset($item['product']['cost'], $item['quantity'])) {
            // قیمت محصول ضربدر تعداد آن
            $total += $item['product']['cost'] * $item['quantity'];
        }
    }
    return $total;
}

    // مجموع تعداد محصولات (بر اساس quantity)
    
    public static function totalItems(): int
    {
        // سب.د خرید فعلی کاربر از سشن میگیریم اگه هنوز سبد خرید وجود نداشت ارایه خالی میسازه
        $cart = session()->get('cart', []);
        
        $total = 0;
        // همه ایتم های فعلی سبد خرید رو از سشن میگیره روی هر ایتم میچرخه تا ملاغ کل رو حساب کنه
        foreach (self::getCart() as $cartItem) {
            // بررسی میکنه که ایتم قیمت و تعداد داشته باشه فقط در این صورت مبلغ رو حساب میکنه
            if ( is_array($cartItem) && isset($cartItem['quantity'])) {
                // قیمت ضرب در تعداد
            $total += $cartItem['quantity'];
        }
    }
        return $total;
    }
    // برای گرفتن خود محصول داخل سبد خرید
    public static function getItems()
    {
        // گرفتن همه ایتم های سبد خرید
        $cart = self::getCart();

        // فیلتر کردن آیتم ها
        // روی تمام ایتم ها حلقه میزنه و فقط اونایی رو نگه میداره که شرط داخل حلقه برقرار باشه
        return array_filter($cart, function ($item) {
            // فقط بایذ ارایه باشه نه عدد و رشته 
            return is_array($item) && 
            // ایتم باید حداقل دو کلید داشته باشه اطلاعات محصول و تعداد محصول
            isset($item['product'], $item['quantity']);
    });
        
    }

    // حذف محصول از سبد خرید
    public static function remove(Product $product)
  {
    // سب.د خرید فعلی کاربر از سشن میگیریم اگه هنوز سبد خرید وجود نداشت ارایه خالی میسازه
    $cart=session()->get('cart', []);

    
    $cart = self::getItems();

    // حذف محصول اگر وجود دارد
    if (isset($cart[$product->id])) {
        unset($cart[$product->id]);
    }

    // ذخیره مجدد در session
    session()->put('cart', $cart);


    // بروزرسانی مجموع مبلغ و تعداد کل
    // (در صورت نیاز می‌توان اینها را جداگانه در session نگه داشت)
    $cart['total_amount'] = self::totalAmount();
    $cart['total_items'] = self::totalItems();

    
  }

//   حذف همه ایتم ها 
   public static function removeAll()
   {
     session()->forget('cart');
   }
  
}
