<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\{invoice, Product, Store, User, APaymentMethods, order, Billing, ShippingAD, OrderProduct};
use Auth;

class InvoiceController extends Controller
{
    public $order;

    public function __construct()
    {
        $this->middleware('auth');
        $this->order = new OrderController;
    }

    public function createSingleInvoice($item, $order)
    {
        $invoice = (object) invoice::create([
            'user_id' => Auth::id(),
            'store_id' => $item->store,
            'product_id' => $item->itemDetail->id,
            'order_id' => $order->id,
            'amount' => $this->order->priceOfQty($item),
            'invoice_type' => 'SINGLE',
        ]);

        // INVOICE PDF
        $this->createSingleInvoiceSoftcopy($invoice, $item);
        return $invoice;
    }


    // public function getInvoice($id)
    // {
    //     return invoice::find($id)->first();
    // }

    // public function generateInvoiceId($id)
    // {
    //     $invoice = $this->getInvoice($id);
    //     return $invoice->id.'-'.$invoice->user_id.'-'.$invoice->product_id;
    // }

    public function generateInvoiceId($type)
    {   
        return  $type.Auth::id().'-'.rand(100,999).'-'.now()->toArray()['year'].now()->toArray()['dayOfYear'];
    }

    public function createBulkInvoiceSoftcopy($cart)
    {
        $data = [
            // 'item_details' => [Product::find($item->itemDetail->id)->first()],
            // 'store_detail' => Store::find($item->store)->first(),
            // 'user_detail' => Auth::user(),
            // 'invoice' => $this->getInvoice($invoice->id),
        ];
    }


    public function printInvoice($order, $item)
    {
        $data = (object) [
            'item_detail' => $item,
            'user_detail' => Auth::user(),
            'billing' => json_decode(Billing::find($order->billing_id)->first()->address),
            'shipping' => json_decode(ShippingAD::find($order->shipping_a_d_id)->first()->address),
            'invoice' => $order->invoice,
            'order_no' => $order->order_number,
            'paymentType' => APaymentMethods::find($order->a_payment_methods_id)->first()->title,
            // TODO CHANGE IT
        ];

        return $data;
         // TODO CREATE PDF AND RENDER DATA and update pdf url to invoice table
    }

    public function getSInvoice($id)
    {
        $items = OrderProduct::find($id);

        // $order = order::where('order_number', $order_number)->first();
        // $items = OrderProduct::find($order->id)->item;
        $data = $this->printInvoice($items->order, $items->item);
        return view('invoice')->with(['data' => $data, 'orderedItem' => $items]);
    }

    public function getInvoice($order_number)
    {
        $order = order::where('order_number', $order_number)->first();
        $items = order::find($order->id)->products;
        $data = $this->printInvoice($order, $items);
        return view('invoice')->with('data', $data);
    }

    public function insertToDatabase($order, $data)
    {
        invoice::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'invoice_type' => 'GEN',
            'invoice_number' => $this->generateInvoiceId('GEN'),
            'amount' => $data['total'],
        ]);
    }
}
