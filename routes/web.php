<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - ServerTrack.io Laravel Implementation
|--------------------------------------------------------------------------
*/

// Home Page - Triggers PageView
Route::get('/', function () {
    return view('index');
});
// Product Page - Add to cart & View Content
Route::get('/product', function () {
    return view('product_view');
});
// Checkout Page - Triggers InitiateCheckout
Route::get('/checkout', function () {
    return view('checkout');
});
// Success Page - Triggers Purchase
Route::get('/success', function () {
    return view('success');
});
