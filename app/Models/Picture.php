<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $guarded = [];

    // متعلق به پروداکت خاصی هم هست
    public function products()
    {
        // belongsTo چند رکورد از این جدول  متعلق به یک رکورد از جدول دیگر هستند
        return $this->belongsTo(Product::class);
    }
}
