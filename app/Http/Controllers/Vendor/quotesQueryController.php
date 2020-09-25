<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{quotes, Store, Product, User};
use Illuminate\Support\Facades\Auth;


class quotesQueryController extends Controller
{
     public $loggedinUser = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->loggedinUser = Auth::user();
            return $next($request);
       });
    }

    public function index(){
    	// $product = Product::find();
    	// dd($this->loggedinUser->store);
    	$store = Store::find($this->loggedinUser->store->id)->first();
     //    dd($store);
        $quotes = quotes::where('store_id', $this->loggedinUser->store->id)->get();
    	// dd($quotes);
        $data = [
            'store' => $store,
            'quotes' => $quotes,
        ];
    	return view('vendor.Quotes.new')->with('data', $data);
    }

    public function view($id)
    {
    	$quote = quotes::find($id);
    	$Product = Product::find($quote->product_id);
    	$user = User::find($quote->user_id);
    	$data = [
    		'Quotes' => $quote,
    		'Product' => $Product,
    		'User' => $user,
    	];
    	return view('vendor.Quotes.viewQoutes')->with('data', $data);
    }
}
