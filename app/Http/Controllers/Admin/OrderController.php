<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{OrderProduct, Store, APaymentMthods, Shipping};
use App\Events\OrderPrepared;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = OrderProduct::simplePaginate(10);
    	return view('admin.orders.all')->with('orders', $orders);
    }

    public function getSingleOrder($req)
    {
    	$details = OrderProduct::find((int) $req);	
    	$data = [
    		'orderDetail' => $details,
    		'user' => $details->order->user,
            'payment' => (object) [
                'method' => $details->order->Method,
                'transaction' => '',
            ],
    		'item' => $details->item,
    		'order' => $details->order,
    	];
    	// return response()->json($data);
    	return view('admin.orders.single')->with('ordersSummary', (object) $data);

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

    public function itemPreview($id)
    {
        $itemSummary = OrderProduct::find($id)->with('order', 'user', 'item', 'store')->first();
        return view('admin.orders.itemSummary')->with('itemSummary', $itemSummary);
    }

    public function refine($id)
    {
        switch ($id) {
            case 'SHIPPING':
                $order = $this->getRefined('SHIPPING');
                break;

            case 'PAYMENTCOMPLETED':
                $order = $this->getRefined('PAYDN');
                break;

            case 'PAYTOSTORE':
                $order = $this->getRefined('PAYSTORE');
                break;
            
            case 'COMPLETED':
                $order = $this->getRefined('CMPLD');
                break;

            case 'NEWORDERS':
                $order = $this->getRefined('NEWORDR');
                break;

            case 'NOTIFYTOSTORE':
                $order = $this->getRefined('NOTIFYTOSTORE');
                break;
            default:
                # code...
                break;
        }

        return view('admin.orders.all')->with('orders', $order);

        
    }

    public function getRefined($status)
    {
        return OrderProduct::where('ad_status', $status)->simplePaginate(10);
    }


    public function updateStatus(Request $req)
    {
       
       
       switch ($req->paystatus) {
            
            
            case 'COMPLETED':
                $this->updateToDB($req->item, 'COMPLETED', 'WTNGPAYTOSTORE');
                break;

           
            case 'NOTIFYTOSTORE':
                $this->updateToDB($req->item, 'NOTIFYTOSTORE', 'NEW');
                break;
            default:
                # code... // TODO make default response
                break;
        }
        return response()->json(true);
    }

    public function updateToDB($id, $ad_status, $vn_status)
    {
        $order = OrderProduct::find($id)->first();
        $order->ad_status = ($ad_status) ? $ad_status : $order->ad_status ;
        $order->vn_status = ($vn_status) ? $vn_status : $order->vn_status ;
        if ($order->save()) {
           return true;
        } else { return false;}
    }
}
