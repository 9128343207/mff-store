<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{OrderProduct, Store, APaymentMthods, Shipping};
use App\Events\OrderPrepared;

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
            'payment' =>  [
                'method' => $details->order->Method,
                'transaction' => '',
            ],
    		'item' => $details->item,
    		'order' => $details->order,
    	];
    	return response()->json($data);
    }

    public function status(Request $req)
    {
        // dd((int) $req->item);
        $item = OrderProduct::find($req->item);
        switch ($req->orderstatus) {
            case 1:
                # onhold
                $item->status = 'onhold';
                $item->save();
                break;
// 
            case 2:
                # processing
                $item->status = 'processing';
                $item->save();
                break;

            case 3:
                # shipping

            // Event::fire(new OrderPrepared($req->item));

            // Add to shipping
                Shipping::create([
                    'order_product_id' => (int) $req->item,
                    'status' => 'processing',
                    'store_id' => '',
                ]);
                
                $item->status = 'shipping';
                $item->save();

                break;

            case 4:
                # complete
                $item->status = 'complete';
                $item->save();
                break;
            
            default:
                # code...
                break;
        }
    }
}
