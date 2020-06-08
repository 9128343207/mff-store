<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\CartMController as cart;
use App\Http\Controllers\ShippingController as CShipping;
use App\Http\Controllers\BillingController as CBilling;
use App\Http\Controllers\InvoiceController as CInvoice;
use App\Http\Controllers\OrderController as COrder;
use App\Http\Controllers\TransactionController as Payment;
use App\CartM;
use Auth;

class CheckoutController extends Controller
{
    public $cart;
    public $CShip;
    public $CBill;
    public $COrder;
    public $CInvoice;
    public $CPayment;

    public function __construct()
    {
        $this->middleware('auth');
        $this->cart = new cart;
        $this->CShip = new CShipping;
        $this->CBill = new CBilling;
        $this->COrder = new COrder;
        $this->CInvoice = new CInvoice;
        $this->CPayment = new Payment;
        
    }

    public function index()
    {
        $cart = (object) json_decode($this->cart->CartItems());
        return view('checkout')->with('cart', $cart);
    }

    public function SaveDetails(Request $request)
    {

    }

    public function prepareOrder(CheckoutRequest $request)
    {
        // $this->PlaceOrder($request->post());
    }

    public function PlaceOrder(CheckoutRequest $request)
    {
        $data['items'] = [];
        $data['order_number'] = $this->COrder->createOrderNumber();
        $cartItems = (object) json_decode($this->cart->CartItems());
        $order = $this->COrder->createOrder($request->post(), $data['order_number']);
        
        foreach ($cartItems->items as $item) {
            // create invoice of this item
            // $invoice = $this->CInvoice->createSingleInvoice($item, $order);

            $pivot = $this->COrder->insertAllOrder($item, $order);

            // TODO NOTIFY TO STORE (NEW ORDER)
            // TODO NOTIFY TO ADMINISTRATOR (NEW ORDER AND PAYMENT STATUS`)
            
            $ddata['item']['name'] = $item->itemDetail->name;
            $ddata['item']['price'] = $item->itemDetail->price;
            $ddata['item']['desc'] = '';
            $ddata['item']['qty'] = $item->qty;
            $ddata['item']['total'] = $this->COrder->priceOfQty($item);
            $ddata['item']['orderId'] = $order->id;
            array_push($data['items'], $ddata['item']);
        }
        $data['total'] = $this->COrder->orderTotal($data);
        $data['invoice'] = $this->CInvoice->insertToDatabase($order, $data);
        // CartM::where('user_id', '=', Auth::user()->id)->delete();
        // if(session()->get('cart')){
        //     session()->forget('cart');
        // }
        $response = $this->proceedToPayment($data, $request);

        return redirect($response);
                // dd($data);
        // return $data;
    }


    public function proceedToPayment($data, $order)
    {
        switch ($order->payment_method) {
            case 1: // 1 = paypal
                return $this->proceedToPaypal($data, $order);
                break;
            
           case 2: // 2 = wire transfer
                return $this->proceedToWireTransfer($data, $order);
                break;
        }
    }

    public function proceedToPaypal($data, $order)
    {
        $response = $this->CPayment->makePayment($data, $order);
        return $response['paypal_link'];
        
    }

    public function proceedToWireTransfer($data, $order)
    {
        // dd($data);
        $url = 'invoice/'.$data['order_number'];
        return $url;
    }

}
