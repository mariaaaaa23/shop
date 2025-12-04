<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('client.home');
});


Route::get('/adminpanel', function(){
    return View('admin.home');
});
?>
