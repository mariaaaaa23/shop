<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];


    public function product()
    {
       return $this->belongsTo(Product::class);
    }
}
