<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel</title>
</head>
<body>
    <h1>سلام {{ $user->name }}</h1> 
    <h3> خرید شما با موفقیت انجام شد </h3>
    
    @if ($order)
    <p> شماره سفارش شما {{ $order->id }} </p>
    <p>مبلغ پرداخت شده {{ $order->amount }}</p>
    @endif
    <p>ممنون که از فروشگاه ما خرید کردید </p>
</body>
</html>