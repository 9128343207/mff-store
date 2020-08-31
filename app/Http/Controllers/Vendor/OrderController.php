<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{OrderProduct, Store, APaymentMthods, Shipping};
use App\Events\OrderPrepared;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = OrderProduct::where('store_id', 6)->where('vn_status', 'NEW')->simplePaginate(10); // TODO CHANGED LOGGEDIN STOREID

    	return view('vendor.orders.all')->with('orders', $orders);
    }

    public function getSingleOrder($id)
    {
    	$details = OrderProduct::find((int) $id)->first();

    	$data = (object) [
    		'orderDetail' => $details,
    		'user' => $details->order->user,
            'payment' => (object)  [
                'method' => $details->order->Method,
                'transaction' => '',
            ],
    		'item' => $details->item,
    		'order' => $details->order,
    	];
    	return view('vendor.orders.summary')->with('ordersSummary', $data);
    }

    public function statusUpdate(Request $req)
    {

        switch ($req->paystatus) {
            case 'HOLD':
                $this->updateToDB($req->item, 'HOLD');
                break;

            case 'PROCESSING':
                 $this->updateToDB($req->item, 'PROCESSING');
                break;

            case 'COMPLETED':
                $this->updateToDB($req->item, 'COMPLETED');
                break;


            case 'SHIPPING':
                 $this->updateToDB($req->item, 'SHIPPING');
                break;
            default:
                # code...
                break;
        }


        return response()->json(true);
    }

    public function updateToDB($id, $vn_status)
    {
        $order = OrderProduct::find($id)->first();
        $order->vn_status = ($vn_status) ? $vn_status : $order->vn_status ;
        if ($order->save()) {
           return true;
        } else { return false;}
    }

    public function proposal()
    {
        // dd(Auth()->user());
        $orders = OrderProduct::where('store_id', Auth::guard('web')->user()->store->id)->where('vn_status', 'NEW')->where('order_type', 'proposal')->simplePaginate(10); // TODO CHANGED LOGGEDIN STOREID

    	return view('vendor.orders.proposal')->with('orders', $orders);
    }
}
