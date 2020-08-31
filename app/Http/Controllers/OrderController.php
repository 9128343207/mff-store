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
        $note = isset($orderDetail['proposal_note']) ? $orderDetail['proposal_note'] : null ;
         if ($orderDetail['order_type'] == 'proposal') {
            return order::create([
                'user_id' => Auth::id(),
                'status' => 'ORDERED',
                'invoice_id' => '-',
                'shipping_a_d_id' => $orderDetail['shipping_address'],
                'billing_id' => $orderDetail['billing_address'],
                'a_payment_methods_id' => 0,
                'order_number' => $orderNumber,
                'order_type' => $orderDetail['order_type'],
                'note' => $note,
            ]);
        } else {
        return order::create([
                'user_id' => Auth::id(),
                'status' => 'ORDERED',
                'invoice_id' => '-',
                'shipping_a_d_id' => $orderDetail['shipping_address'],
                'billing_id' => $orderDetail['billing_address'],
                'a_payment_methods_id' => $orderDetail['payment_method'],
                'order_number' => $orderNumber,
                'order_type' => $orderDetail['order_type'],
                'note' => $note,
            ]);
        }
    }

    public function insertAllOrder($item, $order)
    {
        $note = isset($order->note) ? $order->note : null ;
        OrderProduct::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'store_id' => $item->store,
            'product_id' => $item->itemDetail->id,
            'qty' => $item->qty,
            'amount' => $this->priceOfQty($item),
            'tag' => 'NEW',
            'ad_status' => 'ORCRTD',
            'vn_status' => 'NEW',
            'order_type' =>  $order->order_type,
            'note' => $note,
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
