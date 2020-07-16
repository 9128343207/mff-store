<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{order, OrderProduct};

class OrderSearchController extends Controller
{
    public function searchByOrderID(Request $req)
    {
    	
    	$orders = order::where('order_number', $req->order_id)->get();
    	return response()->json($this->makeData($orders));
    }

    public function searchByInvoice(Request $req)
    {
        # code...
    }

    public function makeData($orders)
    {
    	$data =[];
    	foreach ($orders as $order) {
    		$dataChunk = [
	    		'user' => $order->user,
	    		'payment_method' => $order->Method,
	    		'transaction' => $order->transaction,
	    		'order' => $order,
	    		'items' => count($this->getItems($order->id)),
	    	];
	    	array_push($data, $dataChunk);
    	}
    	
    	return $data;
    }

    public function getItems($id)
    {
    	$items = OrderProduct::where('order_id', $id)->with('store', 'item', 'user')->get();
    	return $items;
    }

    public function orderDetails($req)
    {
    	$orders = order::find((int) $req);
    	// return response()->json($this->makeDetailedData($orders));
    	return view('admin.orderview')->with('data', $this->makeDetailedData($orders));
    }

    public function makeDetailedData($order)
    {
    	$data =[];
    	// foreach ($orders as $order) {
    		$dataChunk = [
	    		'user' => $order->user,
	    		'payment_method' => $order->Method,
	    		'transaction' => $order->transaction,
	    		'order' => $order,
	    		'items' => $this->getItems($order->id),
	    	];
	    	// array_push($data, $dataChunk);
    	// }
    	
    	return $dataChunk;
    }
}
