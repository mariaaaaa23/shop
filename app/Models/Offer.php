<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $guarded = [];

    protected $casts = [
        'starts_at'=>'date',
        'expires_at'=>'date'
    ];
}
