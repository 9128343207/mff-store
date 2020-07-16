<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Store, Product};
use Auth;

class UserController extends Controller
{
    public function OrderedItems()
    {
    	$orders = User::find(Auth::id())->orderItem;
        
    	return $this->prepareData($orders);
    }

    public function orderPage()
    {
    	return view('myorders');
    }

    public function prepareData($orders)
    {
        $data = [];
        foreach ($orders as $order) {
            $item = [
            'store' => Store::find($order->store_id),
            'itemDetail' => Product::find($order->product_id),
            'orderDetail' => $order,
        ];
        array_push($data, $item);
        }
        return $data;
    }
}
