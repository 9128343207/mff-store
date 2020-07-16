<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User,Store, Product};

class dashboardController extends Controller
{
    public function index()
    {
    	return view('admin.dashboard1');
    }

    public function usersList()
    {
    	$users = User::orderBy('created_at', 'ASC')->get();
    	return view('admin.user.list')->with('users', $users);
    }

    public function storeList()
    {	
    	$stores = Store::orderBy('created_at', 'ASC')->with('user')->get();
    	return view('admin.store.list')->with('stores', $stores);
    }

    public function storeView($id)
    {
    	$user = User::find($id)->with('store')->first();
    	return view('admin.store.single')->with('user', $user);
    }

    public function storeProducts($id)
    {
    	$store = Store::find($id)->first();
    	return view('admin.products.list')->with('store', $store);
    }

    public function productView($id)
    {
    	$product = Product::find($id)->first();
    	dd($product);
    	return view('admin.products.single')->with('product', $product);
    }
}
