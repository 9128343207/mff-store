<?php

namespace App\Http\Controllers;

use App\{order, OrderProduct};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder($orderDetail, $orderNumber)
    {
        // dd($orderDetail);
        
        return order::create([
                'user_id' => Auth::id(),
                'status' => 'ORDERED',
                'invoice_id' => '-',
                'shipping_a_d_id' => $orderDetail['shipping_address'],
                'billing_id' => $orderDetail['billing_address'],
                'a_payment_methods_id' => $orderDetail['payment_method'],
                'order_number' => $orderNumber,
            ]);
    }

    public function insertAllOrder($item, $order)
    {
        OrderProduct::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'store_id' => $item->store,
            'product_id' => $item->itemDetail->id,
            'qty' => $item->qty,
            'amount' => $this->priceOfQty($item),
        ]);
    }

    /**
     * Calculate individual item's price multiplying by quantity
     *
     * @param object $this->cartItem->items
     * @return int total price of one cart item
     * @var
     */
    public function priceOfQty($item)
    {
        return $item->itemDetail->price*$item->qty;
    }

    public function updateInvoiceInOrder($invoiceId, $orderId)
    {

    }

    public function createOrderNumber()
    {
        return Auth::id().'-'.now()->toArray()['timestamp'];
    }

    public function orderTotal($data)
    {
        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['total'];
        }
        return $total;
    }

    
}
