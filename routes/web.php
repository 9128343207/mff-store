<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/start-selling', 'Vendor\StoreController@register')->name('start-selling')->middleware('auth');
Route::post('/start-selling', 'Vendor\StoreController@create');

Route::get('/products/more', 'HomeController2@index')->name('products.more');

Route::get('/product/{id}', 'Vendor\ProductController@SingleProduct')->name('product.view');

Route::post('/add-to-cart', 'CartMController@add');
Route::get('/cart/remove/{id}', 'CartMController@remove');

Route::get('/get-cart-items', 'CartMController@CartItems');
Route::get('/cart', 'CartMController@index')->name('cart.view');
Route::get('/clear-cart', 'CartMController@clearCart')->name('cart.clear');
Route::post('/update-cart', 'CartMController@updateCart')->name('cart.update');

// Route::post('/payment', 'TransactionController@makePayment');


Route::post('/add-billaddress', 'BillingController@addAddress');
Route::post('/add-shipaddress', 'ShippingController@addAddress');

Route::post('/products/sort', 'HomeController2@sort');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@PlaceOrder')->name('checkout');

Route::get('/invoice/{number}', 'InvoiceController@getInvoice');

Route::prefix('/payment')->name('payment.')->group(function(){
//     Route::get('/get', '')->name('get');

//     //  Product Listing
//    Route::get('/paypal', '')->name('paypal');
   Route::get('/wire-transfer', 'PaymentController@methods')->name('wiretransfer');

});

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//          VENDOR TOUTES
//____________________________________________________________________

Route::prefix('/vendor')->name('vendor.')->namespace('Vendor')->group(function(){
    //All the vendor routes will be defined here...
    Route::get('/dashboard','HomeController@index')->name('home');
    Route::get('/','HomeController@index')->name('home');



    //
    Route::prefix('/products')->group(function(){
         //  Product Listing
        Route::get('/all', 'ProductController@all')->name('product.all');

        // Add
        Route::get('/create-step1', 'ProductController@createStep1')->name('product.listing');
        Route::post('/create-step1', 'ProductController@postCreateStep1');
        Route::post('/review', 'ProductController@postCreateStep1');
        Route::post('/store', 'ProductController@store');

        // Edit item
        Route::get('/edit/{item}', 'ProductController@EditItem')->name('product.edit');
    });

    Route::prefix('/payments')->name('payment.')->group(function(){
        //  Product Listing
       Route::get('/', 'PaymentController@index')->name('index');
       Route::get('/methods', 'PaymentController@methods')->name('methods');

       // Add
       Route::post('/add', 'PaymentController@add')->name('methods.add');

       Route::post('/attributes', 'PaymentController@methodAttributes');


       // Edit item
   });

    Route::prefix('/orders')->name('order.')->group(function(){
        //  Product Listing
       Route::get('/', 'OrderController@index')->name('all');
       Route::post('/get-order-details', 'OrderController@getSingleOrder');


       // Edit item
   });

    // Image Upload
    Route::get('/upload', 'Additional\UploadController@uploadForm')->name('upload');
    Route::post('/upload', 'Additional\UploadController@uploadSubmit');

  });
