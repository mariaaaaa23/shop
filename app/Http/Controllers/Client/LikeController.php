<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function index()
    {
        return view('client.likes.index',[
            // محصولاتی که کاربر لایک کرده رو برمیگردونه
            'products' => auth()->user()->likes
        ]);
    }

    public function store(Request $request, Product $product)
    {
        
        // کاربری که محصولو لایک کرده
        auth()->user()->like($product);

        return response(['likes_count'=> auth()->user()->likes()->count()], 200);
    }

    public function destroy(Product $product)
    {
        auth()->user()->likes()->detach($product->id);

        return back();
    }
}
