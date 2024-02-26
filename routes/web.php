<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Livewire\Products;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// routes/web.php
Route::get('/contactUs',[MailController::class,'contactUs'])->name('cotactUs');
Route::post('/contacted',[MailController::class,'contacted'])->name('contacted');


Route::group(['middleware' => ['web']], function () {
    // Your routes here

    Route::get('auth/google', [GoogleController::class,'googlePage']);
    Route::get('auth/google/callback', [GoogleController::class,'googleCallback']);
    // ... other routes ...
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/','index')->name('home');
    route::get('/redirect','redirect')->name('verified.redirect');
    route::get('/products','products');
    route::get('/product_details/{id}','product_details')->name('product_details');
    route::get('/products','productView')->name('productView');

});


Route::get('verification/{id}', [MailController::class, 'verification'])->name('verification.email');
Route::get('/verify-user/{id}',[MailController::class, 'verified']);
// Route::get('/check/{id}', [MailController::class, 'check'])->name('check');


route::get('/data',[OrderController::class,'data'])->name('data');
route::get('/second',[OrderController::class,'second'])->name('second');
route::get('/third',[OrderController::class,'third'])->name('third');




Route::controller(AdminController::class)->group(function () {
route::get('/categories','categories')->name('categories');
route::post('/add_category','add_category')->name('add_category');
Route::get('/delete_category/{id}','delete_category')->name('delete_category');
route::get('/add_product','add_product')->name('add_product');
route::post('/product_added','product_added')->name('product_added');
route::get('/show_product','show_product')->name('show_product');
route::get('/edit_product/{id}','edit_product')->name('edit_product');
route::put('/update_product/{id}','update_product')->name('update_product');
route::get('/delete_product/{id}','delete_product')->name('delete_product');
route::get('/reports','reports')->name('reports');
route::get('/report_details/{order_id}/{admin_id}','report_details')->name('report_details');
});

 Route::controller(CartController::class)->group(function () {
route::get('/add_to_cart/{id}','add_to_cart')->name('add_to_cart');
route::get('/cart/{id}','cart_show')->name('cart');
route::post('/detail_cart/{id}','detail_cart')->name('detail_cart');
route::get('/cancel_order/{row_id}','cancel_order')->name('cancel_order');
route::get('/delivery/{id}','delivery')->name('delivery');
route::get('/bill/{id}','bill')->name('bill');
route::get('/order/{id}','order')->name('order');
route::get('/show_order/{id}','show_order')->name('show_order');
route::get('/admin_order_show/{id}','admin_order_show')->name('admin_order_show');
route::get('/stripe/{total}','stripe')->name('stripe');
route::post('/stripe_pay/{total_price}','stripePay')->name('stripe_pay');
route::get('/user_order_search/{id}','user_order_search')->name('user_order_search');
route::get('/admin_order_search','admin_order_search')->name('admin_order_search');
route::get('/payment_status/{id}','payment_staus')->name('payment_status');
});



