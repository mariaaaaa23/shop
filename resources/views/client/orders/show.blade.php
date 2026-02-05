@extends('client.layout.master')

@section('content')

  <div class="container">
    <div class="row">
        <div class="col-sm-6 m-5">
            {{-- اگه کاربر پرداخت انجام داده --}}
      @if($order->payment_status == 'ok')
    
      <p class="bg-success p-4"> پرداخت با موفقیت انجام شد</p>
    
      @else
    
      <p class="bg-danger p-4"> پرداخت ناموفق بود </p>
    
      @endif
        </div>
     </div>
  </div>

@endsection