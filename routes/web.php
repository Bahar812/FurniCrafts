<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/checkoutpayment', function () {
    return view('checkoutPayment');
});

Route::get('/checkoutshipping', function () {
    return view('checkoutShipping');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/productdetail', function () {
    return view('productDetail');
});



