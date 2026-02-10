<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyOtpRequest;
use App\Mail\OtpMail;
use App\Mail\WelcomeMail;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Notifications\WelcomeUser;



class RegisterController extends Controller
{
    public function create()
    {
        return view('client.register.create');
    }

    // متد sendMail در RegisterController: ایمیل رو اعتبارسنجی می‌کنه یک کد OTP می‌سازه OTP رو ذخیره می‌کنه سشن یا دیتابیس ایمیل حاوی OTP رو می‌فرسته
    public function sendMail(Request $request)
    {
        
        // چون فقط یک فیلد داریم که باید اعتبارسنجی بشه یک ریکوئست نمیسازیم همین جا اعتبارسنجی انجام میدیم
        $request->validate([
            'email'=>['required','email'],
        ]);

       
    //   متد generateOtp رو مستقیماً از کلاس User صدا می‌زنه
       $user=User::generateOtp($request);


        



        return redirect(route('client.register.otp', $user));
    }

    public function otp(User $user)
    {
        return view('client.register.otp',[
            // مقادیری که باید سمت ویو برن
            'user'=>$user,
        ]);
    }


    // (Request $request, User $user)  چون قراره کاربر کد رو که وارد کرد ثبت بشه اطلاعاتش در دیتابیس پس ورود ریکوئست و یوزر هست یوز چون برای کاربر هست 
    public function verifyOtp(VerifyOtpRequest $request, User $user)
    {
        // اگه otp درست نباشه میره به صفحه قبل و خطا میده     $user->password و بعدش مقایسه میکنه با پسورد کاربر
        if(!Hash::check($request->get('otp'), $user->password)){
            return back()->withErrors(['otp'=>'کد وارد شده صحیح نیست']);
        }

        // اما اگه درست باشه کاربر رو لاگین میکنیم
        Auth::login($user);

        // ایمیل خوش امد گویی
        if(!$user->welcome_sent){
            Mail::to($user->email)->send(new  WelcomeMail($user));
            $user->update(['welcome_sent' => true]);
        }

        // کاربر که لاگین شد وارد صفحه اصلی مشه
        return redirect(route('client.index'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('client.index'));
    }


}
