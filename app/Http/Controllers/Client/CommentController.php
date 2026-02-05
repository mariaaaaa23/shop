<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    

    public function store(StoreCommentRequest $request, Product $product)
    {
        
        Comment::query()->create([
            'user_id'=> auth()->id(),
            'product_id' => $product->id,
            'content' => $request->get('content')
        ]);

        return redirect()->back();
    }
}
