<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;



class User extends Authenticatable
{
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];

    }

    // static → بدون ساختن شیء از User صدا زده می‌شود:
    // Request $request → ایمیل کاربر از ریکوئست خوانده می‌شود
    public static function generateOtp(Request $request)
    {
        $user=null;

         // کدی که به صورت رندوم به ایمیل کاربران ارسال میشه
        // از 11111 تا 99999 عدد کاملاً رندوم و ۵ رقمی
        $otp=random_int(11111, 99999);


        // نقش‌ها را بر اساس نام (name) جستجو می‌کند  یعنی می‌گوید: «رولی که اسمش user است را پیدا کن» فقط همان یک نقش را برمی‌گرداند، نه همه نقش‌ها
        $role = Role::where('name', 'user')->first(); 


        // ساخت کوئری کاربر با ایمیل
        $userQuery=User::query()->where('email', $request->get('email'));

        // آیا کاربری با این ایمیل در دیتابیس هست؟
        if($userQuery->exists()){
            // اگر هست
            $user=$userQuery->first();

            // اولین کاربر با این ایمیل گرفته می‌شود
            $user->update([
                // OTP جدید ساخته شده
                'password'=>Hash::make($otp)
            ]);
        }else{
            
            // ساخت یوزر با ایمیلی که اومده سمت ما
        // اگر کاربری با این ایمیل وجود نداشته باشد → ساخته می‌شود اگر وجود داشته باشد → همان کاربر قبلی برگردانده می‌شود مقادیر آرایه دوم فقط موقع ساخت ذخیره می‌شوند 
        $user = User::firstOrCreate( 

            // // شرط جستجو
            ['email'=>$request->get('email')],

            // // مقادیری که میخواییم در دیتابیس ذخیره بشه
            ['password'=>Hash::make($otp),
            'role_id' => $role->id],
        );

        }

        // اگر این کاربر نقش user ندارد نقش user به او بده  این بخش مربوط به Spatie Permission است
        if (!$user->hasRole('user')) {
            $user->assignRole('user');
        }


        
        // send otp by email to user
        //   Mail::to($user->email)  این ایمیل قراره برای یوزرمون یا کاربرانمون ارسال بشه
        // send(new OtpMail($otp)); کد ایمیل از طریق کلاس  otpmail ارسال میشه
        Mail::to($user->email)->send(new OtpMail($otp));

        // خروجی متد یوزر هست
        return $user;
    }

     // هر کاربر میتونه چندتا محصول رو لایک کنه پس رابطه چند به چند
    public function likes()
    {
        return $this->belongsToMany(Product::class,'likes')
        ->withTimestamps();
    }

    public function like(Product $product)
    {
        // چک میکنه ببینم محصول لایک شده یانه
       $isLikedBefore= $this->likes()->where('id', $product->id)->exists();

    //    اگه قبلا لایک شده بیا لایکش بردار اگه برای بار دوم کلیک کرد
        if($isLikedBefore){
         return $this->likes()->detach($product);
    }

         // لایک شدن محصول توسط کاربر
       return $this->likes()->attach($product);
    }
   
}
