<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\InvoiceController as CInvoice;
use App\Http\Controllers\OrderController as COrder;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use App\Http\Controllers\CartMController as cart;
use App\{invoice, order, Product, Store, transaction};

class TransactionController extends Controller
{
    public $returnURL = 'payment/success';
    public $cancelURL = '/cart';
    public $provider;
    public $expressCheckout;
    public $adaptiveCheckout;
    public $cartItem;
    public $brandName = 'Mff-Store';  // TODO set and get data from env
    public $logo = '/'; // TODO set and get data from env
    public $channel = 'Merchant';
    public $storeCharge = 10; // TODO set and get data from env
    public $shippingCharge = 10;
    public $CInvoice;
    public $COrder;

    public function __construct()
    {
        $this->expressCheckout = new ExpressCheckout;
        $this->adaptiveCheckout = new AdaptivePayments;
        $this->cartItem = new cart;
        $this->CInvoice = new CInvoice;
        $this->COrder = new COrder;
    }

    public function setOptions()
    {
        return [
            'BRANDNAME' => $this->brandName,
            'LOGOIMG' => $this->logo,
            'CHANNELTYPE' => $this->channel,
        ];
    }

    public function makePayment($data, $order)
    {
        $this->provider = $this->expressCheckout;

        $cart = json_decode($this->cartItem->CartItems());

        // $bulkOrderInvoice = $this->CInvoice->createBulkInvoiceSoftcopy($cart);
        $data['invoice_id'] = 222; // TODO work on invoice
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url($this->returnURL);
        $data['cancel_url'] = url($this->cancelURL);
        // dd($data);
        // $total = 0;
        // $data['shipping_discount'] = round((10 / 100) * $total, 2);
        $response = $this->provider->addOptions($this->setOptions())->setExpressCheckout($data);

        // This will redirect user to PayPalm
        // dd($response['paypal_link']);
        return $response;
    }

    // public function expresscheckout()
    // {

    // }

    public function adaptiveCheckout()
    {
        // PayPal::setProvider('adaptive_payments');
        $this->provider = $this->adaptiveCheckout;
        // Change the values accordingly for your application
        $data = [
            'receivers'  => [
                [
                    'email' => 'johndoe@example.com',
                    'amount' => $this->storeCharge,
                    'primary' => true,
                ],
                [
                    'email' => 'janedoe@example.com',
                    'amount' => 5,
                    'primary' => false
                ]
            ],
            'payer' => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => url($this->returnURL),
            'cancel_url' => url($this->cancelURL),
        ];

        $response = $this->provider->createPayRequest($data);

        // The above API call will return the following values if successful:
        // 'responseEnvelope.ack', 'payKey', 'paymentExecStatus'

        // Next, you need to redirect the user to PayPal to authorize the payment

        $redirect_url = $this->provider->getRedirectUrl('approved', $response['payKey']);

        return redirect($redirect_url);
    }

    public function cartRecieversAccounts($cart)
    {
        $account=[];
        foreach ($cart->items as $value) {
            $account['email'] = $this->getPaypalId($this->getStorePaymentMethod($value->store));
            $account['amount'] = $this->priceOfQty($value);
        }
        return $account;
    }

    public function getStorePaymentMethod($storeId)
    {
        $payAccounts = collect(json_decode(Store::find($storeId)->payAccounts[0]->pivot));
        $payAccounts->where('a_payment_methods_id', 1); // 1 is for paypal accounts
        return json_decode($payAccounts['attributes']);
    }

    public function getStore($cartItem)
    {

    }

    /**
     * Get Paypal account id of store.
     *
     * @param object return of $this->getStorePaymentMethod()
     * @return string Email id of paypal
     * @var
     */
    public function getPaypalId($attributes)
    {
        return $attributes->emailid;
    }

    public function CreateTrasaction($data)
    {
       return  transaction::create([
            'order_id' => $data['order_id'],
            'trans_id' => $data['trans_id'],
            'status' => $data['status'],
        ]);
    }

    public function wtpaid($id)
    {
        $orderDetail = order::where('order_number', $id)->first();
        $data = [
            'order_id' => $orderDetail->id,
            'trans_id' => 'N',
            'status' => 'PYMNTDN',
        ];
        if($this->CreateTrasaction($data) && $this->updateOrder($orderDetail->id)){
            return view('myorders')->with('success', 'Status Updated');
        } else {return false;};

    }

    public function updateOrder($id)
    {
        $orderedItems = order::find($id)->oitems;
        foreach ($orderedItems as $item) {
            $item->ad_status = 'PAYDN';
            $item->save();
        }
        return true;
    }

    public function success(Request $request)

    {

        $response = $provider->getExpressCheckoutDetails($request->token);

  

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            dd('Your payment was successfully. You can create success page here.');

        }

  

        dd('Something is wrong.');

    }

}
