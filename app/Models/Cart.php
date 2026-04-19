<?php

namespace App\Models;

use Illuminate\Http\Request;

class Cart
{
    public static function new(Product $product, Request $request)
    {
        // ۱. گرفتن سبد فعلی یا ایجاد آرایه خالی
        // کل سبدخرید فعلی رو از حفاظه میگیره اگه سبدی نباشه یم لیست خالی ایجاد میگنه
        $cart = session()->get('cart', []);

        // ۲. گرفتن تعداد درخواستی
        // تعداد درخواستی کاربر رو از ورودی میگیره یعنی تعداد محصول اگه تعدادی نداشته باشه پیش فرض یک میده
        $quantity = (int) $request->get('quantity', 1);

        // چک میکنه ایا این محصول از قبل در سبدخرید است
        if (isset($cart[$product->id])) {
            // اگه هست فقط تعداد قبلی رو رو با تعداد جدید جمع میکنه
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // اگه نیست یک ردیف جدید شامل اطلاعات و تعداد محصول براش میسازه
            $cart[$product->id] = [
                'product_id'  => $product->id,
                'quantity' => $quantity,
            ];
        }

        // ثبت اپدیت شده رو دوباره تو سشن میزاره
        session()->put('cart', $cart);
        session()->save(); // اجبار به ذخیره برای اطمینان در درخواست‌های AJAX
    }

     // گرفتن همه ایتم های سبد خرید
      // کل کارت رو میگیریم یعنی کل آیتم های سبد خرید
    public static function getCart() {
          // کل سبدخرید فعلی رو از حفاظه میگیره اگه سبدی نباشه یم لیست خالی ایجاد میگنه
        return session()->get('cart', []);
    }

    // برای گرفتن خود محصول داخل سبد خرید
    public static function getItems()
    {
        $items = [];
        foreach (self::getCart() as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $item['quantity']
                ];
            }
        }
        return $items;
    }

    public static function totalAmount(): int {
        $total = 0;
        // روی تک تک محصولات سبدخرید حلقه میزنه
        foreach (self::getItems() as $item) {
            //قیمت محصول رو پیدا میکنه
            $cost = $item['product']->cost ?? $item['product']->cost ?? 0;
            // قیمت رو به در تعداد ضرب میکنه و به جمع کل اضافه میکنه
            $total += $cost * $item['quantity'];
        }
        return $total;
    }

    // تعداد کل کالا
    public static function totalItems(): int {
        $total = 0;
        // روی تک تک محصولات سبدخرید حلقه میزنه
        foreach (self::getItems() as $item) {
            // بررسی میکنه که چندتا کالا توی سبد خریدمون هست اگه دوتا لباس و یکی شلوارد باشه میشه3 تا کالا
            $total += $item['quantity'];
        }
        return $total;
    }

    public static function remove(Product $product)
    {
        // سبد رو از سشن میگیره
        $cart = self::getCart();
        // چک میکنه محصول توی سبد هست یانه
        if (isset($cart[$product->id])) {
            // اگه بودحذف میکنه براساس ایدی محصول
            unset($cart[$product->id]);
        }
        // لیست جدید بدون اون محصول رو دوباره تو سشن ذخیره میکنه
        session()->put('cart', $cart);
    }

    public static function removeAll()
   {
     session()->forget('cart');
   }

}
