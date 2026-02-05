<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
       
        
        

        // $user حالا نمونه‌ای از مدل User است و می‌توان دسترسی‌ها را بررسی کرد.
        $user=Auth::user();


         // اگر لاگین نکرده → هدایت به صفحه ثبت نام
         if (!$user) {
            return redirect()->route('client.register');
        }


        // بررسی دسترسی یا نقش ادمین
        if (!$user->can($permission) && !$user->hasRole('admin')) {
            abort(403, 'شما اجازه دسترسی ندارید');
        }
        

        

        // اگر همه بررسی‌ها موفق بود، درخواست به Controller یا ادامه مسیر ارسال می‌شود. به عبارتی: کاربر اجازه دسترسی دارد و می‌تواند صفحه را ببیند.
        return $next($request);
    }
  }