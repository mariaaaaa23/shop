<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.offers.index',[
            'offers'=>Offer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request)
    {
        // «با مقادیر معتبر فرم، یک رکورد جدید در جدول offers بساز و ذخیره کن».
        Offer::create($request->validated());

        return redirect()->route('offers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        return view('admin.offers.edit',[
            'offer'=>$offer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferUpdateRequest $request, Offer $offer)
    {
        // چک میکنه هنگام ویرایش کد تخفیف اگه با کد تخفیف های دیگه یکی بود جلوش رو میگیره
        $codeIsNotUnique=Offer::query()
        ->where('code', $request->get('code'))
        ->where('id', '!=', $offer->id)
        ->exists();

// اگه تکراری بود جد تخفیف خطا میده
        if($codeIsNotUnique){
            return redirect()->back()
            ->withErrors(['code'=>'code must be unique']);
        }


        $offer->update([
            'code'=>$request->get('code'),
            'starts_at'=>$request->get('starts_at'),
            'expires_at'=>$request->get('expires_at'),
        ]);

        return redirect()->route('offers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('offers.index');
    }
}
