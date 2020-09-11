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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/start-selling', 'Vendor\StoreController@register')->name('start-selling')->middleware('auth');
Route::post('/start-selling', 'Vendor\StoreController@create');

Route::get('/products/more', 'HomeController2@index')->name('products.more');
Route::get('/products/cat/{id}', 'HomeController2@productByCategory');
Route::post('/product/search', 'HomeController2@ProductSearch')->name('product.search');

Route::get('/product/{id}', 'Vendor\ProductController@SingleProduct')->name('product.view');


//  Cart
Route::post('/add-to-cart', 'CartMController@add');
Route::get('/cart/remove/{id}', 'CartMController@remove');

Route::get('/get-cart-items', 'CartMController@CartItems');
Route::get('/cart', 'CartMController@index')->name('cart.view');
Route::get('/clear-cart', 'CartMController@clearCart')->name('cart.clear');
Route::post('/update-cart', 'CartMController@updateCart')->name('cart.update');

// Route::post('/payment', 'TransactionController@makePayment');

Route::get('/get-ordered-items', 'UserController@OrderedItems');
Route::get('/my-orders', 'UserController@orderPage')->name('myorders');

Route::post('/add-billaddress', 'BillingController@addAddress');
Route::post('/add-shipaddress', 'ShippingController@addAddress');

Route::post('/products/sort', 'HomeController2@sort');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@PlaceOrder')->name('checkout');

Route::get('/invoice/{number}', 'InvoiceController@getInvoice');

Route::get('/invoice/s/{number}', 'InvoiceController@getSInvoice');
Route::get('/proposal/success', 'CheckoutController@proposalview')->name('proposal');

Route::get('/ticket/create', 'TicketController@index')->name('ticket.create');

Route::prefix('/payment')->name('payment.')->group(function(){
//     Route::get('/get', '')->name('get');

//     //  Product Listing
//    Route::get('/paypal', '')->name('paypal');
     Route::get('/success', 'TransactionController@CreateTrasaction')->name('success');
          Route::get('/wt/paid/{id}', 'TransactionController@wtpaid');

   Route::get('/wire-transfer', 'PaymentController@methods')->name('wiretransfer');


});

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//          VENDOR TOUTES 
//____________________________________________________________________

Route::prefix('/vendor')->name('vendor.')->namespace('Vendor')->group(function(){
    //All the vendor routes will be defined here...
    Route::get('/dashboard','HomeController@index')->name('dashboard');
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

    Route::prefix('/support')->group(function(){
         //  Product Listing
        Route::get('/all', 'SupportController@index')->name('support.list');

       
    });

    Route::prefix('/account')->group(function(){
         //  Product Listing
        Route::get('/main', 'AccountController@index')->name('account.main');

       
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
       Route::get('/proposal', 'OrderController@proposal')->name('proposal');
       Route::get('summary/{id}', 'OrderController@getSingleOrder')->name('summary');

       Route::post('/get-order-details', 'OrderController@getSingleOrder');

        // Route::post('/status', 'OrderController@status')->name('status');
        Route::post('/status/update', 'OrderController@statusUpdate')->name('status.update');


       // Edit item
   });

    // Image Upload
    Route::get('/upload', 'Additional\UploadController@uploadForm')->name('upload');
    Route::post('/upload', 'Additional\UploadController@uploadSubmit');

  });


Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
  Route::get('/dashboard','dashboardController@index')->name('dashboard');
  Route::get('/','dashboardController@index')->name('home');
    Route::get('/users','dashboardController@usersList')->name('user.list');
    Route::get('/store','dashboardController@storeList')->name('store.list');
        Route::get('/store/view/{id}','dashboardController@storeView')->name('store.view');
        Route::get('/store/products/{id}','dashboardController@storeProducts')->name('store.products');
        Route::get('/product/view/{id}','dashboardController@productView')->name('product.view');

      // Product category
      Route::get('category', 'CategoryController@manageCategory')->name('category');
      Route::post('add-category', 'CategoryController@addCategory')->name('add.category');


        // order
       Route::prefix('/orders')->name('order.')->group(function(){
        //  Product Listing
         Route::get('/', 'OrderController@index')->name('all');
         Route::get('/get-order-details/{id}', 'OrderController@getSingleOrder');

         Route::post('/status', 'OrderController@status')->name('status');


       // Edit item
   });

        Route::prefix('/CMS')->name('CMS.')->group(function(){

          Route::get('header', 'CMSController@header')->name('header');

          Route::get('footer', 'CMSController@footer')->name('footer');

          //UPDATE
          Route::post('footer', 'CMSController@updateFooter')->name('footer.update');
          Route::post('header', 'CMSController@updateHeader')->name('header.update');
         });
  //Auth
  /**
 * Login Route(s)
 */
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    /**
     * Register Route(s)
     */
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    /**
     * Password Reset Route(S)
     */
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    /**
     * Email Verification Route(s)
     */
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
  Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

  Route::post('searchByOrderId','OrderSearchController@searchByOrderID')->name('search.byid');
  Route::post('searchByInvoice','OrderSearchController@searchByInvoice')->name('search.byid');


  Route::post('get-order-details','OrderSearchController@orderDetails')->name('order.detail');
    Route::get('order/preview/{id}','OrderSearchController@orderDetails')->name('order.detail');
    Route::get('item/preview/{id}','OrderController@itemPreview')->name('item.preview');
    Route::get('orders/get/{id}','OrderController@refine')->name('order.refine');
      Route::post('order/status/update','OrderController@updateStatus')->name('order.status.update');


});
