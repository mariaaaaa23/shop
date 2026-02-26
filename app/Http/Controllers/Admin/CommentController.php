<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CommentController extends Controller
{
    public static function middleware():array
    {
        return[
            new Middleware('permission:read-comment', only: ['index']),
            new Middleware('permission:create-comment', only: ['create', 'store']),
            new Middleware('permission:delete-comment', only: ['destroy']),
        ];
    }

    public function index(Product $product)
    {
        return view('admin.productComments.index',[
            'product'=>$product
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
