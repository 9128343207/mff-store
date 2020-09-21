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
    	$store = Store::find($this->loggedinUser->store->id)->with('qoutes')->first();

    	// dd($quotes);
    	return view('vendor.Quotes.new')->with('store', $store);
    }

    public function view($id)
    {
    	$quote = quotes::find(1);
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
