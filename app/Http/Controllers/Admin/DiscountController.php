<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DiscountController extends Controller
{
    public static function middleware(): array
    {
        return [
            // اعمال پرمیشن‌ها به متدهای خاص
            new Middleware('permission:read-discount', only: ['index']),
            new Middleware('permission:create-discount', only: ['create', 'store']),
            new Middleware('permission:edit-discount', only: ['edit', 'update']),
            new Middleware('permission:delete-discount', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.discounts.create', [
            'product'=> $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product, DiscountRequest $request)
    {
        // اضافه کردن تخفیف
        $product->addDiscount($request);

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discount $discound)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Discount $discound)
    {
        $product->deleteDiscount();

        return redirect(route('products.index'));
    }
}
