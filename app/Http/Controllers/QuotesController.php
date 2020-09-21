<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\quotes;
use Illuminate\Support\Facades\Auth;


class QuotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        

    }

    public function index($pid){
    	$product = Product::find($pid);
    	
    	return view('request-quotes')->with('product', $product);
    }

    public function createRequest(Request $req)
    {
    	$store = Product::find($req->productid)->store;
    	$quote =  quotes::create([
    				'user_id' => Auth::id(),
                    'product_id' => (int) $req->productid,
                    'store_id' => (int) $store->id,
                    'qty' => (int) $req->qty,
                    'summary' =>  $req->summary,
                    'status' => 'NEW', // TODO Add attribute function
                ]);
    	return view('checkoutSuccess');
    }
}
