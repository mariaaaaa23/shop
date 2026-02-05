<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    // رابطه جدول ذخیره سفارشات
    public function details()
    {
        // یک به چند چون هر کاربر میتونه چند سفارش ثبت کنه
        return $this->hasMany(OrderDetails::class);
    }
}
