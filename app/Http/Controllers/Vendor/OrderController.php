<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{OrderProduct, Store};

class OrderController extends Controller
{
    public function index()
    {
    	$orders = OrderProduct::where('store_id', 6)->simplePaginate(10);
    	return view('vendor.orders.all')->with('orders', $orders);
    }

    public function getSingleOrder(Request $req)
    {
    	$details = OrderProduct::find((int) $req->id);

    	$data = [
    		'orderDetail' => $details,
    		'user' => $details->order->user,
    		'item' => $details->item,
    		'order' => $details->order,
    	];
    	return response()->json($data);
    }
}
